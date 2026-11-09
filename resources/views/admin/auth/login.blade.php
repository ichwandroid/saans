<!DOCTYPE html>
<html lang="id" class="h-full bg-zinc-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk — Panel Admin SAANS</title>
    <link rel="icon" type="image/png" href="{{ asset('images/header.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="h-full flex items-center justify-center p-4 antialiased text-zinc-900 selection:bg-zinc-900 selection:text-white">

<div class="w-full max-w-md">
    <!-- Brand Header -->
    <div class="text-center mb-8">
        <a href="{{ url('/') }}" class="inline-flex items-center gap-3 group">
            <img src="{{ asset('images/header.png') }}" alt="SAANS Logo" class="h-12 w-12 rounded-full border border-zinc-200 object-contain p-1 bg-white shadow-xs transition-transform group-hover:scale-105">
            <div class="text-left">
                <span class="block font-bold text-lg tracking-tight text-zinc-900">SAANS</span>
                <span class="block text-xs text-zinc-500 font-medium -mt-0.5">Sekolah Alam Anak Saleh</span>
            </div>
        </a>
    </div>

    <!-- Shadcn Auth Card -->
    <div class="rounded-2xl border border-zinc-200/80 bg-white p-6 sm:p-8 shadow-sm">
        <div class="mb-6">
            <h1 class="text-xl font-bold tracking-tight text-zinc-900">Masuk ke Panel Admin</h1>
            <p class="text-xs text-zinc-500 mt-1">Gunakan akun administrator Anda untuk mengelola konten website.</p>
        </div>

        @if (session('status'))
            <div class="mb-5 rounded-lg border border-emerald-200 bg-emerald-50 px-3.5 py-2.5 text-xs text-emerald-800">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-5 rounded-lg border border-red-200 bg-red-50 p-3 text-xs text-red-800">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Email Input -->
            <div class="space-y-1.5">
                <label for="email" class="block text-xs font-semibold text-zinc-700">Email Administrator</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email', 'admin@saans.sch.id') }}"
                    required
                    autofocus
                    placeholder="nama@saans.sch.id"
                    class="w-full rounded-lg border border-zinc-200 bg-white px-3.5 py-2 text-sm text-zinc-900 shadow-2xs transition-colors placeholder:text-zinc-400 focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950"
                >
            </div>

            <!-- Password Input -->
            <div class="space-y-1.5">
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-xs font-semibold text-zinc-700">Kata Sandi</label>
                </div>
                <input
                    type="password"
                    id="password"
                    name="password"
                    value="password"
                    required
                    placeholder="••••••••"
                    class="w-full rounded-lg border border-zinc-200 bg-white px-3.5 py-2 text-sm text-zinc-900 shadow-2xs transition-colors placeholder:text-zinc-400 focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950"
                >
            </div>

            <!-- Remember Me -->
            <div class="flex items-center gap-2 pt-1">
                <input
                    type="checkbox"
                    id="remember"
                    name="remember"
                    class="h-4 w-4 rounded-md border-zinc-300 text-zinc-900 focus:ring-zinc-950"
                    checked
                >
                <label for="remember" class="text-xs text-zinc-600 cursor-pointer select-none">Ingat saya di perangkat ini</label>
            </div>

            <!-- Submit Button (Shadcn style) -->
            <button
                type="submit"
                class="w-full inline-flex items-center justify-center rounded-lg bg-zinc-900 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-zinc-800 focus:outline-hidden focus:ring-2 focus:ring-zinc-950 focus:ring-offset-2 transition-all cursor-pointer"
            >
                Masuk ke Dashboard
            </button>
        </form>

        <!-- Quick Demo Credentials Hint -->
        <div class="mt-6 border-t border-zinc-100 pt-5">
            <div class="rounded-xl border border-zinc-100 bg-zinc-50/80 p-3.5 text-xs text-zinc-600">
                <div class="flex items-center gap-1.5 font-semibold text-zinc-800 mb-1">
                    <svg class="h-3.5 w-3.5 text-zinc-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>Akun Default Admin:</span>
                </div>
                <div class="flex flex-col gap-0.5 text-zinc-500 font-mono text-[11px]">
                    <div>Email: <strong class="text-zinc-700">admin@saans.sch.id</strong></div>
                    <div>Password: <strong class="text-zinc-700">password</strong></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Back to public home -->
    <div class="text-center mt-6">
        <a href="{{ url('/') }}" class="text-xs text-zinc-500 hover:text-zinc-900 inline-flex items-center gap-1 transition-colors">
            <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Kembali ke Beranda Website
        </a>
    </div>
</div>

</body>
</html>
