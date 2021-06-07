@extends('employee.portfolio.work-experience.index')

@section('work')

<div class="container-fluid">
    <form id="form" action="{{ route('work.store') }}" method="POST"  enctype="multipart/form-data">
        @csrf
        <div class="inputs_div">
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                      <label for="work_description[]">Work description</label>
                      <input type="text" class="form-control" name="work_description[]" id="work_description[]">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="duration[]">Duration</label>
                      <input type="text" class="form-control" name="duration[]" id="duration[]" required>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="work_place[]">Work place</label>
                      <input type="text" class="form-control" name="work_place[]" id="work_place[]">  
                    </div>
                </div>
                <a class=" mr-2 btn btn-sm btn-pill btn-success text-white add">Add</a>
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
        var html = '<div class="form-group"><div class="form-row"><div class="col-md-12 mb-3"><label for="work_description[]">Work Description</label><input type="text" class="form-control" name="work_description[]" id="work_description[]"></div></div><div class="form-row"><div class="col-md-6 mb-3"><label for="duration[]">Duration</label><input type="text" class="form-control" name="duration[]" id="duration[]" required></div><div class="col-md-6 mb-3"><label for="work_place[]">Training Title</label><input type="text" class="form-control" name="work_place[]" id="work_place[]"></div></div><a class=" mr-2 btn btn-sm btn-pill btn-success text-white add">Add</a><a class="btn btn-sm btn-pill btn-danger text-white remove">remove</a></div>'

        $('.inputs_div').append(html);
      });
      $(this).on("click", ".remove", function(){
        var target_input = $(this).parent();
          target_input.remove();
      });
    });
</script>

@endsection