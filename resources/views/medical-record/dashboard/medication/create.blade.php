@extends('medical-record.dashboard.create')

@section('create-section')

<x-medical-create-nav :id="$record->user_id"></x-medical-create-nav>

<div class="row d-flex flex-column px-3 w-100">
  <form action="{{ route('employee.medication.store', $record->user_id) }}" method="POST">
    @csrf
    <div class="form-row mb-3 d-flex justify-content-between align-items-center">
        <span class="d-flex">
          <h3>Medications</h3>
          <small class="font-italic text-muted ml-2"><span class="text-d  anger mr-1">*</span>presently being taken</small>
        </span>
        <button type="submit" class="nav-link btn" style="background-color: blue; color: white;">Save</button>
    </div>
    <div class="inputs_div">
      <div class="form-row d-flex align-items-center">
        <div class="col-md-3 mb-3 mr-2">
          <label for="name">Name</label>
          <input type="text" class="form-control med {{ $errors->has('name[]') ? 'is-invalid' : '' }}" name="name[]" id="name">
          @error('name[]')
            <div class="invalid-feedback">This field is required</div>
          @enderror
        </div>
        <div class="col-md-3 mb-3 mr-2">
          <label for="condition">Condition</label>
          <input class="form-control" type="text" list="conditions" name="condition[]" id="condition"/>
          <datalist id="conditions">
            <option value="Hypertension">Hypertension</option>
            <option value="Diabetes">Diabetes</option>
            <option value="Asthma">Asthma</option>
            <option value="Allergy (Food, Medicine)">Allergy (Food, Medicine)</option>
            <option value="Hepatitis">Hepatitis</option>
            <option value="Urinary Tract Infection">Urinary Tract Infection</option>
            <option value="Typhoid">Typhoid</option>
            <option value="Anemia">Anemia</option>
            <option value="Food Supplement">Food Supplement</option>
          </datalist>
        </div>
        <div class="col-md-2 mb-3 mr-2">
          <label for="strength">Stregnth</label>
          <input type="number" class="form-control med" id="strength" name="strength[]">
        </div>
        <div class="col-md-3 mb-3 mr-2">
          <label for="frequency">Frequency</label>
          <select class="form-control" id="frequency" name="frequency[]">
            <option disabled selected>Choose ...</option>
            <option>Once a day</option>
            <option>Twice a day</option>
          </select>
        </div>
        <button class="btn btn-primary btn-sm btn-fab btn-icon btn-round add" type="button">
          <i class="fas fa-plus"></i>
        </button>
      </div>
    </div>
  </form>
</div>

<!-- Modal -->
<div class="modal fade" id="modalOther" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Other</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="inputOther">Condition</label>
          <input type="text" class="form-control" id="inputOther">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnSave">Save</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script>
  $(document).ready(function () {
    $(this).on("click", ".add", function(){
        var html = '<div class="form-row d-flex align-items-center"><div class="col-md-3 mb-3 mr-2"><label for="name">Name</label><input type="text" class="form-control med" name="name[]" id="name"></div><div class="col-md-3 mb-3 mr-2"><label for="condition">Condition</label><input class="form-control" type="text" list="conditions" name="condition[]" id="condition"/><datalist id="conditions"><option value="Hypertension">Hypertension</option><option value="Diabetes">Diabetes</option><option value="Asthma">Asthma</option><option value="Allergy (Food, Medicine)">Allergy (Food, Medicine)</option><option value="Hepatitis">Hepatitis</option><option value="Urinary Tract Infection">Urinary Tract Infection</option><option value="Typhoid">Typhoid</option><option value="Anemia">Anemia</option><option value="Food Supplement">Food Supplement</option></datalist></div><div class="col-md-2 mb-3 mr-2"><label for="strength">Stregnth</label><input type="number" class="form-control med" id="strength" name="strength[]"></div><div class="col-md-3 mb-3 mr-2"><label for="frequency">Frequency</label><select class="form-control" id="frequency" name="frequency[]"><option disabled selected>Choose ...</option><option>Once a day</option><option>Twice a day</option></select></div><button class="btn btn-danger btn-sm btn-fab btn-icon btn-round remove" type="button"><i class="fas fa-minus"></i></button></div>'
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