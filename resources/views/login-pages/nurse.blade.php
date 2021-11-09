@extends('layouts.app')

@section('content')

<div class="container d-flex justify-content-center align-items-center">
  <div class="row w-100 d-flex justify-content-center align-items-center">
    <div class="col-md-5 d-flex justify-content-center" >
      <div>
        <h1 style="font-weight: bold; color: black; margin: 0;">Canossa</h1><br>
        <h1 style="font-weight: bold; color: black; margin: 0;">Medical Health<i class="fas fa-stethoscope ml-2" style="color: blue"></i></h1><br>
        <h1 style="font-weight: bold; color: black; margin: 0;">Records</h1>
      </div>
    </div>
    <div class="col-md-5 d-flex justify-content-center">
      <form action="{{ route('nurse.login.submit') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Employee ID</label>
          <input type="text" class="form-control" name="employee_id" id="exampleInputEmail1">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" name="password" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>

@endsection