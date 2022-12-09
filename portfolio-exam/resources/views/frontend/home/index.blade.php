@extends('layouts.frontend')

@section('title')
    Home
@endsection

@section('content')
<header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Avatar Image-->
        <img class="masthead-avatar mb-5" src="assets/img/avataaars.svg" alt="..." />
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">Mochammad Faiz Adli</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">Fullstack Web - Video Editor - UI/UX Designer</p>
    </div>
</header>
@endsection

@section('css')
    <style>
        .page-section {
            padding: 12rem 0 2rem 0 !important
        }
    </style>
@endsection
