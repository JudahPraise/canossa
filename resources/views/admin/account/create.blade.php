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
        <div class="container px-2">
            <h3>Employee Information</h3>
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
            <form onsubmit="return false">
                @csrf
                <h3>Account Information</h3>
                <input value="{{ $employee->id }}" id="empId" hidden>
                <div class="form-row mb-3">
                    <div class="col">
                        <label for="formGroupExampleInput">Example label</label>
                        <input type="text" class="form-control" placeholder="Admin ID" id="adminId" style="font-weight: bold; color: black;">
                    </div>
                    <div class="col">
                        <label for="selectDepartment">Position</label>
                        <select class="form-control" id="selectDepartment">
                            <option  disabled selected>Select position...</option>
                            @foreach ($descriptions as $description)
                                <option value="{{ $description->id }}" {{ $admins->contains('dep_pos', $description->description ) ? 'disabled' : ''}}>{{ $description->description }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row mb-3">
                    <label for="admPass">Password</label>
                    <div class="input-group is-invalid">
                        <input type="text" class="form-control" id="adminPass" placeholder="Password" style="font-weight: bold; color: black;" required>
                        <div class="input-group-append">
                           <button type="button" class="btn btn-success" type="button" id="generatePassword">Generate</button>
                        </div>
                    </div>
                </div>
                <div class="row w-100 d-flex justify-content-center p-3">
                    <button class="btn btn-primary text-center" data-toggle="modal" data-target="#confirmModal" id="assignBtn">Assign as Administrator</button>
                </div>
            </form>
            <!-- Confirm Modal -->
            <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="confirmModalLabel">Confirm Password</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        {{-- <h2>Are you sure you want to assign {{ $employee->name }} as administrator from medical records?</h2> --}}
                        <form id="confirmForm" action="{{ route('admin.assign') }}" method="POST">
                            @csrf
                            <input type="text" hidden name="admin_id" id="adm_Id">
                            <input type="text" hidden name="admin_pass" id="adm_Pass">
                            <input type="text" hidden name="employee_id" id="emp_Id">
                            <input type="text" hidden name="admin_pos" id="adm_pos">
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
        <!-- Script -->
        <script>
            const search = document.getElementById('search');
            const matchList = document.getElementById('matchList');
            const selectDepartment = document.getElementById('selectDepartment');
            const generatePassword = document.getElementById('generatePassword');
            const assignBtn = document.getElementById('assignBtn');
            
            selectDepartment.addEventListener('change', function(){
                var id = parseInt(this.value, 10);
                 const adminId = document.getElementById('adminId').value = generateId(id);
            });

            function generateId(d) {  
                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy = today.getFullYear().toString().substr(-2);
                var next_emp = d;
                var emp_id = (next_emp < 10) ? '0' + next_emp.toString() : next_emp.toString();
                id = "CADM"+"-"+yyyy+mm+dd+"-"+emp_id;  

                return id;  

                //CEMP-20210922-01 - Employee
                //CADM-20210922-01 - Admin
            } 

            generatePassword.addEventListener('click', function (){
                var adm_pass = Math.random().toString(36).slice(-8);
                document.getElementById('adminPass').value = adm_pass;
            });

            assignBtn.addEventListener('click', function (){
                document.getElementById('adm_Id').value = document.getElementById('adminId').value
                document.getElementById('adm_Pass').value = document.getElementById('adminPass').value
                document.getElementById('emp_Id').value = document.getElementById('empId').value
                document.getElementById('adm_pos').value = selectDepartment.options[selectDepartment.selectedIndex].text
            })

        </script>
@endsection