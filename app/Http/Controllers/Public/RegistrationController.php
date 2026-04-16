<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('pages.public.registration');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'cpf' => 'required|string|max:14|unique:users',
            'phone' => 'required|string|max:20',
            'password' => ['required', Password::defaults()],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'cpf' => $validated['cpf'],
            'phone' => $validated['phone'],
            'password' => Hash::make($validated['password']),
            'role' => 'affiliate',
            'registration_number' => 'PCT-' . strtoupper(substr(uniqid(), -6)),
            'status' => 'active', // Set to active for immediate login testing
        ]);

        return redirect()->route('register.success')->with('user_name', $user->name);
    }

    public function success()
    {
        return view('pages.public.registration-success');
    }
}
