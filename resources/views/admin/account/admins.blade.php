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
        <div class="row px-3 mb-3 d-flex justify-content-between">
          <h2 class="mb-3">Manage Admins</h3>
          @if ($admins->count() == 4)
            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal">Add Admin</button>
          @else
            <button class="btn btn-sm btn-success"><a href="{{ route('admin.create') }}" class="text-white">Add Admin </a></button>
          @endif
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add admin failed!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Maximum number of admin has been reached!</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-flush" id="myTable">
            <thead>
              <tr class="border" style="color: black">
                <th scope="col">Name</th>
                <th scope="col">Position</th>
                <th scope="col">Employee ID</th>
                <th scope="col">Admin ID</th>
                <th scope="col">Action</th>
              </tr>
           </thead>
           <tbody>
             @foreach ($admins as $admin)
               <tr class="border">
                 <td>{{ $admin->name }}</td>
                 <td>{{ $admin->dep_pos }}</td>
                 <td>{{ $admin->employee_id  }}</td>
                 <td>{{ $admin->admin_id  }}</td>
                 <td>
                  <a href="{{ route('admin.changeUser', $admin->dep_pos) }}" class="btn btn-sm btn-warning">Change User</a>
                 </td>
               </tr>
             @endforeach
            </tbody>
          </table>
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
@endsection