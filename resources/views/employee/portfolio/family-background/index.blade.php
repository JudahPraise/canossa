@extends('employee.portfolio.index')

@section('portfolio')

<div class="container-fluid">

    <div class="row">
        @yield('family')
    </div>

    @if(url()->current() === route('family.index', 'card') || url()->current() === route('family.index', 'list'))
        <div class="row row-cols-1 row-cols-md-2 mt-3">
            <div class="col mb-3 d-flex flex-column">
                <strong style="color: black; font-size: 1.5rem">Spouse</strong>
                <div class="row row-cols-1 row-cols-md-2 mt-3">
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">Name</strong>
                        @if (!empty(auth()->user()->family->spouse))
                            <strong style="color: black; font-size: 1.3rem">{{ $family->spouse->spouseFullname() }}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                    </div>
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">Occupation</strong>
                        @if (!empty(auth()->user()->family->spouse))
                            <strong style="color: black; font-size: 1.3rem">{{ $family->spouse->occupation }}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-2">
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">Employer business name</strong>
                        @if (!empty(auth()->user()->family->spouse))
                            <strong style="color: black; font-size: 1.3rem">{{ $family->spouse->employer_business_name}}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                    </div>
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">Business address</strong>
                        @if (!empty(auth()->user()->family->spouse))
                            <strong style="color: black; font-size: 1.3rem">{{ $family->spouse->business_address }}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                        
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-1">
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">Telephone number</strong>
                        @if (!empty(auth()->user()->family->spouse))
                            <strong style="color: black; font-size: 1.3rem">{{ $family->spouse->tel_no}}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                    </div>
                </div>
                <hr>
                <strong style="color: black; font-size: 1.5rem">Children</strong>
                <div class="row row-cols-1 row-cols-md-2 mt-3">
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">Name</strong>
                        <strong style="color: black; font-size: 1.3rem">Not Set</strong>
                    </div>
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">Occupation</strong>
                        <strong style="color: black; font-size: 1.3rem">Not Set</strong>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-2">
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">Employer business name</strong>
                        <strong style="color: black; font-size: 1.3rem">Not Set</strong>
                    </div>
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">Business address</strong>
                        <strong style="color: black; font-size: 1.3rem">Not Set</strong>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-1">
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">Telephone number</strong>
                        <strong style="color: black; font-size: 1.3rem">Not Set</strong>
                    </div>
                </div>
            </div>
            <div class="col mb-3 d-flex flex-column">
                <strong style="color: black; font-size: 1.5rem">Mother</strong>
                <div class="row row-cols-1 row-cols-md-2 mt-3">
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">Name</strong>
                        @if (!empty(auth()->user()->family->mother))
                            <strong style="color: black; font-size: 1.3rem">{{ $family->mother->motherFullname() }}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                    </div>
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">Occupation</strong>
                        @if (!empty(auth()->user()->family->mother))
                            <strong style="color: black; font-size: 1.3rem">{{ $family->mother->occupation }}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-2">
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">Employer business name</strong>
                        @if (!empty(auth()->user()->family->mother))
                            <strong style="color: black; font-size: 1.3rem">{{ $family->mother->employer_business_name}}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                    </div>
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">Business address</strong>
                        @if (!empty(auth()->user()->family->mother))
                            <strong style="color: black; font-size: 1.3rem">{{ $family->mother->business_address }}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                        
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-1">
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">Telephone number</strong>
                        @if (!empty(auth()->user()->family->mother))
                            <strong style="color: black; font-size: 1.3rem">{{ $family->mother->tel_no}}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                    </div>
                </div>
                <hr>
                <strong style="color: black; font-size: 1.5rem">Father</strong>
                <div class="row row-cols-1 row-cols-md-2 mt-3">
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">Name</strong>
                        @if (!empty(auth()->user()->family->father))
                            <strong style="color: black; font-size: 1.3rem">{{ $family->father->fatherFullname() }}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                    </div>
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">Occupation</strong>
                        @if (!empty(auth()->user()->family->father))
                            <strong style="color: black; font-size: 1.3rem">{{ $family->father->occupation }}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-2">
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">Employer business name</strong>
                        @if (!empty(auth()->user()->family->father))
                            <strong style="color: black; font-size: 1.3rem">{{ $family->father->employer_business_name}}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                    </div>
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">Business address</strong>
                        @if (!empty(auth()->user()->family->father))
                            <strong style="color: black; font-size: 1.3rem">{{ $family->father->business_address }}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                        
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-1">
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">Telephone number</strong>
                        @if (!empty(auth()->user()->family->father))
                            <strong style="color: black; font-size: 1.3rem">{{ $family->father->tel_no}}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
    
</div>
@endsection