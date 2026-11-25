<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function home(): View
    {
        return view('home');
    }

    public function showLogin(): View
    {
        return view('login');
    }

    public function showRegister(): View
    {
        return view('register');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt($credentials)) {
            return back()
                ->withErrors(['email' => 'Las credenciales no son válidas.'])
                ->withInput($request->only('email'))
                ->with('error', 'No se pudo iniciar sesión. Revisa tu correo y contraseña.');
        }

        $request->session()->regenerate();

        return redirect('/panel')->with('success', 'Has iniciado sesión correctamente.');
    }

    public function register(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'age' => ['required', 'integer', 'min:1', 'max:120'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'age' => $validated['age'],
            'is_admin' => false,
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect('/panel')->with('success', 'Tu estancia comienza ahora. ¡Bienvenido al resort!');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Has cerrado sesión correctamente.');
    }

    public function panel(): View
    {
        return view('panel-usuario');
    }

    public function casino(): View
    {
        return view('casino');
    }

    public function admin(): View
    {
        return view('panel-admin', [
            'users' => User::query()->latest('created_at')->get(),
        ]);
    }
}
