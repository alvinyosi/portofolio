<section id="skills" class="profile-section skills-section section-shell border-top" aria-labelledby="skills-title" tabindex="-1">
    @php
        $skillIcons = [
            'PHP' => ['php'],
            'JavaScript' => ['javascript'],
            'Laravel' => ['laravel'],
            'Bootstrap' => ['bootstrap'],
            'Tailwind CSS' => ['tailwindcss'],
            'React' => ['react'],
            'Motion' => ['motion'],
            'MySQL' => ['mysql'],
            'Figma' => ['figma'],
            'VS Code' => ['vscode'],
            'Postman' => ['postman'],
            'Git & GitHub' => ['git', 'github'],
            'Composer' => ['composer'],
            'npm & Vite' => ['npm', 'vite'],
        ];
    @endphp
    <div class="section-heading" data-reveal>
        <p class="eyebrow">07 / SKILLS & BAHASA</p>
        <h2 id="skills-title" class="section-title">SKILLS & BAHASA<span class="text-muted">.</span></h2>
    </div>
    <div class="skills-layout">
        <div class="skills-groups" aria-label="Kelompok skills">
            @foreach (config('portfolio.skills') as $group => $items)
                <section class="skill-group" data-skill-group aria-labelledby="skill-group-{{ $loop->index }}">
                    <h3 id="skill-group-{{ $loop->index }}">{{ $group }}</h3>
                    <ul class="skill-tags">
                        @foreach ($items as $item)
                            <li data-skill-tag>
                                <span class="skill-tag-icons" aria-hidden="true">
                                    @foreach ($skillIcons[$item] as $icon)
                                        <x-skill-icon :name="$icon" />
                                    @endforeach
                                </span>
                                <span>{{ $item }}</span>
                            </li>
                        @endforeach
                    </ul>
                </section>
            @endforeach
        </div>
        <section class="language-panel" aria-labelledby="languages-title">
            <h3 id="languages-title">BAHASA</h3>
            <dl class="language-list">
                @foreach (config('portfolio.languages') as $language => $level)
                    <div>
                        <dt>{{ $language }}</dt>
                        <dd>{{ $level }}</dd>
                    </div>
                @endforeach
            </dl>
        </section>
    </div>
</section>
