<section id="night" data-kind="timeline" class="night sec">
  <div class="wrap night-grid">
    <div class="night-head">
      <h2 class="h2" data-split>Sekolah Alam Anak Saleh dalam Angka</h2>
      <p>Perjalanan panjang membangun generasi saleh, cerdas, dan mencintai alam. Angka-angka ini adalah bukti nyata dari kepercayaan ribuan keluarga.</p>
      <a class="btn" href="#visit">Daftar sekarang</a>
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
