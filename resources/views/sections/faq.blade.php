<section id="faq" data-kind="faq" class="faq sec">
  <div class="wrap faq-grid">
    <div class="faq-head">
      <h2 class="h2" data-split>Good to know before you come</h2>
      <p>Anything else? Write to <a class="link" href="mailto:{{ config('glowtide.site.email') }}">{{ config('glowtide.site.email') }}</a> and a volunteer will answer within a day.</p>
    </div>
    <div class="qa-list">
      @foreach (config('glowtide.faqs') as $faq)
        <div class="qa" data-reveal>
          <h3 class="qa-q"><button type="button" id="{{ $faq['id'] }}-b" aria-expanded="false" aria-controls="{{ $faq['id'] }}"><span>{{ $faq['q'] }}</span><i class="qa-icon" aria-hidden="true"></i></button></h3>
          <div class="qa-a" id="{{ $faq['id'] }}" role="region" aria-labelledby="{{ $faq['id'] }}-b"><div><p>{{ $faq['a'] }}</p></div></div>
        </div>
      @endforeach
    </div>
  </div>
</section>
