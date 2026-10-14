@props(['socials', 'email'])

<section id="contact" class="contact-section section-shell border-top" aria-labelledby="contact-title" tabindex="-1">
    <div data-reveal>
        <p class="eyebrow">09 / LET'S CONNECT</p>
        <h2 id="contact-title" class="section-title">ADA IDE MENARIK<span class="text-muted"> ?</span></h2>
        <p class="contact-intro">Saya terbuka untuk kolaborasi, kesempatan kerja, atau sekadar berbincang.</p>
        <dl class="contact-facts">
            <div>
                <dt>LOKASI</dt>
                <dd>{{ config('portfolio.location') }}</dd>
            </div>
            <div>
                <dt>STATUS</dt>
                <dd>
                    <span class="availability-label">
                        <span class="availability-dot {{ config('portfolio.availability.open') ? 'is-open' : '' }}" aria-hidden="true"></span>
                        {{ config('portfolio.availability.open') ? config('portfolio.availability.label') : 'Sedang tidak tersedia' }}
                    </span>
                    @if (config('portfolio.availability.open') && config('portfolio.availability.detail'))
                        <span class="availability-detail">{{ config('portfolio.availability.detail') }}</span>
                    @endif
                </dd>
            </div>
        </dl>
        @if (filled(config('portfolio.whatsapp_number')))
            <a
                class="button whatsapp-button"
                href="https://wa.me/{{ config('portfolio.whatsapp_number') }}?text={{ rawurlencode(config('portfolio.whatsapp_message')) }}"
                target="_blank"
                rel="noopener noreferrer"
                aria-label="Chat WhatsApp dengan Alvin, buka di tab baru"
            >
                <x-icon name="whatsapp" />
                <span>CHAT VIA WHATSAPP ↗</span>
            </a>
        @endif
    </div>
    <a class="contact-email text-link" href="https://mail.google.com/mail/?view=cm&amp;fs=1&amp;to={{ rawurlencode($email) }}" target="_blank" rel="noopener noreferrer" data-reveal>
        <x-icon name="email" />
        {{ $email }}
        <span aria-hidden="true">↗</span>
    </a>
    <div class="contact-socials" data-contact-socials>
        @foreach ($socials as $name => $url)
            @php
                $socialName = ['linkedin' => 'LinkedIn', 'github' => 'GitHub', 'instagram' => 'Instagram'][$name] ?? ucfirst($name);
            @endphp
            <a
                class="contact-social-link"
                href="{{ $url }}"
                target="_blank"
                rel="noopener noreferrer"
                aria-label="{{ $socialName }} Alvin, buka di tab baru"
                data-contact-social-link
            >
                <x-icon :name="$name" />
                <span>{{ strtoupper($name) }}</span>
                <span class="contact-social-arrow" aria-hidden="true">↗</span>
            </a>
        @endforeach
    </div>
</section>
