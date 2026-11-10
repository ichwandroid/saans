@php
  $heroImg = function($path, $default) {
    $src = $path ?: $default;
    return str_starts_with($src, 'http') ? $src : asset(ltrim(str_replace('public/', '', $src), '/'));
  };
@endphp
<section id="hero" data-kind="hero" class="hero">
  <div class="hero-stage">
    <div class="hero-art" aria-hidden="true">
      <i class="sh sh-b" style="--depth:.7"><img src="{{ $heroImg(config('glowtide.hero.image_2'), 'images/hero2.jpg') }}" alt="Siswa SAANS"></i>
      <i class="sh sh-w" style="--depth:.6"></i>
      <i class="sh sh-a" style="--depth:.85"><img src="{{ $heroImg(config('glowtide.hero.image_1'), 'images/hero.jpg') }}" alt="Siswa SAANS"></i>
      <i class="sh sh-o" style="--depth:1.25"></i>
      <i class="sh sh-c" style="--depth:.9"><img src="{{ $heroImg(config('glowtide.hero.image_3'), 'images/hero3.jpg') }}" alt="Siswa SAANS"></i>
      <i class="sh sh-m" style="--depth:1.4"></i>
      <i class="sh sh-e" style="--depth:1.1"></i>
      <i class="sh sh-g" style="--depth:1"></i>
      <i class="sh sh-f" style="--depth:1.2"></i>
      <i class="sh sh-r" style="--depth:1.6"></i>
      <i class="sh sh-s2" style="--depth:1"></i>
      <i class="sh sh-d" style="--depth:1.45"><b class="orb"></b></i>
      <i class="sh sh-s1"><b class="flood"></b></i>
    </div>
    <div class="hero-copy">
      <i class="hero-copy-bg" aria-hidden="true"></i>
      <div class="hero-copy-inner">
        <h1 class="hero-brand">
          <img src="{{ asset('images/logo.png') }}" alt="{{ config('glowtide.site.name') }}" class="hero-brand-logo">
        </h1>
        <h2 class="hero-title">
          <span class="hero-tagline-title">{{ config('glowtide.hero.tagline_title', 'Sekolah Alam Anak Saleh') }}</span>
          <span class="hero-tagline-desc">{{ config('glowtide.hero.tagline_desc', 'Membentuk generasi berakhlak mulia, berwawasan luas, dan cinta lingkungan.') }}</span>
        </h2>
      </div>
    </div>
    @if(config('glowtide.hero.hero_plate_active', true))
    <div class="hero-plate">
      <p class="hero-dates">{{ config('glowtide.hero.badge_text', 'SPMB Dibuka') }}</p>
      <p class="hero-lead">{{ config('glowtide.hero.lead_text', 'Segera daftarkan diri untuk tahun ajaran baru bersama SAANS.') }}</p>
      <div class="hero-actions">
        <a class="btn" href="{{ config('glowtide.hero.cta_primary_href', '#passes') }}">{{ config('glowtide.hero.cta_primary_text', 'Daftar Sekarang') }}</a>
        <a class="link" href="{{ config('glowtide.hero.cta_secondary_href', '#programme') }}">{{ config('glowtide.hero.cta_secondary_text', 'Lihat Program') }}</a>
      </div>
    </div>
    @endif
    <i class="hero-fade" aria-hidden="true"></i>
  </div>
</section>
