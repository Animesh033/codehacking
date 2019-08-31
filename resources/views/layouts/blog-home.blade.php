@include('includes.front-header')
<!-- Navigation -->
@include('includes.front-nav')

@include('includes.errors')
@include('includes.flash-messages')

@yield('content')

@include('includes.front-footer')
