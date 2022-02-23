@extends('employee.medical.create')

@section('create-record-section')
<x-medical-create-nav :id="$record->user_id"></x-medical-create-nav>

<div class="row mb-3 mx-1 w-100">
    <form action="{{ !empty($record->history) ? route('employee.history.update', $record->user_id) : route('employee.history.store', $record->user_id) }}" method="POST" class="w-100">
        @if (!empty($record->history))
            @method('PUT')
        @endif
        @csrf
        <div class="form-row mb-3 d-flex justify-content-between align-items-center">
            <span class="d-flex flex-column flex-lg-row">
                <h3>Personal History</h3>
                <small class="font-italic text-muted ml-2"><span class="text-danger mr-1">*</span>check if you have been ill of the following</small>
            </span>
        </div>

        <div class="row mb-3">
            <div class="col-md-6 d-flex flex-column">
                <fieldset>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="heart" name="illnesses[]" value="Heart Disease" onchange="checkOther(heartOther, this)" {{ $histories->contains('illnesses', 'Heart Disease') ? 'checked' : '' }}>
                        <input class="form-check-input" type="checkbox" id="heartOther" name="isOther[]" value="false" {{ $histories->contains('illnesses', 'Heart Disease') ? 'checked' : '' }} hidden>
                        <label class="form-check-label" for="heart">Heart Disease</label>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="measles" name="illnesses[]" value="Measles" onchange="checkOther(measlesOther, this)" {{ $histories->contains('illnesses', 'Measles') ? 'checked' : '' }}>
                        <input class="form-check-input" type="checkbox" id="measlesOther" name="isOther[]" value="false" {{ $histories->contains('illnesses', 'Measles') ? 'checked' : '' }} hidden>
                        <label class="form-check-label" for="measles">Measles</label>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="diabetse" name="illnesses[]" value="Diabetes" onchange="checkOther(diabetseOther, this)" {{ $histories->contains('illnesses', 'Diabetes') ? 'checked' : '' }}>
                      <input class="form-check-input" type="checkbox" id="diabetseOther" name="isOther[]" value="false" {{ $histories->contains('illnesses', 'Diabetes') ? 'checked' : '' }} hidden>
                      <label class="form-check-label" for="diabetes">Diabetes</label>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="asthma" name="illnesses[]" value="Asthma" onchange="checkOther(asthmaOther, this)" {{ $histories->contains('illnesses', 'Asthma') ? 'checked' : '' }}>
                        <input class="form-check-input" type="checkbox" id="asthmaOther" name="isOther[]" value="false" {{ $histories->contains('illnesses', 'Asthma') ? 'checked' : '' }} hidden>
                        <label class="form-check-label" for="asthma">Asthma</label>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="allergy" name="illnesses[]" value="Allergy" onchange="checkOther(allergyOther, this)" {{ $histories->contains('illnesses', 'Allergy') ? 'checked' : '' }}>
                      <input class="form-check-input" type="checkbox" id="allergyOther" name="isOther[]" value="false" {{ $histories->contains('illnesses', 'Allergy') ? 'checked' : '' }} hidden>
                      <label class="form-check-label" for="allergy">Allergy (Food, Medicine)</label>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="hepatitis" name="illnesses[]" value="Hepatitis" onchange="checkOther(hepatitisOther, this)" {{ $histories->contains('illnesses', 'Hepatitis') ? 'checked' : '' }}>
                      <input class="form-check-input" type="checkbox" id="hepatitisOther" name="isOther[]" value="false" {{ $histories->contains('illnesses', 'Hepatitis') ? 'checked' : '' }} hidden>
                      <label class="form-check-label" for="hepatitis">Hepatitis</label>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="seizures" name="illnesses[]" value="Seizures (Convulsions)" onchange="checkOther(seizuresOther, this)" {{ $histories->contains('illnesses', 'Seizures (Convulsions)') ? 'checked' : '' }}>
                      <input class="form-check-input" type="checkbox" id="seizuresOther" name="isOther[]" value="false" {{ $histories->contains('illnesses', 'Seizures (Convulsions)') ? 'checked' : '' }} hidden>
                      <label class="form-check-label" for="seizures">Seizures (Convulsions)</label>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="scoliosis" name="illnesses[]" value="Scoliosis" onchange="checkOther(scoliosisOther, this)" {{ $histories->contains('illnesses', 'Scoliosis') ? 'checked' : '' }}>
                      <input class="form-check-input" type="checkbox" id="scoliosisOther" name="isOther[]" value="false" {{ $histories->contains('illnesses', 'Scoliosis') ? 'checked' : '' }} hidden>
                      <label class="form-check-label" for="scoliosis">Scoliosis</label>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="PPL" name="illnesses[]" value="Primary Pulmonary Infection" onchange="checkOther(pplOther, this)" {{ $histories->contains('illnesses', 'Primary Pulmonary Infection') ? 'checked' : '' }}>
                      <input class="form-check-input" type="checkbox" id="pplOther" name="isOther[]" value="false" {{ $histories->contains('illnesses', 'Primary Pulmonary Infection') ? 'checked' : '' }} hidden>
                      <label class="form-check-label" for="PPL">Primary Pulmonary Infection</label>
                    </div>
                </fieldset>
            </div>
            <div class="col-md-6 d-flex flex-column">
                <fieldset>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="otitis" name="illnesses[]" value="Otitis Externa/Media (Ear Discharge)" onchange="checkOther(otitisOther, this)" {{ $histories->contains('illnesses', 'Otitis Externa/Media (Ear Discharge)') ? 'checked' : '' }}>
                        <input class="form-check-input" type="checkbox" id="otitisOther" name="isOther[]" value="false" {{ $histories->contains('illnesses', 'Otitis Externa/Media (Ear Discharge)') ? 'checked' : '' }} hidden>
                        <label class="form-check-label" for="otitis">Otitis Externa/Media (Ear Discharge)</label>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="UTI" name="illnesses[]" value="Urinary Tract Infection" onchange="checkOther(utiOther, this)" {{ $histories->contains('illnesses', 'Urinary Tract Infection') ? 'checked' : '' }}>
                        <input class="form-check-input" type="checkbox" id="utiOther" name="isOther[]" value="false" {{ $histories->contains('illnesses', 'Urinary Tract Infection') ? 'checked' : '' }} hidden>
                        <label class="form-check-label" for="UTI">Urinary Tract Infection</label>
                    </div>
                </fieldset>
                <fieldset>    
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="chickenPox" name="illnesses[]" value="Chicken Pox" onchange="checkOther(chickenpoxOther, this)" {{ $histories->contains('illnesses', 'Chicken Pox') ? 'checked' : '' }}>
                        <input class="form-check-input" type="checkbox" id="chickenpoxOther" name="isOther[]" value="false" {{ $histories->contains('illnesses', 'Chicken Pox') ? 'checked' : '' }} hidden>
                        <label class="form-check-label" for="chickenPox">Chicken Pox</label>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="mumps" name="illnesses[]" value="Mumps" onchange="checkOther(mumpsOther, this)" {{ $histories->contains('illnesses', 'Mumps') ? 'checked' : '' }}>
                        <input class="form-check-input" type="checkbox" id="mumpsOther" name="isOther[]" value="false" {{ $histories->contains('illnesses', 'Mumps') ? 'checked' : '' }} hidden>
                        <label class="form-check-label" for="mumps">Mumps</label>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="typhoid" name="illnesses[]" value="Typhoid" onchange="checkOther(typhoidOther, this)" {{ $histories->contains('illnesses', 'Typhoid') ? 'checked' : '' }}>
                        <input class="form-check-input" type="checkbox" id="typhoidOther" name="isOther[]" value="false" {{ $histories->contains('illnesses', 'Typhoid') ? 'checked' : '' }} hidden>
                        <label class="form-check-label" for="typhoid">Typhoid</label>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="nosebleeding" name="illnesses[]" value="Nose Bleeding" onchange="checkOther(nosebleedOther, this)" {{ $histories->contains('illnesses', 'Nose Bleeding') ? 'checked' : '' }}>
                        <input class="form-check-input" type="checkbox" id="nosebleedOther" name="isOther[]" value="false" {{ $histories->contains('illnesses', 'Nose Bleeding') ? 'checked' : '' }} hidden>
                        <label class="form-check-label" for="noseBleeding">Nose Bleeding</label>
                    </div>
                </fieldset>
                <fieldset>   
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="ulcer" name="illnesses[]" value="Ulcer" onchange="checkOther(ulcerOther, this)" {{ $histories->contains('illnesses', 'Ulcer') ? 'checked' : '' }}>
                        <input class="form-check-input" type="checkbox" id="ulcerOther" name="isOther[]" value="false" {{ $histories->contains('illnesses', 'Ulcer') ? 'checked' : '' }} hidden>
                        <label class="form-check-label" for="ulcer">Ulcer</label>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="anemia" name="illnesses[]" value="Anemia" onchange="checkOther(anemiaOther, this)" {{ $histories->contains('illnesses', 'Anemia') ? 'checked' : '' }}>
                        <input class="form-check-input" type="checkbox" id="anemiaOther" name="isOther[]" value="false" {{ $histories->contains('illnesses', 'Anemia') ? 'checked' : '' }} hidden>
                        <label class="form-check-label" for="anemia">Anemia</label>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-check form-check-inline mb-3">
                        <input class="form-check-input" type="checkbox" id="tonsillitis" name="illnesses[]" value="Tonsillitis" onchange="checkOther(tonsillitisOther, this)" {{ $histories->contains('illnesses', 'Tonsillitis') ? 'checked' : '' }}>
                        <input class="form-check-input" type="checkbox" id="tonsillitisOther" name="isOther[]" value="false" {{ $histories->contains('illnesses', 'Tonsillitis') ? 'checked' : '' }} hidden>
                        <label class="form-check-label" for="tonsillitis">Tonsillitis</label>
                    </div>
                </fieldset>
            </div>
        </div>
        <div class="row d-flex flex-column justify-content-center ml-1 inputs_div w-100 mb-3">
            <div class="form-row d-flex align-items-center">
                <label class="w-100 d-flex justify-content-between" for="otherIllness">Other
                    <button class="btn btn-primary btn-sm btn-fab btn-icon btn-round add mr-2" type="button">
                        <i class="fas fa-plus"></i>
                    </button>
                </label>
            </div>
            @if (!empty($otherHistories))
                @foreach ($otherHistories as $other)
                <div class="form-row d-flex justify-content-between align-items-start w-100">
                    <fieldset>
                        <div class="form-group">
                            <input type="text" class="form-control" id="otherIllness" name="illnesses[]" value="{{ $other->illnesses }}">
                            <input class="form-check-input" type="text" name="isOther[]" value="true" hidden>
                        </div>
                    </fieldset>
                    <button class="btn btn-danger btn-sm btn-fab btn-icon btn-round remove mt-2" type="button">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
                @endforeach
            @endif
        </div>
        <button type="submit" class="nav-link btn float-right" style="background-color: blue; color: white;">{{ Route::currentRouteName('employee.history.edit') ? 'Update' : 'Save' }}</button>
    </form>
</div>
@endsection

@section('js')
<script>
  $(document).ready(function () {
    $(this).on("click", ".add", function(){
        var html = '<div class="form-row d-flex justify-content-between align-items-start w-100"><fieldset><div class="form-group"><input type="text" class="form-control" id="otherIllness" name="illnesses[]"><input class="form-check-input" type="text" name="isOther[]" value="true" hidden></div></fieldset><button class="btn btn-danger btn-sm btn-fab btn-icon btn-round remove mt-2" type="button"><i class="fas fa-minus"></i></button></div>'
        $('.inputs_div').append(html);
    });
    $(this).on("click", ".remove", function(){
        var target_input = $(this).parent();
        target_input.remove();
    });
  })

    function checkOther(isOther, el){

        var isChecked= el.checked;
        
        if(isChecked){ //checked
            document.getElementById(isOther.id).checked = true
        }else{ //unchecked
            document.getElementById(isOther.id).checked = false
        }
    }
</script>
@endsection