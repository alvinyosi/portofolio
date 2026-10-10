@props(['socials', 'email'])

<footer class="site-footer">
    <nav class="footer-nav" aria-label="Navigasi footer">
        <a href="#projects">PROJECTS</a>
        <a href="#about">ABOUT</a>
        <a href="#contact">CONTACT</a>
    </nav>
    <p>© 2026 ALVIN, HUBUNGI: <a href="mailto:{{ $email }}">{{ $email }}</a></p>
    <div class="footer-socials">
        <a href="{{ $socials['linkedin'] }}" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">IN ↗</a>
        <a href="{{ $socials['github'] }}" target="_blank" rel="noopener noreferrer" aria-label="GitHub">GH ↗</a>
        <a href="{{ asset('cv/CV Alvin Yosi E. P.pdf') }}" download>CV ↓</a>
    </div>
</footer>
