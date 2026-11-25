@extends('layouts.app')

@section('title', 'Bienvenido')

@section('content')
    <section class="relative overflow-hidden rounded-[2rem] border border-white/10 bg-slate-900/70 px-7 py-14 shadow-2xl shadow-black/30 sm:px-12 sm:py-20">
        <div class="absolute -right-20 -top-24 h-72 w-72 rounded-full bg-amber-300/10 blur-3xl"></div>
        <div class="relative max-w-3xl">
            <p class="mb-5 text-xs font-semibold uppercase tracking-[0.35em] text-amber-200">Una experiencia extraordinaria</p>
            <h1 class="text-4xl font-semibold leading-tight tracking-tight sm:text-6xl">Bienvenido al <span class="text-amber-200">Resort Digital</span></h1>
            <p class="mt-6 max-w-2xl text-lg leading-8 text-slate-300">Un destino privado para descansar, descubrir y disfrutar. Explora nuestras instalaciones con una estancia diseñada alrededor de ti.</p>
            <div class="mt-9 flex flex-wrap gap-4">
                @auth
                    <a href="{{ route('panel') }}" class="rounded-full bg-amber-200 px-6 py-3 text-sm font-semibold text-slate-950 transition hover:bg-amber-100">Ir a mi habitación</a>
                @else
                    <a href="{{ route('register') }}" class="rounded-full bg-amber-200 px-6 py-3 text-sm font-semibold text-slate-950 transition hover:bg-amber-100">Comenzar mi estancia</a>
                    <a href="{{ route('login') }}" class="rounded-full border border-white/20 px-6 py-3 text-sm font-medium text-white transition hover:border-amber-200/70">Ya tengo una cuenta</a>
                @endauth
            </div>
        </div>
    </section>

    <section class="mt-10 grid gap-5 md:grid-cols-3">
        <article class="rounded-3xl border border-white/10 bg-white/[0.03] p-7">
            <p class="text-sm font-medium text-amber-200">01 · Descansa</p>
            <h2 class="mt-4 text-xl font-semibold">Habitaciones privadas</h2>
            <p class="mt-3 leading-7 text-slate-400">Tu espacio personal para consultar los detalles de tu estancia y disfrutar de una bienvenida a medida.</p>
            <a href="{{ route('panel') }}" class="mt-6 inline-flex text-sm font-medium text-white hover:text-amber-200">Mi habitación <span aria-hidden="true" class="ml-2">→</span></a>
        </article>
        <article class="rounded-3xl border border-amber-200/20 bg-amber-200/[0.04] p-7">
            <p class="text-sm font-medium text-amber-200">02 · Disfruta</p>
            <h2 class="mt-4 text-xl font-semibold">Casino +18</h2>
            <p class="mt-3 leading-7 text-slate-400">Una sala VIP reservada para huéspedes adultos. El acceso está protegido por verificación de edad.</p>
            <a href="{{ route('casino') }}" class="mt-6 inline-flex text-sm font-medium text-white hover:text-amber-200">Descubrir el casino <span aria-hidden="true" class="ml-2">→</span></a>
        </article>
        <article class="rounded-3xl border border-white/10 bg-white/[0.03] p-7">
            <p class="text-sm font-medium text-amber-200">03 · Gestiona</p>
            <h2 class="mt-4 text-xl font-semibold">Dirección del resort</h2>
            <p class="mt-3 leading-7 text-slate-400">El área de gestión, con acceso reservado exclusivamente al equipo administrador.</p>
            <a href="{{ route('admin') }}" class="mt-6 inline-flex text-sm font-medium text-white hover:text-amber-200">Área de dirección <span aria-hidden="true" class="ml-2">→</span></a>
        </article>
    </section>
@endsection
