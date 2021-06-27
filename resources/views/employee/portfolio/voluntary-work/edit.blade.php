@extends('employee.portfolio.voluntary-work.index')

@section('voluntary')

<div class="container-fluid">
    <form id="form" action="{{ route('voluntary.update', Auth::user()->id) }}" method="POST"  enctype="multipart/form-data">
        @csrf
        <div class="inputs_div">
            @foreach ($voluntaries as $voluntary)
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="name_address">Name & Address of organization</label>
                      <input type="text" class="form-control" name="name_address[]" value="{{ $voluntary->name_address }}" id="name_address">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="duration">Period of attendance</label>
                        <input type="text" class="form-control" name="duration[]" value="{{ $voluntary->duration }}" id="duration" required>
                      </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="no_hours">Number of hours</label>
                      <input type="text" class="form-control" name="no_hours[]" value="{{ $voluntary->no_hours }}" id="no_hours" required>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="position">Position/Nature of work</label>
                      <input type="text" class="form-control" name="position[]" value="{{ $voluntary->position }}" id="position">  
                    </div>
                </div>
                <a class=" mr-2 btn btn-sm btn-pill btn-success text-white add">Add</a>
                <a class="btn btn-sm btn-pill btn-danger text-white">remove</a>
              </div>
            @endforeach
        </div>
        <button type="submit" value="Submit Form" class="btn btn-sm btn-primary text-white mb-3 float-right">Submit</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script type="application/javascript">
  $(document).ready(function(){
      $(this).on("click", ".add", function(){
        var html = '<div class="form-group"><div class="form-row"><div class="col-md-6 mb-3"><label for="name_address">Name & Address of organization</label><input type="text" class="form-control" name="name_address[]" id="name_address"></div><div class="col-md-6 mb-3"><label for="duration">Period of attendance</label><input type="text" class="form-control" name="duration[]" id="duration" required></div></div><div class="form-row"><div class="col-md-6 mb-3"><label for="no_hours">Number of hours</label><input type="text" class="form-control" name="no_hours[]" id="no_hours" required></div><div class="col-md-6 mb-3"><label for="position">Position/Nature of work</label><input type="text" class="form-control" name="position[]" id="position"></div></div><a class=" mr-2 btn btn-sm btn-pill btn-success text-white add">Add</a><a class="btn btn-sm btn-pill btn-danger text-white remove">remove</a></div>'

        $('.inputs_div').append(html);
      });
      $(this).on("click", ".remove", function(){
        var target_input = $(this).parent();
          target_input.remove();
      });
    });
</script>

@endsection