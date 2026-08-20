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
            'name.max' => 'El nombre no puede exceder los 255 caracteres.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Debe ingresar un formato de correo válido.',
            'email.unique' => 'Este correo ya se encuentra registrado en el sistema.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas ingresadas no coinciden.',
            'role.required' => 'Debe seleccionar un perfil válido.',
            'role.in' => 'El perfil seleccionado no es reconocido.',
            'phone.max' => 'El número de teléfono no debe exceder los 20 caracteres.',
            'phone.unique' => 'Este número de teléfono ya se encuentra registrado.',
            'identification.max' => 'La cédula de identidad no debe exceder los 30 caracteres.',
            'country.max' => 'El país no debe exceder los 100 caracteres.',
        ];

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Password::min(8)],
            'role' => ['required', 'string', 'in:turista,emprendedor'],
            'phone' => ['nullable', 'string', 'max:20', 'unique:'.User::class],
            'identification' => ['nullable', 'string', 'max:30'],
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