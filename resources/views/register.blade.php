@extends('layouts.app')

@section('title', 'Crear cuenta')

@section('content')
    <section class="mx-auto max-w-2xl rounded-3xl border border-white/10 bg-slate-900/70 p-7 sm:p-10">
        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-amber-200">Tu próxima escapada</p>
        <h1 class="mt-4 text-3xl font-semibold">Crea tu cuenta</h1>
        <p class="mt-3 text-slate-400">Completa tus datos para acceder a tu espacio personal.</p>

        <form method="POST" action="{{ route('register.store') }}" class="mt-8 grid gap-5 sm:grid-cols-2">
            @csrf
            <div class="sm:col-span-2">
                <label for="name" class="mb-2 block text-sm font-medium text-slate-200">Nombre completo</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" required autocomplete="name" class="w-full rounded-xl border border-white/10 bg-slate-950 px-4 py-3 text-white outline-none transition focus:border-amber-200/70">
                @error('name') <p class="mt-2 text-sm text-rose-300">{{ $message }}</p> @enderror
            </div>
            <div class="sm:col-span-2">
                <label for="email" class="mb-2 block text-sm font-medium text-slate-200">Correo electrónico</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email" class="w-full rounded-xl border border-white/10 bg-slate-950 px-4 py-3 text-white outline-none transition focus:border-amber-200/70">
                @error('email') <p class="mt-2 text-sm text-rose-300">{{ $message }}</p> @enderror
            </div>
            <div class="sm:col-span-2">
                <label for="age" class="mb-2 block text-sm font-medium text-slate-200">Edad</label>
                <input id="age" name="age" type="number" min="1" max="120" value="{{ old('age') }}" required class="w-full rounded-xl border border-white/10 bg-slate-950 px-4 py-3 text-white outline-none transition focus:border-amber-200/70">
                @error('age') <p class="mt-2 text-sm text-rose-300">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="password" class="mb-2 block text-sm font-medium text-slate-200">Contraseña</label>
                <input id="password" name="password" type="password" required autocomplete="new-password" class="w-full rounded-xl border border-white/10 bg-slate-950 px-4 py-3 text-white outline-none transition focus:border-amber-200/70">
                @error('password') <p class="mt-2 text-sm text-rose-300">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="password_confirmation" class="mb-2 block text-sm font-medium text-slate-200">Confirmar contraseña</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password" class="w-full rounded-xl border border-white/10 bg-slate-950 px-4 py-3 text-white outline-none transition focus:border-amber-200/70">
            </div>
            <button type="submit" class="sm:col-span-2 rounded-xl bg-amber-200 px-5 py-3 font-semibold text-slate-950 transition hover:bg-amber-100">Crear cuenta y entrar</button>
        </form>
        <p class="mt-6 text-sm text-slate-400">¿Ya tienes una cuenta? <a href="{{ route('login') }}" class="font-medium text-amber-200 hover:text-amber-100">Inicia sesión</a></p>
    </section>
@endsection
