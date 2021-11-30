@extends('employee.portfolio.index')

@section('css')
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('argon/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('argon/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('argon/css/argon.css?v=1.2.0') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/scrollbar.css') }}">
@endsection

@section('portfolio')

<div class="container-fluid p-2">
    @component('components.alerts')@endcomponent
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col">
              <h1 class="mb-0">Personal Information</h1>
            </div>
            <div class="col text-right">
                <a href="{{ url()->current() === route('personal.index') ? route('portfolio.index', 'card') : route('personal.index') }}" class="btn btn-sm btn-icon btn-light" type="button">
                    <span class="btn-inner--icon"><i class="fas fa-caret-left"></i></span>
                </a>

                @if (url()->current() != route('personal.create'))
                    <a href="{{ route('personal.edit', Auth::user()->id) }}" class="btn btn-sm btn-icon btn-info" type="button">
                        <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                    </a>
                @endif
            </div>
        </div>
    </div>
    
    <div class="row p-4">
        @yield('personal')
    </div>
</div>
@endsection