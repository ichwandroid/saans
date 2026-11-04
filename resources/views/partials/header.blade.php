<header class="site-header">
  <div class="hd-pill">
    <a class="brand" href="#hero"><img src="{{ asset('images/header.png') }}" alt="{{ config('glowtide.site.name') }}" class="brand-logo"></a>
    <nav class="hd-nav" aria-label="Main">
      <a class="link" href="#programme">Programme</a>
      <a class="link" href="#artists">Artists</a>
      <a class="link" href="#passes">Passes</a>
      <a class="link" href="#visit">Visit</a>
    </nav>
    <a class="btn btn-sm hd-cta" href="#passes">Get a pass</a>
    <button class="ibtn menu-btn" type="button" aria-expanded="false" aria-controls="menu" aria-label="Open menu" data-label-open="Open menu" data-label-close="Close menu">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path class="l1" d="M4 9h16"/><path class="l2" d="M4 15h16"/></svg>
    </button>
  </div>

  <div class="menu" id="menu" hidden>
    <button class="menu-close-btn" type="button" aria-label="Tutup Menu">
      <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
        <line x1="18" y1="6" x2="6" y2="18"></line>
        <line x1="6" y1="6" x2="18" y2="18"></line>
      </svg>
    </button>
    <nav aria-label="Menu">
      <a href="#programme">Programme</a>
      <a href="#artists">Artists</a>
      <a href="#night">The night</a>
      <a href="#passes">Passes</a>
      <a href="#visit">Visit</a>
    </nav>
    <a class="btn" href="#passes">Get a pass</a>
  </div>
</header>
