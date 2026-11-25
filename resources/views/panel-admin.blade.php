@extends('layouts.app')

@section('title', 'Dirección')

@section('content')
    <section>
        <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.3em] text-amber-200">Zona de administración</p>
                <h1 class="mt-4 text-3xl font-semibold sm:text-4xl">Dirección del resort</h1>
                <p class="mt-3 text-slate-400">Gestión de huéspedes y cuentas registradas.</p>
            </div>
            <div class="rounded-2xl border border-white/10 bg-white/[0.03] px-5 py-3 text-sm text-slate-300">
                Usuarios registrados <span class="ml-2 font-semibold text-amber-200">{{ $users->count() }}</span>
            </div>
        </div>

        <div class="mt-8 overflow-hidden rounded-3xl border border-white/10 bg-slate-900/70">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[600px] text-left text-sm">
                    <thead class="border-b border-white/10 bg-white/[0.03] text-xs uppercase tracking-wider text-slate-400">
                        <tr>
                            <th class="px-6 py-4 font-medium">Nombre</th>
                            <th class="px-6 py-4 font-medium">Correo</th>
                            <th class="px-6 py-4 font-medium">Edad</th>
                            <th class="px-6 py-4 font-medium">Rol</th>
                            <th class="px-6 py-4 font-medium">Registro</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @forelse ($users as $user)
                            <tr class="text-slate-300">
                                <td class="px-6 py-4 font-medium text-white">{{ $user->name }}</td>
                                <td class="px-6 py-4">{{ $user->email }}</td>
                                <td class="px-6 py-4">{{ $user->age }}</td>
                                <td class="px-6 py-4">
                                    <span class="rounded-full px-3 py-1 text-xs {{ $user->is_admin ? 'bg-amber-200/10 text-amber-100' : 'bg-white/5 text-slate-300' }}">
                                        {{ $user->is_admin ? 'Admin' : 'Cliente' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-slate-400">{{ $user->created_at->format('d/m/Y') }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="px-6 py-10 text-center text-slate-400">Todavía no hay huéspedes registrados.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
