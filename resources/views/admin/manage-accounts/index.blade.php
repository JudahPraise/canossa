@extends('admin.layouts.app')

@section('css')
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('argon/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('argon/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('argon/css/argon.css?v=1.2.0') }}" type="text/css">
@endsection

@section('home')
<div class="row px-3">
  <div class="col">
    <div class="card">
      <!-- Card header -->
      <div class="card-header border-0 d-flex align-items-center">
          <div class="col-6 col-md-6 m-0">
            <h2 class="mb-0">Employees</h2>
          </div>
          <div class="col-6 col-md-6 d-flex justify-content-sm-end align-items-center p-0">
            <form class="navbar-search-light form-inline mr-2" id="navbar-search-main">
              <div class="form-group mb-0  w-100">
                <div class="input-group input-group-alternative w-100">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                  </div>
                  <input class="form-control" placeholder="Search" type="text" id="myInput" onkeyup="myFunction()">
                </div>
              </div>
            </form>
            <a class="btn btn-sm btn-icon btn-success text-white" type="button" data-toggle="modal" data-target="#registerEmployee">
              <span class="btn-inner--icon"><i class="fas fa-plus mr-2"></i></span>Add Employee
          </a>
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
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            {{-- @forelse ($employees as $employee)
              <tr class="border">
                <td>{{ $employee->fullName()}}</td>
                <td>{{ $employee->employee_id }}</td>
                @if (!empty($employee->department))
                  <td>{{ $employee->role}}</td>
                @else
                  <td>{{ $employee->role}}</td>
                @endif
                <td>{{ $employee->email }}</td>
                <td class="{{ $employee->status === 'resigned' ? 'text-danger' : 'text-success'}}">{{ $employee->status }}</td>
                <td class="d-flex">
                  <a href="{{ route('resigned', $employee->id) }}" class="btn btn-sm btn-info">Resigned</a>
                </td>
              </tr>
              @empty
                <tr class="text-center">
                  <td colspan="5">No employees yet</td>
                </tr>
              @endforelse --}}
            </tbody>
          </table>
          {{-- <div class="row d-flex justify-content-end w-100 p-2">
            {{ $employees->links() }}
          </div> --}}
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
          <form method="POST" action="{{ route('register.post') }}">
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
                <label for="validationDefault01">Middle initial</label>
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
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="validationDefault01">Employee ID</label>
                <input type="text" name="employee_id" class="form-control" id="validationDefault01" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="validationDefault04">Role</label>
                <select class="custom-select" name="role" id="validationDefault04" required>
                  <option selected disabled value="">Choose...</option>
                  <option>Teacher</option>
                  <option>Staff</option>
                  <option>Maintenance</option>
                  <option>Nurse</option>
                  <option>Doctor</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-4 mb-3">
                <label for="email">{{ __('E-Mail Address') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="col-md-4 mb-3">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="col-md-4 mb-3">
                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <script type="application/javascript">
      
      $(document).ready(function (e) {
        e.preventDefault();

        fetchEmployee();

        function fetchEmployee()
        {
          $.ajax({
            type: "GET",
            url: "/admin/manage-accounts/employees",
            dataType: "json",
            success: function(response) {

              console.log(response.employees);
              $('tbody').html('');
              $.each(response.employees, function(key, item){
                $('tbody').append(
                  '<tr class="border">\
                    <td>'+item.lname+','+item.fname+','+item.mname+'</td>\
                    <td>'+item.employee_id+'</td>\
                    <td>'+item.role+'</td>\
                    <td>'+item.email+'</td>\
                    <td class="d-flex">\
                      <a href="admin/resigned/'+item.id+'" class="btn btn-sm btn-info">Resigned</a>\
                    </td>\
                  </tr>'
                );
              });

            }
          });
        }

      });

    </script>
@endsection