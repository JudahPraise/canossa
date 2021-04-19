@extends('login-pages.main')


@section('login')
<div class="container p-lg-4">
    <h1 style="font-weight: 600">Welcome Back!</h1>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
</div>

<div class="continer p-lg-4">
    <h5>Log in as</h5>
    <a href="{{ route('student.loginForm') }}" class="btn btn-primary">Student</a>
    <a href="{{ route('employee.loginForm') }}" class="btn btn-secondary">Employee</a>
</div>
@endsection