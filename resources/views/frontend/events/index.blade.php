@extends('frontend.front-layout')

@section('title', 'Events')

@section('content')
    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Events</h1>
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
                    <li class="current">Events</li>
                </ol>
            </div>
        </nav>
    </div>
    <!-- End Page Title -->

    <!-- Events Section -->
    <section id="events" class="events section">
        <div class="container" data-aos="fade-up">
            <h3>Upcoming Events:</h3>

            <table class="table table-bordered mt-5">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Event Name</th>
                        <th>Event Type</th>
                        <th>Description</th>
                        <th>Date & Time</th>
                        <th>Duration</th>
                        <th>Location</th>
                        <th>Organizer</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                        // Calculate the starting serial number for the current page:
                        $startSno = ($currentPage - 1) * $pageSize;
                    @endphp

                    @foreach($events as $event)
                        <tr>
                            <td>{{ $startSno + $loop->iteration }}</td>
                            <td>{{ $event['event_name'] ?? '' }}</td>
                            <td>
                                @if(is_array($event['type']))
                                    {{ implode(', ', $event['type']) }}
                                @else
                                    {{ $event['type'] ?? '' }}
                                @endif
                            </td>
                            <td>{{ $event['description'] ?? '' }}</td>
                            <td>
                                @if(!empty($event['date_time']))
                                    {{ \Carbon\Carbon::parse($event['date_time'])->setTimezone('Asia/Kolkata')->format('M d, Y, h:i A') }}
                                @endif
                            </td>
                            <td>{{ $event['duration'] ?? '' }}</td>
                            <td>{{ $event['location_link'] ?? '' }}</td>
                            <td>
                                @if(is_array($event['organizer']))
                                                {{ implode(', ', array_map(function ($org) {
                                    return is_array($org) ? ($org['value'] ?? '') : $org; }, $event['organizer'])) }}
                                @else
                                    {{ $event['organizer'] ?? '' }}
                                @endif
                            </td>

                        </tr>
                    @endforeach
                </tbody>

            </table>
            {{-- Pagination Controls --}}
            @if(isset($lastPage) && $lastPage > 1)
                <nav aria-label="Event pagination">
                    <ul class="pagination justify-content-center mb-0">
                        {{-- Previous Page Link --}}
                        <li class="page-item {{ $currentPage == 1 ? 'disabled' : '' }}">
                            <a class="page-link" href="?page={{ $currentPage - 1 }}" tabindex="-1">&laquo;</a>
                        </li>
                        {{-- Page Number Links --}}
                        @for($page = 1; $page <= $lastPage; $page++)
                            <li class="page-item {{ $page == $currentPage ? 'active' : '' }}">
                                <a class="page-link" href="?page={{ $page }}">{{ $page }}</a>
                            </li>
                        @endfor
                        {{-- Next Page Link --}}
                        <li class="page-item {{ $currentPage == $lastPage ? 'disabled' : '' }}">
                            <a class="page-link" href="?page={{ $currentPage + 1 }}">&raquo;</a>
                        </li>
                    </ul>
                </nav>
            @endif
        </div>
    </section>
    <!-- /Events Section -->
@endsection