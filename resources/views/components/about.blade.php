<section id="about" class="about-section section-shell border-top" aria-labelledby="about-title" tabindex="-1">
    <x-profile-photo />
    <div class="about-copy" data-reveal>
        <p class="eyebrow">04 / TENTANG SAYA</p>
        <h2 id="about-title" class="section-title">WHY AND HOW<span class="text-muted">?</span></h2>
        <p>Saya percaya produk digital yang baik dimulai dari memahami orang yang menggunakannya. Dengan latar belakang Sistem Informasi, saya menghubungkan kebutuhan pengguna, desain yang intuitif, dan teknologi yang tepat.</p>
        <p>Dalam setiap proses, saya senang mengeksplorasi, terbuka terhadap masukan, dan memperhatikan detail dari ide hingga implementasi.</p>
        <dl class="about-facts">
            <div>
                <dt>LOKASI</dt>
                <dd>{{ config('portfolio.location') }}</dd>
            </div>
            <div>
                <dt>STATUS</dt>
                <dd class="availability-label">
                    <span class="availability-dot {{ config('portfolio.availability.open') ? 'is-open' : '' }}" aria-hidden="true"></span>
                    {{ config('portfolio.availability.open') ? config('portfolio.availability.label') : 'Sedang tidak tersedia' }}
                </dd>
            </div>
        </dl>
        <a class="text-link" href="#skills">Baca tentang tech stack-ku <span aria-hidden="true">↓</span></a>
        <div id="tech-stack" class="stack-list" aria-label="Tech stack">
            <span>TECH STACK</span>
            <b>Laravel</b><b>PHP</b><b>Tailwind CSS</b><b>JavaScript</b><b>Figma</b>
        </div>
    </div>
</section>
