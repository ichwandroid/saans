<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta name="robots" content="noindex">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ config('glowtide.site.title') }}</title>
<meta name="description" content="{{ config('glowtide.site.description') }}">
<script>(function(d){if(!matchMedia('(prefers-reduced-motion: reduce)').matches){d.classList.add('motion');setTimeout(function(){if(!window.gsap)d.classList.remove('motion')},2500)}})(document.documentElement);</script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Google+Sans:wght@400..700&family=Hubot+Sans:wdth,wght@75..125,200..900&display=swap">
<link rel="stylesheet" href="{{ asset('css/glowtide.css') }}">
<link rel="stylesheet" href="{{ asset('css/opener.css') }}">
<link rel="stylesheet" href="{{ asset('css/cursor.css') }}">
<link rel="stylesheet" href="{{ asset('css/header-island.css') }}">
</head>
<body>

{{-- ===== CUSTOM CURSOR ===== --}}
<div class="saans-cursor" aria-hidden="true">
  <div class="cursor-dot"></div>
  <div class="cursor-ring"></div>
</div>
{{-- ========================= --}}

{{-- ===== PAGE OPENER ===== --}}
<div id="saans-opener" aria-hidden="true">
  <div class="opener-panel opener-top"></div>
  <div class="opener-panel opener-bottom">
    <div class="opener-logo">
      <span class="opener-wordmark">SAANS</span>
      <span class="opener-sub">Sekolah Alam Anak Saleh</span>
    </div>
  </div>
</div>
{{-- ======================= --}}

@include('partials.header')

<main>
@yield('content')
</main>

@include('partials.footer')

<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/SplitText.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lenis@1.3.4/dist/lenis.min.js"></script>
<script src="{{ asset('js/glowtide.js') }}"></script>
<script src="{{ asset('js/opener.js') }}"></script>
<script src="{{ asset('js/cursor.js') }}"></script>
<script src="{{ asset('js/header-island.js') }}"></script>
</body>
</html>
