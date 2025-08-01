@extends('frontend.front-layout')

@section('title', 'Events')

@section('content')
    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Resources & Tools</h1>
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
                    <li class="current">Resources & Tools</li>
                </ol>
            </div>
        </nav>
    </div>
    <!-- End Page Title -->

    <!-- Events Section -->
    <section id="events" class="events section">
        <div class="container" data-aos="fade-up">
            <h3>Resources & Tools:</h3>

            <table class="table table-bordered mt-5">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Resource Name</th>
                        <th>Type</th>
                        <!-- <th>Description</th> -->
                        <th>Url/Link</th>
                        <th>Access Instruction</th>
                        <th>Owner Team</th>
                        <th>View</th>
                        <th>Download Resource</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                        // Calculate the starting serial number for the current page:
                        $startSno = ($currentPage - 1) * $pageSize;
                    @endphp

                    @foreach($resources as $resource)
                        <tr>
                            <td>{{ $startSno + $loop->iteration }}</td>
                            <td>{{ $resource['resource_name'] ?? '' }}</td>
                            <td>
                                @if(is_array($resource['type']))
                                    {{-- If 'Type' is an array, join the values with a comma --}}
                                    {{ implode(', ', $resource['type']) }}
                                @else
                                    {{ $resource['type'] ?? '' }}
                                @endif
                            </td>
                            <!-- <td>{{ $resource['description'] ?? '' }}</td> -->
                            <td>{{ $resource['url_link'] ?? '' }}</td>
                            <td>{{ $resource['access_instructions'] ?? '' }}</td>
                            <td>{{ $resource['owner_team'][0]['value'] ?? '' }}</td>
                            <td>

                                <a href="{{ route('frontend.resource.show', $resource['slugs']) }}"
                                    class="btn btn-primary">View</a>
                            </td>
                            <td>
                                @if (!empty($resource['documentation'][0]['url']))
                                    <a href="{{ route('frontend.resource.download', $resource['id']) }}" class="btn btn-primary">
                                        Download
                                    </a>
                                @else
                                    <span class="text-muted">No file</span>
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