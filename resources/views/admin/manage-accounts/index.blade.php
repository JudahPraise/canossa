@extends('admin.layouts.main')

@section('home')
    <div class="container-fluid">
      <div class="row d-flex justify-content-between align-items-center m-0 mb-3" style="color: black">
        <h5 class="text-bold">Employees:</h5>
        <button class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#registerEmployee"><i class="fas fa-plus mr-2"></i>Add Employee</button>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-hover table-borderless">
          <thead>
            <tr class="border" style="color: black">
              <th scope="col">ID</th>
              <th scope="col">Employee ID</th>
              <th scope="col">Name</th>
              <th scope="col">Role</th>
              <th scope="col">Email</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>

            @forelse ($employees as $employee)
              <tr class="border">
                <th scope="row">{{ $employee->id }}</th>
                <td>{{ $employee->employee_id }}</td>
                <td>{{ $employee->name}}</td>
                @if (!empty($employee->department))
                  <td>{{ $employee->role.' '.'|'.' '.$employee->department }}</td>
                @else
                  <td>{{ $employee->role}}</td>
                @endif
                <td>{{ $employee->email }}</td>
                <td>
                  <a href="" class="btn btn-sm btn-danger">Remove</a>
                  <a href="" class="btn btn-sm btn-info">Resigned</a>
                </td>
              </tr>
            @empty
              
            @endforelse
              
          </tbody>
        </table>
        {{ $employees->links() }}
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
                    <label for="validationDefault01">Name</label>
                    <input type="text" name="name" class="form-control" id="validationDefault01" required>
                  </div>
                  <div class="col-md-1 mb-3">
                    <label for="validationDefault04">Gender</label>
                    <select class="custom-select" name="sex" id="validationDefault04" required>
                      <option selected disabled value=""></option>
                      <option>M</option>
                      <option>F</option>
                    </select>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-4 mb-3">
                    <label for="validationDefault01">Employee ID</label>
                    <input type="text" name="employee_id" class="form-control" id="validationDefault01" required>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationDefault04">Role</label>
                    <select class="custom-select" name="role" id="validationDefault04" required>
                      <option selected disabled value="">Choose...</option>
                      <option>Teacher</option>
                      <option>Staff</option>
                      <option>Maintenance</option>
                    </select>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="validationDefault04">Department</label>
                    <select class="custom-select" name="department" id="validationDefault04">
                      <option selected disabled value="">Choose...</option>
                      <option>Elementary</option>
                      <option>Junior High School</option>
                      <option>Senior High School</option>
                      <option>College</option>
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
@endsection