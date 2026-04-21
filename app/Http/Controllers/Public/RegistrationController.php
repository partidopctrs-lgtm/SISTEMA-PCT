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

        \Illuminate\Support\Facades\DB::transaction(function () use ($validated, $request) {
            $nextId = User::count() + 1;
            $regNumber = 'PCT-' . str_pad($nextId, 4, '0', STR_PAD_LEFT);

            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'cpf' => $validated['cpf'],
                'phone' => $validated['phone'],
                'password' => Hash::make($validated['password']),
                'role' => 'affiliate',
                'registration_number' => $regNumber,
                'status' => 'active',
            ]);

            // 1. Criar Perfil de Afiliado
            $user->profiles()->create([
                'profile_type' => 'affiliate',
                'level' => 'local',
                'is_primary' => true,
            ]);

            // 2. Vincular ao diretório (detectado via subdomínio ou padrão)
            $directory = $request->get('currentDirectory');
            
            if (!$directory) {
                // Tenta buscar por cidade se não houver subdomínio (ex: cadastro direto no domínio raiz)
                $directory = \App\Models\Directory::where('city', 'Taquara')->first();
            }

            if ($directory) {
                // Atualiza o usuário com o comitê oficial
                $user->update(['committee_id' => $directory->id]);

                \App\Models\Membership::create([
                    'user_id' => $user->id,
                    'directory_id' => $directory->id,
                    'membership_status' => 'active',
                    'joined_at' => now(),
                    'source' => 'web_registration',
                ]);
            }
        });

        return redirect()->route('register.success')->with('user_name', $validated['name']);
    }

    public function success()
    {
        return view('pages.public.registration-success');
    }
}
