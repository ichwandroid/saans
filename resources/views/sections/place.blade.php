@php
$placeSlides = [
    [
        'img'   => asset('images/paud.jpg'),
        'alt'   => 'TK-Playgroup-TPA Anak Saleh',
        'items' => [
            ['label' => 'Jenjang', 'value' => 'PG · TK · Daycare Anak Saleh'],
            ['label' => 'Alamat', 'value' => 'Jl. Candi Panggung Indah 1–3'],
            ['label' => 'Lokasi', 'value' => 'Lowokwaru, Malang'],
        ],
    ],
    [
        'img'   => asset('images/sd.jpg'),
        'alt'   => 'Kegiatan outdoor bersama siswa',
        'items' => [
            ['label' => 'Jenjang', 'value' => 'Sekolah Dasar Anak Saleh'],
            ['label' => 'Alamat', 'value' => 'Jl. Arumba No. 31, Tunggulwulung'],
            ['label' => 'Lokasi', 'value' => 'Lowokwaru, Malang'],
        ],
    ],
    [
        'img'   => asset('images/smp.jpg'),
        'alt'   => 'Kegiatan literasi dan sains',
        'items' => [
            ['label' => 'Jenjang', 'value' => 'Sekolah Menengah Pertama Anak Saleh'],
            ['label' => 'Alamat', 'value' => 'Jl. Arumba No. 31, Tunggulwulung'],
            ['label' => 'Lokasi', 'value' => 'Lowokwaru, Malang'],
        ],
    ],
];
@endphp

<section id="place" data-kind="venue" class="place sec">
  <div class="wrap">
    <div class="sec-head">
      <h2 class="h2" data-split>Program Pendidikan Kami</h2>
      <div class="sec-side">
        <p>Jenjang pendidikan yang berkesinambungan untuk mengawal tumbuh kembang ananda tercinta di Sekolah Anak Saleh.</p>
        <a class="link" href="#visit">Lokasi & rute kunjungan</a>
      </div>
    </div>
    <div class="ripple" data-ripple-slider>
      <div class="ripple-slab">
        <figure class="ripple-media">
          @foreach ($placeSlides as $idx => $slide)
            <img src="{{ $slide['img'] }}" width="1800" height="1198" loading="{{ $idx === 0 ? 'eager' : 'lazy' }}" alt="{{ $slide['alt'] }}" class="ripple-slide-img {{ $idx === 0 ? 'is-active' : '' }}" data-slide-index="{{ $idx }}">
          @endforeach
        </figure>
        <svg class="ripple-rings" aria-hidden="true"></svg>

        {{-- Slide Navigation Buttons --}}
        <div class="ripple-nav" aria-label="Slide navigation">
          <button type="button" class="ripple-btn ripple-btn--prev" aria-label="Slide sebelumnya" title="Slide sebelumnya">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 18l-6-6 6-6"/></svg>
          </button>
          <button type="button" class="ripple-btn ripple-btn--next" aria-label="Slide berikutnya" title="Slide berikutnya">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 18l6-6-6-6"/></svg>
          </button>
        </div>

        {{-- Slide Counter Badge --}}
        <div class="ripple-indicator" aria-hidden="true">
          <span class="ripple-counter" id="rippleCounter">01 / {{ sprintf('%02d', count($placeSlides)) }}</span>
        </div>
      </div>
      <dl class="ripple-plate glass tone-butter">
        @foreach ($placeSlides[0]['items'] as $item)
          <div class="ripple-meta-item">
            <dt>{{ $item['label'] }}</dt>
            <dd>{{ $item['value'] }}</dd>
          </div>
        @endforeach
      </dl>

      {{-- JSON Data for slider script --}}
      <script type="application/json" id="placeSlidesData">
        {!! json_encode($placeSlides, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) !!}
      </script>
    </div>
  </div>
</section>
