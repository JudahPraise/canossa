@extends('employee.portfolio.personal-information.index')

@section('personal')

<div class="container-fluid">
    <form id="form" action="{{ route('personal.post') }}" method="POST">
        @csrf
        {{-- Full Name --}}
        <h3>Basic Information</h3>
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
              <select class="custom-select" name="extname" id="extname">
                <option {{ Auth::user()->extname === "Sr" ? 'selected' : '' }}>Sr</option>
                <option {{ Auth::user()->extname === "Jr" ? 'selected' : '' }}>Jr</option>
                <option {{ Auth::user()->extname === "I" ? 'selected' : '' }}>I</option>
                <option {{ Auth::user()->extname === "II" ? 'selected' : '' }}>II</option>
                <option {{ Auth::user()->extname === "III" ? 'selected' : '' }}>III</option>
              </select>
            </div>
          @endif
        </div>
        {{-- Status --}}
        <div class="form-row">
          <div class="col-md-3 mb-3">
            <label for="date_of_birth">Date of birth</label> 
            <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="{{ Auth::user()->dob }}" required>
          </div>
          <div class="col-md-3 mb-3">
            <label for="sex">Sex</label>
            <select class="custom-select" name="sex" id="sex" required>
              <option {{ Auth::user()->sex === 'M' ? 'selected' : ''  }}>Male</option>
              <option {{ Auth::user()->sex === 'F' ? 'selected' : ''  }}>Female</option>
            </select>
          </div>
          <div class="col-md-3 mb-3">
            <label for="citizenship">Citizenship</label>
            <input type="text" class="form-control" name="citizenship" id="citizenship" value="{{ old('citizenship') }}" required>
          </div>
          <div class="col-md-3 mb-3">
            <label for="civil_status">Civil Status</label>
            <select class="custom-select" name="civil_status" id="civil_status" value="{{ old('civil_status') }}" required>
              <option value="">Choose...</option>
              <option {{ old('civil_status') === 'Married' ? 'selected' : ''  }}>Married</option>
              <option {{ old('civil_status') === 'Widowed' ? 'selected' : ''  }}>Widowed</option>
              <option {{ old('civil_status') === 'Separated' ? 'selected' : ''  }}>Separated</option>
              <option {{ old('civil_status') === 'Divorced' ? 'selected' : ''  }}>Divorced</option>
              <option {{ old('civil_status') === 'Single' ? 'selected' : ''  }}>Single</option>
            </select>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-4 mb-2">
              <label for="">Height</label>
              <input type="number" step="0.01" class="form-control" id="height" name="height" value="{{ old('height') }}">
              <small class="font-italic text-muted"><span class="text-danger mr-1">*</span>in ft</small>
          </div>
          <div class="col-md-4 mb-2">
              <label>Weight</label>
              <input type="number" step="0.01" class="form-control" id="weight" name="weight" value="{{ old('weight') }}">
              <small class="font-italic text-muted"><span class="text-danger mr-1">*</span>in kl</small>
          </div>
          <div class="col-md-4 mb-2">
              <label for="">Blood Type</label>
              <select class="custom-select" id="validationDefault04" name="blood_type" value="{{ old('blood_type') }}">
                  <option value="">Choose...</option>
                  <option {{ old('blood_type') === "A" ? 'selected' : '' }}>A</option>
                  <option {{ old('blood_type') === "O" ? 'selected' : '' }}>O</option>
                  <option {{ old('blood_type') === "B" ? 'selected' : '' }}>B</option>
                  <option {{ old('blood_type') === "AB" ? 'selected' : '' }}>AB</option>
                  <option {{ old('blood_type') === "A-" ? 'selected' : '' }}>A-</option>
                  <option {{ old('blood_type') === "O-" ? 'selected' : '' }}>O-</option>
                  <option {{ old('blood_type') === "B-" ? 'selected' : '' }}>B-</option>
                  <option {{ old('blood_type') === "AB-" ? 'selected' : '' }}>AB-</option>
              </select> 
          </div>
        </div>
        <hr>
        <h3>Contact Information</h3>
        {{-- Address --}}
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" id="address" value="{{ old('address') }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="zip_code">Zip</label>
                <input type="text" class="form-control" name="zip_code" id="zip_code" value="{{ old('zip_code') }}" required>
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
                    <input type="text" class="form-control" name="tel_number" id="tel_number" value="{{ old('tel_number') }}">
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="cell_number">Mobile Number</label>
                <div class="input-group has-validation">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                    </div>
                    <input type="text" class="form-control" name="cell_number" id="cell_number" value="{{ old('cell_number') }}">
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="email_address">Email Address</label>
                <div class="input-group has-validation">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-envelope-square"></i></span>
                    </div>
                    <input type="email" class="form-control" name="email_address" id="email_address" value="{{ old('email_address') }}" required>
                </div>
            </div>
        </div>
        <hr>
        {{-- ID's --}}
        <h3>Government ID's</h3>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="prc">PRC</label>
                <input type="text" class="form-control @error('prc') is-invalid @enderror" name="prc" value="{{ old('prc') }}" id="prc">
                @error('prc')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            {{-- <div class="col-md-4 mb-3">
                <label for="gsis">GSIS</label>
                <input type="text" class="form-control @error('gsis') is-invalid @enderror" name="gsis" value="{{ old('gsis') }}" id="gsis">
                 @error('gsis')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div> --}}
            <div class="col-md-4 mb-3">
                <label for="sss">SSS</label>
                <input type="text" class="form-control @error('sss') is-invalid @enderror" name="sss" value="{{ old('sss') }}" id="sss">
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
                <input type="text" class="form-control @error('pag_ibig') is-invalid @enderror" name="pag_ibig" value="{{ old('pag_ibig') }}" id="pag_ibig">
                @error('pag_ibig')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            <div class="col-md-4 mb-3">
                <label for="driver_license">Drivers License</label>
                <input type="text" class="form-control @error('driver_license') is-invalid @enderror" name="driver_license" value="{{ old('driver_license') }}" id="driver_license" >
                @error('driver_license')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            <div class="col-md-4 mb-3">
               <div class="form-group">
                  <label for="phil_health">PhilHealth</label>
                  <input type="text" class="form-control @error('phil_health') is-invalid @enderror" name="phil_health" value="{{ old('phil_health') }}" id="phil_health">
                  @error('phil_health')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
               </div>
            </div>
        </div>
        <button type="submit" value="Submit Form" class="btn btn-sm btn-primary mb-3">Submit</button>
      </form>
</div>

<script>

    const height = document.getElementById('height');
    const unitBtn = document.getElementById('unitBtn');

    document.getElementById('cmBtn').addEventListener('click', function(){

      var hgt = height.value;
      converCm(hgt)

    })

    function converCm(cm) {

       unitBtn.innerText = "cm";
       // const cm = height.value
       const ft = 0.0328084;
       const val = cm*ft;
    
       // console.log(val);
       // console.log(Math.round(val * 10) / 10);
    
       height.value = Math.round(val * 10) / 10;
    }

    document.getElementById('inBtn').addEventListener('click', function(){

      var hgt = height.value;

      convertIn(hgt);

    })

    function convertIn(inch){
      unitBtn.innerText = "in";
      // const cm = height.value
      const ft = 0.0833333;
      const val = inch*ft;
          
      // console.log(val);
      // console.log(Math.round(val * 10) / 10);
          
      height.value = Math.round(val * 10) / 10;
    }

    document.getElementById('ftBtn').addEventListener('click', function(){

      unitBtn.innerText = "ft";

    })

</script>

@endsection