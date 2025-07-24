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
                        <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint
                            voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi
                            ratione sint. Sit quaerat ipsum dolorem.</p>
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
                        <img src="{{ ENV('BASEROW_DOMAIN').$blog['banner_image'][0]['url'] ?? '' }}" class="img-fluid" alt="...">
                            <div class="course-content">
                            <div class="d-flex flex-wrap gap-2 mb-3">
                                {{-- Category Badge --}}
                                @if(!empty($blog['Category']['value']))
                                    <span class="badge bg-primary text-white px-3 py-1 rounded-pill">
                                        {{ $blog['Category']['value'] }}
                                    </span>
                                @endif

                                {{-- Tags Badges --}}
                                @foreach($blog['Tags'] ?? [] as $tag)
                                    <span class="badge bg-light text-dark border px-3 py-1 rounded-pill">
                                        {{ $tag['value'] ?? '' }}
                                    </span>
                                @endforeach
                            </div>
                                <h3>
                                    <a href="{{ route('frontend.blogs.show', $blog['id']) }}">
                                        {{ $blog['Title'] }}
                                    </a>
                                </h3>
                                <p class="description">{{ Str::limit(strip_tags($blog['Content']), 120) }}</p>
                                <div class="trainer d-flex justify-content-between align-items-center">
                                    <div class="trainer-profile d-flex align-items-center">
                                        <i class="bi bi-person user-icon"></i>
                                        <a href="#" class="trainer-link">{{ $blog['Author'][0]['value'] ?? '' }}</a>
                                    </div>
                                    <div class="trainer-rank d-flex align-items-center">
                                        <i class="bi bi-person user-icon"></i>&nbsp;{{ $blog['Status']['value'] ?? '' }}
                                        &nbsp;&nbsp;
                                        <i class="bi bi-heart heart-icon"></i>&nbsp;{{ $blog['Views Count'] ?? 0 }}
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