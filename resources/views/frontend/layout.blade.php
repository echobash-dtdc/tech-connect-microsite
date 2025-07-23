<!DOCTYPE html>
<html lang="en">
@include('frontend-common.header')

<body class="@yield('body-class', 'index-page')">
    @include('frontend-common.nav')
    <main class="main">
        @yield('content')
    </main>
    @include('frontend-common.footer')
</body>

</html>