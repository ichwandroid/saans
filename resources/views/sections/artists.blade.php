<section id="artists" data-kind="team" class="artists sec">
  <div class="wrap">
    <div class="sec-head">
      <h2 class="h2" data-split>Twenty-four artists. Six to meet first.</h2>
      <div class="sec-side">
        <p>Sculptors, composers, coders and one retired lighthouse keeper. Most of them are out on the quays every night, so say hello.</p>
        <a class="link" href="#programme">See their works</a>
      </div>
    </div>
    <ul class="people">
      @foreach (config('glowtide.people') as $person)
        <li class="person tone-{{ $person['tone'] }}">
          <div class="person-art"><i class="person-halo" data-parallax="0.16" aria-hidden="true"></i><figure class="person-frame"><img src="{{ $person['img'] }}" width="{{ $person['w'] }}" height="{{ $person['h'] }}" loading="lazy" alt="{{ $person['alt'] }}"></figure></div>
          <h3 class="person-name">{{ $person['name'] }}</h3>
          <p class="person-role">{{ $person['role'] }}</p>
        </li>
      @endforeach
    </ul>
  </div>
</section>
