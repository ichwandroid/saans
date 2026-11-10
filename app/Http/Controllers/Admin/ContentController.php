<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class ContentController extends Controller
{
    /**
     * Store and optimize an uploaded image in public/images/ and return relative path.
     */
    protected function handleImageUpload(?UploadedFile $file, string $prefix = 'upload'): ?string
    {
        if (! $file || ! $file->isValid()) {
            return null;
        }

        $filename = $prefix.'_'.date('Ymd_His').'_'.Str::random(5).'.jpg';
        $targetPath = public_path('images/'.$filename);

        if (extension_loaded('gd')) {
            try {
                $imageContent = file_get_contents($file->getRealPath());
                $srcImg = @imagecreatefromstring($imageContent);
                if ($srcImg) {
                    $w = imagesx($srcImg);
                    $h = imagesy($srcImg);
                    $maxDim = 1600;

                    if ($w > $maxDim || $h > $maxDim) {
                        if ($w > $h) {
                            $newH = (int) round(($h * $maxDim) / $w);
                            $newW = $maxDim;
                        } else {
                            $newW = (int) round(($w * $maxDim) / $h);
                            $newH = $maxDim;
                        }
                    } else {
                        $newW = $w;
                        $newH = $h;
                    }

                    $destImg = imagecreatetruecolor($newW, $newH);
                    imagecopyresampled($destImg, $srcImg, 0, 0, 0, 0, $newW, $newH, $w, $h);
                    imagejpeg($destImg, $targetPath, 84);
                    imagedestroy($destImg);
                    imagedestroy($srcImg);

                    return 'images/'.$filename;
                }
            } catch (\Throwable $e) {
                // fallback to regular move
            }
        }

        $extension = strtolower($file->getClientOriginalExtension() ?: 'jpg');
        $filename = $prefix.'_'.date('Ymd_His').'_'.Str::random(5).'.'.$extension;
        $file->move(public_path('images'), $filename);

        return 'images/'.$filename;
    }

    /**
     * 1. Identitas & Kontak Umum (General / Site)
     */
    public function general(): View
    {
        $site = config('glowtide.site', []);

        return view('admin.content.general', compact('site'));
    }

    public function updateGeneral(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:500'],
            'email' => ['required', 'email', 'max:255'],
            'press_email' => ['nullable', 'email', 'max:255'],
            'press_phone' => ['nullable', 'string', 'max:50'],
        ]);

        Content::set('site', $validated, 'general');

        return redirect()->route('admin.general')
            ->with('status', 'Identitas dan kontak sekolah berhasil diperbarui.');
    }

    /**
     * 2. Program Panca Karakter (Works)
     */
    public function programme(): View
    {
        $works = config('glowtide.works', []);

        return view('admin.content.programme', compact('works'));
    }

    public function updateProgramme(Request $request): RedirectResponse
    {
        $items = $request->input('works', []);
        $formatted = [];

        foreach ($items as $index => $item) {
            if (empty($item['title'])) {
                continue;
            }

            $img = $item['existing_img'] ?? '';
            if ($request->hasFile("works.{$index}.new_img")) {
                $uploaded = $this->handleImageUpload($request->file("works.{$index}.new_img"), 'work');
                if ($uploaded) {
                    $img = $uploaded;
                }
            } elseif (! empty($item['img_url'])) {
                $img = $item['img_url'];
            }

            $meta = [];
            if (! empty($item['meta'])) {
                $meta = is_array($item['meta'])
                    ? $item['meta']
                    : array_values(array_filter(array_map('trim', explode(',', $item['meta']))));
            }

            $formatted[] = [
                'tone' => $item['tone'] ?? 'sun',
                'title' => $item['title'],
                'text' => $item['text'] ?? '',
                'meta' => $meta,
                'img' => $img,
                'w' => '1200',
                'h' => '800',
                'alt' => $item['title'],
            ];
        }

        Content::set('works', $formatted, 'programme');

        return redirect()->route('admin.programme')
            ->with('status', 'Program Panca Karakter berhasil diperbarui.');
    }

    /**
     * 3. Guru & Pendidik (People)
     */
    public function teachers(): View
    {
        $people = config('glowtide.people', []);

        return view('admin.content.teachers', compact('people'));
    }

    public function updateTeachers(Request $request): RedirectResponse
    {
        $items = $request->input('people', []);
        $formatted = [];

        foreach ($items as $index => $item) {
            if (empty($item['name'])) {
                continue;
            }

            $img = $item['existing_img'] ?? 'images/DSC03946.JPG';
            if ($request->hasFile("people.{$index}.new_img")) {
                $uploaded = $this->handleImageUpload($request->file("people.{$index}.new_img"), 'teacher');
                if ($uploaded) {
                    $img = $uploaded;
                }
            } elseif (! empty($item['img_url'])) {
                $img = $item['img_url'];
            }

            $formatted[] = [
                'tone' => $item['tone'] ?? 'lilac',
                'name' => $item['name'],
                'role' => $item['role'] ?? '',
                'img' => $img,
                'w' => '800',
                'h' => '1000',
                'alt' => $item['name'].', '.($item['role'] ?? ''),
            ];
        }

        Content::set('people', $formatted, 'teachers');

        return redirect()->route('admin.teachers')
            ->with('status', 'Profil guru dan pendidik berhasil disimpan.');
    }

    /**
     * 4. SAANS dalam Angka / Statistik (Night)
     */
    public function stats(): View
    {
        $night = config('glowtide.night', []);

        return view('admin.content.stats', compact('night'));
    }

    public function updateStats(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'heading' => ['required', 'string', 'max:255'],
            'sub' => ['required', 'string', 'max:255'],
            'stat' => ['required', 'string', 'max:100'],
            'stat_note' => ['required', 'string', 'max:255'],
            'stat2' => ['required', 'string', 'max:100'],
            'stat2_note' => ['required', 'string', 'max:255'],
        ]);

        Content::set('night', $validated, 'stats');

        return redirect()->route('admin.stats')
            ->with('status', 'Data statistik sekolah berhasil diperbarui.');
    }

    /**
     * 5. Galeri Kegiatan (Shots)
     */
    public function gallery(): View
    {
        $shots = config('glowtide.shots', []);

        return view('admin.content.gallery', compact('shots'));
    }

    public function updateGallery(Request $request): RedirectResponse
    {
        $items = $request->input('shots', []);
        $formatted = [];

        foreach ($items as $index => $item) {
            if (empty($item['caption']) && empty($item['existing_img']) && ! $request->hasFile("shots.{$index}.new_img")) {
                continue;
            }

            $img = $item['existing_img'] ?? '';
            if ($request->hasFile("shots.{$index}.new_img")) {
                $uploaded = $this->handleImageUpload($request->file("shots.{$index}.new_img"), 'gallery');
                if ($uploaded) {
                    $img = $uploaded;
                }
            } elseif (! empty($item['img_url'])) {
                $img = $item['img_url'];
            }

            $shape = in_array($item['shape'] ?? '', ['pill', 'wide', 'circle', 'squircle'])
                ? $item['shape']
                : 'wide';

            $formatted[] = [
                'shape' => $shape,
                'img' => $img,
                'w' => in_array($shape, ['pill', 'squircle']) ? '900' : '1200',
                'h' => in_array($shape, ['pill', 'squircle']) ? '1350' : '900',
                'alt' => $item['caption'] ?? 'Kegiatan Siswa SAANS',
                'caption' => $item['caption'] ?? '',
            ];
        }

        Content::set('shots', $formatted, 'gallery');

        return redirect()->route('admin.gallery')
            ->with('status', 'Galeri foto kegiatan berhasil disimpan.');
    }

    /**
     * 6. Testimoni Orang Tua (Voices)
     */
    public function testimonials(): View
    {
        $voices = config('glowtide.voices', []);

        return view('admin.content.testimonials', compact('voices'));
    }

    public function updateTestimonials(Request $request): RedirectResponse
    {
        $items = $request->input('voices', []);
        $formatted = [];

        foreach ($items as $item) {
            if (empty($item['quote']) || empty($item['by'])) {
                continue;
            }

            $formatted[] = [
                'quote' => $item['quote'],
                'by' => $item['by'],
                'role' => $item['role'] ?? 'Wali Murid SAANS',
            ];
        }

        Content::set('voices', $formatted, 'testimonials');

        return redirect()->route('admin.testimonials')
            ->with('status', 'Testimoni orang tua berhasil diperbarui.');
    }

    /**
     * 7. Jenjang Pendidikan & PPDB (Passes)
     */
    public function passes(): View
    {
        $passes = config('glowtide.passes', []);

        return view('admin.content.passes', compact('passes'));
    }

    public function updatePasses(Request $request): RedirectResponse
    {
        $items = $request->input('passes', []);
        $formatted = [];

        foreach ($items as $item) {
            if (empty($item['name'])) {
                continue;
            }

            $rawItems = $item['items'] ?? '';
            $itemsList = is_array($rawItems)
                ? $rawItems
                : array_values(array_filter(array_map('trim', explode("\n", str_replace("\r", '', $rawItems)))));

            $formatted[] = [
                'featured' => ! empty($item['featured']),
                'tone' => ! empty($item['featured']) ? null : ($item['tone'] ?? 'sky'),
                'badge' => $item['badge'] ?? 'SAANS',
                'name' => $item['name'],
                'note' => $item['note'] ?? '',
                'items' => $itemsList,
                'cta' => $item['cta'] ?? 'Daftar Sekarang',
                'href' => $item['href'] ?? '#visit',
                'light' => ! empty($item['light']),
            ];
        }

        Content::set('passes', $formatted, 'passes');

        return redirect()->route('admin.passes')
            ->with('status', 'Jenjang pendidikan dan kartu PPDB berhasil disimpan.');
    }

    /**
     * 8. Tanya Jawab (FAQs)
     */
    public function faqs(): View
    {
        $faqs = config('glowtide.faqs', []);

        return view('admin.content.faqs', compact('faqs'));
    }

    public function updateFaqs(Request $request): RedirectResponse
    {
        $items = $request->input('faqs', []);
        $formatted = [];

        foreach ($items as $index => $item) {
            if (empty($item['q']) || empty($item['a'])) {
                continue;
            }

            $formatted[] = [
                'id' => ! empty($item['id']) ? Str::slug($item['id']) : 'qa-'.($index + 1),
                'q' => $item['q'],
                'a' => $item['a'],
            ];
        }

        Content::set('faqs', $formatted, 'faqs');

        return redirect()->route('admin.faqs')
            ->with('status', 'Daftar pertanyaan dan jawaban (FAQ) berhasil disimpan.');
    }

    /**
     * 9. Hero / Bagian Utama Beranda
     */
    public function hero(): View
    {
        $hero = config('glowtide.hero', []);

        return view('admin.content.hero', compact('hero'));
    }

    public function updateHero(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'tagline_title' => ['required', 'string', 'max:255'],
            'tagline_desc' => ['required', 'string', 'max:500'],
            'badge_text' => ['required', 'string', 'max:100'],
            'lead_text' => ['required', 'string', 'max:500'],
            'cta_primary_text' => ['nullable', 'string', 'max:100'],
            'cta_primary_href' => ['nullable', 'string', 'max:255'],
            'cta_secondary_text' => ['nullable', 'string', 'max:100'],
            'cta_secondary_href' => ['nullable', 'string', 'max:255'],
            'image_1_file' => ['nullable', 'image', 'max:20480'],
            'image_2_file' => ['nullable', 'image', 'max:20480'],
            'image_3_file' => ['nullable', 'image', 'max:20480'],
        ]);

        $current = config('glowtide.hero', []);

        $image1 = $this->handleImageUpload($request->file('image_1_file'), 'hero1')
            ?? $request->input('image_1', $current['image_1'] ?? 'images/hero.jpg');
        $image2 = $this->handleImageUpload($request->file('image_2_file'), 'hero2')
            ?? $request->input('image_2', $current['image_2'] ?? 'images/hero2.jpg');
        $image3 = $this->handleImageUpload($request->file('image_3_file'), 'hero3')
            ?? $request->input('image_3', $current['image_3'] ?? 'images/hero3.jpg');

        $heroData = [
            'tagline_title' => $validated['tagline_title'],
            'tagline_desc' => $validated['tagline_desc'],
            'badge_text' => $validated['badge_text'],
            'lead_text' => $validated['lead_text'],
            'hero_plate_active' => $request->boolean('hero_plate_active'),
            'cta_primary_text' => $validated['cta_primary_text'] ?? ($current['cta_primary_text'] ?? 'Daftar Sekarang'),
            'cta_primary_href' => $validated['cta_primary_href'] ?? ($current['cta_primary_href'] ?? '#passes'),
            'cta_secondary_text' => $validated['cta_secondary_text'] ?? ($current['cta_secondary_text'] ?? 'Lihat Program'),
            'cta_secondary_href' => $validated['cta_secondary_href'] ?? ($current['cta_secondary_href'] ?? '#programme'),
            'image_1' => $image1,
            'image_2' => $image2,
            'image_3' => $image3,
        ];

        Content::set('hero', $heroData, 'hero');

        return redirect()->route('admin.hero')
            ->with('status', 'Konten Hero / Beranda berhasil diperbarui.');
    }

    /**
     * 10. Navigasi / Navbar
     */
    public function navbar(): View
    {
        $navbar = config('glowtide.navbar', [
            'links' => [],
            'cta_text' => 'Daftar Sekarang',
            'cta_href' => '#passes',
        ]);

        return view('admin.content.navbar', compact('navbar'));
    }

    public function updateNavbar(Request $request): RedirectResponse
    {
        $request->validate([
            'cta_text' => ['required', 'string', 'max:100'],
            'cta_href' => ['required', 'string', 'max:255'],
            'links' => ['nullable', 'array'],
        ]);

        $linksInput = $request->input('links', []);
        $formattedLinks = [];

        foreach ($linksInput as $item) {
            if (empty($item['label']) || empty($item['href'])) {
                continue;
            }

            $formattedLinks[] = [
                'label' => trim($item['label']),
                'href' => trim($item['href']),
            ];
        }

        $navbarData = [
            'links' => $formattedLinks,
            'cta_text' => $request->input('cta_text'),
            'cta_href' => $request->input('cta_href'),
        ];

        Content::set('navbar', $navbarData, 'navbar');

        return redirect()->route('admin.navbar')
            ->with('status', 'Menu Navigasi (Navbar) berhasil diperbarui.');
    }
}
