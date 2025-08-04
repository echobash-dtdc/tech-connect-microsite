<!-- Footer Navigation Section -->
<section id="footer-nav" class="dtdc-footer-nav">
    <div class="container">
        <div class="row">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <h2>Navigate to Key Sections</h2>
                <p class="subtitle">Whether you're a techie, business partner, or a curious learner—get direct access to
                    the
                    tools and insights you need.</p>

                <div class="nav-buttons">
                    <a href="{{ route('frontend.projects.index') }}" class="nav-btn">
                        <i class="bi bi-arrow-repeat"></i>
                        <span>Projects & Capabilities</span>
                    </a>
                    <a href="{{ route('frontend.blogs.index') }}" class="nav-btn">
                        <i class="bi bi-lightbulb"></i>
                        <span>Innovation Hub</span>
                    </a>
                    <a href="{{ route('frontend.blogs.index') }}" class="nav-btn">
                        <i class="bi bi-gear"></i>
                        <span>Engineering Blogs</span>
                    </a>
                    <a href="{{ route('frontend.team_members.index') }}" class="nav-btn">
                        <i class="bi bi-people"></i>
                        <span>Team & Org. Structure</span>
                    </a>
                    <a href="{{ route('frontend.resource.index') }}" class="nav-btn">
                        <i class="bi bi-tools"></i>
                        <span>Tools & Resources</span>
                    </a>
                    <a href="{{ route('frontend.events') }}" class="nav-btn">
                        <i class="bi bi-calendar-event"></i>
                        <span>Events & Updates</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <h2>Inside DTDC Technology</h2>
                <div class="dtdc-tech-content">
                    <div class="tech-image">
                        <img src="{{ asset('mentor/img/course-1.jpg') }}" alt="DTDC Technology" class="tech-img">
                    </div>
                    <div class="tech-text">
                        <p class="description">
                            Our technology team works at the crossroads of logistics, customer experience, and digital
                            innovation.
                        </p>
                        <div class="tech-button-group">
                            <a href="{{ route('frontend.about') }}" class="dtdc-btn">VIEW MORE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="row">
                <div class="col-lg-6">
                    <div class="footer-links">
                        <a href="#">Contact</a>
                        <a href="#">Policy</a>
                        <a href="#">Intranet-only</a>
                    </div>
                    <div class="version-info">
                        <span>Version: 1.0 | Last Updated: June 2025</span>
                    </div>
                    <div class="footer-logo"></div>
                </div>
                <div class="col-lg-6">
                    <div class="feedback-section">
                        <h3>Help Us Improve TechConnect</h3>
                        <p class="feedback-subtitle">This microsite is built for you. Share your feedback, suggest
                            content, or
                            submit your tech ideas.</p>

                        <div class="rating-display">
                            <div class="stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                            </div>
                            <span class="rating-text">4/5 stars</span>
                        </div>

                        <div class="feedback-form">
                            <label class="feedback-label">Additional feedback</label>
                            <div class="feedback-input-group">
                                <textarea placeholder="My feedback!!" class="feedback-textarea"></textarea>
                            </div>
                            <button class="dtdc-btn feedback-submit">SUBMIT FEEDBACK</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</main>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="{{ asset('mentor/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('mentor/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('mentor/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('mentor/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('mentor/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('mentor/vendor/swiper/swiper-bundle.min.js') }}"></script>

<!-- Main JS File -->
<script src="{{ asset('mentor/js/main.js') }}"></script>

@stack('scripts')
</body>

</html>