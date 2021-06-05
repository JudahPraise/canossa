@extends('employee.portfolio.educational-background.secondary.index')

@section('sec')

<div class="container-fluid">
  <form id="form" action="{{ route('sec.update', request()->route()->parameters) }}" method="POST">
    @method('PUT')
      @csrf
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
      <div class="form-row">
        <div class="col-md-6 mb-3"> 
          <label for="sy_graduated">School year graduated</label>
          <input type="text" class="form-control" name="sy_graduated" value="{{ $secondary->sy_graduated }}" id="sy_graduated" placeholder="From - To">
        </div>
        <div class="col-md-6 mb-3">
          <label for="academic_reward">Academic reward</label>
          <input type="text" class="form-control" name="academic_reward" value="{{ $secondary->academic_reward }}" id="academic_reward" >
        </div>
      </div>
      <button type="submit" value="Submit Form" class="btn btn-sm btn-primary mb-3">Submit</button>
  </form>
</div>

@endsection