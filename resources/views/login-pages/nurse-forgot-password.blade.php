@extends('layouts.app')

@section('content')

<div class="container d-flex justify-content-center align-items-center">
  <div class="row w-100 d-flex justify-content-center">
    <div class="col-md-5 mb-4">
      <div>
        <h1 style="font-weight: bold; color: black; margin: 0;">Canossa</h1><br>
        <h1 style="font-weight: bold; color: black; margin: 0;">Medical Health<i class="fas fa-stethoscope ml-2" style="color: blue"></i></h1><br>
        <h1 style="font-weight: bold; color: black; margin: 0;">Records</h1>
      </div>
    </div>
    <div class="col-md-5 d-flex justify-content-center">
      <form action="{{ route('nurse.login.submit') }}" method="POST" class="w-100">
        @csrf
        <h2>Forgot Password</h2>
        <p>You have to send request from <a href="{{ route('employeeIndex') }}">employee module</a> to get a new password.</p>
        <a href="{{ route('employeeIndex') }}" class="btn btn-primary text-uppercase">Request Password</a>
      </form>
    </div>
  </div>
</div>

@endsection