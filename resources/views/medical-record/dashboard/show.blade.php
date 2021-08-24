@extends('medical-record.layouts.home')

@section('css')
  {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/orbitcss/css/orbit.css"> --}}
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('argon/vendor/nucleo/css/nucleo.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('argon/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('argon/css/argon.css?v=1.2.0') }}" type="text/css">
@endsection

@section('medical-home')

    <div class="container-fluid p-3">
        <div class="row">
            <div class="col-md-8">
                <div class="row d-flex justify-content-end">
                    <button type="button" class="btn btn btn-primary btn-neutral mr-3 mb-3">Contact</button>
                    <button type="button" class="btn btn-primary mr-3 mb-3">Prescription</button>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-4 mb-3 d-flex justify-content-center"> 
                                @if (!empty($user->image))
                                    <img src="{{ asset( 'storage/images/'.$user->image) }}" height="200" width="200">
                                @else
                                    <img src="{{ $user->sex === 'F' ? asset('img/default-female.svg') : asset('img/default-male.svg') }}" height="200" width="200">
                                @endif
                            </div>
                            <div class="col-md-8 d-flex justify-content-center justify-content-md-start" style="border-bottom: 1px solid grey">
                                <div class="row d-flex flex-column align-items-center align-items-md-start w-75">
                                    <h1>{{ $user->name }}</h1>
                                    <h3>{{ $user->sex === 'M' ? 'Male' : 'Female' }} -  <span>{{ $user->getAge() }}</span></h3>
                                    <div class="row ml-1 mt-2 mb-2 d-flex justify-content-between mb-4 w-100">
                                        <span class="py-sm-2" style="color: grey">
                                            Height <br>
                                            <span id="height" style="color: black">{{ !empty($user->personal->height) ? $user->personal->height.' '.'M' : 'N/A'}}</span>
                                        </span>
                                        <span class="py-sm-2" style="color: grey">
                                            Weight <br>
                                            <span id="weight" style="color: black">{{ !empty($user->personal->weight) ? $user->personal->weight.' '.'KL' : 'N/A' }}</span>
                                        </span>
                                        <span class="py-sm-2" style="color: grey">
                                            BMI <br>
                                            <span id="weight" style="color: black">{{ !empty($user->personal->bmi) ? $user->personal->bmi : 'N/A' }}</span>
                                        </span>
                                        <span class="py-sm-2" style="color: grey">
                                            Blood <br>
                                            <span id="blood" style="color: black">{{ !empty($user->personal->blood_type) ? $user->personal->blood_type : 'N/A' }}</span>        
                                        </span>
                                    </div>
                                    <div class="row ml-1 mb-2 d-flex justify-content-between mb-4 w-100">
                                        <span class="py-sm-2 d-flex flex-column align-items-center" style="color: black">
                                            <img src="{{ asset('img/heart.png') }}" alt="" height="40" width="40">
                                            High BP
                                        </span>
                                        <span class="py-sm-2 d-flex flex-column align-items-center" style="color: black">
                                            <img src="{{ asset('img/injection.png') }}" alt="" height="40" width="40">
                                            On Insulin
                                        </span>
                                        <span class="py-sm-2 d-flex flex-column align-items-center" style="color: black">
                                            <img src="{{ asset('img/bone.png') }}" alt="" height="40" width="40">
                                            Fracture
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 d-flex justify-content-center justify-content-md-start">
                                <h3 class="ml-3">Last checked</h3>
                            </div>
                            <div class="col-md-8 d-flex justify-content-center justify-content-md-start p-0">
                                <p>Dr. Beu Hudson on 23rd Jan 2020</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 d-flex justify-content-center justify-content-md-start">
                                <h3 class="ml-3">Observation</h3>
                            </div>
                            <div class="col-md-8 d-flex justify-content-center justify-content-md-start p-0 text-center text-md-left">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row" style="border-bottom: 1px solid grey">
                            <h2>Medical History</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="row row-cols-2 row-cols-md-4">
                    <div class="col">
                         <div class="card">
                            <div class="card-body">
                            </div>
                         </div>
                    </div>
                    <div class="col">
                         <div class="card">
                            <div class="card-body">
                            </div>
                         </div>
                    </div>
                    <div class="col">
                         <div class="card">
                            <div class="card-body">
                            </div>
                         </div>
                    </div>
                    <div class="col">
                         <div class="card">
                            <div class="card-body">
                            </div>
                         </div>
                    </div>
                </div>
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