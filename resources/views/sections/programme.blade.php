<section id="programme" data-kind="programme" class="programme sec">
  <div class="wrap">
    <div class="sec-head">
      <h2 class="h2" data-split>Panca Karakter Anak Saleh</h2>
      <div class="sec-side">
        <p>Lima pilar pembinaan holistik yang diintegrasikan dalam setiap aktivitas belajar mengajar untuk mencetak generasi berprestasi dan beradab.</p>
        <a class="link" href="#passes">Program Pendidikan Kami</a>
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
          <figure class="work-media"><img src="{{ str_starts_with($work['img'], 'http://') || str_starts_with($work['img'], 'https://') ? $work['img'] : asset(ltrim(str_replace('public/', '', $work['img']), '/')) }}" width="{{ $work['w'] }}" height="{{ $work['h'] }}" loading="lazy" alt="{{ $work['alt'] }}"></figure>
        </article>
      @endforeach
    </div>
  </div>
</section>
