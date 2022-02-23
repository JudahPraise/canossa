@extends('employee.portfolio.family-background.index')

@section('family')
<div class="container-fluid">
    @component('components.alerts')@endcomponent
    <div class="row w-100 m-0">
        <div class="card has-no-shadow w-100">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                      <h2 class="mb-0">Family Background</h2>
                    </div>
                    <div class="col text-right">
                      <a href="{{ route('family.index', 'card') }}" class="btn btn-sm btn-icon btn-light" type="button">
                          <span class="btn-inner--icon"><i class="fas fa-caret-left"></i></span>
                      </a>
                    </div>
                </div>
            </div>
            <div class="card-body w-100">
                <div class="row px-2 d-flex align-items-center justify-content-between">
                        <strong style="font-weight: bold; color: black; font-size: 1.3rem">Spouse</strong>
                        <a href="{{ !empty(auth()->user()->family->spouse) ? route('spouse.edit', auth()->user()->id ) : route('spouse.create') }}" class="btn btn-sm btn-icon mr-2 {{ !empty(auth()->user()->family->spouse) ? 'btn-info' : 'btn-success' }}" type="button">
                            <span class="btn-inner--icon"><i class="fas {{ !empty(auth()->user()->family->spouse) ? 'fa-edit' : 'fa-plus' }}"></i></span>
                        </a>
                </div>
                <div class="row row-cols-1 row-cols-md-2 mt-3">
                    <div class="col mb-3 d-flex flex-column">
                        <small style="font-size: .8rem">Name</small>
                        @if (!empty(auth()->user()->family->spouse))
                            <strong style="color: black; font-size: 1.3rem">{{ $family->spouse->spouseFullname() }}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                    </div>
                    <div class="col mb-3 d-flex flex-column">
                        <small style="font-size: .8rem">Occupation</small>
                        @if (!empty(auth()->user()->family->spouse))
                            <strong style="color: black; font-size: 1.3rem">{{!empty($family->spouse->occupation) ? $family->spouse->occupation : 'N/A'}}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-2">
                    <div class="col mb-3 d-flex flex-column">
                        <small style="font-size: .8rem">Employer business name</small>
                        @if (!empty(auth()->user()->family->spouse))
                            <strong style="color: black; font-size: 1.3rem">{{!empty($family->spouse->employer_business_name) ? $family->spouse->employer_business_name : 'N/A'}}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                    </div>
                    <div class="col mb-3 d-flex flex-column">
                        <small style="font-size: .8rem">Business address</small>
                        @if (!empty(auth()->user()->family->spouse))
                            <strong style="color: black; font-size: 1.3rem">{{!empty($family->spouse->business_address) ? $family->spouse->business_address : 'N/A'}}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                        
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-1">
                    <div class="col mb-3 d-flex flex-column">
                        <small style="font-size: .8rem">Telephone number</small>
                        @if (!empty(auth()->user()->family->spouse))
                            <strong style="color: black; font-size: 1.3rem">{{!empty($family->spouse->tel_no) ? $family->spouse->tel_no : 'N/A'}}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                    </div>
                </div>
                <hr>
                <div class="row px-2 d-flex justify-content-between">
                    <strong class="justify-self-start" style="font-weight: bold; color: black; font-size: 1.3rem">Children</strong>
                    <div>
                        <a href="{{ !empty(auth()->user()->family->children) ? route('children.edit', $family->id ) : '#' }}" class="btn btn-sm btn-icon btn-info mr-2" type="button">
                            <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                        </a>
                        <a href="{{ route('children.create') }}" class="btn btn-icon btn-success btn-sm" type="button">
                            <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                        </a>
                    </div>
                </div>
                @forelse ($children as $child)
                    <div class="row row-cols-1 row-cols-md-2 mt-3">
                        <div class="col mb-3 d-flex flex-column">
                            <small style="font-size: .8rem">Name</small>
                            <strong style="color: black; font-size: 1.3rem">{{ $child->name }}</strong>
                        </div>
                        <div class="col mb-3 d-flex flex-column">
                            <small style="font-size: .8rem">Date of birth</small>
                            <strong style="color: black; font-size: 1.3rem">{{ $child->date_of_birth }}</strong>
                        </div>
                    </div>
                @empty
                    <div class="row d-flex justify-content-center">
                        <small>No Data</small>
                    </div>
                @endforelse
                <hr>
                <div class="row px-2 d-flex justify-content-between align-items-cent">
                        <strong style="font-weight: bold; color: black; font-size: 1.3rem">Mother</strong>
                        <a href="{{ !empty(auth()->user()->family->mother) ? route('mother.edit', auth()->user()->id ) : route('mother.create') }}" class="btn btn-sm btn-icon mr-2 {{ !empty(auth()->user()->family->mother) ? 'btn-info' : 'btn-success' }}" type="button">
                            <span class="btn-inner--icon"><i class="fas {{ !empty(auth()->user()->family->mother) ? 'fa-edit' : 'fa-plus' }}"></i></span>
                        </a>
                </div>
                <div class="row row-cols-1 row-cols-md-2 mt-3">
                    <div class="col mb-3 d-flex flex-column">
                        <small style="font-size: .8rem">Name</small>
                        @if (!empty(auth()->user()->family->mother))
                            <strong style="color: black; font-size: 1.3rem">{{ $family->mother->motherFullname() }}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                    </div>
                    <div class="col mb-3 d-flex flex-column">
                        <small style="font-size: .8rem">Occupation</small>
                        @if (!empty(auth()->user()->family->mother))
                            <strong style="color: black; font-size: 1.3rem">{{ !empty($family->mother->occupation) ? $family->mother->occupation : 'N/A' }}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-2">
                    <div class="col mb-3 d-flex flex-column">
                        <small style="font-size: .8rem">Employer business name</small>
                        @if (!empty(auth()->user()->family->mother))
                            <strong style="color: black; font-size: 1.3rem">{{ !empty($family->mother->employer_business_name) ? $family->mother->employer_business_name : 'N/A' }}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                    </div>
                    <div class="col mb-3 d-flex flex-column">
                        <small style="font-size: .8rem">Business address</small>
                        @if (!empty(auth()->user()->family->mother))
                            <strong style="color: black; font-size: 1.3rem">{{ !empty($family->mother->business_address) ? $family->mother->business_address : 'N/A' }}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                        
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-1">
                    <div class="col mb-3 d-flex flex-column">
                        <small style="font-size: .8rem">Telephone number</small>
                        @if (!empty(auth()->user()->family->mother))
                            <strong style="color: black; font-size: 1.3rem">{{ !empty($family->mother->tel_no) ? $family->mother->tel_no : 'N/A' }}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                    </div>
                </div>
                <hr>
                <div class="row px-2 d-flex justify-content-between align-items-center">
                        <strong style="font-weight: bold; color: black; font-size: 1.3rem">Father</strong>
                        <a href="{{ !empty(auth()->user()->family->father) ? route('father.edit', auth()->user()->id ) : route('father.create') }}" class="btn btn-sm btn-icon mr-2 {{ !empty(auth()->user()->family->father) ? 'btn-info' : 'btn-success' }}" type="button">
                            <span class="btn-inner--icon"><i class="fas {{ !empty(auth()->user()->family->father) ? 'fa-edit' : 'fa-plus' }}"></i></span>
                        </a>
                </div>
                <div class="row row-cols-1 row-cols-md-2 mt-3">
                    <div class="col mb-3 d-flex flex-column">
                        <small style="font-size: .8rem">Name</small>
                        @if (!empty(auth()->user()->family->father))
                            <strong style="color: black; font-size: 1.3rem">{{ $family->father->fatherFullname() }}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                    </div>
                    <div class="col mb-3 d-flex flex-column">
                        <small style="font-size: .8rem">Occupation</small>
                        @if (!empty(auth()->user()->family->father))
                            <strong style="color: black; font-size: 1.3rem">{{ !empty($family->father->occupation) ? $family->father->occupation : 'N/A' }}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-2">
                    <div class="col mb-3 d-flex flex-column">
                        <small style="font-size: .8rem">Employer business name</small>
                        @if (!empty(auth()->user()->family->father))
                            <strong style="color: black; font-size: 1.3rem">{{ !empty($family->father->employer_business_name) ? $family->father->employer_business_name : 'N/A' }}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                    </div>
                    <div class="col mb-3 d-flex flex-column">
                        <small style="font-size: .8rem">Business address</small>
                        @if (!empty(auth()->user()->family->father))
                            <strong style="color: black; font-size: 1.3rem">{{ !empty($family->father->business_address) ? $family->father->business_address : 'N/A' }}</strong>
                        @else
                            <strong style="color: black; font-size: 1.3rem">Not set</strong>
                        @endif
                        
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-1">
                    <div class="col mb-3 d-flex flex-column">
                        <small style="font-size: .8rem">Telephone number</small>
                        @if (!empty(auth()->user()->family->father))
                            <strong style="color: black; font-size: 1.3rem">{{ !empty($family->father->tel_no) ? $family->father->tel_no : 'N/A' }}</strong>
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
