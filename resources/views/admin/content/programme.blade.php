@extends('layouts.admin')

@section('title', 'Panca Karakter')
@section('page_title', 'Kelola Panca Karakter')

@section('content')
<div class="space-y-6">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-zinc-200 pb-5">
        <div>
            <h1 class="text-xl font-bold tracking-tight text-zinc-900">Panca Karakter Anak Saleh</h1>
            <p class="text-xs text-zinc-500 mt-1">Kelola lima pilar pembinaan holistik dan materi deskripsi program.</p>
        </div>
    </div>

    <form action="{{ route('admin.programme.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="space-y-6">
            @foreach ($works as $index => $work)
                <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-2xs space-y-4">
                    <div class="flex items-center justify-between border-b border-zinc-100 pb-3">
                        <div class="flex items-center gap-2">
                            <span class="flex h-6 w-6 items-center justify-center rounded-full bg-zinc-900 text-[11px] font-bold text-white">
                                {{ $index + 1 }}
                            </span>
                            <h2 class="text-sm font-bold text-zinc-900">{{ $work['title'] ?? 'Pilar Karakter ' . ($index + 1) }}</h2>
                        </div>
                        <span class="inline-flex items-center rounded-md border border-zinc-200 bg-zinc-50 px-2 py-0.5 text-[11px] font-medium text-zinc-600">
                            Tone: {{ ucfirst($work['tone'] ?? 'sun') }}
                        </span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                        <!-- Left 2 cols: Details -->
                        <div class="md:col-span-2 space-y-4">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="space-y-1.5">
                                    <label class="block text-xs font-semibold text-zinc-700">Nama Pilar / Karakter</label>
                                    <input type="text" name="works[{{ $index }}][title]" value="{{ $work['title'] ?? '' }}" required class="w-full rounded-lg border border-zinc-200 px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                                </div>

                                <div class="space-y-1.5">
                                    <label class="block text-xs font-semibold text-zinc-700">Tema Warna (Tone)</label>
                                    <select name="works[{{ $index }}][tone]" class="w-full rounded-lg border border-zinc-200 bg-white px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                                        <option value="sun" @selected(($work['tone'] ?? '') === 'sun')>Sun (Kuning / Oranye)</option>
                                        <option value="sky" @selected(($work['tone'] ?? '') === 'sky')>Sky (Biru Alam)</option>
                                        <option value="rose" @selected(($work['tone'] ?? '') === 'rose')>Rose (Merah Muda / Hangat)</option>
                                        <option value="lilac" @selected(($work['tone'] ?? '') === 'lilac')>Lilac (Ungu Karakter)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="space-y-1.5">
                                <label class="block text-xs font-semibold text-zinc-700">Deskripsi Karakter</label>
                                <textarea name="works[{{ $index }}][text]" rows="3" required class="w-full rounded-lg border border-zinc-200 px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">{{ $work['text'] ?? '' }}</textarea>
                            </div>

                            <div class="space-y-1.5">
                                <label class="block text-xs font-semibold text-zinc-700">Label / Tag (Pisahkan dengan koma)</label>
                                <input type="text" name="works[{{ $index }}][meta]" value="{{ is_array($work['meta'] ?? null) ? implode(', ', $work['meta']) : '' }}" class="w-full rounded-lg border border-zinc-200 px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950" placeholder="Pilar 1, Pembinaan Harian, Terpadu">
                            </div>
                        </div>

                        <!-- Right 1 col: Image Preview & Upload -->
                        <div class="space-y-3">
                            <label class="block text-xs font-semibold text-zinc-700">Foto Ilustrasi</label>
                            <input type="hidden" name="works[{{ $index }}][existing_img]" value="{{ $work['img'] ?? '' }}">

                            <div class="relative aspect-4/3 rounded-lg overflow-hidden border border-zinc-200 bg-zinc-100 flex items-center justify-center">
                                @if (!empty($work['img']))
                                    <img src="{{ str_starts_with($work['img'], 'http') ? $work['img'] : asset(ltrim(str_replace('public/', '', $work['img']), '/')) }}" alt="" class="h-full w-full object-cover">
                                @else
                                    <span class="text-xs text-zinc-400">Belum ada foto</span>
                                @endif
                            </div>

                            <div class="space-y-2">
                                <label class="block text-[11px] font-medium text-zinc-600">Ganti Foto (Upload File Baru):</label>
                                <input type="file" name="works[{{ $index }}][new_img]" accept="image/*" class="w-full text-xs text-zinc-500 file:mr-2 file:py-1 file:px-2.5 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-zinc-100 file:text-zinc-700 hover:file:bg-zinc-200">
                                
                                <div class="pt-1">
                                    <label class="block text-[11px] font-medium text-zinc-600">Atau Gunakan URL Gambar:</label>
                                    <input type="text" name="works[{{ $index }}][img_url]" value="{{ str_starts_with($work['img'] ?? '', 'http') ? $work['img'] : '' }}" placeholder="https://..." class="w-full rounded-md border border-zinc-200 px-2.5 py-1 text-xs text-zinc-900 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                                </div>
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
                Simpan Program
            </button>
        </div>
    </form>

</div>
@endsection
