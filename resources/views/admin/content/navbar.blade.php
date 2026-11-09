@extends('layouts.admin')

@section('title', 'Menu Navigasi (Navbar)')
@section('page_title', 'Kelola Menu Navigasi & Navbar')

@section('content')
<div class="space-y-6">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-zinc-200 pb-5">
        <div>
            <h1 class="text-xl font-bold tracking-tight text-zinc-900">Menu Navigasi (Navbar)</h1>
            <p class="text-xs text-zinc-500 mt-1">Kelola tautan menu header yang tampil pada pill navigasi atas dan menu slide-out mobile.</p>
        </div>
        <div class="flex items-center gap-2">
            <button type="button" onclick="addNavRow()" class="inline-flex items-center gap-1.5 rounded-lg bg-zinc-900 px-3.5 py-2 text-xs font-semibold text-white shadow-xs hover:bg-zinc-800 transition-colors cursor-pointer">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Tambah Menu
            </button>
            <a href="{{ url('/') }}" target="_blank" class="inline-flex items-center gap-1.5 rounded-lg border border-zinc-200 bg-white px-3 py-2 text-xs font-semibold text-zinc-700 shadow-2xs hover:bg-zinc-50 transition-colors">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                Lihat di Web
            </a>
        </div>
    </div>

    <form action="{{ route('admin.navbar.update') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Tombol CTA Navbar Header -->
        <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-2xs space-y-4">
            <div>
                <h2 class="text-sm font-semibold text-zinc-900">Tombol Aksi Cepat (Header CTA)</h2>
                <p class="text-xs text-zinc-500 mt-0.5">Tombol aksi yang selalu terlihat di sebelah kanan bar navigasi.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 pt-2">
                <div class="space-y-1.5">
                    <label for="cta_text" class="block text-xs font-semibold text-zinc-700">Teks Tombol Header</label>
                    <input type="text" id="cta_text" name="cta_text" value="{{ old('cta_text', $navbar['cta_text'] ?? 'Daftar Sekarang') }}" required class="w-full rounded-lg border border-zinc-200 px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                    <p class="text-[11px] text-zinc-400">Contoh: Daftar Sekarang, PPDB 2026, atau Hubungi Kami.</p>
                </div>

                <div class="space-y-1.5">
                    <label for="cta_href" class="block text-xs font-semibold text-zinc-700">Tautan Tujuan Tombol</label>
                    <input type="text" id="cta_href" name="cta_href" value="{{ old('cta_href', $navbar['cta_href'] ?? '#passes') }}" required class="w-full rounded-lg border border-zinc-200 px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                    <p class="text-[11px] text-zinc-400">Gunakan anchor (contoh: <code>#passes</code>) atau tautan URL.</p>
                </div>
            </div>
        </div>

        <!-- Daftar Menu Items -->
        <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-2xs space-y-5">
            <div class="flex items-center justify-between border-b border-zinc-100 pb-3">
                <div>
                    <h2 class="text-sm font-semibold text-zinc-900">Daftar Link Navigasi</h2>
                    <p class="text-xs text-zinc-500 mt-0.5">Urutan menu dari kiri ke kanan pada pill navigasi.</p>
                </div>
                <span class="text-xs font-medium text-zinc-400">Bisa ditambah/dikurangi bebas</span>
            </div>

            <div id="nav-container" class="space-y-3">
                @php
                    $links = $navbar['links'] ?? [];
                @endphp

                @forelse ($links as $index => $link)
                    <div class="nav-item-row flex flex-col sm:flex-row sm:items-center gap-3 rounded-lg border border-zinc-200/80 bg-zinc-50/50 p-3.5 shadow-2xs">
                        <div class="flex items-center gap-2 shrink-0">
                            <span class="flex h-6 w-6 items-center justify-center rounded-full bg-zinc-200 text-[11px] font-bold text-zinc-700 row-number">
                                {{ $loop->iteration }}
                            </span>
                            <span class="text-xs font-medium text-zinc-500 sm:hidden">Menu item</span>
                        </div>

                        <div class="flex-1 grid grid-cols-1 sm:grid-cols-2 gap-3 min-w-0">
                            <div>
                                <input type="text" name="links[{{ $index }}][label]" value="{{ $link['label'] ?? '' }}" placeholder="Label Menu (contoh: Program)" required class="w-full rounded-lg border border-zinc-200 bg-white px-3 py-1.5 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                            </div>
                            <div>
                                <input type="text" name="links[{{ $index }}][href]" value="{{ $link['href'] ?? '' }}" placeholder="Tautan (contoh: #programme)" required class="w-full rounded-lg border border-zinc-200 bg-white px-3 py-1.5 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950 font-mono text-xs">
                            </div>
                        </div>

                        <button type="button" onclick="this.closest('.nav-item-row').remove(); renumberRows();" class="self-end sm:self-center inline-flex items-center gap-1 text-xs text-red-600 hover:text-red-700 font-medium px-2 py-1 rounded hover:bg-red-50 transition-colors">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            <span class="sm:hidden">Hapus</span>
                        </button>
                    </div>
                @empty
                    <div id="no-nav-alert" class="rounded-lg border border-dashed border-zinc-300 p-6 text-center text-xs text-zinc-500">
                        Belum ada menu navigasi ditambahkan. Klik tombol "Tambah Menu" di atas.
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Sticky Submit Footer -->
        <div class="flex items-center justify-end gap-3 pt-4 border-t border-zinc-200">
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center justify-center rounded-lg border border-zinc-200 bg-white px-4 py-2 text-xs font-semibold text-zinc-700 shadow-2xs hover:bg-zinc-50 transition-colors">
                Batal
            </a>
            <button type="submit" class="inline-flex items-center justify-center rounded-lg bg-zinc-900 px-5 py-2 text-xs font-semibold text-white shadow-xs hover:bg-zinc-800 transition-colors cursor-pointer">
                Simpan Navigasi
            </button>
        </div>
    </form>

</div>

@push('scripts')
<script>
    let navIndex = {{ count($navbar['links'] ?? []) }};

    function renumberRows() {
        const rows = document.querySelectorAll('.nav-item-row');
        rows.forEach((row, idx) => {
            const badge = row.querySelector('.row-number');
            if (badge) badge.textContent = idx + 1;
        });
    }

    function addNavRow() {
        navIndex++;
        const container = document.getElementById('nav-container');
        const emptyAlert = document.getElementById('no-nav-alert');
        if (emptyAlert) emptyAlert.remove();

        const row = document.createElement('div');
        row.className = 'nav-item-row flex flex-col sm:flex-row sm:items-center gap-3 rounded-lg border border-zinc-200/80 bg-zinc-50/50 p-3.5 shadow-2xs';
        row.innerHTML = `
            <div class="flex items-center gap-2 shrink-0">
                <span class="flex h-6 w-6 items-center justify-center rounded-full bg-emerald-100 text-[11px] font-bold text-emerald-800 row-number">
                    +
                </span>
                <span class="text-xs font-medium text-zinc-500 sm:hidden">Menu baru</span>
            </div>

            <div class="flex-1 grid grid-cols-1 sm:grid-cols-2 gap-3 min-w-0">
                <div>
                    <input type="text" name="links[${navIndex}][label]" placeholder="Label Menu (contoh: Program)" required class="w-full rounded-lg border border-zinc-200 bg-white px-3 py-1.5 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                </div>
                <div>
                    <input type="text" name="links[${navIndex}][href]" placeholder="Tautan (contoh: #programme)" required class="w-full rounded-lg border border-zinc-200 bg-white px-3 py-1.5 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950 font-mono text-xs">
                </div>
            </div>

            <button type="button" onclick="this.closest('.nav-item-row').remove(); renumberRows();" class="self-end sm:self-center inline-flex items-center gap-1 text-xs text-red-600 hover:text-red-700 font-medium px-2 py-1 rounded hover:bg-red-50 transition-colors">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                <span class="sm:hidden">Hapus</span>
            </button>
        `;

        container.appendChild(row);
        renumberRows();
    }
</script>
@endpush
@endsection
