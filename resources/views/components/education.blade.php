<section id="education" class="profile-section section-shell border-top" aria-labelledby="education-title" tabindex="-1">
    <div class="section-heading" data-reveal>
        <p class="eyebrow">05 / PENDIDIKAN</p>
        <h2 id="education-title" class="section-title">PENDIDIKAN<span class="text-muted">.</span></h2>
    </div>
    <div class="timeline-list" data-timeline>
        <span class="timeline-line" data-timeline-line aria-hidden="true"></span>
        <ol class="timeline-items" aria-label="Riwayat pendidikan">
            @foreach (config('portfolio.education') as $education)
                <li class="timeline-item" data-timeline-item>
                    <span class="timeline-year pixel-font">
                        <time datetime="{{ $education['start_year'] }}">{{ $education['start_year'] }}</time>
                        — <time datetime="{{ $education['end_year'] }}">{{ $education['end_year'] }}</time>
                    </span>
                    <div class="timeline-content">
                        <h3>{{ $education['degree'] }}</h3>
                        <p class="timeline-organization">{{ $education['institution'] }}</p>
                        <p class="timeline-gpa">IPK {{ $education['gpa'] }} / 4,00</p>
                        <div class="timeline-subrow">
                            <span class="timeline-label">TUGAS AKHIR</span>
                            <p>{{ $education['tugas_akhir'] }}</p>
                        </div>
                    </div>
                </li>
            @endforeach
        </ol>
    </div>
</section>
