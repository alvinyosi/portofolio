@props(['socials', 'email'])

<section id="contact" class="contact-section section-shell border-top" aria-labelledby="contact-title" tabindex="-1">
    <div data-reveal>
        <p class="eyebrow">04 / LET'S CONNECT</p>
        <h2 id="contact-title" class="section-title">ADA IDE MENARIK<span class="text-muted"> ?</span></h2>
        <p class="contact-intro">Saya terbuka untuk kolaborasi, kesempatan kerja, atau sekadar berbincang.</p>
    </div>
    <a class="contact-email text-link" href="https://mail.google.com/mail/?view=cm&amp;fs=1&amp;to={{ rawurlencode($email) }}" target="_blank" rel="noopener noreferrer" data-reveal>{{ $email }} <span aria-hidden="true">↗</span></a>
    <div class="contact-socials" data-reveal>
        <a class="text-link" href="{{ $socials['linkedin'] }}" target="_blank" rel="noopener noreferrer">LINKEDIN ↗</a>
        <a class="text-link" href="{{ $socials['github'] }}" target="_blank" rel="noopener noreferrer">GITHUB ↗</a>
        <a class="text-link" href="{{ $socials['instagram'] }}" target="_blank" rel="noopener noreferrer">INSTAGRAM ↗</a>
    </div>
</section>
