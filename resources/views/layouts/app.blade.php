<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Portofolio Alvin — fresh graduate Sistem Informasi yang fokus pada UI/UX dan pengembangan web.">
    <meta name="theme-color" content="#080808">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Alvin - Web Portofolio">
    <meta property="og:description" content="Menciptakan pengalaman digital yang lebih baik melalui desain dan teknologi.">
    <meta property="og:image" content="{{ asset('images/project-dapoer.svg') }}">
    <title>@yield('title', 'Alvin - Web Portofolio')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Pixelify+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-ink font-sans text-white antialiased">
    <a class="skip-link" href="#main-content">Lewati ke konten</a>
    @yield('content')
</body>
</html>
