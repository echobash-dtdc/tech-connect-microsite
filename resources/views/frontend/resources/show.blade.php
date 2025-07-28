@extends('frontend.front-layout')

@section('title', $resource['resource_name'])

@section('content')
    <!-- Resource Details Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-10">
                        <h1>{{ $resource['resource_name'] }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ route('frontend.index') }}">Home</a></li>
                    <li><a href="{{ route('frontend.blogs.index') }}">Resource</a></li>
                    <li class="current">{{ $resource['resource_name'] }}</li>
                </ol>
            </div>
        </nav>
    </div>
    <!-- End Blog Details Page Title -->

    <!-- Blog Details Section -->
    <section id="blog-details" class="courses section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="course-item">
                        <div class="course-content">
                            <h3>{{ $resource['resource_name'] }}:</h3>
                            <p class="description">{!! \Illuminate\Support\Str::markdown($resource['description']) !!}</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Blog Details Section -->
@endsection