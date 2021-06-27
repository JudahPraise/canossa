@extends('employee.portfolio.family-background.mother.index')

@section('mother')
<div class="container-fluid">
    <div class="row row-cols-1 row-cols-md-3 mt-3">
        <div class="col mb-3 d-flex flex-column">
            <small style="font-size: 1rem">Name</small>
            <strong style="color: black; font-size: 1.3rem">{{ $mother->motherFullname() }}</strong>
        </div>
        <div class="col mb-3 d-flex flex-column">
            <small style="font-size: 1rem">Occupation</small>
            <strong style="color: black; font-size: 1.3rem">{{ $mother->occupation }}</strong>
        </div>
        <div class="col mb-3 d-flex flex-column">
            <small style="font-size: 1rem">Employer business name</small>
            <strong style="color: black; font-size: 1.3rem">{{ $mother->employer_business_name}}</strong>
        </div>
        <div class="col mb-3 d-flex flex-column">
            <small style="font-size: 1rem">Business address</small>
            <strong style="color: black; font-size: 1.3rem">{{ $mother->business_address }}</strong>
        </div>
        <div class="col mb-3 d-flex flex-column">
            <small style="font-size: 1rem">Telephone number</small>
            <strong style="color: black; font-size: 1.3rem">{{ $mother->tel_no}}</strong>
        </div>
    </div>
</div>
@endsection