@extends('employee.medical.create')

@section('create-record-section')
@component('components.alerts')@endcomponent
<x-medical-create-nav :id="$record->user_id"></x-medical-create-nav>

<div class="row d-flex flex-column px-3">
   <form class="w-100" action="{{ route('employee.hospitalization.store', $record->user_id) }}" method="POST">
    @csrf
        <div class="form-row mb-3 d-flex justify-content-between align-items-center">
            <h3>Hospitalization Create</h3>
            <button type="submit" class="nav-link btn" style="background-color: blue; color: white;">Save</button>
        </div>
        <div class="form-row mb-3 w-100">
            <div class="col-6">
                <div class="form-group">
                    <label for="">Disease</label>
                    <input type="text" class="form-control" name="disease">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" name="d_date">
                </div>
            </div>
        </div>
        <div class="form-row mb-3 w-100">
            <div class="col-6">
                <div class="form-group mb-2">
                    <label for="">Operation</label>
                    <input type="text" class="form-control" name="operation">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-2">
                    <label>Date</label>
                    <input type="date" class="form-control" name="o_date">
                </div>
            </div>
        </div>
   </form>
</div>

@endsection