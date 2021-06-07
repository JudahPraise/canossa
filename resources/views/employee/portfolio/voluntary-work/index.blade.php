@extends('employee.portfolio.index')

@section('css')
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('argon/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('argon/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('argon/css/argon.css?v=1.2.0') }}" type="text/css">
@endsection

@section('portfolio')

<div class="container-fluid">
    <div class="row">
        <div class="col-6 d-flex align-items-center" style="height: 4rem;">
          <h2 class="font-weight-bold" style="color: black">Voluntary Works</h2>
        </div>
        <div class="col-6 d-flex justify-content-end align-items-center" style="height: 4rem;">
            <a href="{{ route('portfolio.index', 'card') }}" class="btn btn-icon btn-secondary btn-sm" type="button">
                <span class="btn-inner--icon"><i class="fas fa-caret-left"></i></span>
            </a>
            <a href="{{ route('voluntary.create') }}" class="btn btn-icon btn-success btn-sm" type="button">
                <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
            </a>
            <a href="{{ route('voluntary.edit', Auth::user()->id) }}" class="btn btn-icon btn-info btn-sm" type="button">
                <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
            </a>
        </div>
    </div>
    
    <div class="row">
        @yield('voluntary')
    </div>
</div>
@endsection

@section('js')
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{ asset('argon/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('argon/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('argon/vendor/js-cookie/js.cookie.j') }}s"></script>
    <script src="{{ asset('argon/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('argon/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <!-- Argon JS -->
    <script src="{{ asset('argon/js/argon.js?v=1.2.0') }}"></script>
@endsection