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
    <div class="container-fluid p-3">
        <div class="row row-cols-1 row-cols-md-2 d-flex align-items-center px-3 mb-3">
            <div class="col-6 col-md-6 m-0">
                <h2 class="mb-0">Employees</h2>
            </div>
            <div class="col-6 col-md-6 d-flex justify-content-sm-end p-0">
                <form class="navbar-search-light form-inline" id="navbar-search-main">
                  <div class="form-group mb-0  w-100">
                    <div class="input-group input-group-alternative w-100">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                      </div>
                      <input class="form-control" placeholder="Search" type="text" id="populerNameKey" onkeyup="myFunction()">
                    </div>
                  </div>
                </form>
            </div>
        </div>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4" id="destPopuler">
            @forelse ($employees as $employee)
            <div class="col mb-4">
                <div class="card p-0">
                    <img class="card-img-top" src="{{ asset('img/cover.jpg') }}" alt="Card image cap">
                    <div class="card-profile-image avatar-upload">
                       @if (!empty($employee->image))
                            <a href="#">
                                <img src="{{ asset('storage/images/'.$employee->image) }}" class="rounded-circle" style="height: 140px; width: 200px; overflow: hidden;">
                            </a>
                       @else
                            <a href="#">
                                <img src="{{ asset($employee->sex === 'M' ? 'img/default-male.svg' : 'img/default-female.svg') }}" class="rounded-circle" style="height: 140px; width: 200px; overflow: hidden;">
                            </a>
                       @endif
                    </div>
                    <div class="card-body mt-4">
                        <div class="row d-flex flex-column m-2" style="height: 10rem">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center">
                                    <div class="text-center">
                                        <h3>
                                          {{ $employee->name }}
                                        </h3>
                                        <h5>
                                            {{ $employee->role }}
                                        </h5>
                                        <h5>
                                           {{ $employee->department }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <a href="{{ route('employee.show', $employee->id) }}" class="btn btn-sm btn-primary">View profile</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <div class="row text-center">
                    <p>No employees yet</p>
                </div>
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
            $("#destPopuler .col").each(function () {
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