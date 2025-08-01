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
                                <input type="text" id="from_name" name="from_name" class="form-control"
                                    placeholder="Your Name" required="">
                            </div>
                            <div class="col-md-6 ">
                                <label for="email" class="form-label">Your Email*</label>
                                <input type="from_email" id="from_email" class="form-control" name="from_email"
                                    placeholder="Your Email" required="">
                            </div>
                            <div class="col-md-12">
                                <label for="type" class="form-label">Select feedback Type*</label>
                                <select id="type" class="form-control" name="type" required="">
                                    <option value="" disabled selected>Select Feedback Type</option>
                                    @foreach ($feedbackType as $id => $value)
                                        <option value="{{ $id }}">{{ $value }}</option>
                                    @endforeach
                                    <!-- Options will be added dynamically -->
                                </select>
                            </div>
                            <div class="col-md-6 ">
                                <label for="email" class="form-label">Subject*</label>
                                <input type="text" id="subject" class="form-control" name="subject" placeholder="Subject"
                                    required="">
                            </div>
                            <div class="col-md-12">
                                <label for="message" class="form-label">Your Suggestions*</label>
                                <textarea id="description" class="form-control" name="description" rows="6"
                                    placeholder="Message" required=""></textarea>
                            </div>
                            <div class="col-md-12 text-center">
                                <div class="loading" style="display:none;">Loading</div>
                                <!-- Toast will be used instead of these messages -->
                                <button type="submit" class="send_msg_btn">Send Message</button>
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

            var from_name = document.getElementById('from_name').value;
            var from_email = document.getElementById('from_email').value;
            var description = document.getElementById('description').value;
            var type = document.getElementById('type').value;
            var subject = document.getElementById('subject').value;

            var data = {
                from_name: from_name,
                from_email: from_email,
                description: description,
                type: parseInt(type),
                subject: subject
            };
            var saveFeedbackUrl = "{{ route('feedback.save') }}";
            axios.post(
                saveFeedbackUrl,
                data
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
<style>
    .send_msg_btn {
        color: var(--contrast-color);
        background: var(--accent-color);
        border: 0;
        padding: 10px 30px 12px 30px;
        transition: 0.4s;
        border-radius: 50px;
    }
</style>