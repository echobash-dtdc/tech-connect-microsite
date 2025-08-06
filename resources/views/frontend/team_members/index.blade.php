@extends('frontend.front-layout')

@section('title', 'Our Team')

@section('content')
<!-- Page Title -->
<div class="page-title" data-aos="fade">
    <div class="heading">
        <div class="container">
            <div class="row d-flex justify-content-center text-center">
                <div class="col-lg-8">
                    <h1>Our Team</h1>
                    <p class="mb-0">Meet the minds shaping DTDC's digital journey and innovation efforts.</p>
                </div>
            </div>
        </div>
    </div>
    <nav class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ route('frontend.index') }}">Home</a></li>
                <li class="current">Our Team</li>
            </ol>
        </div>
    </nav>
</div>
<!-- End Page Title -->

<!-- Team Section -->
<section id="trainers" class="py-5 bg-light">
    <div class="container">
        <div class="row mb-4">
            <div class="col text-center">
                <h2 class="fw-bold">Our Team</h2>
                <p class="text-muted">Meet the people behind our success</p>
            </div>
        </div>
        <div class="row g-4">
            @foreach($teamMembers as $member)
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
    <div class=" border-0 shadow-sm text-center py-4 px-3">
        <div class="mx-auto mb-3" style="width: 120px; height: 120px; overflow: hidden; border-radius: 50%;">
            <img src="{{ env('BASEROW_DOMAIN') . ($member['photo'][0]['url'] ?? '') }}"
                 alt="{{ $member['full_name'] }}"
                 class="img-fluid h-100 w-100 object-fit-cover">
        </div>
        <h5 class="card-title mb-1">{{ $member['full_name'] }}</h5>
        @if(!empty($member['role_title']))
            <small class="text-muted d-block">{{ $member['role_title'] }}</small>
        @endif
        @if(!empty($member['bio']))
            <p class="text-muted mt-2 mb-0" style="font-size: 14px;">
                {{ Str::limit(strip_tags($member['bio']), 100) }}
            </p>
        @endif
    </div>
</div>
            @endforeach
        </div>
    </div>
</section>
<!-- /Team Section -->
@endsection
