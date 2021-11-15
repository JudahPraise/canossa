@extends('employee.medical.create')

@section('create-record-section')
<div class="row d-flex flex-column px-3 w-100">
   <form action="{{ route('employee.hospitalization.store') }}" method="POST">
    @csrf
        <div class="form-row mb-3 d-flex justify-content-between align-items-center">
            <h3>Hospitalization Create</h3>
            <button type="submit" class="nav-link btn" style="background-color: blue; color: white;">Save</button>
        </div>
        <div class="form-row mb-3">
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
        <div class="form-row mb-3">
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