<section id="gallery" data-kind="gallery" class="gallery">
  <div class="gal-stage">
    <i class="gal-orb gal-orb-a" aria-hidden="true"></i>
    <i class="gal-orb gal-orb-b" aria-hidden="true"></i>
    <div class="gal-track">
      <div class="gal-intro">
        <h2 class="h2">Last November, in pictures</h2>
        <p>Two hundred thousand people came down to the water over ten nights. Here are a few of the moments they took home.</p>
      </div>
      @foreach (config('glowtide.shots') as $shot)
        <figure class="shot shot-{{ $shot['shape'] }}"><div class="shot-frame"><img src="{{ $shot['img'] }}" width="{{ $shot['w'] }}" height="{{ $shot['h'] }}" loading="lazy" alt="{{ $shot['alt'] }}"></div><figcaption>{{ $shot['caption'] }}</figcaption></figure>
      @endforeach
    </div>
  </div>
</section>
