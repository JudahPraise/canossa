@extends('employee.portfolio.family-background.mother.index')

@section('mother')
    <div class="container-fluid">
        <form action="{{ route('mother.update', Auth::user()->family->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-row">
              <div class="col-md-4 mb-3">
                <label for="firstname">First name</label>
                <input type="text" class="form-control" name="firstname" value="{{ $mother->firstname }}" id="firstname" required>
              </div>
              <div class="col-md-4 mb-3">
                <label for="middlename">Middle name</label>
                <input type="text" class="form-control" name="middlename" value="{{ $mother->middlename }}" id="middlename" required>
              </div>
              <div class="col-md-4 mb-3">
                <label for="surname">Last name</label>
                <input type="text" class="form-control" name="surname" value="{{ $mother->surname }}" id="surname" required>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="occupation">Occupation</label>
                <input type="text" class="form-control" name="occupation" value="{{ $mother->occupation }}" id="occupation">
              </div>
              <div class="col-md-6 mb-3">
                <label for="employer_business_name">Employer business name</label>
                <input type="text" class="form-control" name="employer_business_name" value="{{ $mother->employer_business_name }}" id="employer_business_name">
              </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="business_address">Business address</label>
                  <input type="text" class="form-control" name="business_address" value="{{ $mother->business_address }}" id="business_address">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tel_no">Telephone Number</label>
                    <div class="input-group has-validation">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="text" class="form-control" name="tel_no" value="{{ $mother->tel_no }}" id="tel_no">
                    </div>
                </div>
              </div>
            <button class="btn btn-primary" type="submit">Submit form</button>
        </form>
    </div>

@endsection