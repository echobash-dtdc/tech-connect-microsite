@extends('frontend.front-layout')

@section('title', $releaseNote['title'])

@section('content')
    <!-- Blog Details Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-10">
                        <h1>{{ $releaseNote['title'] }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ route('frontend.index') }}">Home</a></li>
                    <li><a href="#">Release Notes</a></li>
                    <li class="current">{{ $releaseNote['title'] }}</li>
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

                            <h4>{{ $releaseNote['title'] }}</h4>


                            <div class="description blog-content">
                                @php
                                    $content = \Illuminate\Support\Str::markdown($releaseNote['description']);
                                    // Fix markdown image syntax that might not be converted properly
                                    $content = preg_replace('/!\[([^\]]*)\]\(([^)]+)\)/', '<img src="$2" alt="$1" class="img-fluid">', $content);
                                    // Also handle images without alt text

                                @endphp
                                {!! $content !!}
                            </div>
                            <div class="trainer d-flex justify-content-between align-items-center mt-4">
                                <div class="trainer-profile d-flex align-items-center">
                                    <i class="bi bi-person user-icon"></i>
                                    {{ $releaseNote['author'][0]['value'] ?? '' }}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Blog Details Section -->
@endsection
<style>
    .course-content h4 {
        color: black;
    }
</style>