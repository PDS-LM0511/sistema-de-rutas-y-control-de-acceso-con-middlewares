<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Resort Digital') · Resort Digital</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="min-h-screen bg-slate-950 text-slate-100 antialiased">
    <div class="pointer-events-none fixed inset-0 -z-10 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-slate-800 via-slate-950 to-slate-950"></div>
    <header class="border-b border-white/10 bg-slate-950/80 backdrop-blur-xl">
        <nav class="mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-4 px-6 py-5">
            <a href="{{ route('home') }}" class="flex items-center gap-3 text-lg font-semibold tracking-wide">
                <span class="flex h-10 w-10 items-center justify-center rounded-full border border-amber-300/50 bg-amber-300/10 text-amber-200">R</span>
                <span>RESORT <span class="text-amber-200">DIGITAL</span></span>
            </a>

            <div class="flex flex-wrap items-center gap-x-6 gap-y-3 text-sm text-slate-300">
                <a class="transition hover:text-amber-200" href="{{ route('home') }}">Inicio</a>
                <a class="transition hover:text-amber-200" href="{{ route('panel') }}">Mi habitación</a>
                <a class="transition hover:text-amber-200" href="{{ route('casino') }}">Casino</a>
                <a class="transition hover:text-amber-200" href="{{ route('admin') }}">Dirección</a>
            </div>

            <div class="flex flex-wrap items-center gap-3">
                @auth
                    <div class="hidden text-right text-xs sm:block">
                        <p class="font-medium text-white">{{ auth()->user()->name }}</p>
                        <p class="text-slate-400">{{ auth()->user()->age }} años · {{ auth()->user()->is_admin ? 'Admin' : 'Cliente' }}</p>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="rounded-full border border-white/15 px-4 py-2 text-sm text-slate-200 transition hover:border-amber-200/60 hover:text-amber-100" type="submit">Cerrar sesión</button>
                    </form>
                @else
                    <a class="rounded-full px-3 py-2 text-sm text-slate-200 transition hover:text-amber-100" href="{{ route('login') }}">Login</a>
                    <a class="rounded-full bg-amber-200 px-4 py-2 text-sm font-semibold text-slate-950 transition hover:bg-amber-100" href="{{ route('register') }}">Registro</a>
                @endauth
            </div>
        </nav>
    </header>

    <main class="mx-auto min-h-[calc(100vh-160px)] max-w-7xl px-6 py-10 sm:py-14">
        @if (session('error'))
            <div role="alert" class="mb-6 rounded-2xl border border-rose-300/25 bg-rose-400/10 px-5 py-4 text-sm text-rose-100">
                {{ session('error') }}
            </div>
        @endif
        @if (session('success'))
            <div role="status" class="mb-6 rounded-2xl border border-emerald-300/25 bg-emerald-400/10 px-5 py-4 text-sm text-emerald-100">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="border-t border-white/10">
        <div class="mx-auto flex max-w-7xl flex-col gap-2 px-6 py-6 text-xs text-slate-500 sm:flex-row sm:items-center sm:justify-between">
            <span>Resort Digital · Tu refugio, a un clic.</span>
            <span>Hospitalidad exclusiva, acceso responsable.</span>
        </div>
    </footer>
</body>
</html>
