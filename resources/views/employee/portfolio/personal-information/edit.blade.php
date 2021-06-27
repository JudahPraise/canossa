@extends('employee.portfolio.personal-information.index')

@section('personal')

<div class="container-fluid pb-lg-5" style="padding-bottom: 20rem">
    <form id="form" action="{{ route('personal.update', $personal->user_id) }}" method="POST">
        @method('PUT')
        @csrf
        {{-- Full Name --}}
        <div class="form-row">
          <div class="col-md-4 mb-3">
            <label for="first_name">First name</label>
            <input type="text" class="form-control" name="first_name" id="first_name" value="{{ $personal->first_name }}" required>
          </div>
          <div class="col-md-4 mb-3">
            <label for="middle_name">Middle name</label>
            <input type="text" class="form-control" name="middle_name" id="middle_name" value="{{ $personal->middle_name }}" required>
          </div>
          <div class="col-md-4 mb-3">
            <label for="surname">Last name</label>
            <input type="text" class="form-control" name="surname" id="surname" value="{{ $personal->surname }}" required>
          </div>
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
              <option selected value="{{ $personal->sex }}">{{ $personal->sex }}</option>
              <option>Male</option>
              <option>Female</option>
            </select>
          </div>
          <div class="col-md-3 mb-3">
            <label for="citizenship">Citizenship</label>
            <input type="text" class="form-control" name="citizenship" id="citizenship" value="{{ $personal->citizenship }}" required>
          </div>
          <div class="col-md-3 mb-3">
            <label for="civil_status">Civil Status</label>
            <select class="custom-select" name="civil_status" required>
              <option selected value="{{ $personal->civil_status }}">{{ $personal->civil_status }}</option>
              <option>Married</option>
              <option>Widowed</option>
              <option>Separated</option>
              <option>Divorced</option>
              <option>Single</option>
            </select>
          </div>
        </div>
        {{-- Physical --}}
        <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="height">Height</label>
              <input type="text" class="form-control" name="height" id="height" value="{{ $personal->height }}" required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="weight">Weight</label>
              <input type="text" class="form-control" name="weight" id="weight" value="{{ $personal->weight }}" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="blood_type">Blood Type</label>
                <select class="custom-select" name="blood_type" id="blood_type" value="{{ $personal->blood_type }}" required>
                  <option selected value="{{ $personal->blood_type }}">{{ $personal->blood_type }}</option>
                  <option>A</option>
                  <option>B</option>
                  <option>O</option>
                  <option>AB</option>
                </select>
            </div>
        </div>
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
                    <input type="text" class="form-control" name="tel_number" id="tel_number" value="{{ $personal->tel_number }}" required>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="cell_number">Mobile Number</label>
                <div class="input-group has-validation">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                    </div>
                    <input type="text" class="form-control" name="cell_number" id="cell_number" value="{{ $personal->cell_number }}" required>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="email_address">Email Address</label>
                <div class="input-group has-validation">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-envelope-square"></i></span>
                    </div>
                    <input type="email" class="form-control" name="email_address" id="email_address" value="{{ $personal->email_address }}" required>
                </div>
            </div>
        </div>
        {{-- ID's --}}
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="prc">PRC</label>
                <input type="text" class="form-control" name="prc" id="prc" value="{{ $personal->prc }}" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="gsis">GSIS</label>
                <input type="text" class="form-control" name="gsis" id="gsis" value="{{ $personal->gsis }}" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="sss">SSS</label>
                <input type="text" class="form-control" name="sss" id="sss" value="{{ $personal->sss }}" required>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="pag_ibig">Pag-IBIG</label>
                <input type="text" class="form-control" name="pag_ibig" id="pag_ibig" value="{{ $personal->pag_ibig }}" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="driver_license">Drivers License</label>
                <input type="text" class="form-control" name="driver_license" id="driver_license" value="{{ $personal->driver_license }}" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="phil_health">PhilHealth</label>
                <input type="text" class="form-control" name="phil_health" id="phil_health" value="{{ $personal->phil_health }}" required>
            </div>
        </div>
        <button type="submit" value="Submit Form" class="btn btn-sm btn-primary mb-3">Update</button>
      </form>
</div>

@endsection