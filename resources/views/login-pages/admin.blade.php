@extends('login-pages.main')

@section('login')
<div class="container">
    <h3>Admin Module</h3>
    <h3 style="font-weight: 600">Welcome Back!</h3>
</div>

<div class="continer w-100 p-lg-2">
    <form method="POST" action="{{ route('admin.login.submit') }}" class="w-100">
        @csrf

        <div class="form-group row">
            <div class="col-md-12">
                <input id="admin_id" type="text" placeholder="Admin ID" class="form-control @error('admin_id') is-invalid @enderror" name="admin_id" value="{{ old('admin_id') }}" required autocomplete="admin_id" autofocus>

                @error('admin_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-12">
                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mb-0 w-100">
            <div class="col-md-8">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>

                @if (Route::has('admin.password.request'))
                    <a class="btn btn-link" href="{{ route('admin.password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </div>
    </form>
</div>
@endsection