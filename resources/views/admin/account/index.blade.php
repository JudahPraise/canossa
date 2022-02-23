@extends('admin.layouts.app')

@section('css')
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('argon/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('argon/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('argon/css/argon.css?v=1.2.0') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/breakpoints.css') }}" type="text/css">
@endsection

@section('home')
  @component('components.alerts')@endcomponent

   <div class="container break-container">
      
      <h2 class="mb-3">Update Account Information</h3>
      <form action="{{ route('admin.account.update', Auth::guard('admin')->user()->id) }}" method="POST">
        @method('PUT')
        @csrf
          <div class="form-group">
            <label for="admin_id">Admin ID</label>
            <input type="text" class="form-control" id="admin_id" name="admin_id" value="{{ Auth::guard('admin')->user()->admin_id }}" readonly>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="password">Password</label>
                <input type="password" id="password" class="form-control" name="password" required>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" class="form-control" required>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
   </div>

@endsection

@section('js')
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{ asset('argon/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('argon/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('argon/vendor/js-cookie/js.cookie.j') }}s"></script>
    <script src="{{ asset('argon/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('argon/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <!-- Argon JS -->
    <script src="{{ asset('argon/js/argon.js?v=1.2.0') }}"></script>
    <script>
      $('#password, #confirm_password').on('keyup', function () {
        
        if($('#password').val() == $('#confirm_password').val()) 
        {
          $('#confirm_password').removeClass('is-invalid')
          $('#confirm_password').addClass('is-valid')
          var html = '<div class="valid-feedback">Looks good!</div>'
          $('.inputs_div').append(html);
        } 
        else if($('#password').val() != $('#confirm_password').val())
        {
          $('#confirm_password').removeClass('is-valid')
          $('#confirm_password').addClass('is-invalid')
        }
      });

    </script>
@endsection