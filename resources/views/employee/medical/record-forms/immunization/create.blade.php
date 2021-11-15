@extends('employee.medical.create')

@section('create-record-section')
<div class="row mb-3 px-3 w-100">
    <form action="">
        <div class="form-row mb-3 d-flex justify-content-between align-items-center">
            <span class="d-flex flex-column flex-lg-row">
                <h3>Immunization Status</h3>
                <small class="font-italic text-muted ml-2"><span class="text-danger mr-1">*</span>check if you has been ill of the following</small>
            </span>
            <button type="submit" class="nav-link btn" style="background-color: blue; color: white;">Save</button>
        </div>
        <div class="form-row mb-3">
            <div class="form-row mb-3 w-100">
                <div class="col-md-3 d-flex flex-column mb-2">
                    <label for="">Vaccine</label>
                    <label><input class="healthProblem" type="checkbox" name="vaccine_recieved[]" value="Covid-19"> Covid-19</label>
                </div>
                <div class="col-md-3 d-flex flex-column mb-2">
                    <label for="">Status</label>
                    <select class="custom-select" id="validationDefault04" name="status[]">
                        <option disabled selected>Choose...</option>
                        <option value="1st Dose">1st Dose</option>
                        <option value="Fully Vaccinated">Fully Vaccinated</option>
                    </select> 
                </div>
                <div class="col-md-3 d-flex flex-column mb-2">
                    <label for="">Brand</label>
                    <input type="text" class="form-control" name="brand[]">
                </div>
                <div class="col-md-3 d-flex flex-column mb-2">
                    <label>Date</label>
                    <input type="date" class="form-control" name="date[]">
                </div>
            </div>
            <div class="form-row mb-3 w-100">
                <div class="col-md-3 d-flex flex-column mb-2">
                    <label for="">Vaccine</label>
                    <label><input class="healthProblem" type="checkbox" name="vaccine_recieved[]" value="Flu"> Flu Vaccine</label>
                </div>
                <div class="col-md-3 d-flex flex-column mb-2">
                     <label for="">Status</label>
                    <select class="custom-select" id="validationDefault04" name="status[]">
                        <option disabled selected>Choose...</option>
                        <option value="1st Dose">1st Dose</option>
                        <option value="Fully Vaccinated">Fully Vaccinated</option>
                    </select> 
                </div>
                <div class="col-md-3 d-flex flex-column mb-2">
                     <label for="">Brand</label>
                    <input type="text" class="form-control"  name="brand[]">
                </div>
                <div class="col-md-3 d-flex flex-column mb-2">
                    <label>Date</label>
                    <input type="date" class="form-control"  name="date[]">
                </div>
            </div>
        </div>
    </form>
</div>
@endsection