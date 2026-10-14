@props(['project'])

<section id="tugas-akhir" class="featured-section section-shell border-top" aria-labelledby="featured-title" tabindex="-1">
    <div class="featured-label pixel-font" data-reveal>TUGAS AKHIR</div>
    <div class="featured-image-wrap" data-reveal>
        <img
            src="{{ asset($project['image']) }}"
            alt="{{ $project['alt'] }}"
            width="{{ $project['image_width'] }}"
            height="{{ $project['image_height'] }}"
            class="featured-image"
            loading="lazy"
            decoding="async"
        >
        <span class="image-index">01 — 03</span>
    </div>
    <div class="featured-info" data-reveal>
        <p class="eyebrow">01 / TUGAS AKHIR</p>
        <span class="project-type-badge">HASIL TUGAS AKHIR (TA) S1</span>
        <h2 id="featured-title" class="project-title">{{ config('portfolio.education.0.tugas_akhir') }}</h2>
        <p class="featured-summary">Project ini adalah hasil Tugas Akhir (TA) S1 Sistem Informasi, Universitas Dinamika ({{ config('portfolio.education.0.period') }}), berupa perancangan UI/UX sistem pre-order berbasis web untuk UMKM Dapoer Mamana dengan metode User-Centered Design (UCD).</p>
        <span class="title-rule"></span>
        <dl class="project-details">
            <div><dt><span aria-hidden="true">◇</span> Platform</dt><dd>{{ $project['platform'] }}</dd></div>
            <div><dt><span aria-hidden="true">⌘</span> Tipe</dt><dd>{{ $project['type'] }}</dd></div>
            <div><dt><span aria-hidden="true">▧</span> Tools</dt><dd>{{ $project['tools'] }}</dd></div>
            <div><dt><span aria-hidden="true">＋</span> Deskripsi</dt><dd>{{ $project['description'] }}</dd></div>
        </dl>
        <div class="featured-results" data-featured-results aria-label="Hasil pengujian tugas akhir">
            @foreach ($project['detail']['highlights'] as $highlight)
                <div class="featured-result" data-featured-result>
                    <strong class="pixel-font">{{ $highlight['value'] }}</strong>
                    <span>{{ $highlight['label'] }}</span>
                </div>
            @endforeach
        </div>
        <div class="featured-actions">
            <button
                class="button"
                type="button"
                data-project-detail-trigger
                data-project-detail-key="{{ $project['title'] }}"
                aria-haspopup="dialog"
                aria-controls="project-detail-dialog"
            >LIHAT DETAIL <span aria-hidden="true">↗</span></button>
            <a class="text-link" href="{{ $project['case_study'] }}">Studi kasus</a>
        </div>
    </div>
</section>
