{{-- onclick="event.preventDefault();
document.getElementById('logout-form').submit();"
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form> --}}
@include('layouts.partials.header')
@yield('content')
@include('layouts.partials.footer')
