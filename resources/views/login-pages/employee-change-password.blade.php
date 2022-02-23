@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
         <div class="col-lg-5 d-flex flex-column justify-content-center align-items-center background p-md-5">
             <div class="container d-flex flex-column align-items-center">
                 <img class="d-none d-lg-block" src="{{ asset('SVG/login_image.svg') }}" alt="" height="400" width="400" />
                 <div class="text-white d-none d-lg-block text-center">
                     <img src="{{ asset('img/circle-logo.png') }}" alt="" height="100" width="100">
                     <h3>CHRMIS</h3>
                     <p>CANOSSA HUMAN RESOURCE AND MEDICAL INFORMATION SYSTEM</p>
                 </div>
             </div>
         </div>
         <div class="col-xs-12 col-lg-7 area">
             <div class="d-flex flex-column justify-content-center align-items-center login-container" style="z-index: 999;">
                 <form class="login-form text-center" action="{{ route('changepass.update', ["id" => $user->id, "reqid" => $password_request->id]) }}" method="POST">
                    @method('PUT')
                    @csrf
                     <div class="container d-flex align-items-center d-lg-none d-sm-block mb-4">
                         <img src="{{ asset('img/circle-logo.png') }}" alt="" height="60" width="60">
                         <h1 class="ml-2 mt-1" style="font-weight: bolder; color: #0179C7;">CHRMIS</h1>
                     </div>
                     <div class="container mb-4">
                         <h1 class="font-weight-bold text-left" style="color: black; font-size: 3rem; letter-spacing: 2px;">Update<br>Password<span class="dot animate__animated animate__bounce" id="dot"></span></h1>
                         {{-- <p>The admin will generate new password for you. Kindly contact the admin to get your new password.</p> --}}
                     </div>

                    @if(session('dob'))
                        <div class="alert alert-danger alert-dismissible fade show animate__animated animate__bounce" role="alert" >
                            <i class="fa-solid fa-exclamation mr-2"></i>
                            {{ session('dob') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @elseif (session('invalid'))
                        <div class="alert alert-danger alert-dismissible fade show animate__animated animate__bounce" role="alert" >
                            <i class="fa-solid fa-exclamation mr-2"></i>
                            {{ session('invalid') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="form-group">
                        <input type="text" name="employee_id" class="form-control rounded-pill form-control-lg bg-transparent" value="{{ $user->employee_id }}"  placeholder="Employee ID" required>
                    </div>
                    <div class="form-group">
                        <input type="date" name="dob" value="{{ old('dob') }}" class="form-control rounded-pill form-control-lg bg-transparent"  placeholder="Employee ID" required>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="password" type="password" placeholder="Password" class="form-control rounded-pill form-control-lg bg-transparent @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="password" type="password" placeholder="Confirm Password" class="form-control rounded-pill form-control-lg bg-transparent @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password">
                        </div>
                    </div>
                    <button type="submit" class="btn mt-4 rounded-pill btn-lg btn-custom btn-block text-uppercase">Change Password</button>
                    <a href="{{ route('employee.logout') }}" class="btn mt-4 rounded-pill btn-lg btn-custom btn-block text-uppercase">Back to log in page</a>
                 </form>
             </div>
          </div>
    </div>
</div>

@endsection

@section('js')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
@endsection