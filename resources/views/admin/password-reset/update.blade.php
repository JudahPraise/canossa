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

<div class="container w-75">

    <h1>Password Reset</h1>
    <hr>
    <h3>{{ $request->category == 'admin' ? 'Admin' : 'Employee' }} Information</h3>
    <div class="row row-cols-md-2">
        <div class="col-8">
            <span>Name</span>
            <h3>{{ $employee->fullName() }}</h3>
            <span>Employee ID</span>
            <h3>{{ $employee->employee_id }}</h3>
        </div>
        <div class="col-4">
            <div class="col d-flex justify-content-end align-items-center">
                @if (!empty($employee->image))
                    <img src="{{ asset( 'storage/images/'.$employee->image) }}" width="130">
                @else
                    <img src="{{ $employee->sex === 'F' ? asset('img/default-female.svg') : asset('img/default-male.svg') }}" width="100">
                @endif
            </div>
        </div>
    </div>
    <hr>

    <!-- Confirm Modal -->
    <div class="modal fade" id="confirmModalPasswordUpdate" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="confirmModalLabel">Confirm Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form id="confirmForm" action="{{ route('passwordreset.update', ['id' => $request->id, 'category' => $request->category]) }}" method="POST">
                @method("PUT")
                  @csrf
                  <input type="text" id="updatedPassword" name="newPassword" hidden>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                  </div>
              </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="document.getElementById('confirmForm').submit()">Confirm</button>
          </div>
        </div>
      </div>
    </div>

    <form onsubmit="return false">
      <div class="form-row mb-3">
        <label for="admPass">Password</label>
        <div class="input-group is-invalid">
            <input type="text" class="form-control" id="newPass" placeholder="Password" style="font-weight: bold; color: black;" required>
            <div class="input-group-append">
               <button type="button" class="btn btn-success" type="button" id="generatePassword">Generate</button>
            </div>
        </div>
      </div>
      <div class="row w-100 d-flex justify-content-center p-3">
          <button class="btn btn-primary text-center" data-toggle="modal" data-target="#confirmModalPasswordUpdate" id="updateBtn">Update Password</button>
      </div>
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
      const generatePassword = document.getElementById('generatePassword');
      const updateBtn = document.getElementById('updateBtn');

      generatePassword.addEventListener('click', function (){
        var gen_pass = Math.random().toString(36).slice(-8);
        document.getElementById('newPass').value = gen_pass;
      });

      updateBtn.addEventListener('click', function() {
        document.getElementById('updatedPassword').value = document.getElementById('newPass').value;
      })
    </script>
@endsection