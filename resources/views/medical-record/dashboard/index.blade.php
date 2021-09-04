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
                      <input class="form-control form-control-alternative" type="text" placeholder="Search employee" type="text" id="populerNameKey" onkeyup="myFunction()">
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3"  id="destPopuler">
            @forelse ($users as $user)
                <a href="{{ route('medical.show', $user->id) }}" class="emp">
                    <div class="col mb-2">
                        <div class="card"> 
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
                                            <p class="m-0 p-0 mb-2">{{ $user->role }}</p>
                                            <div class="row d-flex flex-column ml-1">
                                                @forelse ($user->diagnoses as $diagnosis)
                                                    <h4 style="color: black;">Health Problems</h4>
                                                    <div class="row d-flex justify-content-start p-0 m-0">
                                                        @foreach ($diagnosis->problems as $problem)
                                                            <span class="badge badge-pill badge-primary m-1" style="font-size: 1rem">{{ $problem }}</span>
                                                         @endforeach
                                                    </div>
                                                @empty
                                                    <h4 style="color: black;">Health Status</h4>
                                                    <div class="row d-flex justify-content-start p-0 m-0">
                                                        <span class="badge badge-pill badge-success m-1" style="font-size: 1rem">Healthy</span>
                                                    </div>
                                                @endforelse
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script type="application/javascript">
        $(document).ready(function () {
            $("#populerNameKey").on('keyup', function(){
                var value = $(this).val().toLowerCase();
                $("#destPopuler .emp").each(function () {
                    if ($(this).text().toLowerCase().search(value) > -1) {
                        $(this).show();
                        $(this).prev('.country').last().show();
                    } else {
                        $(this).hide();
                    }
                });   
            })
        });
    </script>
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