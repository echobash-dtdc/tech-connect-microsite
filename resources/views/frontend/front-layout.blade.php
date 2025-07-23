@include('frontend-common.header')

<body class="index-page">

    @include('frontend-common.nav')

    <main class="main">
        @yield('content')
    </main>

    @include('frontend-common.footer')

</body>

</html>