@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Ikhtisar')

@section('content')
<div class="space-y-8">

    <!-- Header Banner -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 rounded-2xl border border-zinc-200/80 bg-white p-6 sm:p-8 shadow-xs">
        <div>
            <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-2.5 py-0.5 text-xs font-semibold text-emerald-700 mb-2 border border-emerald-100">
                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                Sistem Aktif
            </span>
            <h1 class="text-2xl font-bold tracking-tight text-zinc-900">Selamat Datang di Panel Admin SAANS</h1>
            <p class="text-sm text-zinc-500 mt-1 max-w-2xl">
                Kelola seluruh konten, program pendidikan, profil guru, testimoni, galeri kegiatan, dan FAQ pada website Sekolah Alam Anak Saleh dengan mudah dan seketika.
            </p>
        </div>
        <div class="flex items-center gap-2.5 shrink-0">
            <a href="{{ url('/') }}" target="_blank" class="inline-flex items-center gap-2 rounded-lg bg-zinc-900 px-4 py-2.5 text-xs font-semibold text-white shadow-xs hover:bg-zinc-800 transition-colors">
                <span>Buka Landing Page</span>
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </a>
        </div>
    </div>

    <!-- Quick Stats Grid (Shadcn Metric Cards) -->
    <div>
        <h2 class="text-base font-semibold text-zinc-900 mb-4">Statistik Konten Tersedia</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            
            <!-- Card 1 -->
            <div class="rounded-xl border border-zinc-200 bg-white p-5 shadow-2xs hover:border-zinc-300 transition-colors">
                <div class="flex items-center justify-between text-zinc-500">
                    <span class="text-xs font-medium uppercase tracking-wider">Panca Karakter</span>
                    <div class="h-8 w-8 rounded-lg bg-zinc-100 flex items-center justify-center text-zinc-700">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="text-2xl font-bold tracking-tight text-zinc-900">{{ $stats['works_count'] }} Pilar</div>
                    <p class="text-xs text-zinc-500 mt-0.5">Program pembinaan siswa</p>
                </div>
                <div class="mt-4 pt-3 border-t border-zinc-100">
                    <a href="{{ route('admin.programme') }}" class="text-xs font-semibold text-zinc-900 hover:text-zinc-600 inline-flex items-center gap-1">
                        Kelola Program →
                    </a>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="rounded-xl border border-zinc-200 bg-white p-5 shadow-2xs hover:border-zinc-300 transition-colors">
                <div class="flex items-center justify-between text-zinc-500">
                    <span class="text-xs font-medium uppercase tracking-wider">Pendidik & Guru</span>
                    <div class="h-8 w-8 rounded-lg bg-zinc-100 flex items-center justify-center text-zinc-700">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="text-2xl font-bold tracking-tight text-zinc-900">{{ $stats['teachers_count'] }} Orang</div>
                    <p class="text-xs text-zinc-500 mt-0.5">Guru & asatidz terdaftar</p>
                </div>
                <div class="mt-4 pt-3 border-t border-zinc-100">
                    <a href="{{ route('admin.teachers') }}" class="text-xs font-semibold text-zinc-900 hover:text-zinc-600 inline-flex items-center gap-1">
                        Kelola Profil Guru →
                    </a>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="rounded-xl border border-zinc-200 bg-white p-5 shadow-2xs hover:border-zinc-300 transition-colors">
                <div class="flex items-center justify-between text-zinc-500">
                    <span class="text-xs font-medium uppercase tracking-wider">Galeri Kegiatan</span>
                    <div class="h-8 w-8 rounded-lg bg-zinc-100 flex items-center justify-center text-zinc-700">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="text-2xl font-bold tracking-tight text-zinc-900">{{ $stats['shots_count'] }} Foto</div>
                    <p class="text-xs text-zinc-500 mt-0.5">Dokumentasi momen belajar</p>
                </div>
                <div class="mt-4 pt-3 border-t border-zinc-100">
                    <a href="{{ route('admin.gallery') }}" class="text-xs font-semibold text-zinc-900 hover:text-zinc-600 inline-flex items-center gap-1">
                        Kelola Foto Galeri →
                    </a>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="rounded-xl border border-zinc-200 bg-white p-5 shadow-2xs hover:border-zinc-300 transition-colors">
                <div class="flex items-center justify-between text-zinc-500">
                    <span class="text-xs font-medium uppercase tracking-wider">Tanya Jawab (FAQ)</span>
                    <div class="h-8 w-8 rounded-lg bg-zinc-100 flex items-center justify-center text-zinc-700">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="text-2xl font-bold tracking-tight text-zinc-900">{{ $stats['faqs_count'] }} Tanya Jawab</div>
                    <p class="text-xs text-zinc-500 mt-0.5">Informasi PPDB & sekolah</p>
                </div>
                <div class="mt-4 pt-3 border-t border-zinc-100">
                    <a href="{{ route('admin.faqs') }}" class="text-xs font-semibold text-zinc-900 hover:text-zinc-600 inline-flex items-center gap-1">
                        Kelola FAQ →
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- Content Sections Matrix -->
    <div>
        <h2 class="text-base font-semibold text-zinc-900 mb-4">Navigasi Pengaturan Bagian Web</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

            <!-- Item Navbar -->
            <a href="{{ route('admin.navbar') }}" class="group rounded-xl border border-zinc-200 bg-white p-5 shadow-2xs hover:border-zinc-900 hover:shadow-sm transition-all">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 rounded-lg bg-zinc-100 flex items-center justify-center text-zinc-700 group-hover:bg-zinc-900 group-hover:text-white transition-colors">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/></svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-sm text-zinc-900">Navbar & Menu</h3>
                        <p class="text-xs text-zinc-500 mt-0.5">Tautan navigasi atas, link anchor, dan tombol CTA</p>
                    </div>
                </div>
            </a>

            <!-- Item Hero -->
            <a href="{{ route('admin.hero') }}" class="group rounded-xl border border-zinc-200 bg-white p-5 shadow-2xs hover:border-zinc-900 hover:shadow-sm transition-all">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 rounded-lg bg-zinc-100 flex items-center justify-center text-zinc-700 group-hover:bg-zinc-900 group-hover:text-white transition-colors">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-sm text-zinc-900">Hero / Beranda</h3>
                        <p class="text-xs text-zinc-500 mt-0.5">Tagline pembuka, badge pendaftaran, dan foto floating</p>
                    </div>
                </div>
            </a>

            <!-- Item 1 -->
            <a href="{{ route('admin.general') }}" class="group rounded-xl border border-zinc-200 bg-white p-5 shadow-2xs hover:border-zinc-900 hover:shadow-sm transition-all">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 rounded-lg bg-zinc-100 flex items-center justify-center text-zinc-700 group-hover:bg-zinc-900 group-hover:text-white transition-colors">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-sm text-zinc-900">Identitas & Kontak</h3>
                        <p class="text-xs text-zinc-500 mt-0.5">Nama sekolah, meta deskripsi, email, dan telepon</p>
                    </div>
                </div>
            </a>

            <!-- Item 2 -->
            <a href="{{ route('admin.programme') }}" class="group rounded-xl border border-zinc-200 bg-white p-5 shadow-2xs hover:border-zinc-900 hover:shadow-sm transition-all">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 rounded-lg bg-zinc-100 flex items-center justify-center text-zinc-700 group-hover:bg-zinc-900 group-hover:text-white transition-colors">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-sm text-zinc-900">Panca Karakter</h3>
                        <p class="text-xs text-zinc-500 mt-0.5">5 pilar pembinaan holistik dan penjelasannya</p>
                    </div>
                </div>
            </a>

            <!-- Item 3 -->
            <a href="{{ route('admin.teachers') }}" class="group rounded-xl border border-zinc-200 bg-white p-5 shadow-2xs hover:border-zinc-900 hover:shadow-sm transition-all">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 rounded-lg bg-zinc-100 flex items-center justify-center text-zinc-700 group-hover:bg-zinc-900 group-hover:text-white transition-colors">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-sm text-zinc-900">Guru & Pendidik</h3>
                        <p class="text-xs text-zinc-500 mt-0.5">Foto profil, nama ustadz/ustadzah, dan peran guru</p>
                    </div>
                </div>
            </a>

            <!-- Item 4 -->
            <a href="{{ route('admin.stats') }}" class="group rounded-xl border border-zinc-200 bg-white p-5 shadow-2xs hover:border-zinc-900 hover:shadow-sm transition-all">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 rounded-lg bg-zinc-100 flex items-center justify-center text-zinc-700 group-hover:bg-zinc-900 group-hover:text-white transition-colors">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-sm text-zinc-900">SAANS dalam Angka</h3>
                        <p class="text-xs text-zinc-500 mt-0.5">Statistik capaian, jam interaksi, dan kegiatan</p>
                    </div>
                </div>
            </a>

            <!-- Item 5 -->
            <a href="{{ route('admin.gallery') }}" class="group rounded-xl border border-zinc-200 bg-white p-5 shadow-2xs hover:border-zinc-900 hover:shadow-sm transition-all">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 rounded-lg bg-zinc-100 flex items-center justify-center text-zinc-700 group-hover:bg-zinc-900 group-hover:text-white transition-colors">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-sm text-zinc-900">Galeri Kegiatan</h3>
                        <p class="text-xs text-zinc-500 mt-0.5">Upload dokumentasi dan atur bentuk bingkai foto</p>
                    </div>
                </div>
            </a>

            <!-- Item 6 -->
            <a href="{{ route('admin.testimonials') }}" class="group rounded-xl border border-zinc-200 bg-white p-5 shadow-2xs hover:border-zinc-900 hover:shadow-sm transition-all">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 rounded-lg bg-zinc-100 flex items-center justify-center text-zinc-700 group-hover:bg-zinc-900 group-hover:text-white transition-colors">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-sm text-zinc-900">Testimoni Wali Murid</h3>
                        <p class="text-xs text-zinc-500 mt-0.5">Kutipan kesan orang tua siswa Sekolah Alam</p>
                    </div>
                </div>
            </a>

            <!-- Item 7 -->
            <a href="{{ route('admin.passes') }}" class="group rounded-xl border border-zinc-200 bg-white p-5 shadow-2xs hover:border-zinc-900 hover:shadow-sm transition-all">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 rounded-lg bg-zinc-100 flex items-center justify-center text-zinc-700 group-hover:bg-zinc-900 group-hover:text-white transition-colors">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-sm text-zinc-900">Jenjang PPDB</h3>
                        <p class="text-xs text-zinc-500 mt-0.5">PAUD/TK, SD Alam, SMP Alam & poin keunggulan</p>
                    </div>
                </div>
            </a>

            <!-- Item 8 -->
            <a href="{{ route('admin.faqs') }}" class="group rounded-xl border border-zinc-200 bg-white p-5 shadow-2xs hover:border-zinc-900 hover:shadow-sm transition-all">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 rounded-lg bg-zinc-100 flex items-center justify-center text-zinc-700 group-hover:bg-zinc-900 group-hover:text-white transition-colors">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-sm text-zinc-900">Tanya Jawab (FAQ)</h3>
                        <p class="text-xs text-zinc-500 mt-0.5">Daftar pertanyaan yang sering diajukan calon wali murid</p>
                    </div>
                </div>
            </a>

        </div>
    </div>

</div>
@endsection
