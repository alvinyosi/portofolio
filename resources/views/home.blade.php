@extends('layouts.app')

@section('content')
<x-navbar />
<main id="main-content">
    <x-hero />
    <x-featured-project :project="$featuredProject" />
    <section id="projects" class="section-shell border-top" aria-labelledby="projects-title" tabindex="-1">
        <div class="section-heading" data-reveal>
            <p class="eyebrow">02 / SELECTED WORK</p>
            <h2 id="projects-title" class="section-title">PROJECT LAINNYA<span class="text-muted">.</span></h2>
            <p class="section-intro">Beberapa hal yang pernah saya rancang dan bangun.</p>
        </div>
        <div class="project-grid" data-project-grid>
            @foreach ($projects as $project)
                <x-project-card :project="$project" />
            @endforeach
            <a class="project-more-card" href="{{ config('portfolio.socials.github') }}" target="_blank" rel="noopener noreferrer" aria-label="Lihat lebih banyak project Alvin di GitHub">
                <span>LIHAT LEBIH BANYAK DI GITHUB <b aria-hidden="true">↗</b></span>
            </a>
        </div>
    </section>
    <x-about />
    <x-stats />
    <x-cv-section />
    <x-contact :socials="config('portfolio.socials')" :email="config('portfolio.email')" />
</main>
<x-project-detail-modal :details="$projectDetails" />
<x-footer :socials="config('portfolio.socials')" :email="config('portfolio.email')" />
@endsection
