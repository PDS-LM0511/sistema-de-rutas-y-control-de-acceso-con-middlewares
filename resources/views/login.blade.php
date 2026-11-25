@extends('layouts.app')

@section('title', 'Iniciar sesión')

@section('content')
    <div class="mx-auto grid max-w-5xl gap-8 lg:grid-cols-[1fr_0.85fr]">
        <section class="rounded-3xl border border-white/10 bg-slate-900/70 p-7 sm:p-10">
            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-amber-200">Acceso de huéspedes</p>
            <h1 class="mt-4 text-3xl font-semibold">Qué bueno tenerte de vuelta</h1>
            <p class="mt-3 text-slate-400">Inicia sesión para continuar con tu estancia.</p>

            <form method="POST" action="{{ route('login.store') }}" class="mt-8 space-y-5">
                @csrf
                <div>
                    <label for="email" class="mb-2 block text-sm font-medium text-slate-200">Correo electrónico</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email" class="w-full rounded-xl border border-white/10 bg-slate-950 px-4 py-3 text-white outline-none transition placeholder:text-slate-600 focus:border-amber-200/70" placeholder="tu@correo.com">
                    @error('email') <p class="mt-2 text-sm text-rose-300">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="password" class="mb-2 block text-sm font-medium text-slate-200">Contraseña</label>
                    <input id="password" name="password" type="password" required autocomplete="current-password" class="w-full rounded-xl border border-white/10 bg-slate-950 px-4 py-3 text-white outline-none transition focus:border-amber-200/70">
                    @error('password') <p class="mt-2 text-sm text-rose-300">{{ $message }}</p> @enderror
                </div>
                <button type="submit" class="w-full rounded-xl bg-amber-200 px-5 py-3 font-semibold text-slate-950 transition hover:bg-amber-100">Iniciar sesión</button>
            </form>
            <p class="mt-6 text-sm text-slate-400">¿Aún no tienes cuenta? <a href="{{ route('register') }}" class="font-medium text-amber-200 hover:text-amber-100">Regístrate</a></p>
        </section>

        <aside class="rounded-3xl border border-amber-200/20 bg-amber-200/[0.04] p-7 sm:p-9">
            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-amber-200">Acceso de demostración</p>
            <h2 class="mt-4 text-xl font-semibold">Cuentas de prueba</h2>
            <p class="mt-2 text-sm leading-6 text-slate-400">Usa la contraseña <code class="rounded bg-slate-950 px-2 py-1 text-amber-100">password</code> en todas las cuentas.</p>
            <div class="mt-6 space-y-4">
                <div class="rounded-2xl border border-white/10 bg-slate-950/60 p-4">
                    <p class="font-medium">Administrador adulto <span class="text-amber-200">· Admin</span></p>
                    <p class="mt-1 text-sm text-slate-400">admin@resort.com · 35 años</p>
                </div>
                <div class="rounded-2xl border border-white/10 bg-slate-950/60 p-4">
                    <p class="font-medium">Cliente adulto <span class="text-slate-400">· Cliente</span></p>
                    <p class="mt-1 text-sm text-slate-400">cliente@resort.com · 25 años</p>
                </div>
                <div class="rounded-2xl border border-white/10 bg-slate-950/60 p-4">
                    <p class="font-medium">Cliente menor <span class="text-slate-400">· Cliente</span></p>
                    <p class="mt-1 text-sm text-slate-400">menor@resort.com · 16 años</p>
                </div>
            </div>
        </aside>
    </div>
@endsection
