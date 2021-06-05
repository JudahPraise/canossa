@extends('employee.portfolio.family-background.index')

@section('family')
    <div class="container-fluid cont">
      <div class="row">
        <div class="col-6 d-flex align-items-center" style="height: 4rem;">
          <h3 class="font-weight-bold" style="color: black">Family Background</h3>
        </div>
        <div class="col-6 d-flex justify-content-end align-items-center" style="height: 4rem;">
            <a href="{{ route('portfolio.index', 'card') }}" class="neu-effect d-flex justify-content-center align-items-center mr-2 text-decoration-none py-2 px-3" style="display:inline-block; "><i class="fas fa-caret-left text-primary" style="font-size: 1.6rem"></i></a>
            <a href="{{ route('family.index', 'card') }}" class="neu-effect d-flex justify-content-center align-items-center mr-2 text-decoration-none p-2" style="display:inline-block; "><i class="fas fa-th-large text-primary" style="font-size: 1.4rem"></i></a>
            <a href="{{ route('family.index', 'list') }}" class="neu-effect d-flex justify-content-center align-items-center text-decoration-none p-2" style="display:inline-block; "><i class="fas fa-th-list text-primary" style="font-size: 1.4rem"></i></a>
        </div>
      </div>
      <a class="panel mb-3 mt-3 p-0 text-decoration-none has-text-black" style="position: relative" href="{{ !empty(auth()->user()->family->spouse) ? route('spouse.show', Auth::user()->id) : route('spouse.create') }}">
        @if (!empty(auth()->user()->personal()->civil_status))
          @if (auth()->user()->personal()->civil_status === 'Single')
            <div class="stack-top-list">
              <span class="d-flex flex-column align-items-center">
                <span><i class="fas fa-lock mb-3" style="color: white; font-size: 2rem"></i></span>
                <small style="color: white; font-size: .8rem">You're civil status is {{ auth()->user()->personal()->civil_status }}</small>
              </span>
            </div>
          @endif
        @endif
        <div class="media d-flex align-items-center">
          <div class="media__left">
            <div class="image is-small-square">
              <img src="{{ asset('img/for-family/spouse.png') }}">
            </div>
          </div>
          <div class="media__content d-flex flex-column">
            <h5 style="font-weight: bold">Spouse</h5>
            <small style="text-muted" style="font-size: 1rem">
              @if (!empty(auth()->user()->family->spouse))
                Updated at {{ auth()->user()->family->spouse->created_at->diffForHumans() }}
              @else
                No Data
              @endif
            </small>
          </div>
        </div>
      </a>
      <a class="panel mb-3 mt-3 p-0 text-decoration-none has-text-black" href="{{ !empty(auth()->user()->family->children->first()) ? route('children.show', Auth::user()->id) : route('children.create') }}">
          <div class="media d-flex align-items-center">
            <div class="media__left">
              <div class="image is-small-square">
                <img src="{{ asset('img/for-family/children.png') }}">
              </div>
            </div>
            <div class="media__content d-flex flex-column">
              <h5 style="font-weight: bold">Children</h5>
              <small style="text-muted" style="font-size: 1rem">
                @if (!empty(auth()->user()->family->children->first()->created_at))
                Updated at {{ auth()->user()->family->children->first()->created_at->diffForhumans() }}
                @else
                  No Data
                @endif
              </small>
            </div>
          </div>
      </a>
      <a class="panel mb-3 mt-3 p-0 text-decoration-none has-text-black" href="{{ !empty(auth()->user()->family->father->first()) ? route('father.show', Auth::user()->id) : route('father.create') }}">
        <div class="media d-flex align-items-center">
          <div class="media__left">
            <div class="image is-small-square">
              <img src="{{ asset('img/for-family/father.png') }}">
            </div>
          </div>
          <div class="media__content d-flex flex-column">
            <h5 style="font-weight: bold">Father</h5>
            <small style="text-muted" style="font-size: 1rem">
              @if (!empty(auth()->user()->family->father))
                Updated at {{ auth()->user()->family->father->created_at->diffForHumans() }}
              @else
                No Data
              @endif
            </small>
          </div>
        </div>
      </a>
      <a class="panel mb-3 mt-3 p-0 text-decoration-none has-text-black" href="{{ !empty(auth()->user()->family->mother) ? route('mother.show', Auth::user()->id) : route('mother.create') }}">
        <div class="media d-flex align-items-center">
          <div class="media__left">
            <div class="image is-small-square">
              <img src="{{ asset('img/for-family/mother.png') }}">
            </div>
          </div>
          <div class="media__content d-flex flex-column">
            <h5 style="font-weight: bold">Mother</h5>
            <small style="text-muted" style="font-size: 1rem">
              @if (!empty(auth()->user()->family->mother))
                Updated at {{ auth()->user()->family->mother->created_at->diffForHumans() }}
              @else
                No Data
              @endif
            </small>
          </div>
        </div>
    </a>
    </div>
@endsection