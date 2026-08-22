<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $messages = [
            'name.required' => 'El nombre completo es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.unique' => 'Este correo ya está registrado.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'phone.required' => 'El número de teléfono es obligatorio.',
            'phone.regex' => 'El teléfono debe tener el formato: +505 XXXX XXXX.',
            'identification.required_if' => 'La cédula es obligatoria para emprendedores.',
            'identification.regex' => 'Formato de cédula incorrecto (Ej. 000-000000-0000A).',
        ];

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Password::min(8)],
            'role' => ['required', 'string', 'in:turista,emprendedor'],
            'phone' => ['required', 'string', 'regex:/^\+\d{1,4}\s\d{3,4}\s\d{4}$/', 'unique:'.User::class],
            'identification' => ['nullable', 'required_if:role,emprendedor', 'string', 'regex:/^\d{3}-\d{6}-\d{4}[A-Za-z]$/', 'max:30'],
            'country' => ['nullable', 'string', 'max:100'],
        ], $messages);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'phone' => $request->phone,
            'identification' => $request->identification,
            'country' => $request->country,
        ]);

        event(new Registered($user));
        Auth::login($user);

        return redirect()->route('dashboard');
    }
}   