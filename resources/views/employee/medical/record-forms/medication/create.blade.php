@extends('employee.medical.create')

@section('create-record-section')
<div class="row d-flex flex-column px-3 w-100">
  <form action="">
    <div class="form-row mb-3 d-flex justify-content-between align-items-center">
        <span class="d-flex">
          <h3>Medications</h3>
          <small class="font-italic text-muted ml-2"><span class="text-danger mr-1">*</span>presently being taken</small>
        </span>
        <button type="submit" class="nav-link btn" style="background-color: blue; color: white;">Save</button>
    </div>
    <div class="inputs_div">
        <div class="form-row d-flex align-items-center">
          <div class="col-md-8 col-10 mb-3 mr-2">
            <label for="med">Medicine</label>
            <input type="text" class="form-control med" name="medications[]" id="med">
          </div>
          <button class="btn btn-primary btn-sm btn-fab btn-icon btn-round add" type="button">
            <i class="fas fa-plus"></i>
          </button>
        </div>
    </div>
  </form>
</div>
@endsection

@section('js')
<script>
  $(document).ready(function () {
      $(this).on("click", ".add", function(){
          var html = '<div class="form-row d-flex align-items-center"><div class="col-md-8 col-10 mb-3 mr-2"><input type="text" class="form-control med" name="medications[]" id="med"></div><button class="btn btn-danger btn-sm btn-fab btn-icon btn-round remove" type="button"><i class="fas fa-minus"></i></button></div>'
          // console.log('get');
          $('.inputs_div').append(html);
          // console.log('hello');
      });
      $(this).on("click", ".remove", function(){
          var target_input = $(this).parent();
          target_input.remove();
      });
  })
</script>
@endsection