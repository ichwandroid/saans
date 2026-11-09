@extends('layouts.admin')

@section('title', 'Jenjang PPDB')
@section('page_title', 'Kelola Jenjang Pendidikan & Kartu PPDB')

@section('content')
<div class="space-y-6">

    <div class="flex items-center justify-between border-b border-zinc-200 pb-5">
        <div>
            <h1 class="text-xl font-bold tracking-tight text-zinc-900">Jenjang Pendidikan & Kartu PPDB</h1>
            <p class="text-xs text-zinc-500 mt-1">Kelola informasi jenjang usia, poin keunggulan kurikulum, dan tombol pendaftaran PPDB.</p>
        </div>
    </div>

    <form action="{{ route('admin.passes.update') }}" method="POST" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            @foreach ($passes as $index => $pass)
                <div class="rounded-xl border {{ !empty($pass['featured']) ? 'border-zinc-900 ring-1 ring-zinc-900' : 'border-zinc-200' }} bg-white p-6 shadow-2xs space-y-4">
                    <div class="flex items-center justify-between border-b border-zinc-100 pb-3">
                        <span class="inline-flex items-center rounded-md px-2 py-0.5 text-xs font-bold {{ !empty($pass['featured']) ? 'bg-zinc-900 text-white' : 'bg-zinc-100 text-zinc-800' }}">
                            {{ $pass['badge'] ?? 'Jenjang ' . ($index + 1) }}
                        </span>
                        
                        <label class="flex items-center gap-1.5 text-xs text-zinc-600 cursor-pointer">
                            <input type="checkbox" name="passes[{{ $index }}][featured]" value="1" @checked(!empty($pass['featured'])) class="h-4 w-4 rounded-md border-zinc-300 text-zinc-900 focus:ring-zinc-950">
                            <span class="font-medium">Sorot (Unggulan)</span>
                        </label>
                    </div>

                    <div class="space-y-3">
                        <div class="space-y-1">
                            <label class="block text-xs font-semibold text-zinc-700">Badge Label Atas</label>
                            <input type="text" name="passes[{{ $index }}][badge]" value="{{ $pass['badge'] ?? '' }}" class="w-full rounded-lg border border-zinc-200 px-3 py-1.5 text-xs text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950" placeholder="PAUD Terpadu">
                        </div>

                        <div class="space-y-1">
                            <label class="block text-xs font-semibold text-zinc-700">Nama Jenjang</label>
                            <input type="text" name="passes[{{ $index }}][name]" value="{{ $pass['name'] ?? '' }}" required class="w-full rounded-lg border border-zinc-200 px-3 py-1.5 text-sm font-semibold text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950" placeholder="PG, TK & Daycare">
                        </div>

                        <div class="space-y-1">
                            <label class="block text-xs font-semibold text-zinc-700">Rentang Usia</label>
                            <input type="text" name="passes[{{ $index }}][note]" value="{{ $pass['note'] ?? '' }}" class="w-full rounded-lg border border-zinc-200 px-3 py-1.5 text-xs text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950" placeholder="Usia 2 – 6 Tahun">
                        </div>

                        <div class="space-y-1">
                            <label class="block text-xs font-semibold text-zinc-700">Poin Keunggulan (1 baris per poin)</label>
                            <textarea name="passes[{{ $index }}][items]" rows="4" class="w-full rounded-lg border border-zinc-200 px-3 py-1.5 text-xs text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">{{ is_array($pass['items'] ?? null) ? implode("\n", $pass['items']) : '' }}</textarea>
                        </div>

                        <div class="grid grid-cols-2 gap-2 pt-2 border-t border-zinc-100">
                            <div class="space-y-1">
                                <label class="block text-[11px] font-semibold text-zinc-600">Teks Tombol (CTA)</label>
                                <input type="text" name="passes[{{ $index }}][cta]" value="{{ $pass['cta'] ?? 'Daftar' }}" class="w-full rounded-lg border border-zinc-200 px-2.5 py-1 text-xs text-zinc-900 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                            </div>
                            <div class="space-y-1">
                                <label class="block text-[11px] font-semibold text-zinc-600">Link Tujuan</label>
                                <input type="text" name="passes[{{ $index }}][href]" value="{{ $pass['href'] ?? '#visit' }}" class="w-full rounded-lg border border-zinc-200 px-2.5 py-1 text-xs text-zinc-900 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
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
                Simpan Kartu Jenjang
            </button>
        </div>
    </form>

</div>
@endsection
