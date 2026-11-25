@extends('layouts.app')

@section('title', 'Mi habitación')

@section('content')
    <section class="rounded-3xl border border-white/10 bg-slate-900/70 p-8 sm:p-12">
        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-amber-200">Tu espacio privado</p>
        <h1 class="mt-4 text-3xl font-semibold sm:text-4xl">Bienvenido, {{ auth()->user()->name }}</h1>
        <p class="mt-4 max-w-2xl leading-7 text-slate-300">Nos alegra recibirte. Aquí tienes los datos principales de tu estancia en el Resort Digital.</p>

        <div class="mt-9 grid gap-4 sm:grid-cols-3">
            <div class="rounded-2xl border border-white/10 bg-slate-950/60 p-5">
                <p class="text-sm text-slate-400">Huésped</p>
                <p class="mt-2 font-medium">{{ auth()->user()->name }}</p>
            </div>
            <div class="rounded-2xl border border-white/10 bg-slate-950/60 p-5">
                <p class="text-sm text-slate-400">Edad registrada</p>
                <p class="mt-2 font-medium">{{ auth()->user()->age }} años</p>
            </div>
            <div class="rounded-2xl border border-white/10 bg-slate-950/60 p-5">
                <p class="text-sm text-slate-400">Tipo de acceso</p>
                <p class="mt-2 font-medium">{{ auth()->user()->is_admin ? 'Administración' : 'Huésped' }}</p>
            </div>
        </div>
        <div class="mt-8 rounded-2xl border border-amber-200/20 bg-amber-200/[0.04] p-5 text-sm leading-6 text-slate-300">
            El acceso al casino está reservado para huéspedes de 18 años o más. Tu sesión permanece protegida mientras navegas por el resort.
        </div>
    </section>
@endsection
