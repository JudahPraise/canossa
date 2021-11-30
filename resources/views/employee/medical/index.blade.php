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
    <link rel="stylesheet" href="{{ asset('css/grid.css') }}">
    
    <link rel="stylesheet" href="{{ asset('vendor/datatables/datatables.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('vendor/datatables/responsive.bootstrap.min.css') }}" type="text/css">
@endsection

@section('employee-home')
@component('components.alerts')@endcomponent
<div class="row d-flex justify-content-center p-2">
    <div class="col-md-3 shadow bg-white rounded p-3 m-1 d-flex flex-column justify-content-center">
        <div class="row avatar-upload d-flex justify-content-center">
            <x-avatar :image="$user->image"  />
        </div>
        <div class="row d-flex flex-column align-items-center p-3">
            <h5>{{ auth()->user()->fullName() }}</h5>
            <p>{{ auth()->user()->department }} | {{ auth()->user()->role }}</p>
        </div>
    </div>
    <div class="col-md-8 shadow bg-white rounded p-3 m-1">
        <div class="form-row m-3">
            <div class="col-md-4 mb-2">
                <p style="font-size: .8rem">Gender</p>
                <strong style="font-size: 1.1rem">{{ auth()->user()->sex }}</strong>
            </div>
            <div class="col-md-4 mb-2">
                <p style="font-size: .8rem">Date of birth</p>
                <strong style="font-size: 1.1rem">{{ auth()->user()->dob }}</strong>
            </div>
            <div class="col-md-4 mb-2">
                <p style="font-size: .8rem">Date of birth</p>
                <strong style="font-size: 1.1rem">{{ auth()->user()->getAge() }}</strong>
            </div>
        </div>
        <div class="form-row m-3">
            <div class="col mb-3 d-flex flex-column">
                <p style="font-size: .8rem">Height</p>
                <strong style="font-size: 1.1rem">{{ auth()->user()->height() }}</strong>
            </div>
            <div class="col mb-3 d-flex flex-column">
                <p style="font-size: .8rem">Weight</p>
                <strong style="font-size: 1.1rem">{{ auth()->user()->weight() }}</strong>
            </div>
            <div class="col mb-3 d-flex flex-column">
                <p style="font-size: .8rem">Blood Type</p>
                <strong style="font-size: 1.1rem">{{ auth()->user()->bloodType() }}</strong>
            </div>
        </div>
    </div>
</div>
<div class="row p-3 d-flex justify-content-center align-items-start">
    <div class="col-md-7 shadow bg-white rounded">
        <span class="w-100 d-flex justify-content-between align-items-center">
            <h2 class="m-3">Medical Record</h2>
            <i class="fas fa-ellipsis-h dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
            <div class="dropdown-menu">
                <h6 class="dropdown-header">Add Record</h6>
                <a class="dropdown-item" href="{{ route('employee.history.create') }}">Personal History</a>
                <a class="dropdown-item" href="{{ route('employee.hospitalization.create') }}">Hospitalization</a>
                <a class="dropdown-item" href="{{ route('employee.medication.create') }}">Medications</a>
                <a class="dropdown-item" href="{{ route('employee.immunization.create') }}">Immunization</a>
            </div>
        </span>

        @if (!empty($record))
            <x-medical-history></x-medical-history>
            <x-medication></x-medication>
            <x-hospitalization></x-hospitalization>
            <x-immunization></x-immunization>
        @else
            
        @endif

    </div>

    {{-- Labtest --}}
    <div class="col-md-4">  
        <div class="row">
            <div class="col-md-12 shadow bg-white rounded p-3 mx-2">
                <x-labtestfile></x-labtestfile>
            </div>
        </div>
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
    <!-- Argon JS -->
    <script src="{{ asset('argon/js/argon.js?v=1.2.0') }}"></script>
    <script src="{{ asset('js/employee-medical-record-index.js') }}"></script>

    {{-- DataTable --}}
    <script src="{{ asset('vendor/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.responsive.min.js') }}"></script>

    <script>
        
    </script>
@endsection