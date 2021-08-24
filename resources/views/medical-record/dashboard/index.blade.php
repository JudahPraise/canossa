@extends('medical-record.layouts.home')

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

@section('medical-home')
    <div class="container-fluid p-3">

        <div class="row row-cols-1 row-cols-md-2 d-flex">
            <div class="col">
                <h1>Dashboard</h1>
            </div>
            <div class="col d-flex justify-content-end">
                <div class="form-group w-50">
                    <div class="input-group input-group-alternative mb-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                      </div>
                      <input class="form-control form-control-alternative" placeholder="Search" type="text">
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
            @forelse ($users as $user)
                
                <a href="{{ route('medical.show', $user->id) }}">
                    <div class="col">
                        <div class="card p-2">
                            <div class="card-body">
                                <div class="row">
                                        <div class="col-3 d-flex justify-content-center">
                                            @if (!empty($user->image))
                                                <img src="{{ asset( 'storage/images/'.$user->image) }}" width="100">
                                            @else
                                                <img src="{{ $user->sex === 'F' ? asset('img/default-female.svg') : asset('img/default-male.svg') }}" width="80">
                                            @endif
                                        </div>
                                        <div class="col-8 d-flex flex-column justify-content-center">
                                            <h2 class="m-0 p-0">{{ $user->name }}</h2>
                                            <p class="m-0 p-0">{{ $user->role }}</p>
                                            <div class="row ml-1 d-flex justify-content-between">
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
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

            @empty
                
            @endforelse
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