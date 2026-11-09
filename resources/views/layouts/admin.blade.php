<!DOCTYPE html>
<html lang="id" class="h-full bg-zinc-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') — SAANS</title>
    <link rel="icon" type="image/png" href="{{ asset('images/header.png') }}">

    <!-- Google Fonts Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="h-full text-zinc-900 antialiased selection:bg-zinc-900 selection:text-white">
<div class="min-h-full flex flex-col lg:flex-row">

    <!-- Mobile Header -->
    <header class="lg:hidden sticky top-0 z-40 flex items-center justify-between border-b border-zinc-200 bg-white px-4 py-3 shadow-xs">
        <div class="flex items-center gap-3">
            <img src="{{ asset('images/header.png') }}" alt="SAANS Logo" class="h-8 w-8 rounded-full border border-zinc-200 object-contain p-0.5">
            <span class="font-semibold text-sm tracking-tight text-zinc-900">SAANS Admin</span>
        </div>
        <button type="button" id="mobile-menu-btn" class="inline-flex items-center justify-center rounded-lg border border-zinc-200 p-2 text-zinc-600 hover:bg-zinc-100 focus:outline-hidden" aria-label="Toggle menu">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>
    </header>

    <!-- Sidebar -->
    <aside id="sidebar" class="hidden lg:flex w-64 shrink-0 flex-col border-r border-zinc-200 bg-white">
        <!-- Brand -->
        <div class="flex h-16 items-center justify-between border-b border-zinc-200 px-6">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                <img src="{{ asset('images/header.png') }}" alt="SAANS" class="h-8 w-8 rounded-full border border-zinc-200 object-contain p-0.5">
                <div>
                    <span class="block font-bold text-sm tracking-tight text-zinc-900">SAANS</span>
                    <span class="block text-[11px] text-zinc-500 font-medium -mt-0.5">Panel Konten</span>
                </div>
            </a>
            <span class="inline-flex items-center rounded-full bg-zinc-100 px-2 py-0.5 text-[10px] font-medium text-zinc-600">v1.0</span>
        </div>

        <!-- Navigation Menu -->
        <nav class="flex-1 space-y-6 overflow-y-auto px-4 py-5 text-sm">
            <div>
                <p class="px-2 text-[11px] font-semibold uppercase tracking-wider text-zinc-400">Ikhtisar</p>
                <div class="mt-2 space-y-1">
                    <a href="{{ route('admin.dashboard') }}" class="group flex items-center gap-3 rounded-lg px-3 py-2 font-medium transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-zinc-900 text-white shadow-xs' : 'text-zinc-600 hover:bg-zinc-100 hover:text-zinc-900' }}">
                        <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        Dashboard
                    </a>
                </div>
            </div>

            <div>
                <p class="px-2 text-[11px] font-semibold uppercase tracking-wider text-zinc-400">Pengelolaan Konten</p>
                <div class="mt-2 space-y-1">
                    <a href="{{ route('admin.navbar') }}" class="group flex items-center gap-3 rounded-lg px-3 py-2 font-medium transition-colors {{ request()->routeIs('admin.navbar') ? 'bg-zinc-900 text-white shadow-xs' : 'text-zinc-600 hover:bg-zinc-100 hover:text-zinc-900' }}">
                        <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/></svg>
                        Navbar & Menu
                    </a>

                    <a href="{{ route('admin.hero') }}" class="group flex items-center gap-3 rounded-lg px-3 py-2 font-medium transition-colors {{ request()->routeIs('admin.hero') ? 'bg-zinc-900 text-white shadow-xs' : 'text-zinc-600 hover:bg-zinc-100 hover:text-zinc-900' }}">
                        <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                        Hero / Beranda
                    </a>

                    <a href="{{ route('admin.general') }}" class="group flex items-center gap-3 rounded-lg px-3 py-2 font-medium transition-colors {{ request()->routeIs('admin.general') ? 'bg-zinc-900 text-white shadow-xs' : 'text-zinc-600 hover:bg-zinc-100 hover:text-zinc-900' }}">
                        <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        Identitas & Kontak
                    </a>

                    <a href="{{ route('admin.programme') }}" class="group flex items-center gap-3 rounded-lg px-3 py-2 font-medium transition-colors {{ request()->routeIs('admin.programme') ? 'bg-zinc-900 text-white shadow-xs' : 'text-zinc-600 hover:bg-zinc-100 hover:text-zinc-900' }}">
                        <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        Panca Karakter
                    </a>

                    <a href="{{ route('admin.teachers') }}" class="group flex items-center gap-3 rounded-lg px-3 py-2 font-medium transition-colors {{ request()->routeIs('admin.teachers') ? 'bg-zinc-900 text-white shadow-xs' : 'text-zinc-600 hover:bg-zinc-100 hover:text-zinc-900' }}">
                        <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        Guru & Pendidik
                    </a>

                    <a href="{{ route('admin.stats') }}" class="group flex items-center gap-3 rounded-lg px-3 py-2 font-medium transition-colors {{ request()->routeIs('admin.stats') ? 'bg-zinc-900 text-white shadow-xs' : 'text-zinc-600 hover:bg-zinc-100 hover:text-zinc-900' }}">
                        <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                        SAANS dalam Angka
                    </a>

                    <a href="{{ route('admin.gallery') }}" class="group flex items-center gap-3 rounded-lg px-3 py-2 font-medium transition-colors {{ request()->routeIs('admin.gallery') ? 'bg-zinc-900 text-white shadow-xs' : 'text-zinc-600 hover:bg-zinc-100 hover:text-zinc-900' }}">
                        <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        Galeri Kegiatan
                    </a>

                    <a href="{{ route('admin.testimonials') }}" class="group flex items-center gap-3 rounded-lg px-3 py-2 font-medium transition-colors {{ request()->routeIs('admin.testimonials') ? 'bg-zinc-900 text-white shadow-xs' : 'text-zinc-600 hover:bg-zinc-100 hover:text-zinc-900' }}">
                        <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                        Testimoni Wali Murid
                    </a>

                    <a href="{{ route('admin.passes') }}" class="group flex items-center gap-3 rounded-lg px-3 py-2 font-medium transition-colors {{ request()->routeIs('admin.passes') ? 'bg-zinc-900 text-white shadow-xs' : 'text-zinc-600 hover:bg-zinc-100 hover:text-zinc-900' }}">
                        <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                        Jenjang PPDB
                    </a>

                    <a href="{{ route('admin.faqs') }}" class="group flex items-center gap-3 rounded-lg px-3 py-2 font-medium transition-colors {{ request()->routeIs('admin.faqs') ? 'bg-zinc-900 text-white shadow-xs' : 'text-zinc-600 hover:bg-zinc-100 hover:text-zinc-900' }}">
                        <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Tanya Jawab (FAQ)
                    </a>
                </div>
            </div>
        </nav>

        <!-- User Profile & Logout -->
        <div class="border-t border-zinc-200 p-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3 min-w-0">
                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-zinc-900 font-semibold text-xs text-white">
                        {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 2)) }}
                    </div>
                    <div class="min-w-0">
                        <p class="truncate text-xs font-semibold text-zinc-900">{{ auth()->user()->name ?? 'Administrator' }}</p>
                        <p class="truncate text-[11px] text-zinc-500">{{ auth()->user()->email ?? 'admin@saans.sch.id' }}</p>
                    </div>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" title="Keluar / Logout" class="inline-flex h-8 w-8 items-center justify-center rounded-lg text-zinc-400 hover:bg-zinc-100 hover:text-zinc-900 transition-colors">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col min-w-0 overflow-y-auto">

        <!-- Top Header Bar (Shadcn style) -->
        <header class="hidden lg:flex h-16 items-center justify-between border-b border-zinc-200 bg-white px-8">
            <div class="flex items-center gap-2 text-sm text-zinc-500">
                <a href="{{ route('admin.dashboard') }}" class="hover:text-zinc-900 transition-colors">Admin</a>
                <span>/</span>
                <span class="font-medium text-zinc-900">@yield('page_title', 'Dashboard')</span>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ url('/') }}" target="_blank" class="inline-flex items-center gap-1.5 rounded-lg border border-zinc-200 bg-white px-3 py-1.5 text-xs font-medium text-zinc-700 shadow-xs hover:bg-zinc-50 transition-colors">
                    <span>Lihat Website</span>
                    <svg class="h-3.5 w-3.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </a>
            </div>
        </header>

        <!-- Page Body -->
        <main class="flex-1 p-6 lg:p-8 max-w-7xl w-full mx-auto">
            @if (session('status'))
                <div class="mb-6 flex items-center justify-between rounded-xl border border-emerald-200 bg-emerald-50/80 px-4 py-3 text-sm text-emerald-900 shadow-xs" role="alert">
                    <div class="flex items-center gap-2.5">
                        <svg class="h-5 w-5 text-emerald-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>{{ session('status') }}</span>
                    </div>
                    <button type="button" onclick="this.parentElement.remove()" class="text-emerald-700 hover:text-emerald-900">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6 rounded-xl border border-red-200 bg-red-50/80 p-4 text-sm text-red-900 shadow-xs" role="alert">
                    <div class="flex items-center gap-2 font-semibold">
                        <svg class="h-5 w-5 text-red-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>Terjadi kesalahan pada formulir:</span>
                    </div>
                    <ul class="mt-2 list-disc list-inside space-y-1 text-xs">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</div>

<script>
    // Simple mobile menu toggle
    const mobileBtn = document.getElementById('mobile-menu-btn');
    const sidebar = document.getElementById('sidebar');
    if (mobileBtn && sidebar) {
        mobileBtn.addEventListener('click', () => {
            sidebar.classList.toggle('hidden');
        });
    }

    // Client-side automatic image compression for high-res/raw camera uploads
    document.addEventListener('change', async function(e) {
        const input = e.target;
        if (!input || input.type !== 'file' || !input.files || input.files.length === 0) return;

        const file = input.files[0];
        if (!file || !file.type.startsWith('image/')) return;

        // If larger than 1.5MB, auto-compress on canvas to prevent PostTooLargeException
        if (file.size > 1.5 * 1024 * 1024) {
            const originalText = input.title || '';
            const statusIndicator = document.createElement('span');
            statusIndicator.className = 'text-[11px] text-zinc-500 font-medium animate-pulse ml-2 inline-block';
            statusIndicator.innerText = `Mengompres foto ${(file.size / (1024*1024)).toFixed(1)}MB...`;
            input.parentElement.appendChild(statusIndicator);

            try {
                const compressedBlob = await compressImageFile(file, 1600, 0.82);
                const compressedFile = new File([compressedBlob], file.name.replace(/\.[^.]+$/, '.jpg'), {
                    type: 'image/jpeg',
                    lastModified: Date.now()
                });

                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(compressedFile);
                input.files = dataTransfer.files;

                statusIndicator.className = 'text-[11px] text-emerald-600 font-semibold ml-2 inline-block';
                statusIndicator.innerText = `✓ Foto dioptimasi (${(compressedFile.size / 1024).toFixed(0)} KB)`;
                setTimeout(() => statusIndicator.remove(), 4000);
            } catch (err) {
                console.warn('Kompresi browser dilewati:', err);
                statusIndicator.remove();
            }
        }
    });

    function compressImageFile(file, maxDimension = 1600, quality = 0.82) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.onload = function(evt) {
                const img = new Image();
                img.onload = function() {
                    let w = img.width;
                    let h = img.height;
                    if (w > maxDimension || h > maxDimension) {
                        if (w > h) {
                            h = Math.round((h * maxDimension) / w);
                            w = maxDimension;
                        } else {
                            w = Math.round((w * maxDimension) / h);
                            h = maxDimension;
                        }
                    }
                    const canvas = document.createElement('canvas');
                    canvas.width = w;
                    canvas.height = h;
                    const ctx = canvas.getContext('2d');
                    ctx.drawImage(img, 0, 0, w, h);
                    canvas.toBlob(blob => {
                        if (blob) resolve(blob);
                        else reject(new Error('Canvas toBlob failed'));
                    }, 'image/jpeg', quality);
                };
                img.onerror = reject;
                img.src = evt.target.result;
            };
            reader.onerror = reject;
            reader.readAsDataURL(file);
        });
    }
</script>
@stack('scripts')
</body>
</html>
