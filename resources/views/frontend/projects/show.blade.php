@extends('frontend.front-layout')

@section('title', $project['title'])

@section('content')
    <!-- Blog Details Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-10">
                        <h1>{{ $project['title'] }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ route('frontend.index') }}">Home</a></li>
                    <li><a href="{{ route('frontend.projects.index') }}">Projects</a></li>
                    <li class="current">{{ $project['title'] }}</li>
                </ol>
            </div>
        </nav>
    </div>
    <!-- End Blog Details Page Title -->

    <!-- Blog Details Section -->
    <section id="blog-details" class="courses section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="course-item">
                        <div class="course-content">
                            {{-- 
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                @if(!empty($blog['Category']['value']))
                                    <span class="badge bg-primary text-white px-3 py-1 rounded-pill">
                                        {{ $blog['Category']['value'] }}
                                    </span>
                                @endif

                                @foreach($blog['Tags'] ?? [] as $tag)
                                    <span class="badge bg-light text-dark border px-3 py-1 rounded-pill">
                                        {{ $tag['value'] ?? '' }}
                                    </span>
                                @endforeach
                            </div>
                            --}}
                            <h3>{{ $project['title'] }}</h3>
                            <p class="description">{!! \Illuminate\Support\Str::markdown($project['description']) !!}</p>
                            {{-- 
                            <div class="trainer d-flex justify-content-between align-items-center mt-4">
                                <div class="trainer-profile d-flex align-items-center">
                                    <i class="bi bi-person user-icon"></i>
                                    <a href="#" class="trainer-link">{{ $project['Author'][0]['value'] ?? '' }}</a>
                                </div>
                                <div class="trainer-rank d-flex align-items-center">
                                    <i class="bi bi-person user-icon"></i>&nbsp;{{ $project['Status']['value'] ?? '' }}
                                    &nbsp;&nbsp;
                                    <i class="bi bi-heart heart-icon"></i>&nbsp;{{ $project['Views Count'] ?? 0 }}
                                </div>
                            </div>
                            --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Project Details Section -->
@endsection