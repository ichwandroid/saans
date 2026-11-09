@extends('layouts.admin')

@section('title', 'Identitas & Kontak')
@section('page_title', 'Identitas & Kontak Sekolah')

@section('content')
<div class="space-y-6">

    <!-- Header Section -->
    <div class="flex items-center justify-between border-b border-zinc-200 pb-5">
        <div>
            <h1 class="text-xl font-bold tracking-tight text-zinc-900">Identitas & Kontak Sekolah</h1>
            <p class="text-xs text-zinc-500 mt-1">Konfigurasi nama institusi, deskripsi meta untuk SEO, dan informasi kontak resmi.</p>
        </div>
    </div>

    <!-- Form Card -->
    <form action="{{ route('admin.general.update') }}" method="POST" class="space-y-6">
        @csrf

        <!-- General Info Card (Shadcn style) -->
        <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-2xs space-y-5">
            <h2 class="text-sm font-semibold text-zinc-900 border-b border-zinc-100 pb-3">Informasi Utama Website</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="space-y-1.5">
                    <label for="name" class="block text-xs font-semibold text-zinc-700">Singkatan / Brand Singkat</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $site['name'] ?? 'SAANS') }}" required class="w-full rounded-lg border border-zinc-200 px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                    <p class="text-[11px] text-zinc-400">Contoh: SAANS</p>
                </div>

                <div class="space-y-1.5">
                    <label for="title" class="block text-xs font-semibold text-zinc-700">Judul Lengkap (Meta Title / Tagline)</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $site['title'] ?? '') }}" required class="w-full rounded-lg border border-zinc-200 px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                    <p class="text-[11px] text-zinc-400">Tampil pada judul tab browser dan hasil pencarian Google.</p>
                </div>
            </div>

            <div class="space-y-1.5">
                <label for="description" class="block text-xs font-semibold text-zinc-700">Deskripsi Meta (SEO)</label>
                <textarea id="description" name="description" rows="3" required class="w-full rounded-lg border border-zinc-200 px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">{{ old('description', $site['description'] ?? '') }}</textarea>
                <p class="text-[11px] text-zinc-400">Deskripsi singkat yang merangkum keunggulan dan visi Sekolah Alam Anak Saleh.</p>
            </div>
        </div>

        <!-- Contact Info Card -->
        <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-2xs space-y-5">
            <h2 class="text-sm font-semibold text-zinc-900 border-b border-zinc-100 pb-3">Informasi Kontak & Layanan</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <div class="space-y-1.5">
                    <label for="email" class="block text-xs font-semibold text-zinc-700">Email Utama Sekolah</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $site['email'] ?? '') }}" required class="w-full rounded-lg border border-zinc-200 px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                    <p class="text-[11px] text-zinc-400">Digunakan untuk tombol kontak umum & FAQ.</p>
                </div>

                <div class="space-y-1.5">
                    <label for="press_email" class="block text-xs font-semibold text-zinc-700">Email Informasi / PPDB</label>
                    <input type="email" id="press_email" name="press_email" value="{{ old('press_email', $site['press_email'] ?? '') }}" class="w-full rounded-lg border border-zinc-200 px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                    <p class="text-[11px] text-zinc-400">Digunakan pada kartu layanan kunjungan & PPDB.</p>
                </div>

                <div class="space-y-1.5">
                    <label for="press_phone" class="block text-xs font-semibold text-zinc-700">Nomor Telepon / WhatsApp</label>
                    <input type="text" id="press_phone" name="press_phone" value="{{ old('press_phone', $site['press_phone'] ?? '') }}" class="w-full rounded-lg border border-zinc-200 px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                    <p class="text-[11px] text-zinc-400">Contoh: (0341) 404000 atau +62 812-3456-7890</p>
                </div>
            </div>
        </div>

        <!-- Sticky Submit Footer -->
        <div class="flex items-center justify-end gap-3 pt-4">
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white px-4 py-2 text-xs font-semibold text-zinc-700 shadow-2xs hover:bg-zinc-50 transition-colors">
                Batal
            </a>
            <button type="submit" class="inline-flex items-center justify-center rounded-lg bg-zinc-900 px-5 py-2 text-xs font-semibold text-white shadow-xs hover:bg-zinc-800 transition-colors cursor-pointer">
                Simpan Perubahan
            </button>
        </div>
    </form>

</div>
@endsection
