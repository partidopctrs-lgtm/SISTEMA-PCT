<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use App\Models\ForumTopic;
use App\Models\ForumComment;
use App\Models\ForumCategory;
use App\Models\ForumLike;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ForumController extends Controller
{
    public function index(Request $request)
    {
        $categories = ForumCategory::withCount('topics')->get();
        $query = ForumTopic::with(['user', 'category', 'comments'])->latest();

        if ($request->has('city')) {
            $query->where('city', $request->city);
        }

        if ($request->has('category')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $topics = $query->paginate(15);
        $activeCities = ForumTopic::select('city')->distinct()->pluck('city');

        return view('pages.affiliate.forum.index', compact('categories', 'topics', 'activeCities'));
    }

    public function show($id)
    {
        $topic = ForumTopic::with(['user', 'category', 'comments.user', 'likes'])->findOrFail($id);
        $topic->increment('views');
        
        return view('pages.affiliate.forum.show', compact('topic'));
    }

    public function create()
    {
        $categories = ForumCategory::all();
        return view('pages.affiliate.forum.create', compact('categories'));
    }

    public function storeTopic(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'city' => 'required|string',
            'forum_category_id' => 'required|exists:forum_categories,id',
            'description' => 'required|string',
            'problem_type' => 'nullable|string',
        ]);

        $topic = ForumTopic::create([
            'user_id' => auth()->id(),
            'forum_category_id' => $request->forum_category_id,
            'city' => $request->city,
            'title' => $request->title,
            'description' => $request->description,
            'problem_type' => $request->problem_type,
            'status' => 'aberto',
        ]);

        return redirect()->route('affiliate.forum.show', $topic->id)->with('success', 'Tópico criado com sucesso!');
    }

    public function storeComment(Request $request, $id)
    {
        $request->validate(['content' => 'required|string']);

        ForumComment::create([
            'forum_topic_id' => $id,
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return back()->with('success', 'Comentário enviado!');
    }

    public function toggleLike($id)
    {
        $userId = auth()->id();
        $like = ForumLike::where('user_id', $userId)->where('forum_topic_id', $id)->first();

        if ($like) {
            $like->delete();
            return back()->with('success', 'Apoio removido.');
        } else {
            ForumLike::create([
                'user_id' => $userId,
                'forum_topic_id' => $id
            ]);
            return back()->with('success', 'Apoio registrado!');
        }
    }
}
