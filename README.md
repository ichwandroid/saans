# SAANS (Laravel)

Landing page festival cahaya SAANS, dibangun ulang dari satu file HTML menjadi project Laravel.

## Menjalankan

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```

Buka http://127.0.0.1:8000. Tidak perlu `npm install` atau build Vite: CSS dan JS ada di `public/`,
dan GSAP / Lenis dimuat dari CDN seperti di versi aslinya.

## Struktur

| Lokasi | Isi |
|---|---|
| `routes/web.php` | Route `/` ke `HomeController@index` |
| `resources/views/layouts/app.blade.php` | Kerangka HTML, font, dan script |
| `resources/views/partials/` | Header dan footer |
| `resources/views/sections/` | Satu file per section (hero, intro, programme, dst.) |
| `config/glowtide.php` | Semua konten yang berulang: karya, seniman, jadwal, galeri, testimoni, tiket, FAQ, kontak |
| `public/css/glowtide.css` | Seluruh style asli |
| `public/js/glowtide.js` | Seluruh animasi asli (GSAP, ScrollTrigger, SplitText, Lenis) |

Untuk mengubah teks, harga, atau foto, edit `config/glowtide.php`.
