@props(['project'])

<article class="project-card">
    <div class="project-card-content">
        <a class="project-card-main" href="{{ $project['url'] }}" aria-label="Lihat detail project {{ $project['title'] }}">
            <span class="project-card-image">
                <img
                    src="{{ asset($project['image']) }}"
                    alt="{{ $project['alt'] }}"
                    width="{{ $project['image_width'] ?? 1365 }}"
                    height="{{ $project['image_height'] ?? 768 }}"
                    loading="lazy"
                    decoding="async"
                    class="{{ $project['image_class'] ?? '' }}"
                    style="--image-position: {{ $project['image_position'] ?? 'center' }}"
                >
                <span class="card-arrow" aria-hidden="true">↗</span>
            </span>
            <span class="project-card-meta"><span>{{ $project['category'] }}</span><span>{{ $project['year'] }}</span></span>
            <h3>{{ $project['title'] }}</h3>
            <span class="project-card-description">{{ $project['description'] }}</span>
            <span class="project-role"><b>PERAN:</b> {{ $project['role'] }}</span>
            <span class="project-impact"><b>HASIL:</b> {{ $project['impact'] }}</span>
            <span class="tag-list" aria-label="Teknologi yang digunakan">
                @foreach ($project['tags'] as $tag)
                    <span>{{ $tag }}</span>
                @endforeach
            </span>
        </a>
        <div class="project-card-actions">
            <button
                class="project-action project-detail-trigger"
                type="button"
                data-project-detail-trigger
                data-project-detail-key="{{ $project['title'] }}"
                aria-haspopup="dialog"
                aria-controls="project-detail-dialog"
            >LIHAT DETAIL <b aria-hidden="true">↗</b></button>
            @if (! empty($project['github']))
                <a class="project-github text-link" href="{{ $project['github'] }}" target="_blank" rel="noopener noreferrer" aria-label="Buka repository GitHub untuk {{ $project['title'] }}">GITHUB ↗</a>
            @endif
        </div>
    </div>
</article>
