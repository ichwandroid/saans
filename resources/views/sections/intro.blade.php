<section id="intro" data-kind="manifesto" class="intro">
  <div class="wrap">
    <h2 class="statement" data-light>For ten nights the harbour switches off its street lamps and hands the dark to twenty-four artists. Walk in at dusk, follow the colour, stay until the tide turns.</h2>
    <ul class="facts">
      @foreach (config('glowtide.facts') as $fact)
        <li class="fact fact-{{ $fact['shape'] }} glass tone-{{ $fact['tone'] }}"><p class="fact-fig" style="--len:{{ $fact['len'] }}">{{ $fact['fig'] }}</p><p class="fact-label">{{ $fact['label'] }}</p></li>
      @endforeach
    </ul>
  </div>
</section>
