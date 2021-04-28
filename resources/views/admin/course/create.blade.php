@extends('admin.layouts.main')

@section('home')
<div class="container-fluid " style="width: 80%; color: black">
    <div class="row">
        <h2>Add Subjects</h2>
    </div>

    <form class="needs-validation mt-2" action="{{ route('course.store', $course->id) }}" method="post" novalidate>
      @csrf
      <input type="text" name="id" value="{{ $course->id }}" hidden>
        <div class="form-row">
            <div class="col-md-3 mb-3">
                <label for="validationCustom04">Year</label>
                <select class="custom-select" name="year" id="validationCustom04" required>
                  <option selected disabled value="">Choose...</option>
                  <option>1st year</option>
                  <option>2st year</option>
                  <option>3st year</option>
                  <option>4st year</option>
                </select>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationCustom04">Semester</label>
                <select class="custom-select" name="semester" id="validationCustom04" required>
                  <option selected disabled value="">Choose...</option>
                  <option>1nd Sem</option>
                  <option>2nd Sem</option>
                </select>
            </div>
        </div>
        <div class="form-group inputs_div">
            <div class="form-row d-flex align-items-center">
                <div class="col-md-3 mb-3">
                  <label for="validationCustom03">Subject Code</label>
                  <input type="text" name="code[]" class="form-control" id="validationCustom03" required>
                  <div class="invalid-feedback">
                    Please provide a valid city.
                  </div>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="validationCustom03">Units</label>
                  <input type="number" name="units[]" class="form-control" id="validationCustom03" required>
                  <div class="invalid-feedback">
                    Please provide a valid city.
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="validationCustom05">Course Title</label>
                  <input type="text" name="description[]" class="form-control" id="validationCustom05" required>
                  <div class="invalid-feedback">
                    Please provide a valid zip.
                  </div>
                </div>
                <i class="fas fa-plus-square mr-2 mt-3 text-success addMore" style="font-size: 2rem"></i>
                <i class="fas fa-minus-square mt-3 text-danger" style="font-size: 2rem"></i>
              </div>
        </div>
        
        
        <button class="btn btn-primary mt-2" type="submit">Submit form</button>
    </form>
</div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>

  (function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();

$(document).ready(function(){

    $(this).on("click", ".addMore", function(){
      var html = '<div class="form-row d-flex align-items-center"><div class="col-md-3 mb-3"><label for="validationCustom03">Subject Code</label><input type="text" name="code[]" class="form-control" id="validationCustom03" required><div class="invalid-feedback">Please provide a valid city.</div></div> <div class="col-md-3 mb-3"><label for="validationCustom03">Units</label><input type="number" name="units[]" class="form-control" id="validationCustom03" required><div class="invalid-feedback">Please provide a valid city.</div></div><div class="col-md-4 mb-3"><label for="validationCustom05">Course Title</label><input type="text" name="description[]" class="form-control" id="validationCustom05" required><div class="invalid-feedback">Please provide a valid zip.</div></div><i class="fas fa-plus-square mr-2 mt-3 text-success addMore" style="font-size: 2rem"></i><i class="fas fa-minus-square mt-3 text-danger remove" style="font-size: 2rem"></i></div>'
    
      $('.inputs_div').append(html);

    // console.log('hello');
    });

    $(this).on("click", ".remove", function(){
      var target_input = $(this).parent();
        target_input.remove();
    });
});
  </script>
@endsection