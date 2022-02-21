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
                 <form class="login-form text-center">
                    @csrf
                     <div class="container mb-4">
                         <img src="{{ asset('img/circle-logo.png') }}" alt="" height="70" width="70">
                         <h2 class="ml-2 mt-1" style="font-weight: bolder; color: #0179C7;">CHRMIS</h2>
                     </div>
                     <h3 class="mb-3 font-weight-light text-uppercase">Request Sent</h3>
                     <p>Other admin will generate new password for you. Kindly contact other admin to get your new password.</p>
                     <a href="{{ route('admin.login') }}"  class="btn mt-4 rounded-pill btn-lg btn-custom btn-block text-uppercase text-white" id="btnSubmit">BACK TO LOGIN</a>
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