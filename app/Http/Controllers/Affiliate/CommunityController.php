<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Post;

class CommunityController extends Controller
{
    public function index()
    {
        $topics = \App\Models\Topic::with('user')->orderBy('created_at', 'desc')->paginate(15);
        return view('pages.affiliate.community.index', compact('topics'));
    }

    public function create()
    {
        return view('pages.affiliate.community.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category' => 'required'
        ]);

        $topic = \App\Models\Topic::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'category' => $validated['category'],
            'user_id' => auth()->id()
        ]);

        // Award points for completing the Social mission if it's the first time
        // auth()->user()->addPoints(300, 'social_mission');

        return redirect()->route('affiliate.community.index')->with('success', 'Tópico criado com sucesso! Sua contribuição para a comunidade foi registrada.');
    }

    public function show($id)
    {
        $topic = \App\Models\Topic::with(['user', 'posts.user'])->findOrFail($id);
        return view('pages.affiliate.community.show', compact('topic'));
    }

    public function storePost(Request $request, $id)
    {
        $request->validate(['content' => 'required']);

        \App\Models\Post::create([
            'content' => $request->content,
            'user_id' => auth()->id(),
            'topic_id' => $id
        ]);

        return back()->with('success', 'Resposta enviada!');
    }
}
