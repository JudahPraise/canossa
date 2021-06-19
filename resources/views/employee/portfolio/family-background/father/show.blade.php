@extends('employee.portfolio.family-background.father.index')

@section('father')
<div class="container-fluid">
    <div class="row row-cols-1 row-cols-md-3 mt-3">
        <div class="col mb-3 d-flex flex-column">
            <small style="font-size: 1rem">Name</small>
            <strong style="color: black; font-size: 1.3rem">{{ $father->fatherFullname() }}</strong>
        </div>
        <div class="col mb-3 d-flex flex-column">
            <small style="font-size: 1rem">Occupation</small>
            <strong style="color: black; font-size: 1.3rem">{{ $father->occupation }}</strong>
        </div>
        <div class="col mb-3 d-flex flex-column">
            <small style="font-size: 1rem">Employer business name</small>
            <strong style="color: black; font-size: 1.3rem">{{ $father->employer_business_name}}</strong>
        </div>
        <div class="col mb-3 d-flex flex-column">
            <small style="font-size: 1rem">Business address</small>
            <strong style="color: black; font-size: 1.3rem">{{ $father->business_address }}</strong>
        </div>
        <div class="col mb-3 d-flex flex-column">
            <small style="font-size: 1rem">Telephone number</small>
            <strong style="color: black; font-size: 1.3rem">{{ $father->tel_no}}</strong>
        </div>
    </div>
</div>
@endsection