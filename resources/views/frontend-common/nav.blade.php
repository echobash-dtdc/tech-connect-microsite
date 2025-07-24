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
                        class="{{ request()->routeIs('frontend.index') ? 'active' : '' }}">Home<br></a></li>
                <li><a href="{{ route('frontend.about') }}"
                        class="{{ request()->routeIs('frontend.about') ? 'active' : '' }}">About</a></li>
                <li><a href="{{ route('frontend.blogs.index') }}"
                        class="{{ request()->routeIs('frontend.blogs.index') ? 'active' : '' }}">Blogs</a></li>
                <li><a href="{{ route('frontend.team_members.index') }}"
                        class="{{ request()->routeIs('frontend.team_members.index') ? 'active' : '' }}">Our Team</a></li>
                <li><a href="{{ route('frontend.events') }}"
                        class="{{ request()->routeIs('frontend.events') ? 'active' : '' }}">Events</a></li>
                <li><a href="{{ route('frontend.pricing') }}"
                        class="{{ request()->routeIs('frontend.pricing') ? 'active' : '' }}">Projects</a></li>
                <!-- <li class="dropdown"><a href="#"><span>Dropdown</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="#">Dropdown 1</a></li>
                        <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i
                                    class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a href="#">Deep Dropdown 1</a></li>
                                <li><a href="#">Deep Dropdown 2</a></li>
                                <li><a href="#">Deep Dropdown 3</a></li>
                                <li><a href="#">Deep Dropdown 4</a></li>
                                <li><a href="#">Deep Dropdown 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Dropdown 2</a></li>
                        <li><a href="#">Dropdown 3</a></li>
                        <li><a href="#">Dropdown 4</a></li>
                    </ul>
                </li> -->
                <li><a href="{{ route('frontend.feedback') }}"
                        class="{{ request()->routeIs('frontend.feedback') ? 'active' : '' }}">Feedback</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="btn-getstarted" href="{{ route('frontend.blogs.index') }}">Login</a>

    </div>
</header>