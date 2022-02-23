@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="area">
            <div class="login-container d-flex justify-content-center" id="loginContainer" style="z-index: 999;">
                 <form class="login-form text-center" id="loginForm" action="{{ route('forgotpass.request.admin') }}" method="POST">
                    @csrf
                     <div class="container mb-4">
                         <img src="{{ asset('img/circle-logo.png') }}" alt="" height="70" width="70">
                         <h2 class="ml-2 mt-1" style="font-weight: bolder; color: #0179C7;">CHRMIS</h2>
                     </div>
                     <h3 class="mb-3 font-weight-light text-uppercase">Forgot Password</h3>
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
                         <input type="text" name="admin_id" class="form-control rounded-pill form-control-lg bg-transparent" placeholder="Admin ID" required>
                     </div>
                     <div class="form-group">
                         <input type="date" name="dob" class="form-control rounded-pill form-control-lg bg-transparent" placeholder="Password" required>
                     </div>
                     <button type="submit" class="btn mt-4 rounded-pill btn-lg btn-custom btn-block text-uppercase" id="btnSubmit">SEND REQUEST</button>
                 </form>
            </div>
            <ul class="circles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
         </div>
    </div>

@endsection

@section('js')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
@endsection