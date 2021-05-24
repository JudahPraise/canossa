@extends('employee.portfolio.family-background.mother.index')

@section('mother')
<div class="container-fluid">
    <div class="row row-cols-1 row-cols-md-3 mt-3">
        <div class="col mb-3 d-flex flex-column">
            <strong style="font-size: 1rem">Name</strong>
            <strong style="color: black; font-size: 1.3rem">{{ $mother->motherFullname() }}</strong>
        </div>
        <div class="col mb-3 d-flex flex-column">
            <strong style="font-size: 1rem">Occupation</strong>
            <strong style="color: black; font-size: 1.3rem">{{ $mother->occupation }}</strong>
        </div>
        <div class="col mb-3 d-flex flex-column">
            <strong style="font-size: 1rem">Employer business name</strong>
            <strong style="color: black; font-size: 1.3rem">{{ $mother->employer_business_name}}</strong>
        </div>
        <div class="col mb-3 d-flex flex-column">
            <strong style="font-size: 1rem">Business address</strong>
            <strong style="color: black; font-size: 1.3rem">{{ $mother->business_address }}</strong>
        </div>
        <div class="col mb-3 d-flex flex-column">
            <strong style="font-size: 1rem">Telephone number</strong>
            <strong style="color: black; font-size: 1.3rem">{{ $mother->tel_no}}</strong>
        </div>
    </div>
</div>
@endsection