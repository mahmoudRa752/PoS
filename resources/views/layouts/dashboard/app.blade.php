@include('layouts.dashboard.inc.header')

@include('layouts.dashboard._aside')

    @yield('content')

@include('partials._session')

@include('layouts.dashboard.inc.footer')
