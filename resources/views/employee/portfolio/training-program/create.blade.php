@extends('employee.portfolio.training-program.index')

@section('training')

<div class="container-fluid">
    <form id="form" action="{{ route('training.store') }}" method="POST"  enctype="multipart/form-data">
      @csrf
      <div class="inputs_div">
        <div class="form-group">
          <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="training_date">Training date</label>
                <input type="date" class="form-control" name="training_date" id="training_date" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="training_title">Training Title</label>
                <input type="text" class="form-control" name="training_title" id="training_title" >  
              </div>
          </div>
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="training_sponsor">Training sponsor</label>
              <input type="text" class="form-control" name="training_sponsor" id="training_sponsor" >  
            </div>
            <div class="col-md-6 mb-3">
              <label for="sy_graduated">Training certificate</label>
              <div class="custom-file">
                  <input type="file" class="custom-file-input" name="training_certificate" id="customFile">
                  <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
            </div>
          </div>
          {{-- <a class="btn btn-sm btn-pill btn-success text-white add">Add</a>
          <a class="btn btn-sm btn-pill btn-danger text-white">remove</a> --}}
        </div>
      </div>
      <button type="submit" value="Submit Form" class="btn btn-sm btn-primary mb-3 float-right">Submit</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script type="application/javascript">
  $(document).ready(function(){
      $(this).on("click", ".add", function(){
        var html = '<div class="form-group"><div class="form-row"><div class="col-md-6 mb-3"><label for="training_date">Training date</label><input type="date" class="form-control" name="training_date" id="training_date" required></div><div class="col-md-6 mb-3"><label for="training_title">Training Title</label><input type="text" class="form-control" name="training_title" id="training_title" ></div></div><div class="form-row"><div class="col-md-6 mb-3"><label for="training_sponsor">Training sponsor</label><input type="text" class="form-control" name="training_sponsor" id="training_sponsor" ></div><div class="col-md-6 mb-3"><label for="sy_graduated">Training certificate</label><div class="custom-file"><input type="file" class="custom-file-input" name="training_certificate" id="customFile"><label class="custom-file-label" for="customFile">Choose file</label></div></div></div><a class="btn btn-sm btn-pill btn-success text-white add">Add</a><a class="btn btn-sm btn-pill btn-danger text-white">remove</a></div>'

        $('.inputs_div').append(html);
      });
      $(this).on("click", ".remove", function(){
        var target_input = $(this).parent();
          target_input.remove();
      });
    });
</script>

@endsection