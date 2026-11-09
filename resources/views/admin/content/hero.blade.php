@extends('layouts.admin')

@section('title', 'Hero / Bagian Beranda')
@section('page_title', 'Kelola Bagian Utama (Hero)')

@section('content')
<div class="space-y-6">

    <!-- Header Section -->
    <div class="flex items-center justify-between border-b border-zinc-200 pb-5">
        <div>
            <h1 class="text-xl font-bold tracking-tight text-zinc-900">Hero / Bagian Utama Beranda</h1>
            <p class="text-xs text-zinc-500 mt-1">Atur teks pembuka, tagline, badge informasi pendaftaran, tombol CTA, serta foto mengapung (hero images).</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ url('/#hero') }}" target="_blank" class="inline-flex items-center gap-1.5 rounded-lg border border-zinc-200 bg-white px-3 py-1.5 text-xs font-semibold text-zinc-700 shadow-2xs hover:bg-zinc-50 transition-colors">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                Lihat di Web
            </a>
        </div>
    </div>

    <form action="{{ route('admin.hero.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Tagline & Judul Card -->
        <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-2xs space-y-5">
            <h2 class="text-sm font-semibold text-zinc-900 border-b border-zinc-100 pb-3">Teks Judul & Tagline Utama</h2>
            
            <div class="space-y-1.5">
                <label for="tagline_title" class="block text-xs font-semibold text-zinc-700">Judul Utama Hero</label>
                <input type="text" id="tagline_title" name="tagline_title" value="{{ old('tagline_title', $hero['tagline_title'] ?? 'Sekolah Alam Anak Saleh') }}" required class="w-full rounded-lg border border-zinc-200 px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                <p class="text-[11px] text-zinc-400">Tampil menonjol di bawah logo utama.</p>
            </div>

            <div class="space-y-1.5">
                <label for="tagline_desc" class="block text-xs font-semibold text-zinc-700">Tagline / Deskripsi Singkat</label>
                <textarea id="tagline_desc" name="tagline_desc" rows="2" required class="w-full rounded-lg border border-zinc-200 px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">{{ old('tagline_desc', $hero['tagline_desc'] ?? 'Membentuk generasi berakhlak mulia, berwawasan luas, dan cinta lingkungan.') }}</textarea>
                <p class="text-[11px] text-zinc-400">Pesan ringkas visi sekolah.</p>
            </div>
        </div>

        <!-- Info Badge & Teks Penjelas (Hero Plate) -->
        <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-2xs space-y-5">
            <h2 class="text-sm font-semibold text-zinc-900 border-b border-zinc-100 pb-3">Informasi Pendaftaran & Ajakan</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="space-y-1.5">
                    <label for="badge_text" class="block text-xs font-semibold text-zinc-700">Teks Badge / Status Informasi</label>
                    <input type="text" id="badge_text" name="badge_text" value="{{ old('badge_text', $hero['badge_text'] ?? 'SPMB Dibuka') }}" required class="w-full rounded-lg border border-zinc-200 px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                    <p class="text-[11px] text-zinc-400">Contoh: SPMB Dibuka, Gelombang 1, atau Info Pendaftaran</p>
                </div>

                <div class="space-y-1.5">
                    <label for="lead_text" class="block text-xs font-semibold text-zinc-700">Paragraf Penjelas (Lead Text)</label>
                    <textarea id="lead_text" name="lead_text" rows="2" required class="w-full rounded-lg border border-zinc-200 px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">{{ old('lead_text', $hero['lead_text'] ?? 'Segera daftarkan diri untuk tahun ajaran baru bersama SAANS.') }}</textarea>
                    <p class="text-[11px] text-zinc-400">Teks ajakan yang muncul tepat sebelum tombol CTA.</p>
                </div>
            </div>
        </div>

        <!-- Tombol Aksi (CTA) -->
        <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-2xs space-y-5">
            <h2 class="text-sm font-semibold text-zinc-900 border-b border-zinc-100 pb-3">Tombol Aksi (Call To Action)</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Tombol Utama -->
                <div class="rounded-lg border border-zinc-100 bg-zinc-50/50 p-4 space-y-3">
                    <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-zinc-800">
                        <span class="h-2 w-2 rounded-full bg-zinc-900"></span>
                        Tombol Utama (Primary Button)
                    </span>
                    <div class="space-y-1.5">
                        <label for="cta_primary_text" class="block text-xs font-medium text-zinc-700">Teks Tombol</label>
                        <input type="text" id="cta_primary_text" name="cta_primary_text" value="{{ old('cta_primary_text', $hero['cta_primary_text'] ?? 'Daftar Sekarang') }}" required class="w-full rounded-lg border border-zinc-200 bg-white px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                    </div>
                    <div class="space-y-1.5">
                        <label for="cta_primary_href" class="block text-xs font-medium text-zinc-700">Tautan / Link Tujuan</label>
                        <input type="text" id="cta_primary_href" name="cta_primary_href" value="{{ old('cta_primary_href', $hero['cta_primary_href'] ?? '#passes') }}" required class="w-full rounded-lg border border-zinc-200 bg-white px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                        <p class="text-[11px] text-zinc-400">Gunakan anchor (contoh: <code>#passes</code>) atau link eksternal (contoh: <code>https://...</code>).</p>
                    </div>
                </div>

                <!-- Tombol Sekunder -->
                <div class="rounded-lg border border-zinc-100 bg-zinc-50/50 p-4 space-y-3">
                    <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-zinc-800">
                        <span class="h-2 w-2 rounded-full bg-zinc-400"></span>
                        Tombol Sekunder (Secondary Link)
                    </span>
                    <div class="space-y-1.5">
                        <label for="cta_secondary_text" class="block text-xs font-medium text-zinc-700">Teks Tombol</label>
                        <input type="text" id="cta_secondary_text" name="cta_secondary_text" value="{{ old('cta_secondary_text', $hero['cta_secondary_text'] ?? 'Lihat Program') }}" required class="w-full rounded-lg border border-zinc-200 bg-white px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                    </div>
                    <div class="space-y-1.5">
                        <label for="cta_secondary_href" class="block text-xs font-medium text-zinc-700">Tautan / Link Tujuan</label>
                        <input type="text" id="cta_secondary_href" name="cta_secondary_href" value="{{ old('cta_secondary_href', $hero['cta_secondary_href'] ?? '#programme') }}" required class="w-full rounded-lg border border-zinc-200 bg-white px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                        <p class="text-[11px] text-zinc-400">Contoh: <code>#programme</code> atau <code>#artists</code>.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Floating Hero Photos -->
        <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-2xs space-y-5">
            <div>
                <h2 class="text-sm font-semibold text-zinc-900">Foto Animasi Hero (Parallax Stage)</h2>
                <p class="text-xs text-zinc-500 mt-0.5">Tiga foto anak-anak yang tampil mengapung dengan animasi interaktif di latar belakang hero.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-2">
                <!-- Foto 1 (Utama / Tengah) -->
                <div class="space-y-3 rounded-lg border border-zinc-100 bg-zinc-50/50 p-4">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-semibold text-zinc-800">Foto 1 (Tengah)</span>
                        <span class="text-[11px] font-mono text-zinc-400">Utama</span>
                    </div>
                    <input type="hidden" name="image_1" value="{{ $hero['image_1'] ?? 'images/hero.jpg' }}">
                    <div class="aspect-4/3 w-full rounded-lg overflow-hidden border border-zinc-200 bg-zinc-100">
                        @php
                            $img1 = $hero['image_1'] ?? 'images/hero.jpg';
                            $img1Src = str_starts_with($img1, 'http') ? $img1 : asset(ltrim(str_replace('public/', '', $img1), '/'));
                        @endphp
                        <img src="{{ $img1Src }}" alt="" class="h-full w-full object-cover">
                    </div>
                    <div>
                        <label class="block text-[11px] font-medium text-zinc-600 mb-1">Ganti Foto:</label>
                        <input type="file" name="image_1_file" accept="image/*" class="w-full text-xs text-zinc-500 file:mr-2 file:py-1 file:px-2 file:rounded-md file:border-0 file:text-[11px] file:font-semibold file:bg-zinc-100 file:text-zinc-700 hover:file:bg-zinc-200">
                    </div>
                </div>

                <!-- Foto 2 (Kiri) -->
                <div class="space-y-3 rounded-lg border border-zinc-100 bg-zinc-50/50 p-4">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-semibold text-zinc-800">Foto 2 (Kiri)</span>
                        <span class="text-[11px] font-mono text-zinc-400">Sisi Kiri</span>
                    </div>
                    <input type="hidden" name="image_2" value="{{ $hero['image_2'] ?? 'images/hero2.jpg' }}">
                    <div class="aspect-4/3 w-full rounded-lg overflow-hidden border border-zinc-200 bg-zinc-100">
                        @php
                            $img2 = $hero['image_2'] ?? 'images/hero2.jpg';
                            $img2Src = str_starts_with($img2, 'http') ? $img2 : asset(ltrim(str_replace('public/', '', $img2), '/'));
                        @endphp
                        <img src="{{ $img2Src }}" alt="" class="h-full w-full object-cover">
                    </div>
                    <div>
                        <label class="block text-[11px] font-medium text-zinc-600 mb-1">Ganti Foto:</label>
                        <input type="file" name="image_2_file" accept="image/*" class="w-full text-xs text-zinc-500 file:mr-2 file:py-1 file:px-2 file:rounded-md file:border-0 file:text-[11px] file:font-semibold file:bg-zinc-100 file:text-zinc-700 hover:file:bg-zinc-200">
                    </div>
                </div>

                <!-- Foto 3 (Kanan) -->
                <div class="space-y-3 rounded-lg border border-zinc-100 bg-zinc-50/50 p-4">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-semibold text-zinc-800">Foto 3 (Kanan)</span>
                        <span class="text-[11px] font-mono text-zinc-400">Sisi Kanan</span>
                    </div>
                    <input type="hidden" name="image_3" value="{{ $hero['image_3'] ?? 'images/hero3.jpg' }}">
                    <div class="aspect-4/3 w-full rounded-lg overflow-hidden border border-zinc-200 bg-zinc-100">
                        @php
                            $img3 = $hero['image_3'] ?? 'images/hero3.jpg';
                            $img3Src = str_starts_with($img3, 'http') ? $img3 : asset(ltrim(str_replace('public/', '', $img3), '/'));
                        @endphp
                        <img src="{{ $img3Src }}" alt="" class="h-full w-full object-cover">
                    </div>
                    <div>
                        <label class="block text-[11px] font-medium text-zinc-600 mb-1">Ganti Foto:</label>
                        <input type="file" name="image_3_file" accept="image/*" class="w-full text-xs text-zinc-500 file:mr-2 file:py-1 file:px-2 file:rounded-md file:border-0 file:text-[11px] file:font-semibold file:bg-zinc-100 file:text-zinc-700 hover:file:bg-zinc-200">
                    </div>
                </div>
            </div>
        </div>

        <!-- Sticky Submit Footer -->
        <div class="flex items-center justify-end gap-3 pt-4 border-t border-zinc-200">
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white px-4 py-2 text-xs font-semibold text-zinc-700 shadow-2xs hover:bg-zinc-50 transition-colors">
                Batal
            </a>
            <button type="submit" class="inline-flex items-center justify-center rounded-lg bg-zinc-900 px-5 py-2 text-xs font-semibold text-white shadow-xs hover:bg-zinc-800 transition-colors cursor-pointer">
                Simpan Hero
            </button>
        </div>
    </form>

</div>
@endsection
