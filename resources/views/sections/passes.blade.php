<section id="passes" data-kind="pricing" class="passes sec">
  <div class="wrap">
    <div class="sec-head">
      <h2 class="h2" data-split>Pick how much of the light you want</h2>
      <div class="sec-side">
        <p>The quays are always free. A pass opens the indoor rooms, where entry is timed so nobody has to queue in the cold.</p>
        <a class="link" href="#faq">Discounts and free entry</a>
      </div>
    </div>
    <div class="pass-grid">
      @foreach (config('glowtide.passes') as $pass)
        <article class="pass {{ $pass['featured'] ? 'pass-featured' : 'glass tone-'.$pass['tone'] }}">
          <h3 class="pass-name">{{ $pass['name'] }}</h3>
          <p class="pass-price" style="--len:{{ $pass['len'] }}">{{ $pass['price'] }}</p>
          <p class="pass-note">{{ $pass['note'] }}</p>
          <ul class="pass-list">
            @foreach ($pass['items'] as $item)
              <li>{{ $item }}</li>
            @endforeach
          </ul>
          <a class="btn{{ $pass['light'] ? ' btn-light' : '' }}" href="{{ $pass['href'] }}">{{ $pass['cta'] }}</a>
        </article>
      @endforeach
    </div>
  </div>
</section>
