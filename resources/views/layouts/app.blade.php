@extends('layouts.skeleton')
@push('stylesheet')
    @livewireStyles
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush
@section('app')
    <div class="main-wrapper">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            @include('partials.topnav')
        </nav>
        <div class="main-sidebar">
            @include('partials.sidebar')
        </div>

        <!-- Main Content -->
        <div class="main-content">
            @yield('content')
            {{ isset($slot) ? $slot : null }}
        </div>
        <footer class="main-footer">
            @include('partials.footer')
        </footer>
    </div>
@endsection
@push('javascript')
    @livewireScripts
@endpush
