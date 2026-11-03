<section id="night" data-kind="timeline" class="night sec">
  <div class="wrap night-grid">
    <div class="night-head">
      <h2 class="h2" data-split>One night, from dusk to midnight</h2>
      <p>Every evening follows the same tide of light. Come early for the switch-on, stay late for the quiet.</p>
      <a class="btn" href="#passes">Plan your night</a>
    </div>
    <div class="steps-line">
      <ol class="steps">
        @foreach (config('glowtide.steps') as $step)
          <li class="step"><p class="step-time" style="--len:5">{{ $step['time'] }}</p><h3>{{ $step['title'] }}</h3><p>{{ $step['text'] }}</p></li>
        @endforeach
      </ol>
    </div>
  </div>
</section>
