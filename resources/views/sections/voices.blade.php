<section id="voices" data-kind="reviews" class="voices sec">
  <div class="wrap sec-head">
    <h2 class="h2" data-split>Apa Kata Mereka Tentang Kami</h2>
    <div class="sec-side">
      <p>Kisah nyata dan pengalaman berharga dari orang tua siswa serta alumni yang telah tumbuh bersama keluarga besar Sekolah Alam Anak Saleh.</p>
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
