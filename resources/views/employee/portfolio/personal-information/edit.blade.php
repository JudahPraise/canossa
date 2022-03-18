@extends('employee.portfolio.personal-information.index')

@section('personal')

<div class="container-fluid pb-lg-5" style="padding-bottom: 20rem">
    <form id="form" action="{{ route('personal.update', $personal->user_id) }}" method="POST">
        @method('PUT')
        @csrf
        {{-- Full Name --}}
        <div class="form-row">
          <div class="{{ !empty(Auth::user()->extname) ? 'col-md-4 mb-3' : 'col-md-4 mb-3' }}">
            <label for="first_name">First name</label>
            <input type="text" class="form-control" name="first_name" value="{{ Auth::user()->fname }}" id="first_name" required>
          </div>
          <div class="{{ !empty(Auth::user()->extname) ? 'col-md-2 mb-3' : 'col-md-4 mb-3' }}">
            <label for="middle_name">Middle name</label>
            <input type="text" class="form-control" name="middle_name" value="{{ Auth::user()->mname }}" id="middle_name" required>
          </div>
          <div class="{{ !empty(Auth::user()->extname) ? 'col-md-4 mb-3' : 'col-md-4 mb-3' }}">
            <label for="surname">Last name</label>
            <input type="text" class="form-control" name="surname" value="{{ Auth::user()->lname }}" id="surname" required>
          </div>
          @if (!empty(Auth::user()->extname))
            <div class="col-md-2 mb-3">
              <label for="extname">Last name</label>
              <input type="text" class="form-control" name="extname" value="{{ Auth::user()->extname }}" id="extname" required>
            </div>
          @endif
        </div>
        {{-- Status --}}
        <div class="form-row">
          <div class="col-md-3 mb-3">
            <label for="date_of_birth">Date of birth</label>
            <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="{{ $personal->date_of_birth }}" required>
          </div>
          <div class="col-md-3 mb-3">
            <label for="sex">Sex</label>
            <select class="custom-select" name="sex" id="sex" required>
              <option  {{ $personal->sex == 'Male' ? 'selected' : '' }}>Male</option>
              <option  {{ $personal->sex == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
          </div>
          <div class="col-md-3 mb-3">
            <label for="citizenship">Citizenship</label>
            <input type="text" class="form-control" name="citizenship" id="citizenship" value="{{ $personal->citizenship }}" required>
          </div>
          <div class="col-md-3 mb-3">
            <label for="civil_status">Civil Status</label>
            <select class="custom-select" name="civil_status" required>
              <option {{ $personal->civil_status == 'Married' ? 'selected' : '' }}>Married</option>
              <option {{ $personal->civil_status == 'Widowed' ? 'selected' : '' }}>Widowed</option>
              <option {{ $personal->civil_status == 'Separated' ? 'selected' : '' }}>Separated</option>
              <option {{ $personal->civil_status == 'Divorced' ? 'selected' : '' }}>Divorced</option>
              <option {{ $personal->civil_status == 'Single' ? 'selected' : '' }}>Single</option>
            </select>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-4 mb-2">
              <label for="">Height</label>
              <input type="number" step="0.01" class="form-control" id="height" name="height" value="{{ $personal->height }}">
              <small class="font-italic text-muted"><span class="text-danger mr-1">*</span>in ft</small>
          </div>
          <div class="col-md-4 mb-2">
              <label>Weight</label>
              <input type="number" step="0.01" class="form-control" id="weight" name="weight" value="{{ $personal->weight }}">
              <small class="font-italic text-muted"><span class="text-danger mr-1">*</span>in kl</small>
          </div>
          <div class="col-md-4 mb-2">
              <label for="">Blood Type</label>
              <select class="custom-select" id="validationDefault04" name="blood_type">
                  <option {{ $personal->blood_type == 'A' ? 'selected' : '' }}>A</option>
                  <option {{ $personal->blood_type == 'O' ? 'selected' : '' }}>O</option>
                  <option {{ $personal->blood_type == 'B' ? 'selected' : '' }}>B</option>
                  <option {{ $personal->blood_type == 'AB' ? 'selected' : '' }}>AB</option>
                  <option {{ $personal->blood_type == 'A-' ? 'selected' : '' }}>A-</option>
                  <option {{ $personal->blood_type == 'O-' ? 'selected' : '' }}>O-</option>
                  <option {{ $personal->blood_type == 'B-' ? 'selected' : '' }}>B-</option>
                  <option {{ $personal->blood_type == 'AB-' ? 'selected' : '' }}>AB-</option>
              </select> 
          </div>
        </div>
        <hr>
        <h3>Contact Information</h3>
        {{-- Address --}}
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" id="address" value="{{ $personal->address }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="zip_code">Zip</label>
                <input type="text" class="form-control" name="zip_code" id="zip_code" value="{{ $personal->zip_code }}" required>
            </div>
        </div>
        {{-- Contact Info --}}
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="tel_number">Telephone Number</label>
                <div class="input-group has-validation">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" class="form-control" name="tel_number" id="tel_number" value="{{ $personal->tel_number }}">
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="cell_number">Mobile Number</label>
                <div class="input-group has-validation">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                    </div>
                    <input type="text" class="form-control" name="cell_number" id="cell_number" value="{{ $personal->cell_number }}">
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="email_address">Email Address</label>
                <div class="input-group has-validation">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-envelope-square"></i></span>
                    </div>
                    <input type="email" class="form-control" name="email_address" id="email_address" value="{{ $personal->email_address }}">
                </div>
            </div>
        </div>
        <hr>
        {{-- ID's --}}
        <h3>Government ID's</h3>
        <div class="form-row">
          <div class="col-md-4 mb-3">
              <label for="prc">PRC</label>
              <input type="text" class="form-control @error('prc') is-invalid @enderror" name="prc" value="{{ old('prc') == " " ? " " : $personal->prc }}" id="prc">
              @error('prc')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          {{-- <div class="col-md-4 mb-3">
              <label for="gsis">GSIS</label>
              <input type="text" class="form-control @error('gsis') is-invalid @enderror" name="gsis" value="{{ old('gsis') == " " ? " " : $personal->gsis }}" id="gsis">
               @error('gsis')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div> --}}
          <div class="col-md-4 mb-3">
              <label for="sss">SSS</label>
              <input type="text" class="form-control @error('sss') is-invalid @enderror" name="sss" value="{{ old('sss') == " " ? " " : $personal->sss }}" id="sss">
              @error('sss')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-4 mb-3">
              <label for="pag_ibig">Pag-IBIG</label>
              <input type="text" class="form-control @error('pag_ibig') is-invalid @enderror" name="pag_ibig" value="{{ old('pag_ibig') == " " ? " " : $personal->pag_ibig }}" id="pag_ibig">
              @error('pag_ibig')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>
          <div class="col-md-4 mb-3">
              <label for="driver_license">Drivers License</label>
              <input type="text" class="form-control @error('driver_license') is-invalid @enderror" name="driver_license" value="{{ old('driver_license') == " " ? " " : $personal->driver_license }}" id="driver_license" >
              @error('driver_license')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>
          <div class="col-md-4 mb-3">
             <div class="form-group">
                <label for="phil_health">PhilHealth</label>
                <input type="text" class="form-control @error('phil_health') is-invalid @enderror" name="phil_health" value="{{ old('phil_health') == " " ? " " : $personal->phil_health }}" id="phil_health">
                @error('phil_health')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
             </div>
          </div>
        </div>
        <button type="submit" value="Submit Form" class="btn btn-sm btn-primary mb-3">Update</button>
      </form>
</div>

@endsection