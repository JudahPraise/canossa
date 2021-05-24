@extends('employee.portfolio.family-background.index')

@section('family')
    <div class="container-fluid p-0 ">
      <div class="row pt-5">
        <div class="col-6 d-flex align-items-center" style="height: 4rem;">
          <h3 class="font-weight-bold" style="color: black">Family Background</h3>
        </div>
        <div class="col-6 d-flex justify-content-end align-items-center" style="height: 4rem;">
            <a href="{{ route('portfolio.index', 'card') }}" class="neu-effect d-flex justify-content-center align-items-center mr-2 text-decoration-none py-2 px-3" style="display:inline-block; "><i class="fas fa-caret-left" style="font-size: 1.6rem"></i></a>
            <a href="{{ route('family.index', 'card') }}" class="neu-effect d-flex justify-content-center align-items-center mr-2 text-decoration-none p-2" style="display:inline-block; "><i class="fas fa-th-large" style="font-size: 1.4rem"></i></a>
            <a href="{{ route('family.index', 'list') }}" class="neu-effect d-flex justify-content-center align-items-center text-decoration-none p-2" style="display:inline-block; "><i class="fas fa-th-list" style="font-size: 1.4rem"></i></a>
        </div>
      </div>
        <div class="row row-cols-2 row-cols-md-4 mt-3">
          <div class="col mb-4 box">
            @if (!empty(auth()->user()->personal()->civil_status))
              @if (auth()->user()->personal()->civil_status === 'Single')
                <div class="stack-top">
                  <span class="d-flex flex-column align-items-center">
                    <span><i class="fas fa-lock mb-3" style="color: white; font-size: 3rem"></i></span>
                    <small class="mb-3" style="color: white; font-size: 1rem">You're civil status is {{ auth()->user()->personal()->civil_status }}</small>
                  </span>
                </div>
              @endif
            @endif
            <div class="card has-no-shadow">
              <a href="{{ !empty(auth()->user()->family->spouse) ? route('spouse.show', Auth::user()->id) : route('spouse.create') }}" class="card__image">
                <img src="{{ asset('img/for-family/spouse.png') }}">
              </a>
              <div class="card__content">
                <p class="grid has-no-col-padding has-text-grey">
                  <small class="column">
                      @if (!empty(auth()->user()->family->spouse))
                        Updated at {{ auth()->user()->family->spouse->created_at->diffForHumans() }}
                      @else
                        No Data
                      @endif
                  </small>
                </p>
                <a href="{{ !empty(auth()->user()->family->spouse) ? route('spouse.show', Auth::user()->id) : route('spouse.create') }}" class="is-hover-underline has-text-black">
                  <h5 style="font-weight: bold">Spouse</h5>
                </a>
              </div>
            </div>  
          </div>
          <div class="col mb-4">
              <div class="card has-no-shadow">
                  <a href="#" class="card__image">
                    <img src="{{ asset('img/for-family/children.png') }}">
                  </a>
                  <div class="card__content">
                    <p class="grid has-no-col-padding has-text-grey">
                      <small class="column">No Data</small>
                    </p>
                    <a href="#" class="is-hover-underline has-text-black">
                      <h5 style="font-weight: bold">Children</h5>
                    </a>
                  </div>
              </div>
          </div>
          <div class="col mb-4">
             <div class="card has-no-shadow">
                  <a href="{{ !empty(auth()->user()->family->father) ? route('father.show', Auth::user()->id) : route('father.create') }}" class="card__image">
                    <img src="{{ asset('img/for-family/father.png') }}">
                  </a>
                  <div class="card__content">
                    <p class="grid has-no-col-padding has-text-grey">
                      <small class="column">
                        @if (!empty(auth()->user()->family->father))
                          Updated at {{ auth()->user()->family->father->created_at->diffForHumans() }}
                        @else
                          No Data
                        @endif
                      </small>
                    </p>
                    <a href="{{ !empty(auth()->user()->family->father) ? route('father.show', Auth::user()->id) : route('father.create') }}" class="is-hover-underline has-text-black">
                      <h5 style="font-weight: bold">Father</h5>
                    </a>
                  </div>
              </div>
          </div>
          <div class="col mb-4">
              <div class="card has-no-shadow">
                <a href="{{ !empty(auth()->user()->family->mother) ? route('mother.show', Auth::user()->id) : route('mother.create') }}" class="card__image">
                  <img src="{{ asset('img/for-family/mother.png') }}">
                </a>
                <div class="card__content">
                  <p class="grid has-no-col-padding has-text-grey">
                    <small class="column">
                      @if (!empty(auth()->user()->family->mother))
                        Updated at {{ auth()->user()->family->mother->created_at->diffForHumans() }}
                      @else
                        No Data
                      @endif
                    </small>
                  </p>
                  <a href="{{ !empty(auth()->user()->family->mother) ? route('mother.show', Auth::user()->id) : route('mother.create') }}" class="is-hover-underline has-text-black">
                    <h5 style="font-weight: bold">Mother</h5>
                  </a>
                </div>
              </div>
          </div>
      </div>
    </div>
@endsection