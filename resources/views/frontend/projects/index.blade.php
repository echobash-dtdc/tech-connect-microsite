@extends('frontend.front-layout')

@section('title', 'Blogs')

@section('content')
    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Projects</h1>
                        <p class="mb-0">The compliled list of PROJECTS by tech geeks in DTDC.</p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ route('frontend.index') }}">Home</a></li>
                    <li class="current">Projects</li>
                </ol>
            </div>
        </nav>
    </div>
    <!-- End Page Title -->

    <!-- Project Section -->
    <section id="projects" class="courses section">
        <div class="container">
            <div class="row">
                @foreach($projects as $project)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
                        <div class="course-item">
                            <div class="course-content">
                                {{--
                                <div class="d-flex flex-wrap gap-2 mb-3">
                                    @if(!empty($project['Category']['value']))
                                    <span class="badge bg-primary text-white px-3 py-1 rounded-pill">
                                        {{ $project['Category']['value'] }}
                                    </span>
                                    @endif

                                    @foreach($project['Tags'] ?? [] as $tag)
                                    <span class="badge bg-light text-dark border px-3 py-1 rounded-pill">
                                        {{ $tag['value'] ?? '' }}
                                    </span>
                                    @endforeach
                                </div>
                                --}}
                                <h3>
                                    <a href="{{ route('frontend.projects.show', $project['id']) }}">
                                        {{ $project['project_name'] }}
                                    </a>
                                </h3>
                                <p class="description">{{ Str::limit(strip_tags($project['description']), 320) }}</p>
                                {{--
                                <div class="trainer d-flex justify-content-between align-items-center">
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
                @endforeach
            </div>
        </div>
    </section>
    <!-- /Projects Section -->
@endsection