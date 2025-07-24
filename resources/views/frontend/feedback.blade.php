@extends('frontend.front-layout')

@section('title', 'Feedback')

@section('content')
    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Feedback</h1>
                        <!-- <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint
                                                                                                                                                                                                                                                                                                                        voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi
                                                                                                                                                                                                                                                                                                                        ratione sint. Sit quaerat ipsum dolorem.</p> -->
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ route('frontend.index') }}">Home</a></li>
                    <li class="current">Feedback</li>
                </ol>
            </div>
        </nav>
    </div>
    <!-- End Page Title -->

    <!-- Feedback Section -->
    <section id="contact" class="contact section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                <div class="col-lg-4">
                    <img src="{{ asset('mentor/img/feedback.jpg') }}" alt="Feedback" class="img-fluid" alt=""
                        style="height:85%;border-radius: 10px;">
                </div>
                <div class="col-lg-8">
                    <form id="feedbackForm" autocomplete="off">
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Your Name*</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Your Name"
                                    required="">
                            </div>
                            <div class="col-md-6 ">
                                <label for="email" class="form-label">Your Email*</label>
                                <input type="email" id="email" class="form-control" name="email" placeholder="Your Email"
                                    required="">
                            </div>
                            <div class="col-md-12">
                                <label for="subject" class="form-label">Select Topics*</label>
                                <select id="subject" class="form-control" name="subject" required="">
                                    <option value="" disabled selected>Select a topic</option>
                                    @foreach ($topics as $id => $value)
                                        <option value="{{ $id }}">{{ $value }}</option>
                                    @endforeach
                                    <!-- Options will be added dynamically -->
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="message" class="form-label">Your Suggestions*</label>
                                <textarea id="message" class="form-control" name="message" rows="6" placeholder="Message"
                                    required=""></textarea>
                            </div>
                            <div class="col-md-12 text-center">
                                <div class="loading" style="display:none;">Loading</div>
                                <!-- Toast will be used instead of these messages -->
                                <button type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <!-- /Feedback Section -->
@endsection

<!-- Bootstrap Toast Container (Top Right) -->
<div aria-live="polite" aria-atomic="true" class="position-fixed top-0 end-0 p-3" style="z-index: 9999">
    <div id="feedbackToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">Feedback</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" id="feedbackToastBody">
            <!-- Message will be injected here -->
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    function showToast(message, isSuccess) {
        var toastBody = document.getElementById('feedbackToastBody');
        toastBody.textContent = message;
        var toastEl = document.getElementById('feedbackToast');
        var header = toastEl.querySelector('.toast-header');
        header.style.backgroundColor = isSuccess ? '#d1e7dd' : '#f8d7da';
        header.style.color = isSuccess ? '#0f5132' : '#842029';
        var toast = new bootstrap.Toast(toastEl);
        toast.show();
    }
    document.addEventListener('DOMContentLoaded', function () {
        // Fetch topics and populate the dropdown


        var form = document.getElementById('feedbackForm');
        if (!form) return;
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            document.querySelector('.loading').style.display = 'block';

            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var message = document.getElementById('message').value;
            var topics = document.getElementById('subject').value;

            var data = {
                name: name,
                email: email,
                message: message,
                topics: parseInt(topics)
            };

            axios.post(
                'https://resolved-silkworm-eminent.ngrok-free.app/api/database/rows/table/779/?user_field_names=true',
                data,
                {
                    headers: {
                        'Authorization': 'Token 4JAQ3YaOALoaGoZ7XBeTNEstfKEmeeFh',
                        'Content-Type': 'application/json'
                    }
                }
            )
                .then(function (response) {
                    document.querySelector('.loading').style.display = 'none';
                    showToast('Your message has been sent. Thank you!', true);
                    form.reset();
                })
                .catch(function (error) {
                    document.querySelector('.loading').style.display = 'none';
                    let msg = error.response && error.response.data && error.response.data.detail
                        ? error.response.data.detail
                        : (error.message || 'Submission failed');
                    showToast(msg, false);
                });
        });


    });
</script>