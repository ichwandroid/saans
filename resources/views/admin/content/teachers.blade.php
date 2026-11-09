@extends('layouts.admin')

@section('title', 'Guru & Pendidik')
@section('page_title', 'Kelola Profil Guru & Pendidik')

@section('content')
<div class="space-y-6">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-zinc-200 pb-5">
        <div>
            <h1 class="text-xl font-bold tracking-tight text-zinc-900">Profil Guru & Asatidz</h1>
            <p class="text-xs text-zinc-500 mt-1">Kelola data profil para pendidik dan unggah foto potret untuk ditampilkan pada halaman beranda.</p>
        </div>
        <button type="button" onclick="addTeacherRow()" class="inline-flex items-center gap-1.5 rounded-lg bg-zinc-900 px-3.5 py-2 text-xs font-semibold text-white shadow-xs hover:bg-zinc-800 transition-colors cursor-pointer self-start sm:self-auto">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Guru Baru
        </button>
    </div>

    <form action="{{ route('admin.teachers.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div id="teachers-container" class="space-y-4">
            @foreach ($people as $index => $person)
                <div class="teacher-card rounded-xl border border-zinc-200 bg-white p-5 shadow-2xs space-y-4">
                    <div class="flex items-center justify-between border-b border-zinc-100 pb-3">
                        <div class="flex items-center gap-2">
                            <span class="flex h-6 w-6 items-center justify-center rounded-full bg-zinc-100 text-[11px] font-bold text-zinc-700">
                                {{ $index + 1 }}
                            </span>
                            <span class="text-sm font-semibold text-zinc-900">{{ $person['name'] ?? 'Guru' }}</span>
                        </div>
                        <button type="button" onclick="this.closest('.teacher-card').remove()" class="text-xs text-red-600 hover:text-red-700 font-medium inline-flex items-center gap-1">
                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            Hapus
                        </button>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-5 items-start">
                        <!-- Photo preview column -->
                        <div class="space-y-2">
                            <input type="hidden" name="people[{{ $index }}][existing_img]" value="{{ $person['img'] ?? '' }}">
                            <div class="aspect-4/5 w-full max-w-[160px] rounded-xl overflow-hidden border border-zinc-200 bg-zinc-100 flex items-center justify-center shadow-2xs">
                                @if (!empty($person['img']))
                                    <img src="{{ str_starts_with($person['img'], 'http') ? $person['img'] : asset(ltrim(str_replace('public/', '', $person['img']), '/')) }}" alt="" class="h-full w-full object-cover">
                                @else
                                    <span class="text-xs text-zinc-400">Tidak ada foto</span>
                                @endif
                            </div>
                            <label class="block text-[11px] font-medium text-zinc-600">Unggah Foto Baru:</label>
                            <input type="file" name="people[{{ $index }}][new_img]" accept="image/*" class="w-full text-xs text-zinc-500 file:mr-2 file:py-1 file:px-2 file:rounded-md file:border-0 file:text-[11px] file:font-semibold file:bg-zinc-100 file:text-zinc-700 hover:file:bg-zinc-200">
                        </div>

                        <!-- Data columns -->
                        <div class="md:col-span-3 grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="space-y-1.5 sm:col-span-2">
                                <label class="block text-xs font-semibold text-zinc-700">Nama Lengkap & Gelar</label>
                                <input type="text" name="people[{{ $index }}][name]" value="{{ $person['name'] ?? '' }}" required class="w-full rounded-lg border border-zinc-200 px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                            </div>

                            <div class="space-y-1.5">
                                <label class="block text-xs font-semibold text-zinc-700">Peran / Jabatan Guru</label>
                                <input type="text" name="people[{{ $index }}][role]" value="{{ $person['role'] ?? '' }}" required class="w-full rounded-lg border border-zinc-200 px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                            </div>

                            <div class="space-y-1.5">
                                <label class="block text-xs font-semibold text-zinc-700">Warna Aksen Kartu (Tone)</label>
                                <select name="people[{{ $index }}][tone]" class="w-full rounded-lg border border-zinc-200 bg-white px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                                    <option value="lilac" @selected(($person['tone'] ?? '') === 'lilac')>Lilac (Ungu)</option>
                                    <option value="sky" @selected(($person['tone'] ?? '') === 'sky')>Sky (Biru)</option>
                                    <option value="rose" @selected(($person['tone'] ?? '') === 'rose')>Rose (Merah Muda)</option>
                                    <option value="sun" @selected(($person['tone'] ?? '') === 'sun')>Sun (Kuning/Oranye)</option>
                                </select>
                            </div>

                            <div class="space-y-1.5 sm:col-span-2">
                                <label class="block text-xs font-medium text-zinc-500">Atau Tautan URL Foto Eksternal (Opsional):</label>
                                <input type="text" name="people[{{ $index }}][img_url]" value="{{ str_starts_with($person['img'] ?? '', 'http') ? $person['img'] : '' }}" placeholder="https://..." class="w-full rounded-lg border border-zinc-200 px-3 py-1.5 text-xs text-zinc-900 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
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
                Simpan Profil Guru
            </button>
        </div>
    </form>

</div>

@push('scripts')
<script>
    let teacherCount = {{ count($people) }};
    function addTeacherRow() {
        teacherCount++;
        const container = document.getElementById('teachers-container');
        const card = document.createElement('div');
        card.className = 'teacher-card rounded-xl border border-zinc-200 bg-white p-5 shadow-2xs space-y-4';
        card.innerHTML = `
            <div class="flex items-center justify-between border-b border-zinc-100 pb-3">
                <div class="flex items-center gap-2">
                    <span class="flex h-6 w-6 items-center justify-center rounded-full bg-emerald-100 text-[11px] font-bold text-emerald-800">
                        Baru
                    </span>
                    <span class="text-sm font-semibold text-zinc-900">Guru Baru</span>
                </div>
                <button type="button" onclick="this.closest('.teacher-card').remove()" class="text-xs text-red-600 hover:text-red-700 font-medium inline-flex items-center gap-1">
                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    Hapus
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-5 items-start">
                <div class="space-y-2">
                    <label class="block text-[11px] font-medium text-zinc-600">Unggah Foto:</label>
                    <input type="file" name="people[${teacherCount}][new_img]" accept="image/*" class="w-full text-xs text-zinc-500 file:mr-2 file:py-1 file:px-2 file:rounded-md file:border-0 file:text-[11px] file:font-semibold file:bg-zinc-100 file:text-zinc-700 hover:file:bg-zinc-200">
                </div>
                <div class="md:col-span-3 grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="space-y-1.5 sm:col-span-2">
                        <label class="block text-xs font-semibold text-zinc-700">Nama Lengkap & Gelar</label>
                        <input type="text" name="people[${teacherCount}][name]" placeholder="Ustadzah / Ustadz..." required class="w-full rounded-lg border border-zinc-200 px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                    </div>
                    <div class="space-y-1.5">
                        <label class="block text-xs font-semibold text-zinc-700">Peran / Jabatan Guru</label>
                        <input type="text" name="people[${teacherCount}][role]" placeholder="Guru Kelas..." required class="w-full rounded-lg border border-zinc-200 px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                    </div>
                    <div class="space-y-1.5">
                        <label class="block text-xs font-semibold text-zinc-700">Warna Aksen Kartu (Tone)</label>
                        <select name="people[${teacherCount}][tone]" class="w-full rounded-lg border border-zinc-200 bg-white px-3.5 py-2 text-sm text-zinc-900 shadow-2xs focus:border-zinc-950 focus:outline-hidden focus:ring-1 focus:ring-zinc-950">
                            <option value="lilac">Lilac (Ungu)</option>
                            <option value="sky">Sky (Biru)</option>
                            <option value="rose">Rose (Merah Muda)</option>
                            <option value="sun">Sun (Kuning/Oranye)</option>
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
