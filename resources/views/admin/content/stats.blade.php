@extends('layouts.admin')

@section('title', 'Statistik Sekolah')
@section('page_title', 'SAANS dalam Angka (Statistik)')

@section('content')
<div class="space-y-6">

    <div class="flex items-center justify-between border-b border-zinc-200 pb-5">
        <div>
            <h1 class="text-xl font-bold tracking-tight text-zinc-900">SAANS dalam Angka</h1>
            <p class="text-xs text-zinc-500 mt-1">Kelola angka statistik dan deskripsi pencapaian yang tampil pada bagian statistik beranda.</p>
        </div>
    </div>

    <form action="{{ route('admin.stats.update') }}" method="POST" class="space-y-6">
        @csrf

        <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-2xs space-y-5">
            <h2 class="text-sm font-semibold text-zinc-900 border-b border-zinc-100 pb-3">Judul & Pengantar</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="space-y-1.5">
                    <label for="heading" class="block text-xs font-semibold text-zinc-700">Judul Utama</label>
                    <input type="text" id="heading" name="heading" value="{{ old('heading', $night['heading'] ?? 'Sekolah Alam Anak Saleh dalam Angka') }}" required class="w-full rounded-lg border border-zinc-200 px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                </div>

                <div class="space-y-1.5">
                    <label for="sub" class="block text-xs font-semibold text-zinc-700">Subjudul / Deskripsi Pendukung</label>
                    <input type="text" id="sub" name="sub" value="{{ old('sub', $night['sub'] ?? '') }}" required class="w-full rounded-lg border border-zinc-200 px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Stat 1 -->
            <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-2xs space-y-4">
                <span class="inline-flex items-center rounded-md bg-zinc-100 px-2 py-0.5 text-xs font-semibold text-zinc-700">Statistik Utama 1</span>
                
                <div class="space-y-1.5">
                    <label for="stat" class="block text-xs font-semibold text-zinc-700">Angka / Nilai Capaian</label>
                    <input type="text" id="stat" name="stat" value="{{ old('stat', $night['stat'] ?? '1.200+') }}" required class="w-full rounded-lg border border-zinc-200 px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950" placeholder="1.200+">
                </div>

                <div class="space-y-1.5">
                    <label for="stat_note" class="block text-xs font-semibold text-zinc-700">Keterangan / Deskripsi</label>
                    <textarea id="stat_note" name="stat_note" rows="3" required class="w-full rounded-lg border border-zinc-200 px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">{{ old('stat_note', $night['stat_note'] ?? '') }}</textarea>
                </div>
            </div>

            <!-- Stat 2 -->
            <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-2xs space-y-4">
                <span class="inline-flex items-center rounded-md bg-zinc-100 px-2 py-0.5 text-xs font-semibold text-zinc-700">Statistik Utama 2</span>
                
                <div class="space-y-1.5">
                    <label for="stat2" class="block text-xs font-semibold text-zinc-700">Angka / Nilai Capaian</label>
                    <input type="text" id="stat2" name="stat2" value="{{ old('stat2', $night['stat2'] ?? '100%') }}" required class="w-full rounded-lg border border-zinc-200 px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950" placeholder="100%">
                </div>

                <div class="space-y-1.5">
                    <label for="stat2_note" class="block text-xs font-semibold text-zinc-700">Keterangan / Deskripsi</label>
                    <textarea id="stat2_note" name="stat2_note" rows="3" required class="w-full rounded-lg border border-zinc-200 px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">{{ old('stat2_note', $night['stat2_note'] ?? '') }}</textarea>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end gap-3 pt-4 border-t border-zinc-200">
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white px-4 py-2 text-xs font-semibold text-zinc-700 shadow-2xs hover:bg-zinc-50 transition-colors">
                Batal
            </a>
            <button type="submit" class="inline-flex items-center justify-center rounded-lg bg-zinc-900 px-5 py-2 text-xs font-semibold text-white shadow-xs hover:bg-zinc-800 transition-colors cursor-pointer">
                Simpan Statistik
            </button>
        </div>
    </form>

</div>
@endsection
