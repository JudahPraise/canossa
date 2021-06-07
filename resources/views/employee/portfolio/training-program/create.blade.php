@extends('employee.portfolio.training-program.index')

@section('training')

<div class="container-fluid">
    <form id="form" action="{{ route('col.store') }}" method="POST">
        @csrf
        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="name_of_school">Training date</label>
            <input type="date" class="form-control" name="name_of_school" id="name_of_school" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="course_degree">Training Title</label>
            <input type="text" class="form-control" name="course_degree" id="course_degree" >  
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-12 mb-3">
            <label for="level_units_earned">Training sponsor</label>
            <input type="text" class="form-control" name="level_units_earned" id="level_units_earned" >  
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="sy_graduated">Training certificate</label>
            <input type="text" class="form-control" name="sy_graduated" id="sy_graduated" placeholder="From - To">
          </div>
        </div>
        <button type="submit" value="Submit Form" class="btn btn-sm btn-primary mb-3">Submit</button>
    </form>
</div>

@endsection