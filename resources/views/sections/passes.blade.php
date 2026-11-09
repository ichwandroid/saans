<section id="passes" data-kind="pricing" class="passes sec">
  <div class="wrap">
    <div class="sec-head">
      <h2 class="h2" data-split>Pilihan Jenjang Pendidikan Kami</h2>
      <div class="sec-side">
        <p>Penerimaan Peserta Didik Baru (PPDB) telah dibuka. Pilih jenjang yang tepat untuk mendampingi tumbuh kembang dan potensi ananda.</p>
        <a class="link" href="#faq">Pertanyaan seputar pendaftaran</a>
      </div>
    </div>
    <div class="pass-grid">
      @foreach (config('glowtide.passes') as $pass)
        <article class="pass {{ $pass['featured'] ? 'pass-featured' : 'glass tone-'.$pass['tone'] }}">
          <div class="pass-header">
            <span class="pass-badge">{{ $pass['badge'] ?? 'SAANS' }}</span>
            <h3 class="pass-name">{{ $pass['name'] }}</h3>
            <p class="pass-note">{{ $pass['note'] }}</p>
          </div>
          <ul class="pass-list">
            @foreach ($pass['items'] as $item)
              <li>{{ $item }}</li>
            @endforeach
          </ul>
          <div class="pass-footer">
            <a class="btn{{ $pass['light'] ? ' btn-light' : '' }}" href="{{ $pass['href'] }}">{{ $pass['cta'] }}</a>
          </div>
        </article>
      @endforeach
    </div>
  </div>
</section>
