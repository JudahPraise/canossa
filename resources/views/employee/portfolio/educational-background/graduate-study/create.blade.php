@extends('employee.portfolio.educational-background.graduate-study.index')


@section('grad')
<div class="container-fluid" id="inputs">
  <form action="{{ route('grad.store') }}" method="POST">
      @csrf
      <div class="form-group inputs_div">
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="name_of_school">Name of school</label>
              <input type="text" class="form-control" name="name_of_school[]" id="name_of_school" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="validationDefault04">Degree</label>
              <select class="custom-select" name="degree[]" id="validationDefault04" required>
                <option selected disabled value="">Choose...</option>
                <option>Masters</option>
                <option>Doctorate</option>
              </select>  
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6 md-3">
              <label for="course">Course</label>
              <input type="text" name="course[]" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
              <label for="level_units_earned">Level units earned</label>
              <input type="text" class="form-control" name="level_units_earned[]" id="level_units_earned" >  
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <div class="form-group">
                <label for="sy_graduated" class="bmd-label-floating">School year graduated</label>
                <input type="text" class="form-control" name="sy_graduated[]" id="sy_graduated" >
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="academic_reward">Academic reward</label>
              <input type="text" class="form-control" name="academic_reward[]" id="academic_reward" >
            </div>
          </div>
          <a class="btn btn-sm btn-pill btn-success text-white add">Add</a>
          <a class="btn btn-sm btn-pill btn-danger text-white">remove</a>
        </div>
      </div>
      <button type="submit" value="Submit Form" class="btn btn-sm btn-primary mb-3 float-right">Submit</button>
  </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script type="application/javascript">
  $(document).ready(function(){
      $(this).on("click", ".add", function(){
        var html = '<div class="form-group"><div class="form-row"><div class="col-md-6 mb-3"><label for="name_of_school">Name of school</label><input type="text" class="form-control" name="name_of_school[]" id="name_of_school" required></div><div class="col-md-6 mb-3"><label for="validationDefault04">Degree</label><select class="custom-select" name="degree[]" id="validationDefault04" required><option selected disabled value="">Choose...</option><option>Masters</option><option>Doctorate</option></select></div></div><div class="form-row"><div class="col-md-6 md-3"><label for="course">Course</label><input type="text" name="course[]" class="form-control"></div><div class="col-md-6 mb-3"><label for="level_units_earned">Level units earned</label><input type="text" class="form-control" name="level_units_earned[]" id="level_units_earned" ></div></div><div class="form-row"><div class="col-md-6 mb-3"><div class="form-group"><label for="sy_graduated" class="bmd-label-floating">School year graduated</label><input type="text" class="form-control" name="sy_graduated[]" id="sy_graduated" ></div></div><div class="col-md-6 mb-3"><label for="academic_reward">Academic reward</label><input type="text" class="form-control" name="academic_reward[]" id="academic_reward" ></div></div><a class="btn btn-sm btn-pill btn-success text-white add">Add</a><a class="btn btn-sm btn-pill btn-danger text-white remove">remove</a></div>'
        $('.inputs_div').append(html);
      });
      $(this).on("click", ".remove", function(){
        var target_input = $(this).parent();
          target_input.remove();
      });
    });
</script>

@endsection