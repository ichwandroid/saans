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

        {{-- Panel Ajakan & CTA dengan switch Shadcn --}}
        @php $plateActive = old('hero_plate_active', $hero['hero_plate_active'] ?? true); @endphp
        <div id="hero-plate-card" class="rounded-xl border border-zinc-200 bg-white shadow-2xs overflow-hidden">

            {{-- Card Header dengan Switch Shadcn UI --}}
            <div class="flex items-center justify-between px-6 py-4 border-b border-zinc-100">
                <div>
                    <h2 class="text-sm font-semibold text-zinc-900">Panel Ajakan & Tombol Aksi (CTA)</h2>
                    <p class="text-xs text-zinc-500 mt-0.5">Badge SPMB, teks ajakan, dan kedua tombol di bawah hero.</p>
                </div>
                <div class="flex items-center gap-3 shrink-0 ml-4">
                    <span id="plate-toggle-label" onclick="document.getElementById('switch-hero-plate').click()" class="text-xs cursor-pointer select-none {{ $plateActive ? 'font-semibold text-zinc-900' : 'font-medium text-zinc-400' }}">
                        {{ $plateActive ? 'Ditampilkan' : 'Disembunyikan' }}
                    </span>
                    
                    {{-- Shadcn UI Switch Component --}}
                    <button
                        type="button"
                        role="switch"
                        id="switch-hero-plate"
                        aria-checked="{{ $plateActive ? 'true' : 'false' }}"
                        data-state="{{ $plateActive ? 'checked' : 'unchecked' }}"
                        onclick="handleShadcnSwitch(this)"
                        class="peer inline-flex h-6 w-11 shrink-0 cursor-pointer items-center rounded-full border-2 border-transparent transition-colors focus-visible:outline-hidden focus-visible:ring-2 focus-visible:ring-zinc-950 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 data-[state=checked]:bg-zinc-900 data-[state=unchecked]:bg-zinc-200"
                    >
                        <span
                            data-state="{{ $plateActive ? 'checked' : 'unchecked' }}"
                            class="pointer-events-none block h-5 w-5 rounded-full bg-white shadow-sm ring-0 transition-transform data-[state=checked]:translate-x-5 data-[state=unchecked]:translate-x-0"
                        ></span>
                    </button>
                    <input type="hidden" name="hero_plate_active" id="input_hero_plate_active" value="{{ $plateActive ? '1' : '0' }}">
                </div>
            </div>

            {{-- Card Body --}}
            <div id="hero-plate-body" class="p-6 space-y-6 transition-opacity {{ !$plateActive ? 'opacity-40 pointer-events-none' : '' }}">

                {{-- Badge & Lead Text --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="space-y-1.5">
                        <label for="badge_text" class="block text-xs font-semibold text-zinc-700">Teks Badge / Status Informasi</label>
                        <input type="text" id="badge_text" name="badge_text" value="{{ old('badge_text', $hero['badge_text'] ?? 'SPMB Dibuka') }}" class="w-full rounded-lg border border-zinc-200 px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                        <p class="text-[11px] text-zinc-400">Contoh: SPMB Dibuka, Gelombang 1, atau Info Pendaftaran</p>
                    </div>
                    <div class="space-y-1.5">
                        <label for="lead_text" class="block text-xs font-semibold text-zinc-700">Paragraf Penjelas (Lead Text)</label>
                        <textarea id="lead_text" name="lead_text" rows="2" class="w-full rounded-lg border border-zinc-200 px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">{{ old('lead_text', $hero['lead_text'] ?? 'Segera daftarkan diri untuk tahun ajaran baru bersama SAANS.') }}</textarea>
                        <p class="text-[11px] text-zinc-400">Teks ajakan tepat sebelum tombol CTA.</p>
                    </div>
                </div>

                {{-- Dua Tombol --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 pt-4 border-t border-zinc-100">
                    {{-- Tombol Utama --}}
                    <div class="rounded-lg border border-zinc-100 bg-zinc-50/50 p-4 space-y-3">
                        <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-zinc-700">
                            <span class="h-2 w-2 rounded-full bg-zinc-900"></span>
                            Tombol Utama
                        </span>
                        <div class="space-y-1.5">
                            <label for="cta_primary_text" class="block text-xs font-medium text-zinc-600">Teks Tombol</label>
                            <input type="text" id="cta_primary_text" name="cta_primary_text" value="{{ old('cta_primary_text', $hero['cta_primary_text'] ?? 'Daftar Sekarang') }}" class="w-full rounded-lg border border-zinc-200 bg-white px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                        </div>
                        <div class="space-y-1.5">
                            <label for="cta_primary_href" class="block text-xs font-medium text-zinc-600">Tautan Tujuan</label>
                            <input type="text" id="cta_primary_href" name="cta_primary_href" value="{{ old('cta_primary_href', $hero['cta_primary_href'] ?? '#passes') }}" class="w-full rounded-lg border border-zinc-200 bg-white px-3.5 py-2 text-sm font-mono text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                        </div>
                    </div>

                    {{-- Tombol Sekunder --}}
                    <div class="rounded-lg border border-zinc-100 bg-zinc-50/50 p-4 space-y-3">
                        <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-zinc-700">
                            <span class="h-2 w-2 rounded-full bg-zinc-400"></span>
                            Tombol Sekunder
                        </span>
                        <div class="space-y-1.5">
                            <label for="cta_secondary_text" class="block text-xs font-medium text-zinc-600">Teks Tombol</label>
                            <input type="text" id="cta_secondary_text" name="cta_secondary_text" value="{{ old('cta_secondary_text', $hero['cta_secondary_text'] ?? 'Lihat Program') }}" class="w-full rounded-lg border border-zinc-200 bg-white px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                        </div>
                        <div class="space-y-1.5">
                            <label for="cta_secondary_href" class="block text-xs font-medium text-zinc-600">Tautan Tujuan</label>
                            <input type="text" id="cta_secondary_href" name="cta_secondary_href" value="{{ old('cta_secondary_href', $hero['cta_secondary_href'] ?? '#programme') }}" class="w-full rounded-lg border border-zinc-200 bg-white px-3.5 py-2 text-sm font-mono text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                        </div>
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

@push('scripts')
<script>
    function handleShadcnSwitch(btn) {
        const isChecked = btn.getAttribute('data-state') === 'checked';
        const newState = isChecked ? 'unchecked' : 'checked';
        const thumb = btn.querySelector('span');
        const hiddenInput = document.getElementById('input_hero_plate_active');
        const body = document.getElementById('hero-plate-body');
        const label = document.getElementById('plate-toggle-label');

        btn.setAttribute('data-state', newState);
        btn.setAttribute('aria-checked', !isChecked ? 'true' : 'false');
        if (thumb) {
            thumb.setAttribute('data-state', newState);
        }

        const isActive = !isChecked;
        if (hiddenInput) {
            hiddenInput.value = isActive ? '1' : '0';
        }

        if (isActive) {
            body.classList.remove('opacity-40', 'pointer-events-none');
            if (label) {
                label.textContent = 'Ditampilkan';
                label.className = 'text-xs cursor-pointer select-none font-semibold text-zinc-900';
            }
        } else {
            body.classList.add('opacity-40', 'pointer-events-none');
            if (label) {
                label.textContent = 'Disembunyikan';
                label.className = 'text-xs cursor-pointer select-none font-medium text-zinc-400';
            }
        }
    }
</script>
@endpush
@endsection
