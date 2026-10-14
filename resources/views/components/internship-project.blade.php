@props(['project'])

@php
    $experience = config('portfolio.experience.0');
    $projectInfo = collect($project['detail']['info'])->keyBy('label');
@endphp

<section id="magang" class="internship-section section-shell border-top" aria-labelledby="internship-title" tabindex="-1" data-internship>
    <div class="internship-label pixel-font" data-internship-item aria-hidden="true">HASIL<br>MAGANG</div>
    <div class="internship-info" data-internship-item>
        <p class="eyebrow">02 / HASIL MAGANG</p>
        <p class="internship-category">{{ $project['detail']['label'] }}</p>
        <h2 id="internship-title" class="project-title">{{ $project['detail']['title'] }}</h2>
        <p class="internship-summary">{{ $project['detail']['summary'] }}</p>
        <dl class="internship-details">
            <div>
                <dt><span aria-hidden="true">◇</span> Perusahaan</dt>
                <dd>{{ $experience['organization'] }}</dd>
            </div>
            <div>
                <dt><span aria-hidden="true">⌘</span> Peran</dt>
                <dd>{{ $projectInfo['PERAN']['value'] }}</dd>
            </div>
            <div>
                <dt><span aria-hidden="true">◷</span> Periode</dt>
                <dd>
                    <time datetime="{{ $experience['period_start'] }}">Februari</time>
                    — <time datetime="{{ $experience['period_end'] }}">Juli 2025</time>
                </dd>
            </div>
            <div>
                <dt><span aria-hidden="true">▧</span> Stack</dt>
                <dd>{{ implode(', ', $project['tags']) }}</dd>
            </div>
        </dl>
        <ul class="internship-features" aria-label="Fitur project">
            @foreach (array_slice($project['detail']['fitur'], 0, 3) as $feature)
                <li>{{ $feature }}</li>
            @endforeach
        </ul>
        <div class="internship-actions">
            <button
                class="button"
                type="button"
                data-project-detail-trigger
                data-project-detail-key="{{ $project['title'] }}"
                aria-haspopup="dialog"
                aria-controls="project-detail-dialog"
            >LIHAT DETAIL <span aria-hidden="true">↗</span></button>
            <a class="text-link" href="#{{ $experience['id'] }}">LIHAT PENGALAMAN <span aria-hidden="true">↗</span></a>
        </div>
    </div>
    <div class="internship-image-wrap" data-internship-item>
        <img
            src="{{ asset($project['image']) }}"
            alt="{{ $project['alt'] }}"
            width="{{ $project['image_width'] }}"
            height="{{ $project['image_height'] }}"
            loading="lazy"
            decoding="async"
            class="internship-image {{ $project['image_class'] ?? '' }}"
        >
        <span class="image-index">{{ $project['year'] }} — PROJECT MAGANG</span>
    </div>
</section>
