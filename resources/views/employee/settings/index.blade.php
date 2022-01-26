@extends('employee.layouts.home')

@section('css')
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('argon/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('argon/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('argon/css/argon.css?v=1.2.0') }}" type="text/css">
@endsection

@section('employee-home')
    @component('components.alerts')
      
    @endcomponent
    {{-- Header --}}
    <div class="container-fluid m-0 p-0">
          <!-- Page content -->
        <div class="container-fluid mt-3">
            <div class="row">
              <div class="col-xl-12 order-xl-2">
                  <div class="card">
                      <div class="card-header">
                          <div class="row align-items-center">
                            <div class="col-8">
                              <h3 class="mb-0">Update Account Information</h3>
                            </div>
                          </div>
                      </div>
                      <div class="card-body">
                          <form action="{{ route('account.update', Auth::user()->id) }}" method="POST">
                              @method('put')
                              @csrf
                              <h6 class="heading-small text-muted mb-4">User information</h6>
                              <div class="pl-lg-4">
                                <div class="form-row">
                                  <div class="col-md-4 mb-3">
                                    <label for="validationDefault01">Last name</label>
                                    <input type="text" name="lname" class="form-control" id="validationDefault01" value="{{ auth()->user()->lname }}" required>
                                  </div>
                                  <div class="col-md-4 mb-3">
                                    <label for="validationDefault01">First name</label>
                                    <input type="text" name="fname" class="form-control" id="validationDefault01" value="{{ auth()->user()->fname }}" required>
                                  </div>
                                  <div class="col-md-2 mb-3">
                                    <label for="validationDefault01">M.I.</label>
                                    <input type="text" name="mname" class="form-control" id="validationDefault01" value="{{ auth()->user()->mname }}">
                                  </div>
                                  <div class="col-md-2 mb-3">
                                    <label for="validationDefault04">Suffix</label>
                                    <select class="custom-select" name="extname" id="validationDefault04" value="{{ auth()->user()->extname }}">
                                      <option selected disabled value=""></option>
                                      <option>Sr</option>
                                      <option>Jr</option>
                                      <option>I</option>
                                      <option>II</option>
                                      <option>III</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-6">
                                    <div class="form-group">
                                      <label for="exampleFormControlSelect1">Role</label>
                                      <select class="form-control" id="exampleFormControlSelect1" name="role">
                                          <option {{ $employee->role == 'Teacher' ? 'selected' : '' }}>Teacher</option>
                                          <option {{ $employee->role == 'Staff' ? 'selected' : '' }}>Staff</option>
                                          <option {{ $employee->role == 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <div class="form-group">
                                      <label class="form-control-label" for="employee_id">Employee ID</label>
                                      <input type="text" id="employee_id" class="form-control" name="employee_id" value="{{ $employee->employee_id }}" readonly>  
                                    </div>
                                  </div>
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
                                <button class="btn btn-sm btn-success text-right">Update</button>
                              </div>
                          </form>
                      </div>
                  </div>
              {{-- </div> --}}
              </div>  
            </div>
        </div>
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