@extends('layouts.admin')

@section('title', 'Galeri Kegiatan')
@section('page_title', 'Kelola Galeri Foto Kegiatan')

@section('content')
<div class="space-y-6">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-zinc-200 pb-5">
        <div>
            <h1 class="text-xl font-bold tracking-tight text-zinc-900">Galeri Foto Kegiatan SAANS</h1>
            <p class="text-xs text-zinc-500 mt-1">Kelola dokumentasi momen belajar siswa, bentuk bingkai (*pill*, *wide*, *circle*, *squircle*), dan deskripsi foto.</p>
        </div>
        <button type="button" onclick="addShotCard()" class="inline-flex items-center gap-1.5 rounded-lg bg-zinc-900 px-3.5 py-2 text-xs font-semibold text-white shadow-xs hover:bg-zinc-800 transition-colors cursor-pointer self-start sm:self-auto">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Foto Galeri
        </button>
    </div>

    <form action="{{ route('admin.gallery.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div id="gallery-container" class="grid grid-cols-1 md:grid-cols-2 gap-5">
            @foreach ($shots as $index => $shot)
                <div class="shot-card rounded-xl border border-zinc-200 bg-white p-5 shadow-2xs space-y-4">
                    <div class="flex items-center justify-between border-b border-zinc-100 pb-3">
                        <span class="text-xs font-bold text-zinc-900">Foto #{{ $index + 1 }}</span>
                        <button type="button" onclick="this.closest('.shot-card').remove()" class="text-xs text-red-600 hover:text-red-700 font-medium inline-flex items-center gap-1">
                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            Hapus
                        </button>
                    </div>

                    <input type="hidden" name="shots[{{ $index }}][existing_img]" value="{{ $shot['img'] ?? '' }}">

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div class="sm:col-span-1 space-y-2">
                            <div class="relative aspect-4/3 rounded-lg overflow-hidden border border-zinc-200 bg-zinc-100 flex items-center justify-center">
                                @if (!empty($shot['img']))
                                    <img src="{{ str_starts_with($shot['img'], 'http') ? $shot['img'] : asset(ltrim(str_replace('public/', '', $shot['img']), '/')) }}" alt="" class="h-full w-full object-cover">
                                @else
                                    <span class="text-xs text-zinc-400">Belum ada foto</span>
                                @endif
                            </div>
                            <input type="file" name="shots[{{ $index }}][new_img]" accept="image/*" class="w-full text-xs text-zinc-500 file:mr-2 file:py-1 file:px-2 file:rounded-md file:border-0 file:text-[11px] file:font-semibold file:bg-zinc-100 file:text-zinc-700 hover:file:bg-zinc-200">
                        </div>

                        <div class="sm:col-span-2 space-y-3">
                            <div class="space-y-1">
                                <label class="block text-xs font-semibold text-zinc-700">Keterangan Foto (Caption)</label>
                                <input type="text" name="shots[{{ $index }}][caption]" value="{{ $shot['caption'] ?? '' }}" required class="w-full rounded-lg border border-zinc-200 px-3 py-1.5 text-xs text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                            </div>

                            <div class="space-y-1">
                                <label class="block text-xs font-semibold text-zinc-700">Bentuk Bingkai (Shape)</label>
                                <select name="shots[{{ $index }}][shape]" class="w-full rounded-lg border border-zinc-200 bg-white px-3 py-1.5 text-xs text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                                    <option value="pill" @selected(($shot['shape'] ?? '') === 'pill')>Pill (Kapsul Vertikal)</option>
                                    <option value="wide" @selected(($shot['shape'] ?? '') === 'wide')>Wide (Landscape Lebar)</option>
                                    <option value="circle" @selected(($shot['shape'] ?? '') === 'circle')>Circle (Lingkaran Bulat)</option>
                                    <option value="squircle" @selected(($shot['shape'] ?? '') === 'squircle')>Squircle (Persegi Melengkung)</option>
                                </select>
                            </div>

                            <div class="space-y-1">
                                <label class="block text-[11px] font-medium text-zinc-500">Tautan Gambar Eksternal (Opsional):</label>
                                <input type="text" name="shots[{{ $index }}][img_url]" value="{{ str_starts_with($shot['img'] ?? '', 'http') ? $shot['img'] : '' }}" placeholder="https://..." class="w-full rounded-lg border border-zinc-200 px-2.5 py-1 text-xs text-zinc-900 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="flex items-center justify-end gap-3 pt-4 border-t border-zinc-200">
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white px-4 py-2 text-xs font-semibold text-zinc-700 shadow-2xs hover:bg-zinc-50 transition-colors">
                Batal
            </a>
            <button type="submit" class="inline-flex items-center justify-center rounded-lg bg-zinc-900 px-5 py-2 text-xs font-semibold text-white shadow-xs hover:bg-zinc-800 transition-colors cursor-pointer">
                Simpan Galeri
            </button>
        </div>
    </form>

</div>

@push('scripts')
<script>
    let shotCount = {{ count($shots) }};
    function addShotCard() {
        shotCount++;
        const container = document.getElementById('gallery-container');
        const card = document.createElement('div');
        card.className = 'shot-card rounded-xl border border-zinc-200 bg-white p-5 shadow-2xs space-y-4';
        card.innerHTML = `
            <div class="flex items-center justify-between border-b border-zinc-100 pb-3">
                <span class="text-xs font-bold text-zinc-900">Foto Baru</span>
                <button type="button" onclick="this.closest('.shot-card').remove()" class="text-xs text-red-600 hover:text-red-700 font-medium inline-flex items-center gap-1">
                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    Hapus
                </button>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="sm:col-span-1 space-y-2">
                    <label class="block text-[11px] font-medium text-zinc-600">Unggah Foto:</label>
                    <input type="file" name="shots[${shotCount}][new_img]" accept="image/*" class="w-full text-xs text-zinc-500 file:mr-2 file:py-1 file:px-2 file:rounded-md file:border-0 file:text-[11px] file:font-semibold file:bg-zinc-100 file:text-zinc-700 hover:file:bg-zinc-200">
                </div>
                <div class="sm:col-span-2 space-y-3">
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-zinc-700">Keterangan Foto</label>
                        <input type="text" name="shots[${shotCount}][caption]" placeholder="Contoh: Praktik sains di kebun..." required class="w-full rounded-lg border border-zinc-200 px-3 py-1.5 text-xs text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-zinc-700">Bentuk Bingkai</label>
                        <select name="shots[${shotCount}][shape]" class="w-full rounded-lg border border-zinc-200 bg-white px-3 py-1.5 text-xs text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                            <option value="wide">Wide (Landscape Lebar)</option>
                            <option value="pill">Pill (Kapsul Vertikal)</option>
                            <option value="circle">Circle (Lingkaran Bulat)</option>
                            <option value="squircle">Squircle (Persegi Melengkung)</option>
                        </select>
                    </div>
                </div>
            </div>
        `;
        container.appendChild(card);
    }
</script>
@endpush
@endsection
