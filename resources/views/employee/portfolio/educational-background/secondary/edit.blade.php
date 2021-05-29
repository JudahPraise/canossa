@extends('employee.portfolio.educational-background.secondary.index')

@section('sec')

<div class="container-fluid">
  <form id="form" action="{{ route('sec.update', request()->route()->parameters) }}" method="POST">
    @method('PUT')
      @csrf
      {{-- Full Name --}}
      <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="name_of_school">Name of school</label>
          <input type="text" class="form-control" name="name_of_school" value="{{ $secondary->name_of_school }}" id="name_of_school" required>
        </div>
        <div class="col-md-6 mb-3">
          <label for="level_units_earned">Level units earned</label>
          <input type="text" class="form-control" name="level_units_earned" value="{{ $secondary->level_units_earned }}" id="level_units_earned" >  
        </div>
      </div>
      {{-- Status --}}
      <strong>School year graduated</strong> 
      <div class="form-row">
        <div class="col-md-6 mb-3">
          <label for="graduated_date_from">From</label>
          <input type="date" class="form-control" name="graduated_date_from" value="{{ $secondary->graduated_date_from }}" id="graduated_date_from" >
        </div>
        <div class="col-md-6 mb-3">
          <label for="graduated_date_to">To</label>
          <input type="date" class="form-control" name="graduated_date_to" value="{{ $secondary->graduated_date_to }}" id="graduated_date_to" >
        </div>
      </div>
      {{-- Physical --}}
      <div class="form-row">
          <div class="col-md-12 mb-3">
            <label for="academic_reward">Academic reward</label>
            <input type="text" class="form-control" name="academic_reward" value="{{ $secondary->academic_reward }}" id="academic_reward" >
          </div>
      </div>
      <button type="submit" value="Submit Form" class="btn btn-sm btn-primary mb-3">Submit</button>
  </form>
</div>

@endsection