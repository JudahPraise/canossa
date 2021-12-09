@extends('admin.layouts.app')

@section('css')
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('argon/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('argon/css/argon.css?v=1.2.0') }}" type="text/css">
    {{-- DataTable --}}
    <link rel="stylesheet" href="{{ asset('vendor/datatables/datatables.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('vendor/datatables/responsive.bootstrap.min.css') }}" type="text/css">
@endsection

@section('home')
  <div class="container-fluid">
    <div class="row px-4 d-flex">
      <div class="col-md-6">
        <h1>Dashboard</h1>
      </div>
    </div>
      <!-- Card stats -->
    <div class="row ">
      <div class="col-xl-3 col-md-6">
        <div class="card card-stats pressable-day p-3">
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
      <div class="col-xl-3 col-md-6">
        <div class="card card-stats pressable-day p-3">
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
      <div class="col-xl-3 col-md-6">
        <div class="card card-stats  pressable-day p-3">
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
      <div class="col-xl-3 col-md-6">
        <div class="card card-stats pressable-day p-3">
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
            <div class="row w-100">
              <div class="col-md-12 col-lg-2 p-2 d-flex align-items-center justify-content-start">
                <h2 class="mb-0">Employees</h2>
              </div>
              <div class="col-md-6 col-lg-5 p-2 d-flex align-items-center justify-content-end">
                <form action="{{ route('accounts.fetch.category') }}" id="categoryForm" class="break-input">
                  <select class="form-control input-group input-group-alternative " name="category" onchange="document.getElementById('categoryForm').submit()">
                    <option  {{ route('accounts.index') ? 'selected' : '' }}  value="All">All</option>
                    <option {{ $category === 'Regular' ? 'selected' : '' }}  value="Regular">Regular Employees</option>
                    <option {{ $category === 'Part Time' ? 'selected' : '' }}  value="Part Time">Part Time Employees</option>
                  </select>
                </form>
              </div>
              <div class="col-md-6 col-lg-5 p-2 d-flex align-items-center justify-content-end">
                <form class="navbar-search-light form-inline mr-2 w-100" id="navbar-search-main">
                  <div class="form-group mb-0 w-100">
                    <div class="input-group input-group-alternative w-100">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                      </div>
                      <input class="form-control" placeholder="Search" type="text" id="myInput" onkeyup="myFunction()">
                    </div>
                  </div>
                </form>D
              </div>
            </div>
          </div>
          <!-- Light table -->
          <table class="table table-striped table-bordered dt-responsive nowrap " id="myTable" style="width:100%">
            <thead class="thead-light">
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($employees as $employee)
                <tr>
                  <td class="d-flex align-items-center">
                     <div class="media align-items-center mr-2">
                      @if(!empty($employee->image))
                        <a href="#" class="avatar rounded-circle">
                          <img src="{{ asset( 'storage/images/'.$employee->image) }}" style="height: 20px; overflow: hidden;">
                        </a>
                      @else
                        <a href="#">
                          <img src="{{ asset($employee->sex === 'M' ? 'img/default-male.svg' : 'img/default-female.svg') }}" class="rounded-circle" style="height: 50px; overflow: hidden;">
                        </a>
                      @endif
                    </div>
                    <p style="font-weight: bold">{{ $employee->fullName() }}</p>  
                  </td>
                  <td class="budget">
                    {{ $employee->role }}
                  </td>
                  <td>
                    <a class="btn btn-sm btn-primary" href="{{ route('employee.show', $employee->id) }}">View Profile</a>
                  </td>
                </tr>
              @empty  
                  <tr class="text-center">
                    <td colspan="5">No employees yet</td>
                  </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script>
  
    $(document).ready( function () {
        $('#myTable').DataTable( {
            responsive:true,
            searching: false,
            pagingType: 'simple_numbers',
            oLanguage: {
              oPaginate: {
                sNext: '<span class="pagination-fa"><i class="fa fa-chevron-right" ></i></span>',
                sPrevious: '<span class="pagination-fa"><i class="fa fa-chevron-left" ></i></span>'
              }
            },
            lengthMenu: [[5], [5]],
            bInfo: true,
            bLengthChange: false,
        } );
    } );

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
    {{-- DataTable --}}
    <script src="{{ asset('vendor/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.responsive.min.js') }}"></script>
@endsection
