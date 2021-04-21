@extends('login-pages.main')

@section('login')
<div class="container">
    <h3>Admin Reset Password</h3>
    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif
</div>

<div class="continer w-100 p-lg-2">
    <form method="POST" action="{{ route('admin.password.email') }}">
        @csrf

        <div class="form-group row">
            <div class="col-md-12">
                <input id="email" type="email" placeholder="Email Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
        </div>
    </form>
</div>

@endsection
