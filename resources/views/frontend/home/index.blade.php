@extends('frontend.front-layout')

@section('title', 'DTDC Tech - TechConnect')

@section('content')
    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">
            <img src="{{ asset('mentor/img/Vector.png') }}" alt="" data-aos="fade-in" class="aos-init aos-animate">
            <div class="container">
                <h2 data-aos="fade-up" data-aos-delay="100" class="aos-init aos-animate">Learning Today,<br>Leading Tomorrow
                </h2>
                <p data-aos="fade-up" data-aos-delay="200" class="aos-init aos-animate">We are team of talented designers
                    making
                    websites with Bootstrap</p>
                <div class="d-flex mt-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                    <!-- <a href="{{ route('frontend.blogs.index') }}" class="btn-get-started">Get Started</a> -->
                    <a href="#" class="dtdc-btn">EXPLORE MORE →</a>
                </div>
            </div>
        </section>

        <!-- Leadership Message Section -->
        <section id="leadership" class="dtdc-leadership">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 text-center" data-aos="fade-up" data-aos-delay="100">
                        <img src="{{ env('BASEROW_DOMAIN') . $leadershipMessage['author_info']['author_photo_url'] }}"
                            alt="{{ $leadershipMessage['author_info']['full_name']}}" class="profile-img">
                    </div>
                    <div class="col-lg-8">
                        <br>
                        <h2>{{ $leadershipMessage['title'] }}</h2>
                        <p class="message">
                            {{ $leadershipMessage['description'] }}
                        </p>
                        <div class="signature">
                            <strong>{{ $leadershipMessage['author_info']['full_name'] }}</strong>
                            <span>{{ $leadershipMessage['author_info']['role_title'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Release Notes Section -->
        <section id="release-notes" class="dtdc-release-notes">
            <div class="container">
                <div class="mb-5" data-aos="fade-up">
                    <h2>Release Notes</h2>
                    <p class="intro">Explore solutions that are redefining operations, efficiency, and customer experience
                        at
                        DTDC.</p>
                </div>

                <div class="release-carousel">
                    <div class="release-carousel-container">
                        <div class="release-carousel-wrapper" id="release-carousel-container">
                            @foreach($releaseNotes as $index => $note)
                                <div class="release-card" data-aos="fade-up" data-aos-delay="{{ 100 + ($index * 100) }}">
                                    <div class="dtdc-card">
                                        <h3>{{ \Illuminate\Support\Str::limit($note['title'], 50) }}</h3>
                                        <div class="meta">
                                            <span>
                                                <i class="bi bi-person"></i>
                                                {{ $note['author_info']['author_full_name'] ?? 'Unknown Author' }}
                                            </span>
                                            <span>
                                                <i class="bi bi-calendar"></i>
                                                {{ \Carbon\Carbon::parse($note['release_date'])->format('D, d M y, g:i A') }}
                                            </span>
                                        </div>
                                        <p class="description">
                                            {!! \Illuminate\Support\Str::limit(strip_tags($note['description']), 150) !!}
                                        </p>
                                        <a href="{{ route('frontend.release_notes.show', $note['slug']) }}"
                                            class="dtdc-btn">VIEW
                                            MORE →</a>





                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="carousel-controls">
                    <div class="dtdc-dots" id="release-dots">
                        <div class="dot active" data-slide="0"></div>
                        <div class="dot" data-slide="1"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Projects Section -->
        <section id="featured" class="dtdc-featured">
            <div class="container">
                <div class="mb-5" data-aos="fade-up">
                    <h2>Featured Projects & Capabilities</h2>
                    <p class="intro">Explore solutions that are redefining operations, efficiency, and customer experience
                        at
                        DTDC.</p>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="dtdc-project-card">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ asset('mentor/img/course-1.jpg') }}" alt="MyDTDC POS & Bazaar"
                                        class="project-img">
                                </div>
                                <div class="col-md-8">
                                    <h3>MyDTDC POS & Bazaar</h3>
                                    <p class="description">
                                        A modern Point-of-Sale system designed for DTDC's retail and franchise network.
                                        Enables digital
                                        booking, inventory management, and supports product listing for e-commerce
                                        fulfillment via MyDTDC
                                        Bazaar.
                                    </p>
                                    <a href="#" class="dtdc-btn">VIEW MORE →</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="dtdc-project-card">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ asset('mentor/img/course-2.jpg') }}" alt="MyDTDC POS & Bazaar"
                                        class="project-img">
                                </div>
                                <div class="col-md-8">
                                    <h3>MyDTDC POS & Bazaar</h3>
                                    <p class="description">
                                        A modern Point-of-Sale system designed for DTDC's retail and franchise network.
                                        Enables digital
                                        booking, inventory management, and supports product listing for e-commerce
                                        fulfillment via MyDTDC
                                        Bazaar.
                                    </p>
                                    <a href="#" class="dtdc-btn">VIEW MORE →</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="dtdc-project-card">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ asset('mentor/img/course-3.jpg') }}" alt="MyDTDC POS & Bazaar"
                                        class="project-img">
                                </div>
                                <div class="col-md-8">
                                    <h3>MyDTDC POS & Bazaar</h3>
                                    <p class="description">
                                        A modern Point-of-Sale system designed for DTDC's retail and franchise network.
                                        Enables digital
                                        booking, inventory management, and supports product listing for e-commerce
                                        fulfillment via MyDTDC
                                        Bazaar.
                                    </p>
                                    <a href="#" class="dtdc-btn">VIEW MORE →</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="dtdc-project-card">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ asset('mentor/img/course-1.jpg') }}" alt="MyDTDC POS & Bazaar"
                                        class="project-img">
                                </div>
                                <div class="col-md-8">
                                    <h3>MyDTDC POS & Bazaar</h3>
                                    <p class="description">
                                        A modern Point-of-Sale system designed for DTDC's retail and franchise network.
                                        Enables digital
                                        booking, inventory management, and supports product listing for e-commerce
                                        fulfillment via MyDTDC
                                        Bazaar.
                                    </p>
                                    <a href="#" class="dtdc-btn">VIEW MORE →</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4" data-aos="fade-up" data-aos-delay="500">
                    <a href="{{ route('frontend.projects.index') }}" class="dtdc-btn">SEE ALL PROJECTS →</a>
                </div>
            </div>
        </section>

        <!-- Latest Blog Posts Section -->
        <section id="blog-posts" class="dtdc-blog-posts">
            <div class="container">
                <div class="d-flex align-items-center mb-5" data-aos="fade-up">
                    <h2>Latest Blog Posts</h2>
                </div>

                <div class="row">
                    <!-- Large Blog Post -->
                    <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="dtdc-blog-card large">
                            <div class="blog-image">

                            </div>
                            <div class="blog-content">
                                <h3>AWARDED AS GREAT PLACE TO WORK FOR SIXTH TIME IN A ROW</h3>
                                <div class="meta">
                                    <span><i class="bi bi-calendar"></i> Fri, 18 Apr 25, 6:30 PM</span>
                                </div>
                                <p class="description">
                                    A modern Point-of-Sale system designed for DTDC's retail and franchise network. Enables
                                    digital
                                    booking, inventory management, and supports product listing for e-commerce fulfillment
                                    via MyDTDC
                                    Bazaar.
                                </p>
                                <a href="#" class="dtdc-btn">EXPLORE MORE →</a>
                            </div>
                        </div>
                    </div>

                    <!-- Small Blog Posts -->
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-12 mb-4" data-aos="fade-up" data-aos-delay="200">
                                <div class="dtdc-blog-card small">
                                    <img src="{{ asset('mentor/img/trainers/trainer-1.jpg') }}" alt="DTDC CMD"
                                        class="blog-img">
                                    <div class="blog-content">
                                        <h4>DTDC'S CMD SPEAKS ABOUT FUTURE OF LOGISTICS</h4>
                                        <div class="meta">
                                            <span><i class="bi bi-calendar"></i> Fri, 18 Apr 25, 6:30 PM</span>
                                        </div>
                                        <p class="description">
                                            A modern Point-of-Sale system designed...
                                        </p>
                                        <a href="#" class="dtdc-btn">EXPLORE MORE →</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12" data-aos="fade-up" data-aos-delay="300">
                                <div class="dtdc-blog-card small">
                                    <img src="{{ asset('mentor/img/trainers/trainer-2.jpg') }}" alt="Women's Branch"
                                        class="blog-img">
                                    <div class="blog-content">
                                        <h4>OPENING OF ALL WOMEN'S BRANCH IN THANE</h4>
                                        <div class="meta">
                                            <span><i class="bi bi-calendar"></i> Fri, 18 Apr 25, 6:30 PM</span>
                                        </div>
                                        <p class="description">
                                            A modern Point-of-Sale system designed...
                                        </p>
                                        <a href="#" class="dtdc-btn">EXPLORE MORE →</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4" data-aos="fade-up" data-aos-delay="400">
                    <a href="{{ route('frontend.blogs.index') }}" class="dtdc-btn">READ MORE →</a>
                </div>
            </div>
        </section>

    </main>
@endsection

@push('scripts')
    <!-- Carousel JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const carouselContainer = document.getElementById('release-carousel-container');
            const dots = document.querySelectorAll('#release-dots .dot');

            let currentSlide = 0;
            const cardsPerSlide = 4; // Show exactly 4 cards per slide
            const totalCards = 8;
            const totalSlides = Math.ceil(totalCards / cardsPerSlide);

            // Initialize carousel
            function initCarousel() {
                updateCarousel();
                startAutoSlide();
            }

            // Update carousel position
            function updateCarousel() {
                const cardWidth = 300; // Card width
                const gapWidth = 20; // Gap between cards
                const slideWidth = (cardWidth * 4) + (gapWidth * 3); // 4 cards + 3 gaps
                const translateX = -currentSlide * slideWidth;
                carouselContainer.style.transform = `translateX(${translateX}px)`;

                // Update dots
                dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === currentSlide);
                });
            }

            // Next slide
            function nextSlide() {
                if (currentSlide < totalSlides - 1) {
                    currentSlide++;
                    updateCarousel();
                } else {
                    // Loop back to first slide
                    currentSlide = 0;
                    updateCarousel();
                }
            }

            // Go to specific slide
            function goToSlide(slideIndex) {
                currentSlide = slideIndex;
                updateCarousel();
            }

            // Auto slide functionality
            let autoSlideInterval;

            function startAutoSlide() {
                autoSlideInterval = setInterval(() => {
                    nextSlide();
                }, 5000); // Change slide every 5 seconds
            }

            function stopAutoSlide() {
                clearInterval(autoSlideInterval);
            }

            // Event listeners for dots
            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    goToSlide(index);
                    stopAutoSlide();
                    startAutoSlide();
                });
            });

            // Pause auto-slide on hover
            carouselContainer.addEventListener('mouseenter', stopAutoSlide);
            carouselContainer.addEventListener('mouseleave', startAutoSlide);

            // Initialize carousel
            initCarousel();
        });
    </script>
@endpush