@extends('employee.layouts.home')

@section('css')
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('argon/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('argon/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('argon/css/argon.css?v=1.2.0') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/buttons.css') }}">
@endsection

@section('employee-home')
@component('components.alerts')@endcomponent
<div class="container p-3">
    <div class="row d-flex justify-content-between align-items-center m-2">
        <h2>Medical Record</h2>
        <a href="{{ route('record.index') }}" class="btn btn-sm btn-icon btn-light" type="button">
            <span class="btn-inner--icon"><i class="fas fa-caret-left"></i></span>
        </a>
    </div>
    <ul class="nav nav-pills nav-fill mb-3 2-100">
        <li class="nav-item mb-2">
          <a class="nav-link {{ Route::currentRouteName() == "employee.history.create" ? 'button-active' : 'button'  }}" href="{{ route('employee.history.create') }}">Personal History</a>
        </li>
        <li class="nav-item mb-2">
          <a class="nav-link {{ Route::currentRouteName() == "employee.hospitalization.create" ? 'button-active' : 'button'  }}" href="{{ route('employee.hospitalization.create') }}">Hospitalization</a>
        </li>
        <li class="nav-item mb-2">
          <a class="nav-link {{ Route::currentRouteName() == "employee.medication.create" ? 'button-active' : 'button'  }}" href="{{ route('employee.medication.create') }}">Medications</a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link {{ Route::currentRouteName() == "employee.immunization.create" ? 'button-active' : 'button'  }}" href="{{ route('employee.immunization.create') }}">Immunization</a>
        </li>
    </ul>

    <div class="row p-4 mx-3">
        @yield('create-record-section')
    </div>

</div>

@endsection

@section('js')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{ asset('argon/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('argon/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('argon/vendor/js-cookie/js.cookie.j') }}s"></script>
    <script src="{{ asset('argon/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('argon/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <script src="{{ asset('js/employee-medical-record-index.js') }}"></script>
    <!-- Argon JS -->
    <script src="{{ asset('argon/js/argon.js?v=1.2.0') }}"></script>
@endsection