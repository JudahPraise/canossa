@extends('employee.medical.create')

@section('create-record-section')
<div class="row mb-3 w-100">
    <form action="{{ route('employee.history.store') }}" method="POST" class="w-100">
        {{-- @if (!empty($record->history))
            @method('PUT')
        @endif --}}
        @csrf
        <div class="form-row mb-3 d-flex justify-content-between align-items-center">
            <span class="d-flex flex-column flex-lg-row">
                <h3>Personal History</h3>
                <small class="font-italic text-muted ml-2"><span class="text-danger mr-1">*</span>check if you have been ill of the following</small>
            </span>
            <button type="submit" class="nav-link btn" style="background-color: blue; color: white;">Save</button>
        </div>

        <div class="row mb-3">
            <div class="col-md-6 d-flex flex-column">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="heart" name="illnesses[]" value="Heart Disease">
                    <label class="form-check-label" for="heart">Heart Disease</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="measles" name="illnesses[]" value="Measles">
                    <label class="form-check-label" for="measles">Measles</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="diabetse" name="illnesses[]" value="Diabetes">
                  <label class="form-check-label" for="diabetes">Diabetes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="asthma" name="illnesses[]" value="Asthma">
                    <label class="form-check-label" for="asthma">Asthma</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="allergy" name="illnesses[]" value="Allergy">
                  <label class="form-check-label" for="allergy">Allergy (Food, Medicine)</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="hepatitis" name="illnesses[]" value="Hepatitis">
                  <label class="form-check-label" for="hepatitis">Hepatitis</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="seizures" name="illnesses[]" value="Seizures (Convulsions)">
                  <label class="form-check-label" for="seizures">Seizures (Convulsions)</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="scoliosis" name="illnesses[]" value="Scoliosis">
                  <label class="form-check-label" for="scoliosis">Scoliosis</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="PPL" name="illnesses[]" value="Primary Pulmonary Infection">
                  <label class="form-check-label" for="PPL">Primary Pulmonary Infection</label>
                </div>
            </div>
            <div class="col-md-6 d-flex flex-column">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="otitis" name="illnesses[]" value="Otitis Externa/Media (Ear Discharge)">
                    <label class="form-check-label" for="otitis">Otitis Externa/Media (Ear Discharge)</label>
                  </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="UTI" name="illnesses[]" value="Urinary Tract Infection">
                    <label class="form-check-label" for="UTI">Urinary Tract Infection</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="chickenPox" name="illnesses[]" value="Chicken Pox">
                    <label class="form-check-label" for="chickenPox">Chicken Pox</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="mumps" name="illnesses[]" value="Mumps">
                    <label class="form-check-label" for="mumps">Mumps</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="typhoid" name="illnesses[]" value="Typhoid">
                    <label class="form-check-label" for="typhoid">Typhoid</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="nosebleeding" name="illnesses[]" value="Nose Bleeding">
                    <label class="form-check-label" for="noseBleeding">Nose Bleeding</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="ulcer" name="illnesses[]" value="Ulcer">
                    <label class="form-check-label" for="ulcer">Ulcer</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="anemia" name="illnesses[]" value="Anemia">
                    <label class="form-check-label" for="anemia">Anemia</label>
                </div>
                <div class="form-check form-check-inline mb-3">
                    <input class="form-check-input" type="checkbox" id="tonsillitis" name="illnesses[]" value="Tonsillitis" >
                    <label class="form-check-label" for="tonsillitis">Tonsillitis</label>
                </div>
            </div>
        </div>
        <div class="row d-flex flex-column justify-content-center ml-1 inputs_div">
            <div class="form-row d-flex align-items-center">
                <div class="form-group">
                    <label for="otherIllness">Other</label>
                    <input type="text" class="form-control" id="otherIllness" name="illnesses[]">
                </div>
                <button class="btn btn-primary btn-sm btn-fab btn-icon btn-round add ml-2" type="button">
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
        var html = '<div class="form-row d-flex align-items-start"><div class="form-group"><input type="text" class="form-control" id="otherIllness" name="illnesses[]"></div><button class="btn btn-danger btn-sm btn-fab btn-icon btn-round remove ml-2" type="button"><i class="fas fa-minus"></i></button></div>'
        $('.inputs_div').append(html);
    });
    $(this).on("click", ".remove", function(){
        var target_input = $(this).parent();
        target_input.remove();
    });
  })
</script>
@endsection