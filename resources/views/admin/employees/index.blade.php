@extends('admin.layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/orbitcss/css/orbit.css">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('argon/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('argon/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('argon/css/argon.css?v=1.2.0') }}" type="text/css">
@endsection

@section('home')
    <div class="container-fluid is-desktop-up">
        <div class="row d-flex flex-column">
            <div class="col-md-4" style="position: fixed"> 
                <div class="card" style="height: 90vh; width: 90%;">
                    <div class="card-header">Employees</div>
                    <div class="card-body p-0 m-0">
                        <div class="list-group">
                            @foreach ($employees as $employee)
                                <a href="{{ route('employee.show', $employee->id) }}" class="list-group-item list-group-item-action d-flex">
                                    <div class="image is-rounded is-tiny-square">
                                        <img src="https://orbitcss.com/img/square.png">
                                    </div>
                                    <div class="ml-3">
                                        <h4 class="m-0">{{ $employee->name }}</h4>
                                        <span style="font-size: .8rem">{{ $employee->email }}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                  </div>
            </div>
            <div class="col-md-8 align-self-end">
                @yield('employee')
            </div>
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