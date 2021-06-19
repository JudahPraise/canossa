@extends('admin.layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/orbitcss/css/orbit.css">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('argon/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('argon/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('argon/css/argon.css?v=1.2.0') }}" type="text/css">
@endsection

@section('home')
  <div class="container-fluid">
    <div class="row px-4 d-flex">
      <div class="col-md-6">
        <h1>Dashboard</h1>
      </div>
      <div class="col-md-6 d-flex justify-content-end">
        {{-- <input type="text" placeholder="Search" id="myInput" onkeyup="myFunction()"> --}}
      </div>
    </div>
      <!-- Card stats -->
    <div class="row p-3">
      <div class="col-xl-3 col-md-6 mb-3">
        <div class="card card-stats pressable-day">
          <!-- Card body -->
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Total No. of Employees</h5>
                <span class="h2 font-weight-bold mb-0">{{ $employees->count() }}</span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                  <i class="fas fa-users fa-2x"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 mb-3">
        <div class="card card-stats pressable-day">
          <!-- Card body -->
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Teachers</h5>
                <span class="h2 font-weight-bold mb-0">{{ $teachers }}</span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                  <i class="fas fa-chalkboard-teacher fa-2x"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 mb-3">
        <div class="card card-stats  pressable-day">
          <!-- Card body -->
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Staff</h5>
                <span class="h2 font-weight-bold mb-0">{{ $staffs }}</span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                  <i class="fas fa-id-card-alt fa-2x"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 mb-3">
        <div class="card card-stats pressable-day">
          <!-- Card body -->
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Maintenance</h5>
                <span class="h2 font-weight-bold mb-0">{{ $maintenance }}</span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                  <i class="fas fa-clipboard-check fa-2x"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0 row d-flex align-items-center">
              <div class="col-6 col-md-6 m-0">
                <h2 class="mb-0">Employees</h2>
              </div>
              <div class="col-6 col-md-6 d-flex justify-content-sm-end p-0">
                <form class="navbar-search-light form-inline" id="navbar-search-main">
                  <div class="form-group mb-0  w-100">
                    <div class="input-group input-group-alternative w-100">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                      </div>
                      <input class="form-control" placeholder="Search" type="text" id="myInput" onkeyup="myFunction()">
                    </div>
                  </div>
                </form>
              </div>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush" id="myTable">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Name</th>
                  <th></th>
                  <th scope="col">Role</th>
                  <th scope="col">Department</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody class="list">
                @forelse ($employees as $employee)
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        @if(!empty($employee->image))
                          <a href="#" class="avatar rounded-circle mr-3">
                            <img src="{{ asset( 'storage/images/'.$employee->image) }}" style=" height: 50px; overflow: hidden;">
                          </a>
                        @else
                          <a href="#">
                            <img src="{{ asset($employee->sex === 'M' ? 'img/default-male.svg' : 'img/default-female.svg') }}" class="rounded-circle" style="height: 50px; overflow: hidden;">
                          </a>
                        @endif
                      </div>
                    </th>
                    <td>{{ $employee->name }}</td>
                    <td class="budget">
                      {{ $employee->role }}
                    </td>
                    <td>
                      {{ $employee->department }}
                    </td>
                    <td>
                      <a class="btn btn-sm btn-primary" href="{{ route('employee.show', $employee->id) }}">View Profile</a>
                    </td>
                  </tr>
                @empty
                  
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

<script>
  function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }
</script>

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
