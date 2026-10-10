@props(['details'])

<dialog
    id="project-detail-dialog"
    class="project-detail-dialog"
    aria-labelledby="project-detail-title"
    aria-describedby="project-detail-summary"
>
    <div class="project-detail-panel">
        <button class="project-detail-close" type="button" aria-label="Tutup detail project">✕</button>
        <p id="project-detail-label" class="eyebrow">TUGAS AKHIR (TA)</p>
        <h2 id="project-detail-title" class="project-detail-title pixel-font"></h2>
        <span class="title-rule" aria-hidden="true"></span>
        <p id="project-detail-summary" class="project-detail-summary"></p>
        <dl id="project-detail-info" class="project-detail-info" hidden></dl>
        <div id="project-detail-highlights" class="project-detail-stats" aria-label="Sorotan project" hidden></div>
        <section id="project-detail-features" class="project-detail-features" aria-labelledby="project-detail-features-title" hidden>
            <h3 id="project-detail-features-title">FITUR</h3>
            <ul id="project-detail-feature-list"></ul>
        </section>
        <p id="project-detail-conclusion" class="project-detail-conclusion" hidden></p>
        <footer class="project-detail-footer">
            <a id="project-detail-github" class="text-link" href="#" target="_blank" rel="noopener noreferrer" hidden>GITHUB ↗</a>
            <button class="button project-detail-dismiss" type="button">TUTUP</button>
        </footer>
    </div>
</dialog>
<script type="application/json" id="project-detail-data">@json($details)</script>
