@extends('admin.layouts.app')

@section('css')
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
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3"  id="destPopuler">
            @forelse ($employees as $employee)
                <a href="{{ route('employee.show', $employee->id) }}" class="emp">
                    <div class="col mb-2">
                        <div class="card"> 
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3 d-flex justify-content-center">
                                        <img src="{{ asset('img/'.$employee->image) }}" width="100">
                                    </div>
                                    <div class="col-8 d-flex flex-column justify-content-center">
                                        <p class="p-0" style="font-size: 1vw; font-weight: bold">{{ $employee->fullName() }}</p>
                                        <p class="m-0 p-0 mb-2">{{ $employee->role }}</p>
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