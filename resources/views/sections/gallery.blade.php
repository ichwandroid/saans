<section id="gallery" data-kind="gallery" class="gallery">
  <div class="gal-stage">
    <i class="gal-orb gal-orb-a" aria-hidden="true"></i>
    <i class="gal-orb gal-orb-b" aria-hidden="true"></i>
    <div class="gal-track">
      <div class="gal-intro">
        <h2 class="h2">Kegiatan SAANS</h2>
        <p>Setiap hari adalah petualangan belajar yang penuh makna — di kelas, di alam, dan di tengah kebersamaan yang hangat.</p>
      </div>
      @foreach (config('glowtide.shots') as $shot)
        <figure class="shot shot-{{ $shot['shape'] }}"><div class="shot-frame"><img src="{{ str_starts_with($shot['img'], 'http://') || str_starts_with($shot['img'], 'https://') ? $shot['img'] : asset(ltrim(str_replace('public/', '', $shot['img']), '/')) }}" width="{{ $shot['w'] }}" height="{{ $shot['h'] }}" loading="lazy" alt="{{ $shot['alt'] }}"></div><figcaption>{{ $shot['caption'] }}</figcaption></figure>
      @endforeach
    </div>
  </div>
</section>
