@props(['project'])

<section class="featured-section section-shell border-top" aria-labelledby="featured-title">
    <div class="featured-label pixel-font" data-reveal>PROJECT<br>TERBARU</div>
    <div class="featured-image-wrap" data-reveal>
        <img src="{{ asset($project['image']) }}" alt="{{ $project['alt'] }}" class="featured-image" loading="lazy">
        <span class="image-index">01 — 03</span>
    </div>
    <div class="featured-info" data-reveal>
        <p class="eyebrow">{{ $project['category'] }} <span class="text-muted">/ 2025</span></p>
        <h2 id="featured-title" class="project-title">{{ $project['title'] }}</h2>
        <span class="title-rule"></span>
        <dl class="project-details">
            <div><dt><span aria-hidden="true">◇</span> Platform</dt><dd>{{ $project['platform'] }}</dd></div>
            <div><dt><span aria-hidden="true">⌘</span> Tipe</dt><dd>{{ $project['type'] }}</dd></div>
            <div><dt><span aria-hidden="true">▧</span> Tools</dt><dd>{{ $project['tools'] }}</dd></div>
            <div><dt><span aria-hidden="true">＋</span> Deskripsi</dt><dd>{{ $project['description'] }}</dd></div>
        </dl>
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
