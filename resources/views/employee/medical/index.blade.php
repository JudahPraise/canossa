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
@endsection

@section('employee-home')
<div class="row d-flex justify-content-center">
    <div class="col-md-11">
        <span class="mt-2">{{ auth()->user()->fullName() }}</span>
        <form action="{{ route('record.index', auth()->user()->id) }}" method="GET" id="schoolYearForm">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlSelect1">Example select</label>
                <select class="form-control" id="exampleFormControlSelect1" name="school_year" onchange="document.getElementById('schoolYearForm').submit()">
                    @foreach ($records as $data)
                        <option value="{{ $data->id }}" {{ $data->id === $record->id ? 'selected' : '' }}>{{ $data->year_from.'-'.$data->year_to }}</option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>
</div>
<div class="row d-flex justify-content-center">
    <div class="col-md-3 shadow bg-white rounded p-3 m-1">
        <div class="row avatar-upload d-flex justify-content-center">
            <x-avatar search=""  />
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
            <div class="col-md-4 mb-2">
                <label for="">Height</label>
                <input type="number" step="0.01" class="form-control" id="height">
                <small class="font-italic text-muted"><span class="text-danger mr-1">*</span>in ft</small>
            </div>
            <div class="col-md-4 mb-2">
                <label>Weight</label>
                <input type="number" step="0.01" class="form-control" id="weight">
                <small class="font-italic text-muted"><span class="text-danger mr-1">*</span>in kl</small>
            </div>
            <div class="col-md-4 mb-2">
                <label for="">Blood Type</label>
                <select class="custom-select" id="validationDefault04" name="type">
                    <option disabled selected>Choose...</option>
                    <option>A</option>
                    <option>O</option>
                    <option>B</option>
                    <option>AB</option>
                    <option>A-</option>
                    <option>O-</option>
                    <option>B-</option>
                    <option>AB-</option>
                </select> 
            </div>
        </div>
    </div>
</div>
<div class="row p-3 d-flex justify-content-center align-items-start">
    <div class="col-md-7 shadow bg-white rounded p-3 m-1">
        @if (!empty($user->diagnosis))
            
        @else
        <h3 class="row m-3">Medical Record</h3>
        <div class="container">
            <div class="row py-2">
              <div class="container-fluid d-flex flex-column align-items-center" data-toggle="modal" data-target="#addModal">
                <img src="{{ asset('svg/undraw_empty_street.svg') }}" alt="" srcset="" height="250" width="250">
                <span>No records found</span>
              </div>
            </div>
        </div>
        @endif
    </div>
    <div class="col-md-4 shadow bg-white rounded p-3 m-2">
        <x-labtestfile :labtest="$record->labtests->first()">
            {{-- <x-slot name="school_year">
                {{ Request::get('school_year') }}
            </x-slot> --}}
        </x-labtestfile>
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
@endsection