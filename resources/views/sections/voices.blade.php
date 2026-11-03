<section id="voices" data-kind="reviews" class="voices sec">
  <div class="wrap sec-head">
    <h2 class="h2" data-split>Heard on the quays last year</h2>
    <div class="sec-side">
      <p>We asked people on their way home what stayed with them. A few of the answers changed this year's programme.</p>
    </div>
  </div>
  <div class="v-row">
    <ul class="v-list">
      @foreach (config('glowtide.voices') as $voice)
        <li class="voice glass tone-{{ $voice['tone'] }}"><blockquote><p>“{{ $voice['quote'] }}”</p></blockquote><p class="voice-by"><i class="voice-orb" aria-hidden="true"></i><span><b>{{ $voice['name'] }}</b> {{ $voice['role'] }}</span></p></li>
      @endforeach
    </ul>
  </div>
</section>
