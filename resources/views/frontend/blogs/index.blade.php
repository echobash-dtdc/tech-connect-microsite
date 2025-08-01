@extends('frontend.front-layout')

@section('title', 'Blogs')

@section('content')
    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Blogs</h1>
                        <p class="mb-0">The compliled list of tech blogs by tech geeks in DTDC.</p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ route('frontend.index') }}">Home</a></li>
                    <li class="current">Blogs</li>
                </ol>
            </div>
        </nav>
    </div>
    <!-- End Page Title -->

    <!-- Blogs Section -->
    <section id="blogs" class="courses section">
        <div class="container">
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
                        <div class="course-item">
                            @php
                                $bannerUrl = null;
                                if (isset($blog['banner_image'])) {
                                    if (is_array($blog['banner_image']) && count($blog['banner_image']) > 0 && isset($blog['banner_image'][0]['url']) && !empty($blog['banner_image'][0]['url'])) {
                                        $bannerUrl = $blog['banner_image'][0]['url'];
                                    }
                                }
                            @endphp

                            @if($bannerUrl)
                                <img src="{{ env('BASEROW_DOMAIN') . $bannerUrl }}" class="img-fluid"
                                    alt="{{ $blog['title'] ?? 'Blog Post' }}">
                            @else
                                <img src="{{ asset('mentor/img/course-1.jpg') }}" class="img-fluid"
                                    alt="{{ $blog['title'] ?? 'Blog Post' }}">
                            @endif
                            <div class="course-content">
                                <div class="d-flex flex-wrap gap-2 mb-3">
                                    {{-- Category Badge --}}
                                    @if(!empty($blog['category']['value']))
                                        <span class="badge bg-primary text-white px-3 py-1 rounded-pill">
                                            {{ $blog['category']['value'] }}
                                        </span>
                                    @endif

                                    {{-- Tags Badges --}}
                                    @foreach($blog['tags'] ?? [] as $tag)
                                        <span class="badge bg-light text-dark border px-3 py-1 rounded-pill">
                                            {{ $tag['value'] ?? '' }}
                                        </span>
                                    @endforeach
                                </div>
                                <h3>
                                    <a href="{{ route('frontend.blogs.show', $blog['id']) }}">
                                        {{ $blog['title'] }}
                                    </a>
                                </h3>
                                <p class="description">{{ Str::limit(strip_tags($blog['content'] ?? ''), 120) }}</p>
                                <div class="trainer d-flex justify-content-between align-items-center">
                                    <div class="trainer-profile d-flex align-items-center">
                                        <i class="bi bi-person user-icon"></i>
                                        @php
                                            $authorName = 'Unknown Author';
                                            if (isset($blog['author'])) {
                                                if (is_array($blog['author']) && count($blog['author']) > 0 && isset($blog['author'][0]['value'])) {
                                                    $authorName = $blog['author'][0]['value'];
                                                } elseif (is_string($blog['author'])) {
                                                    $authorName = $blog['author'];
                                                }
                                            }
                                        @endphp
                                        <a href="#" class="trainer-link">{{ $authorName }}</a>
                                    </div>
                                    <div class="trainer-rank d-flex align-items-center">
                                        <i class="bi bi-person user-icon"></i>&nbsp;{{ $blog['status']['value'] ?? '' }}
                                        &nbsp;&nbsp;
                                        <i class="bi bi-heart heart-icon"></i>&nbsp;{{ $blog['views_count'] ?? 0 }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /Blogs Section -->
@endsection