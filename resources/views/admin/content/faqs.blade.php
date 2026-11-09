@extends('layouts.admin')

@section('title', 'Tanya Jawab (FAQ)')
@section('page_title', 'Kelola Pertanyaan yang Sering Diajukan (FAQ)')

@section('content')
<div class="space-y-6">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-zinc-200 pb-5">
        <div>
            <h1 class="text-xl font-bold tracking-tight text-zinc-900">Pertanyaan yang Sering Diajukan (FAQ)</h1>
            <p class="text-xs text-zinc-500 mt-1">Kelola daftar tanya jawab seputar kurikulum, metode belajar, dan alur pendaftaran PPDB.</p>
        </div>
        <button type="button" onclick="addFaqRow()" class="inline-flex items-center gap-1.5 rounded-lg bg-zinc-900 px-3.5 py-2 text-xs font-semibold text-white shadow-xs hover:bg-zinc-800 transition-colors cursor-pointer self-start sm:self-auto">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Pertanyaan
        </button>
    </div>

    <form action="{{ route('admin.faqs.update') }}" method="POST" class="space-y-6">
        @csrf

        <div id="faqs-container" class="space-y-4">
            @foreach ($faqs as $index => $faq)
                <div class="faq-card rounded-xl border border-zinc-200 bg-white p-5 shadow-2xs space-y-4">
                    <div class="flex items-center justify-between border-b border-zinc-100 pb-3">
                        <div class="flex items-center gap-2">
                            <span class="flex h-6 w-6 items-center justify-center rounded-full bg-zinc-100 text-[11px] font-bold text-zinc-700">
                                Q{{ $index + 1 }}
                            </span>
                            <span class="text-xs font-semibold text-zinc-500 font-mono">ID: {{ $faq['id'] ?? 'qa-'.$index }}</span>
                        </div>
                        <input type="hidden" name="faqs[{{ $index }}][id]" value="{{ $faq['id'] ?? 'qa-'.$index }}">
                        <button type="button" onclick="this.closest('.faq-card').remove()" class="text-xs text-red-600 hover:text-red-700 font-medium inline-flex items-center gap-1">
                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            Hapus
                        </button>
                    </div>

                    <div class="space-y-3">
                        <div class="space-y-1">
                            <label class="block text-xs font-semibold text-zinc-700">Pertanyaan</label>
                            <input type="text" name="faqs[{{ $index }}][q]" value="{{ $faq['q'] ?? '' }}" required class="w-full rounded-lg border border-zinc-200 px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                        </div>

                        <div class="space-y-1">
                            <label class="block text-xs font-semibold text-zinc-700">Jawaban</label>
                            <textarea name="faqs[{{ $index }}][a]" rows="3" required class="w-full rounded-lg border border-zinc-200 px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">{{ $faq['a'] ?? '' }}</textarea>
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
                Simpan FAQ
            </button>
        </div>
    </form>

</div>

@push('scripts')
<script>
    let faqCount = {{ count($faqs) }};
    function addFaqRow() {
        faqCount++;
        const container = document.getElementById('faqs-container');
        const card = document.createElement('div');
        card.className = 'faq-card rounded-xl border border-zinc-200 bg-white p-5 shadow-2xs space-y-4';
        card.innerHTML = `
            <div class="flex items-center justify-between border-b border-zinc-100 pb-3">
                <div class="flex items-center gap-2">
                    <span class="flex h-6 w-6 items-center justify-center rounded-full bg-emerald-100 text-[11px] font-bold text-emerald-800">
                        Baru
                    </span>
                    <span class="text-xs font-semibold text-zinc-500 font-mono">ID: qa-new-${faqCount}</span>
                </div>
                <input type="hidden" name="faqs[${faqCount}][id]" value="qa-new-${faqCount}">
                <button type="button" onclick="this.closest('.faq-card').remove()" class="text-xs text-red-600 hover:text-red-700 font-medium inline-flex items-center gap-1">
                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    Hapus
                </button>
            </div>
            <div class="space-y-3">
                <div class="space-y-1">
                    <label class="block text-xs font-semibold text-zinc-700">Pertanyaan</label>
                    <input type="text" name="faqs[${faqCount}][q]" placeholder="Tuliskan pertanyaan..." required class="w-full rounded-lg border border-zinc-200 px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                </div>
                <div class="space-y-1">
                    <label class="block text-xs font-semibold text-zinc-700">Jawaban</label>
                    <textarea name="faqs[${faqCount}][a]" rows="3" placeholder="Tuliskan jawaban lengkap..." required class="w-full rounded-lg border border-zinc-200 px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950"></textarea>
                </div>
            </div>
        `;
        container.appendChild(card);
    }
</script>
@endpush
@endsection
