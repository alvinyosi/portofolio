@props(['socials', 'email'])

<footer class="site-footer">
    <nav class="footer-nav" aria-label="Navigasi footer">
        <a href="#projects">PROJECTS</a>
        <a href="#about">ABOUT</a>
        <a href="#contact">CONTACT</a>
    </nav>
    <p>© 2026 ALVIN, HUBUNGI: <a href="https://mail.google.com/mail/?view=cm&amp;fs=1&amp;to={{ rawurlencode($email) }}" target="_blank" rel="noopener noreferrer">{{ $email }}</a></p>
    <div class="footer-socials">
        @foreach ($socials as $name => $url)
            @php
                $socialName = ['linkedin' => 'LinkedIn', 'github' => 'GitHub', 'instagram' => 'Instagram'][$name] ?? ucfirst($name);
            @endphp
            <a class="footer-social-link" href="{{ $url }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $socialName }}">
                <x-icon :name="$name" />
            </a>
        @endforeach
        <a href="{{ asset('cv/CV Alvin Yosi E. P.pdf') }}" download>CV ↓</a>
    </div>
</footer>
