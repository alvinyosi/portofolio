<section id="experience" class="profile-section section-shell border-top" aria-labelledby="experience-title" tabindex="-1">
    <div class="section-heading" data-reveal>
        <p class="eyebrow">06 / PENGALAMAN</p>
        <h2 id="experience-title" class="section-title">PENGALAMAN<span class="text-muted">.</span></h2>
    </div>
    <div class="timeline-list" data-timeline>
        <span class="timeline-line" data-timeline-line aria-hidden="true"></span>
        <ol class="timeline-items" aria-label="Riwayat pengalaman dan kegiatan">
            @foreach (config('portfolio.experience') as $experience)
                <li id="{{ $experience['id'] }}" class="timeline-item" data-timeline-item>
                    @if (! empty($experience['period']))
                        <span class="timeline-year pixel-font">
                            <time datetime="{{ $experience['period_start'] }}">Februari</time>
                            — <time datetime="{{ $experience['period_end'] }}">Juli 2025</time>
                        </span>
                    @else
                        <span class="timeline-year pixel-font">KEGIATAN</span>
                    @endif
                    <div class="timeline-content">
                        <span class="timeline-label">{{ $experience['type'] }}</span>
                        <h3>{{ $experience['role'] }}</h3>
                        <p class="timeline-organization">{{ $experience['organization'] }}</p>
                        <ul class="timeline-points">
                            @foreach ($experience['points'] as $point)
                                <li>{{ $point }}</li>
                            @endforeach
                        </ul>
                        @if (! empty($experience['project_link']))
                            <a class="text-link timeline-project-link" href="{{ $experience['project_link'] }}">LIHAT PROJECT <span aria-hidden="true">↗</span></a>
                        @endif
                    </div>
                </li>
            @endforeach
        </ol>
    </div>
</section>
