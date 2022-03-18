@extends('employee.medical.create')

@section('create-record-section')
@component('components.alerts')@endcomponent
<div class="row d-flex flex-column w-100">
    <h3>Hospitalization Update</h3>
    <div class="form-row mb-3">
        <div class="col-6">
            <div class="form-group">
                <label for="">Disease</label>
                <input type="text" class="form-control" name="disease" value="{{ $hospitalization->disease }}">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label>Date</label>
                <input type="date" class="form-control" name="d_date" value="{{ $hospitalization->d_date }}">
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-6">
            <div class="form-group mb-2">
                <label for="">Operation</label>
                <input type="text" class="form-control" name="operation" value="{{ $hospitalization->operation }}">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group mb-2">
                <label>Date</label>
                <input type="date" class="form-control" name="o_date" value="{{ $hospitalization->o_date }}">
            </div>
        </div>
    </div>
</div>

@endsection