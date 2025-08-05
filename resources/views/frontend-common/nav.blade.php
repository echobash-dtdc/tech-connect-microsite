<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top dtdc-header">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="{{ route('frontend.index') }}" class="logo d-flex align-items-center me-auto">
                <div class="dtdc-logo">

                </div>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('frontend.index') }}"
                            class="{{ request()->routeIs('frontend.index') ? 'active' : '' }}">Home<br></a>
                    </li>

                    <li><a href="{{ route('frontend.blogs.index') }}"
                            class="{{ request()->routeIs('frontend.blogs.*') ? 'active' : '' }}">Blogs</a>
                    </li>
                    <li><a href="{{ route('frontend.team_members.index') }}"
                            class="{{ request()->routeIs('frontend.team_members.*') ? 'active' : '' }}">Our
                            Team</a></li>
                    <li><a href="{{ route('frontend.organisation') }}"
                            class="{{ request()->routeIs('frontend.organisation') ? 'active' : '' }}">Organisation
                            Structure</a></li>
                    <li><a href="{{ route('frontend.events') }}"
                            class="{{ request()->routeIs('frontend.events') ? 'active' : '' }}">Events</a>
                    </li>
                    <li><a href="{{ route('frontend.projects.index') }}"
                            class="{{ request()->routeIs('frontend.projects.*') ? 'active' : '' }}">Projects</a>
                    </li>

                    <li><a href="{{ route('frontend.resource.index') }}"
                            class="{{ request()->routeIs('frontend.resource.*') ? 'active' : '' }}">Resources</a>
                    </li>

                    <li><a href="{{ route('frontend.feedback') }}"
                            class="{{ request()->routeIs('frontend.feedback') ? 'active' : '' }}">Feedback</a>
                    </li>
                    <li>
                        @auth
                            <div class="dropdown">
                                <a class="nav-link dropdown-toggle text-white fw-semibold" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="text-white px-3 py-2 rounded-pill shadow-sm"
                                        style="background-color: #0e2c53;">
                                        <i class="bi bi-person-circle me-1"></i>
                                        {{ ucwords(auth()->user()->name) }}
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end shadow">
                                    <li class="dropdown-item text-muted small">
                                        <i class="bi bi-envelope me-1"></i> {{ auth()->user()->email }}
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('auth.logout') }}" class="d-inline">
                                            @csrf
                                            <button type="submit" class="dropdown-item text-danger fw-semibold">
                                                <i class="bi bi-box-arrow-right me-1"></i> Logout
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <a class="btn btn-sm btn-outline-light rounded-pill px-3 py-1 fw-semibold login-btn"
                                href="{{ route('login') }}">
                                <i class="bi bi-box-arrow-in-right me-1"></i> Login
                            </a>
                        @endauth
                    </li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <!-- <a class="btn-getstarted dtdc-btn" href="courses.html">Get Started</a> -->

        </div>
    </header>