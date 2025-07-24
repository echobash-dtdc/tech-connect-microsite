@extends('frontend.front-layout')

@section('title', $blog['title'])

@section('content')
    <!-- Blog Details Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>{{ $blog['title'] }}</h1>
                        <p class="mb-0">{{ $blog['description'] }}</p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ route('frontend.index') }}">Home</a></li>
                    <li><a href="{{ route('frontend.blogs.index') }}">Blogs</a></li>
                    <li class="current">{{ $blog['title'] }}</li>
                </ol>
            </div>
        </nav>
    </div>
    <!-- End Blog Details Page Title -->

    <!-- Blog Details Section -->
    <section id="blog-details" class="courses section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="course-item">
                        <img src="{{ asset($blog['image']) }}" class="img-fluid mb-4" alt="...">
                        <div class="course-content">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <p class="category">{{ $blog['category'] }}</p>
                                <p class="price">{{ $blog['price'] ?? '' }}</p>
                            </div>
                            <h3>{{ $blog['title'] }}</h3>
                            <p class="description">{{ $blog['description'] }}</p>
                            <div class="trainer d-flex justify-content-between align-items-center mt-4">
                                <div class="trainer-profile d-flex align-items-center">
                                    <img src="{{ asset($blog['author_image']) }}" class="img-fluid" alt="">
                                    <span class="trainer-link ms-2">{{ $blog['author_name'] }}</span>
                                </div>
                                <div class="trainer-rank d-flex align-items-center">
                                    <i class="bi bi-person user-icon"></i>&nbsp;{{ $blog['users_count'] ?? 0 }}
                                    &nbsp;&nbsp;
                                    <i class="bi bi-heart heart-icon"></i>&nbsp;{{ $blog['likes_count'] ?? 0 }}
                                </div>
                            </div>
                            <hr>
                            <div class="blog-main-content mt-4">
                                <h4>Main Content</h4>
                                <p>This is a placeholder for the main blog content. You can add more detailed information about the blog here.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Blog Details Section -->
@endsection