@extends('employee.portfolio.family-background.spouse.index')

@section('spouse')
<div class="container-fluid">
    <div class="row row-cols-1 row-cols-md-3 mt-3">
        <div class="col mb-3 d-flex flex-column">
            <strong style="font-size: 1rem">Name</strong>
            <strong style="color: black; font-size: 1.3rem">{{ $spouse->spouseFullname() }}</strong>
        </div>
        <div class="col mb-3 d-flex flex-column">
            <strong style="font-size: 1rem">Occupation</strong>
            <strong style="color: black; font-size: 1.3rem">{{ $spouse->occupation }}</strong>
        </div>
        <div class="col mb-3 d-flex flex-column">
            <strong style="font-size: 1rem">Employer business name</strong>
            <strong style="color: black; font-size: 1.3rem">{{ $spouse->employer_business_name}}</strong>
        </div>
        <div class="col mb-3 d-flex flex-column">
            <strong style="font-size: 1rem">Business address</strong>
            <strong style="color: black; font-size: 1.3rem">{{ $spouse->business_address }}</strong>
        </div>
        <div class="col mb-3 d-flex flex-column">
            <strong style="font-size: 1rem">Telephone number</strong>
            <strong style="color: black; font-size: 1.3rem">{{ $spouse->tel_no}}</strong>
        </div>
    </div>
</div>
@endsection