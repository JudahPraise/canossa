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
<div class="row px-3">
  <div class="col">
    <div class="card">
      <!-- Card header -->
      <div class="card-header border-0 d-flex align-items-center">
        <div class="row w-100">
          <div class="col-md-12 col-lg-2 p-2 d-flex align-items-center justify-content-start">
            <h2 class="mb-0">Employees</h2>
          </div>
          <div class="col-md-6 col-lg-5 p-2 d-flex align-items-center justify-content-end">
            <form action="{{ route('accounts.fetch.category') }}" id="categoryForm" class="break-input">
              <select class="form-control input-group input-group-alternative " name="category" onchange="document.getElementById('categoryForm').submit()">
                <option disabled selected>Category</option>
                <option  {{ $category === 'Resigned' ? 'selected' : '' }}  value="All">All</option>
                <option {{ $category === 'Regular' ? 'selected' : '' }}  value="Regular">Regular Employees</option>
                <option {{ $category === 'Partime' ? 'selected' : '' }}  value="Partime">Partime Employees</option>
                <option {{ $category === 'Resigned' ? 'selected' : '' }}  value="Resign">Resign Employees</option>
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
            </form>
            <a class="btn btn-icon btn-success text-white d-flex" type="button" data-toggle="modal" data-target="#registerEmployee" id="addEmployee">
              <span class="btn-inner--icon"><i class="fas fa-plus mr-2"></i></span>Register
            </a>
          </div>
        </div>
      </div>
      <!-- Light table -->
      <div class="table-responsive">
        <table class="table align-items-center table-flush" id="myTable">
          <thead>
            <tr class="border" style="color: black">
              <th scope="col">Name</th>
              <th scope="col">Employee ID</th>
              <th scope="col">Role</th>
              <th scope="col">Email</th>
              <th scope="col">Category</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($employees as $employee)
              <tr class="border">
                <td>{{ $employee->fullName()}}</td>
                <td>{{ $employee->employee_id }}</td>
                @if (!empty($employee->department))
                  <td>{{ $employee->role }}</td>
                @else
                  <td>{{ $employee->role }}</td>
                @endif
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->category }}</td>
                <td class="d-flex">
                  <a href="{{ route('resigned', $employee->id) }}" class="btn btn-sm btn-info">Resigned</a>
                </td>
              </tr>
              @empty
                <tr class="text-center">
                  <td colspan="5">No employees yet</td>
                </tr>
              @endforelse
            </tbody>
          </table>
          <div class="row d-flex justify-content-end w-100 p-2">
            {{ $employees->links() }}
          </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="registerEmployee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Register Employee</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('register.post') }}" id="registerForm">
            @csrf
            <div class="form-row">
              <div class="col-md-4 mb-3">
                <label for="validationDefault01">Last name</label>
                <input type="text" name="lname" class="form-control" id="validationDefault01" required>
              </div>
              <div class="col-md-4 mb-3">
                <label for="validationDefault01">First name</label>
                <input type="text" name="fname" class="form-control" id="validationDefault01" required>
              </div>
              <div class="col-md-2 mb-3">
                <label for="validationDefault01">M.I.</label>
                <input type="text" name="mname" class="form-control" id="validationDefault01">
              </div>
              <div class="col-md-2 mb-3">
                <label for="validationDefault04">Suffix</label>
                <select class="custom-select" name="extname" id="validationDefault04">
                  <option selected disabled value=""></option>
                  <option>Sr.</option>
                  <option>Jr.</option>
                  <option>I</option>
                  <option>II</option>
                  <option>III</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-4 mb-3">
                <label for="validationDefault04">Gender</label>
                <select class="custom-select" name="sex" id="validationDefault04" required>
                  <option selected disabled value=""></option>
                  <option>M</option>
                  <option>F</option>
                </select>
              </div>
              <div class="col-md-4 mb-3">
                <label for="validationDefault03">Date of birth</label>
                <input type="date" name="dob" class="form-control" id="validationDefault03" required>
              </div>
              <div class="col-md-4 mb-3">
                <label for="selectRole">Role</label>
                <select class="custom-select" name="role" id="selectRole" required>
                  <option selected disabled value="">Choose...</option>
                  <option>Teacher</option>
                  <option>Staff</option>
                  <option>Maintenance</option>
                  <option>Nurse</option>
                  <option>Doctor</option>
                </select>
              </div>
            </div>
            <label for="">Category</label>
            <div class="form-row d-flex mb-5">
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="regular" name="category" class="custom-control-input" value="Regular">
                <label class="custom-control-label" for="regular" style="font-size: 1.1rem">Regular</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="partime" name="category" class="custom-control-input" value="Partime">
                <label class="custom-control-label" for="partime" style="font-size: 1.1rem">Partime</label>
              </div>
            </div>
            <hr>
            <h3 class="mb-3">Account</h3>
            <div class="form-row d-flex align-items-center">
              <div class="col-md-5 mb-3">
                <label for="employeeID">Employee ID</label>
                <input type="text" name="employee_id" class="form-control" id="employeeID" style="font-weight: bold; color: black; font-size: 1.2rem" >
              </div>
              <div class="col-md-5 mb-3">
                <label for="password">{{ __('Password') }}</label>
                <div class="input-group">
                  <input type="text" name="password" class="form-control" id="password" style="font-weight: bold; color: black; font-size: 1.2rem">
                </div>
              </div>
              <div class="col-md-2 mb-3">
                <div id="qrcode"></div> {{-- TODO: QR Code Function --}}
                <input type="text" name="qr_token" id="qrTokenInput" hidden>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button class="btn btn-primary" type="submit" value="Submit Form">Register</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="{{ asset('js/qrcode.js') }}"></script>
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

  const generate = document.getElementById('addEmployee');

  generate.addEventListener("click", function(){
    var emp_pass = Math.random().toString(36).slice(-8);
    var qr_token = generateToken() + generateToken();
    var qrcode = new QRCode(document.getElementById("qrcode"), {
	    text: qr_token,
	    width: 100,
	    height: 100,
	    colorDark : "#000000",
	    colorLight : "#ffffff",
	    correctLevel : QRCode.CorrectLevel.H
    });

    document.getElementById('qrTokenInput').value = qr_token;
    document.getElementById('password').value = emp_pass;
    document.getElementById('employeeID').value = generateId({{ $count }});
  })

  function generateToken(){
    return  Math.random().toString(36).substr(2);
  }

  function generateId(d) {

    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear().toString().substr(-2);
    var next_emp = d + 1;
    var emp_id = (next_emp < 10) ? '0' + next_emp.toString() : next_emp.toString();
    id = "CEMP"+"-"+yyyy+mm+dd+"-"+emp_id;

    return id;

    //CEMP-20210922-01 - Employee
    //CADM-20210922-01 - Admin
    
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