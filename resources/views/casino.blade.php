@extends('layouts.app')

@section('title', 'Casino VIP')

@section('content')
    <section class="relative overflow-hidden rounded-3xl border border-amber-200/20 bg-slate-900/80 p-8 sm:p-14">
        <div class="absolute -right-16 -top-16 h-64 w-64 rounded-full bg-amber-300/10 blur-3xl"></div>
        <div class="relative">
            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-amber-200">Acceso exclusivo · Mayores de 18</p>
            <h1 class="mt-4 text-4xl font-semibold sm:text-5xl">Sala VIP del casino</h1>
            <p class="mt-5 max-w-2xl text-lg leading-8 text-slate-300">Bienvenido a un espacio sofisticado para huéspedes adultos. Esta zona está protegida con verificación de edad y acceso autenticado.</p>
            <div class="mt-9 inline-flex items-center gap-3 rounded-full border border-emerald-300/20 bg-emerald-300/10 px-5 py-3 text-sm text-emerald-100">
                <span class="h-2 w-2 rounded-full bg-emerald-300"></span>
                Acceso autorizado para {{ auth()->user()->name }}
            </div>
        </div>
    </section>
@endsection
