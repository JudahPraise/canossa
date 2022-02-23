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
<div class="container w-75">

    <h1>Password Request</h1>
    <div class="table-responsive">
        <table class="table align-items-center table-flush" id="myTable">
          <thead>
            <tr class="border" style="color: black">
              <th scope="col">Name</th>
              <th scope="col">Employee ID</th>
              <th scope="col">Category</th>
              <th scope="col">Status</th>
              <th scope="col">Change by</th>
              <th scope="col">Updated at</ths>
              <th scope="col">Action</th>
            </tr>
         </thead>
         <tbody>
           @foreach ($requests as $request)
             <tr class="border">
               <td>{{ $request->name }}</td>
               <td>{{ $request->employee_id  }}</td>
               <td>{{ $request->category }}</td>
               <td>{{ $request->status }}</td>
               <td>{{ $request->change_by }}</td>
               <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $request->updated_at)->format('Y-m-d') }}</td>
               <td>
                 <button class="btn btn-sm btn-changepass {{ $request->status == 'pending' ? 'btn-success' : 'btn-light' }}" {{ $request->status == 'pending' ? '' : 'disabled' }} data-id="{{ $request->id }}" data-toggle="modal" data-target="#confirmModalPasswordReset">{{ $request->status == 'pending' ? 'Change Password' : 'Done' }}</button>
               </td>
             </tr>
           @endforeach
          </tbody>
        </table>
    </div>

    <!-- Confirm Modal -->
    <div class="modal fade" id="confirmModalPasswordReset" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="confirmModalLabel">Confirm Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form id="confirmFormResetPass" method="POST">
                  @csrf
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                  </div>
              </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="document.getElementById('confirmFormResetPass').submit()">Confirm</button>
          </div>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
      $(document).ready(function () {
        $('.btn-changepass').each(function(){
          $(this).on("click", function(event){
            $('#confirmFormResetPass').attr("action", "/admin/password-reset/confirm/"+$(this).data('id')+"")
          });
        })
      })
    </script>
@endsection