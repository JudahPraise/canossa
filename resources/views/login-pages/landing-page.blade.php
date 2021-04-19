@extends('login-pages.main')


@section('login')
<div class="container">
    <h3 style="font-weight: 600">Welcome Back!</h3>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
</div>

<div class="continer w-100 p-lg-2">
    <h5>Log in as</h5>
    <div class="container d-flex flex-column justify-content-center align-items-center w-100 p-sm-0">
        <a href="{{ route('student.login') }}" class="btn btn-primary mb-2 p-2 w-100">Student</a>
        <a href="{{ route('employee.login') }}" class="btn btn-secondary w-100 p-2">Employee</a>
    </div>
</div>
@endsection