@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Ikhtisar')

@section('content')
<div class="space-y-8">

    <!-- Top Executive Banner -->
    <div class="relative overflow-hidden rounded-2xl border border-zinc-200/80 bg-white p-6 sm:p-8 shadow-2xs">
        <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
            <div class="space-y-2 max-w-2xl">
                <div class="flex items-center gap-2">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-2.5 py-0.5 text-[11px] font-semibold text-emerald-700 ring-1 ring-inset ring-emerald-600/20">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        Panel Admin SAANS
                    </span>
                    <span class="text-xs text-zinc-400 font-medium">•</span>
                    <span class="text-xs text-zinc-500 font-medium">{{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM Y') }}</span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-bold tracking-tight text-zinc-900">
                    Pusat Manajemen Konten SAANS
                </h1>
                <p class="text-xs sm:text-sm text-zinc-500 leading-relaxed">
                    Kelola profil sekolah, program panca karakter, data guru, galeri, jenjang PPDB, dan seluruh bagian beranda secara terpadu dan real-time.
                </p>
            </div>
            
            <div class="flex flex-wrap items-center gap-2.5 shrink-0">
                <a href="{{ url('/') }}" target="_blank" class="inline-flex items-center gap-2 rounded-xl bg-zinc-900 px-4 py-2.5 text-xs font-semibold text-white shadow-xs hover:bg-zinc-800 transition-all hover:scale-101">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    <span>Buka Website Publik</span>
                </a>
                <a href="{{ route('admin.general') }}" class="inline-flex items-center gap-2 rounded-xl border border-zinc-200 bg-white px-4 py-2.5 text-xs font-semibold text-zinc-700 shadow-2xs hover:bg-zinc-50 hover:text-zinc-900 transition-all">
                    <span>Pengaturan Umum</span>
                </a>
            </div>
        </div>
        
        <!-- Subtle Background Decorative Glow -->
        <div class="absolute -right-16 -top-16 h-64 w-64 rounded-full bg-zinc-100/60 blur-3xl pointer-events-none" aria-hidden="true"></div>
    </div>

    <!-- Quick Stats Grid (Refined Metric Cards) -->
    <div>
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-sm font-bold tracking-tight text-zinc-900 uppercase">Ringkasan Statistik Konten</h2>
            <span class="text-xs text-zinc-400">Sinkron otomatis dengan konfigurasi web</span>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            
            <!-- Metric 1: Panca Karakter -->
            <div class="group relative rounded-xl border border-zinc-200/80 bg-white p-5 shadow-2xs hover:border-zinc-300 hover:shadow-xs transition-all">
                <div class="flex items-center justify-between text-zinc-500">
                    <span class="text-xs font-semibold text-zinc-600">Panca Karakter</span>
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-zinc-100 text-zinc-700 group-hover:bg-zinc-900 group-hover:text-white transition-colors">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="text-2xl font-bold tracking-tight text-zinc-900">{{ $stats['works_count'] }} <span class="text-xs font-normal text-zinc-400">Pilar</span></div>
                    <p class="text-xs text-zinc-500 mt-1">Program pembinaan siswa holistik</p>
                </div>
                <div class="mt-4 pt-3 border-t border-zinc-100">
                    <a href="{{ route('admin.programme') }}" class="text-xs font-semibold text-zinc-900 hover:text-zinc-600 inline-flex items-center gap-1 group-hover:translate-x-0.5 transition-transform">
                        Kelola Program →
                    </a>
                </div>
            </div>

            <!-- Metric 2: Guru & Pendidik -->
            <div class="group relative rounded-xl border border-zinc-200/80 bg-white p-5 shadow-2xs hover:border-zinc-300 hover:shadow-xs transition-all">
                <div class="flex items-center justify-between text-zinc-500">
                    <span class="text-xs font-semibold text-zinc-600">Guru & Pendidik</span>
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-zinc-100 text-zinc-700 group-hover:bg-zinc-900 group-hover:text-white transition-colors">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="text-2xl font-bold tracking-tight text-zinc-900">{{ $stats['teachers_count'] }} <span class="text-xs font-normal text-zinc-400">Pendidik</span></div>
                    <p class="text-xs text-zinc-500 mt-1">Ustadz & ustadzah terdaftar</p>
                </div>
                <div class="mt-4 pt-3 border-t border-zinc-100">
                    <a href="{{ route('admin.teachers') }}" class="text-xs font-semibold text-zinc-900 hover:text-zinc-600 inline-flex items-center gap-1 group-hover:translate-x-0.5 transition-transform">
                        Kelola Profil Guru →
                    </a>
                </div>
            </div>

            <!-- Metric 3: Galeri Dokumentasi -->
            <div class="group relative rounded-xl border border-zinc-200/80 bg-white p-5 shadow-2xs hover:border-zinc-300 hover:shadow-xs transition-all">
                <div class="flex items-center justify-between text-zinc-500">
                    <span class="text-xs font-semibold text-zinc-600">Dokumentasi</span>
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-zinc-100 text-zinc-700 group-hover:bg-zinc-900 group-hover:text-white transition-colors">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="text-2xl font-bold tracking-tight text-zinc-900">{{ $stats['shots_count'] }} <span class="text-xs font-normal text-zinc-400">Foto</span></div>
                    <p class="text-xs text-zinc-500 mt-1">Momen kegiatan belajar alam</p>
                </div>
                <div class="mt-4 pt-3 border-t border-zinc-100">
                    <a href="{{ route('admin.gallery') }}" class="text-xs font-semibold text-zinc-900 hover:text-zinc-600 inline-flex items-center gap-1 group-hover:translate-x-0.5 transition-transform">
                        Kelola Foto Galeri →
                    </a>
                </div>
            </div>

            <!-- Metric 4: Tanya Jawab -->
            <div class="group relative rounded-xl border border-zinc-200/80 bg-white p-5 shadow-2xs hover:border-zinc-300 hover:shadow-xs transition-all">
                <div class="flex items-center justify-between text-zinc-500">
                    <span class="text-xs font-semibold text-zinc-600">Pusat Bantuan</span>
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-zinc-100 text-zinc-700 group-hover:bg-zinc-900 group-hover:text-white transition-colors">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="text-2xl font-bold tracking-tight text-zinc-900">{{ $stats['faqs_count'] }} <span class="text-xs font-normal text-zinc-400">FAQ</span></div>
                    <p class="text-xs text-zinc-500 mt-1">Jawaban pertanyaan wali murid</p>
                </div>
                <div class="mt-4 pt-3 border-t border-zinc-100">
                    <a href="{{ route('admin.faqs') }}" class="text-xs font-semibold text-zinc-900 hover:text-zinc-600 inline-flex items-center gap-1 group-hover:translate-x-0.5 transition-transform">
                        Kelola FAQ →
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- Categorized Navigation Matrix -->
    <div class="space-y-6">

        <!-- Category A: Tampilan & Halaman Muka -->
        <div>
            <div class="flex items-center gap-2 mb-3">
                <span class="flex h-6 w-6 items-center justify-center rounded-md bg-zinc-900 text-white text-[10px] font-bold">1</span>
                <h2 class="text-sm font-bold tracking-tight text-zinc-900">Tampilan Utama & Halaman Muka</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                
                <!-- Navbar & Menu -->
                <a href="{{ route('admin.navbar') }}" class="group rounded-xl border border-zinc-200/80 bg-white p-5 shadow-2xs hover:border-zinc-900 hover:shadow-xs transition-all">
                    <div class="flex items-start gap-3.5">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-zinc-100 text-zinc-700 group-hover:bg-zinc-900 group-hover:text-white transition-colors">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7"/></svg>
                        </div>
                        <div class="min-w-0">
                            <h3 class="font-semibold text-sm text-zinc-900 group-hover:text-zinc-950">Navigasi (Navbar)</h3>
                            <p class="text-xs text-zinc-500 mt-1 leading-snug">Kelola tautan menu bar atas, anchor scroll, dan tombol CTA.</p>
                        </div>
                    </div>
                </a>

                <!-- Hero / Beranda -->
                <a href="{{ route('admin.hero') }}" class="group rounded-xl border border-zinc-200/80 bg-white p-5 shadow-2xs hover:border-zinc-900 hover:shadow-xs transition-all">
                    <div class="flex items-start gap-3.5">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-zinc-100 text-zinc-700 group-hover:bg-zinc-900 group-hover:text-white transition-colors">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                        </div>
                        <div class="min-w-0">
                            <h3 class="font-semibold text-sm text-zinc-900 group-hover:text-zinc-950">Hero & Pembuka</h3>
                            <p class="text-xs text-zinc-500 mt-1 leading-snug">Tagline sekolah, badge SPMB, tombol aksi, dan foto mengapung.</p>
                        </div>
                    </div>
                </a>

                <!-- Identitas & Kontak -->
                <a href="{{ route('admin.general') }}" class="group rounded-xl border border-zinc-200/80 bg-white p-5 shadow-2xs hover:border-zinc-900 hover:shadow-xs transition-all">
                    <div class="flex items-start gap-3.5">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-zinc-100 text-zinc-700 group-hover:bg-zinc-900 group-hover:text-white transition-colors">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        </div>
                        <div class="min-w-0">
                            <h3 class="font-semibold text-sm text-zinc-900 group-hover:text-zinc-950">Identitas & Kontak</h3>
                            <p class="text-xs text-zinc-500 mt-1 leading-snug">Nama resmi sekolah, SEO meta deskripsi, email, dan telepon.</p>
                        </div>
                    </div>
                </a>

            </div>
        </div>

        <!-- Category B: Konten Pendidikan & Layanan -->
        <div>
            <div class="flex items-center gap-2 mb-3">
                <span class="flex h-6 w-6 items-center justify-center rounded-md bg-zinc-900 text-white text-[10px] font-bold">2</span>
                <h2 class="text-sm font-bold tracking-tight text-zinc-900">Program, Akademik & Informasi PPDB</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                
                <!-- Panca Karakter -->
                <a href="{{ route('admin.programme') }}" class="group rounded-xl border border-zinc-200/80 bg-white p-4 shadow-2xs hover:border-zinc-900 hover:shadow-xs transition-all">
                    <div class="flex items-start gap-3">
                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-zinc-100 text-zinc-700 group-hover:bg-zinc-900 group-hover:text-white transition-colors">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        </div>
                        <div class="min-w-0">
                            <h3 class="font-semibold text-xs text-zinc-900">Panca Karakter</h3>
                            <p class="text-[11px] text-zinc-400 mt-0.5 truncate">5 pilar pembinaan siswa</p>
                        </div>
                    </div>
                </a>

                <!-- Guru & Pendidik -->
                <a href="{{ route('admin.teachers') }}" class="group rounded-xl border border-zinc-200/80 bg-white p-4 shadow-2xs hover:border-zinc-900 hover:shadow-xs transition-all">
                    <div class="flex items-start gap-3">
                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-zinc-100 text-zinc-700 group-hover:bg-zinc-900 group-hover:text-white transition-colors">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        </div>
                        <div class="min-w-0">
                            <h3 class="font-semibold text-xs text-zinc-900">Guru & Pendidik</h3>
                            <p class="text-[11px] text-zinc-400 mt-0.5 truncate">Foto & profil asatidz</p>
                        </div>
                    </div>
                </a>

                <!-- Galeri Kegiatan -->
                <a href="{{ route('admin.gallery') }}" class="group rounded-xl border border-zinc-200/80 bg-white p-4 shadow-2xs hover:border-zinc-900 hover:shadow-xs transition-all">
                    <div class="flex items-start gap-3">
                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-zinc-100 text-zinc-700 group-hover:bg-zinc-900 group-hover:text-white transition-colors">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                        <div class="min-w-0">
                            <h3 class="font-semibold text-xs text-zinc-900">Galeri Kegiatan</h3>
                            <p class="text-[11px] text-zinc-400 mt-0.5 truncate">Upload foto dokumentasi</p>
                        </div>
                    </div>
                </a>

                <!-- Jenjang PPDB -->
                <a href="{{ route('admin.passes') }}" class="group rounded-xl border border-zinc-200/80 bg-white p-4 shadow-2xs hover:border-zinc-900 hover:shadow-xs transition-all">
                    <div class="flex items-start gap-3">
                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-zinc-100 text-zinc-700 group-hover:bg-zinc-900 group-hover:text-white transition-colors">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                        </div>
                        <div class="min-w-0">
                            <h3 class="font-semibold text-xs text-zinc-900">Jenjang PPDB</h3>
                            <p class="text-[11px] text-zinc-400 mt-0.5 truncate">PAUD, SD, dan SMP Alam</p>
                        </div>
                    </div>
                </a>

                <!-- SAANS dalam Angka -->
                <a href="{{ route('admin.stats') }}" class="group rounded-xl border border-zinc-200/80 bg-white p-4 shadow-2xs hover:border-zinc-900 hover:shadow-xs transition-all">
                    <div class="flex items-start gap-3">
                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-zinc-100 text-zinc-700 group-hover:bg-zinc-900 group-hover:text-white transition-colors">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                        </div>
                        <div class="min-w-0">
                            <h3 class="font-semibold text-xs text-zinc-900">SAANS dalam Angka</h3>
                            <p class="text-[11px] text-zinc-400 mt-0.5 truncate">Statistik capaian sekolah</p>
                        </div>
                    </div>
                </a>

                <!-- Testimoni Wali -->
                <a href="{{ route('admin.testimonials') }}" class="group rounded-xl border border-zinc-200/80 bg-white p-4 shadow-2xs hover:border-zinc-900 hover:shadow-xs transition-all">
                    <div class="flex items-start gap-3">
                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-zinc-100 text-zinc-700 group-hover:bg-zinc-900 group-hover:text-white transition-colors">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                        </div>
                        <div class="min-w-0">
                            <h3 class="font-semibold text-xs text-zinc-900">Testimoni Wali</h3>
                            <p class="text-[11px] text-zinc-400 mt-0.5 truncate">Kesan & pesan orang tua</p>
                        </div>
                    </div>
                </a>

                <!-- FAQ -->
                <a href="{{ route('admin.faqs') }}" class="group rounded-xl border border-zinc-200/80 bg-white p-4 shadow-2xs hover:border-zinc-900 hover:shadow-xs transition-all">
                    <div class="flex items-start gap-3">
                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-zinc-100 text-zinc-700 group-hover:bg-zinc-900 group-hover:text-white transition-colors">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div class="min-w-0">
                            <h3 class="font-semibold text-xs text-zinc-900">Tanya Jawab (FAQ)</h3>
                            <p class="text-[11px] text-zinc-400 mt-0.5 truncate">Informasi PPDB & tanya-jawab</p>
                        </div>
                    </div>
                </a>

            </div>
        </div>

    </div>

</div>
@endsection
