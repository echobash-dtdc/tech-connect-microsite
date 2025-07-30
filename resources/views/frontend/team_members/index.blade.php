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
<section id="trainers" class="section trainers">
    <div class="container">
        <div class="row gy-5">
            @foreach($teamMembers as $member)
                <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                    <div class="member-img">
                        <img src="{{ env('BASEROW_DOMAIN') . ($member['photo'][0]['url'] ?? '') }}" class="img-fluid" alt="{{ $member['full_name'] }}">
                    </div>
                    <div class="member-info text-center">
                        <h4>{{ $member['full_name'] }}</h4>
                        <span>{{ $member['role_title'] }}</span>
                        <p>{{ Str::limit(strip_tags($member['bio']), 120) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- /Team Section -->
@endsection
