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

    {{-- Header --}}
    <div class="container-fluid m-0 p-0">
        <!-- Header -->
        <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url({{ asset('img/canossa.jpg') }}); background-size: cover; background-position: center top;">
            <!-- Mask -->
            <span class="mask bg-gradient-default opacity-8"></span>
            <!-- Header container -->
            <div class="container-fluid d-flex align-items-center">
              <div class="row p-3">
                <div class="col-lg-7 col-md-10">
                  <h1 class="display-2 text-white">Hello {{ auth()->user()->name }}</h1>
                  <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
                </div>
              </div>
            </div>
        </div>
          <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
              <div class="col-xl-4 order-xl-2">
                <div class="card card-profile">
                  <img src="{{ asset('argon/img/theme/img-1-1000x600.jpg') }}" alt="Image placeholder" class="card-img-top">
                  <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image avatar-upload">
                            <form action="{{ route('image.update') }}" id="uploadForm" enctype="multipart/form-data" method="POST">
                                @method('PUT')
                                @csrf
                                <input type='file' name="image" id="imageUpload" accept=".png, .jpg, .jpeg" onchange="document.getElementById('uploadForm').submit()" hidden/>
                            </form>
                            <a href="#" onclick="document.getElementById('imageUpload').click()">
                              <img src="{{ asset( 'storage/images/'.$employee->image) }}" class="rounded-circle" style="height: 150px; width: 200px; overflow: hidden;">
                            </a>
                            @if(empty(auth()->user()->image))
                                <a href="#" onclick="document.getElementById('imageUpload').click()">
                                    <img src="{{ asset(auth()->user()->sex === 'M' ? 'img/default-male.svg' : 'img/default-female.svg') }}" class="rounded-circle" style="height: 144px; width: 200px; overflow: hidden;">
                                </a>
                            @endif
                        </div>
                    </div>
                  </div>
                  <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                    <div class="d-flex justify-content-between">

                    </div>
                  </div>
                    <div class="card-body pt-0">
                      <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center">
                                    <div class="text-center">
                                        <h5 class="h3">
                                          {{ auth()->user()->name }}
                                        </h5>
                                        <div class="h5 font-weight-300">
                                            @if (auth()->user()->personal)
                                                {{ $employee->personal->address }}
                                            @else
                                               <small>Not set</small> 
                                            @endif
                                        </div>
                                        <div class="h5 mt-4">
                                            <i class="ni business_briefcase-24 mr-2"></i>{{ auth()->user()->role }}
                                        </div>
                                        <div>
                                            <i class="ni education_hat mr-2"></i>{{ auth()->user()->department }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
                <div class="col-xl-8 order-xl-1">
                    <div class="card">
                        <div class="card-header">
                              <div class="row align-items-center">
                                <div class="col-8">
                                  <h3 class="mb-0">Change Password</h3>
                                </div>
                              </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('account.update', Auth::user()->id) }}" method="POST">
                                @method('put')
                                @csrf
                                <h6 class="heading-small text-muted mb-4">User information</h6>
                                <div class="pl-lg-4">
                                  <div class="row">
                                    <div class="col-lg-12">
                                      <div class="form-group">
                                        <label class="form-control-label" for="input-username">Name</label>
                                        <input type="text" id="input-username" class="form-control" name="name" placeholder="Surname, First Name, M.I." value="{{ $employee->name }}">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Department</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="department">
                                                <option {{ $employee->department == 'Elementary' ? 'selected' : '' }}>Elementary</option>
                                                <option {{ $employee->department == 'Junior High School' ? 'selected' : '' }}>Junior High School</option>
                                                <option {{ $employee->department == 'Senior High School' ? 'selected' : '' }}>Senior High School</option>
                                                <option {{ $employee->department == 'College' ? 'selected' : '' }}>College</option>
                                            </select>
                                          </div>
                                    </div>
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
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label class="form-control-label" for="input-first-name">Email Address</label>
                                        <input type="text" id="input-first-name" class="form-control" name="email" placeholder="jesse@example.com" value="{{ $employee->email }}">
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label class="form-control-label" for="input-last-name">Password</label>
                                        <input type="text" id="input-last-name" class="form-control" name="password">
                                      </div>
                                    </div>
                                  </div>
                                  <button class="btn btn-success text-right">Update password</button>
                                </div>
                            </form>
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
@endsection