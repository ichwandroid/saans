<section id="programme" data-kind="programme" class="programme sec">
  <div class="wrap">
    <div class="sec-head">
      <h2 class="h2" data-split>Five works worth crossing the city for</h2>
      <div class="sec-side">
        <p>Twenty-four pieces light the quays this year, from pocket-sized to building-sized. Start with these five, then let the colour pull you along.</p>
        <a class="link" href="#passes">What each pass opens</a>
      </div>
    </div>
    <div class="stack">
      @foreach (config('glowtide.works') as $work)
        <article class="work glass tone-{{ $work['tone'] }}">
          <div class="work-body">
            <h3 class="work-title">{{ $work['title'] }}</h3>
            <p class="work-text">{{ $work['text'] }}</p>
            <p class="work-meta">@foreach ($work['meta'] as $m)<span>{{ $m }}</span>@endforeach</p>
          </div>
          <figure class="work-media"><img src="{{ $work['img'] }}" width="{{ $work['w'] }}" height="{{ $work['h'] }}" loading="lazy" alt="{{ $work['alt'] }}"></figure>
        </article>
      @endforeach
    </div>
  </div>
</section>
