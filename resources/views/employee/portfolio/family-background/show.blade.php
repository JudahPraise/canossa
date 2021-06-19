@extends('employee.portfolio.family-background.index')

@section('family')
<div class="container-fluid">
    <div class="row w-100 m-0">
        <div class="card has-no-shadow w-100">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                      <h1 class="mb-0">Family Background</h1>
                    </div>
                    <div class="col text-right">
                      <a href="{{ route('family.index', 'card') }}" class="btn btn-icon btn-light" type="button">
                          <span class="btn-inner--icon"><i class="fas fa-caret-left"></i></span>
                      </a>
                    </div>
                </div>
            </div>
            <div class="card-body w-100">
                <div class="row d-flex">
                    <div class="col-md-6">
                        <strong style="font-weight: bold; color: black; font-size: 1.5rem">Spouse</strong>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="{{ !empty(auth()->user()->family->spouse) ? route('spouse.edit', $family->spouse->id ) : '#' }}" class="btn btn-icon btn-info mr-2" type="button">
                            <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                        </a>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-2 mt-3">
                    <div class="col mb-3 d-flex flex-column">
                        <small style="font-size: 1rem">Name</small>
                        @if (!empty(auth()->user()->family->spouse))
                            <strong style="color: black; font-size: 1.3rem">{{ $family->spouse->spouseFullname() }}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                    </div>
                    <div class="col mb-3 d-flex flex-column">
                        <small style="font-size: 1rem">Occupation</small>
                        @if (!empty(auth()->user()->family->spouse))
                            <strong style="color: black; font-size: 1.3rem">{{ $family->spouse->occupation }}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-2">
                    <div class="col mb-3 d-flex flex-column">
                        <small style="font-size: 1rem">Employer business name</small>
                        @if (!empty(auth()->user()->family->spouse))
                            <strong style="color: black; font-size: 1.3rem">{{ $family->spouse->employer_business_name}}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                    </div>
                    <div class="col mb-3 d-flex flex-column">
                        <small style="font-size: 1rem">Business address</small>
                        @if (!empty(auth()->user()->family->spouse))
                            <strong style="color: black; font-size: 1.3rem">{{ $family->spouse->business_address }}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                        
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-1">
                    <div class="col mb-3 d-flex flex-column">
                        <small style="font-size: 1rem">Telephone number</small>
                        @if (!empty(auth()->user()->family->spouse))
                            <strong style="color: black; font-size: 1.3rem">{{ $family->spouse->tel_no}}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                    </div>
                </div>
                <hr>
                <div class="row d-flex">
                    <div class="col-md-6">
                        <strong style="font-weight: bold; color: black; font-size: 1.5rem">Children</strong>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="{{ !empty(auth()->user()->family->children) ? route('children.edit', $family->id ) : '#' }}" class="btn btn-icon btn-info mr-2" type="button">
                            <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                        </a>
                    </div>
                </div>
                @forelse ($children as $child)
                    <div class="row row-cols-1 row-cols-md-2 mt-3">
                        <div class="col mb-3 d-flex flex-column">
                            <small style="font-size: 1rem">Name</small>
                            <strong style="color: black; font-size: 1.3rem">{{ $child->name }}</strong>
                        </div>
                        <div class="col mb-3 d-flex flex-column">
                            <small style="font-size: 1rem">Date of birth</small>
                            <strong style="color: black; font-size: 1.3rem">{{ $child->date_of_birth }}</strong>
                        </div>
                    </div>
                @empty
                    <div class="row d-flex justify-content-center">
                        <small>No Data</small>
                    </div>
                @endforelse
                <hr>
                <div class="row d-flex">
                    <div class="col-md-6">
                        <strong style="font-weight: bold; color: black; font-size: 1.5rem">Mother</strong>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="{{ !empty(auth()->user()->family->mother) ? route('mother.edit', $family->mother->id ) : '#' }}" class="btn btn-icon btn-info mr-2" type="button">
                            <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                        </a>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-2 mt-3">
                    <div class="col mb-3 d-flex flex-column">
                        <small style="font-size: 1rem">Name</small>
                        @if (!empty(auth()->user()->family->mother))
                            <strong style="color: black; font-size: 1.3rem">{{ $family->mother->motherFullname() }}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                    </div>
                    <div class="col mb-3 d-flex flex-column">
                        <small style="font-size: 1rem">Occupation</small>
                        @if (!empty(auth()->user()->family->mother))
                            <strong style="color: black; font-size: 1.3rem">{{ $family->mother->occupation }}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-2">
                    <div class="col mb-3 d-flex flex-column">
                        <small style="font-size: 1rem">Employer business name</small>
                        @if (!empty(auth()->user()->family->mother))
                            <strong style="color: black; font-size: 1.3rem">{{ $family->mother->employer_business_name}}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                    </div>
                    <div class="col mb-3 d-flex flex-column">
                        <small style="font-size: 1rem">Business address</small>
                        @if (!empty(auth()->user()->family->mother))
                            <strong style="color: black; font-size: 1.3rem">{{ $family->mother->business_address }}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                        
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-1">
                    <div class="col mb-3 d-flex flex-column">
                        <small style="font-size: 1rem">Telephone number</small>
                        @if (!empty(auth()->user()->family->mother))
                            <strong style="color: black; font-size: 1.3rem">{{ $family->mother->tel_no}}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                    </div>
                </div>
                <hr>
                <div class="row d-flex">
                    <div class="col-md-6">
                        <strong style="font-weight: bold; color: black; font-size: 1.5rem">Father</strong>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="{{ !empty(auth()->user()->family->father) ? route('father.edit', $family->father->id ) : '#' }}" class="btn btn-icon btn-info mr-2" type="button">
                            <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                        </a>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-2 mt-3">
                    <div class="col mb-3 d-flex flex-column">
                        <small style="font-size: 1rem">Name</small>
                        @if (!empty(auth()->user()->family->father))
                            <strong style="color: black; font-size: 1.3rem">{{ $family->father->fatherFullname() }}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                    </div>
                    <div class="col mb-3 d-flex flex-column">
                        <small style="font-size: 1rem">Occupation</small>
                        @if (!empty(auth()->user()->family->father))
                            <strong style="color: black; font-size: 1.3rem">{{ $family->father->occupation }}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-2">
                    <div class="col mb-3 d-flex flex-column">
                        <small style="font-size: 1rem">Employer business name</small>
                        @if (!empty(auth()->user()->family->father))
                            <strong style="color: black; font-size: 1.3rem">{{ $family->father->employer_business_name}}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                    </div>
                    <div class="col mb-3 d-flex flex-column">
                        <small style="font-size: 1rem">Business address</small>
                        @if (!empty(auth()->user()->family->father))
                            <strong style="color: black; font-size: 1.3rem">{{ $family->father->business_address }}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                        
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-1">
                    <div class="col mb-3 d-flex flex-column">
                        <small style="font-size: 1rem">Telephone number</small>
                        @if (!empty(auth()->user()->family->father))
                            <strong style="color: black; font-size: 1.3rem">{{ $family->father->tel_no}}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
