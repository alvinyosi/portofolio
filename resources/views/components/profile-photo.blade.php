<figure class="profile-photo" data-profile-photo tabindex="0" aria-label="Foto Alvin Yosi Eka Putra">
    <span class="profile-photo-backdrop" data-profile-backdrop aria-hidden="true"></span>
    <span class="profile-photo-frame">
        @if (file_exists(public_path('images/profile.jpg')))
            <img
                class="profile-photo-image"
                src="{{ asset('images/profile.jpg') }}"
                alt="Foto Alvin Yosi Eka Putra"
                width="768"
                height="1344"
                loading="lazy"
                decoding="async"
            >
        @else
            <span class="profile-photo-placeholder pixel-font" role="img" aria-label="Inisial Alvin Yosi Eka Putra">AY</span>
        @endif
        <span class="profile-corner profile-corner-top-left" aria-hidden="true"></span>
        <span class="profile-corner profile-corner-top-right" aria-hidden="true"></span>
        <span class="profile-corner profile-corner-bottom-left" aria-hidden="true"></span>
        <span class="profile-corner profile-corner-bottom-right" aria-hidden="true"></span>
    </span>
    <figcaption>ALVIN — SURABAYA, 2026</figcaption>
</figure>
