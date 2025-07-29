<header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

                <a href="{{ route('frontend.index') }}" class="logo d-flex align-items-center me-auto">
                        <!-- Uncomment the line below if you also wish to use an image logo -->
                        <img src="{{ asset('mentor/img/main-logo.png') }}" alt="">
                        <!-- <h1 class="sitename">Mentor</h1> -->
                </a>

                <nav id="navmenu" class="navmenu">
                        <ul>
                                <li><a href="{{ route('frontend.index') }}"
                                                class="{{ request()->routeIs('frontend.index') ? 'active' : '' }}">Home<br></a>
                                </li>
                                <li><a href="{{ route('frontend.about') }}"
                                                class="{{ request()->routeIs('frontend.about') ? 'active' : '' }}">About</a>
                                </li>
                                <li><a href="{{ route('frontend.blogs.index') }}"
                                                class="{{ request()->routeIs('frontend.blogs.index') ? 'active' : '' }}">Blogs</a>
                                </li>
                                <li><a href="{{ route('frontend.team_members.index') }}"
                                                class="{{ request()->routeIs('frontend.team_members.index') ? 'active' : '' }}">Our
                                                Team</a></li>
                                <li><a href="{{ route('frontend.organisation') }}"
                                                class="{{ request()->routeIs('frontend.organisation') ? 'active' : '' }}">Organisation
                                                Structure</a></li>
                                <li><a href="{{ route('frontend.events') }}"
                                                class="{{ request()->routeIs('frontend.events') ? 'active' : '' }}">Events</a>
                                </li>
                                <li><a href="{{ route('frontend.projects.index') }}"
                                                class="{{ request()->routeIs('frontend.projects.index') ? 'active' : '' }}">Projects</a>
                                </li>
                               
                                <li><a href="{{ route('frontend.resource.index') }}"
                                                class="{{ request()->routeIs('frontend.resource.index') ? 'active' : '' }}">Resources</a>
                                </li>

                                <li><a href="{{ route('frontend.feedback') }}"
                                                class="{{ request()->routeIs('frontend.feedback') ? 'active' : '' }}">Feedback</a>
                                </li>


                                @guest
    <li>
        <a class="btn btn-sm btn-outline-light rounded-pill px-3 py-1 fw-semibold" href="{{ route('login') }}">
            <i class="bi bi-box-arrow-in-right me-1"></i> Login
        </a>
    </li>
@endguest

@auth
    <li>
        <div class="dropdown me-3">
            <a class="nav-link dropdown-toggle text-white fw-semibold" href="#" role="button" data-bs-toggle="dropdown">
                <span class="bg-light text-dark px-2 py-1 rounded-pill">
                    {{ ucwords(auth()->user()->name) }}
                </span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li class="dropdown-item text-muted small">
                    <i class="bi bi-person-circle me-1"></i> {{ auth()->user()->email }}
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('auth.logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger fw-semibold">
                            <i class="bi bi-box-arrow-right me-1"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </li>
@endauth

                        </ul>
                        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>

        </div>
</header>