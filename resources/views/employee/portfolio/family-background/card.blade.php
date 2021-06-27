@extends('employee.portfolio.family-background.index')

@section('family')
<div class="container-fluid">
  <div class="row w-100 m-0">
    <div class="card has-no-shadow w-100">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h2 class="mb-0">Family Background</h2>
          </div>
          <div class="col text-right">
              <a href="{{ route('portfolio.index', 'card') }}" class="btn btn-sm btn-icon btn-light" type="button">
                <span class="btn-inner--icon"><i class="fas fa-caret-left"></i></span>
              </a>
              <a href="{{ route('family.index', 'card') }}" class="btn btn-sm btn-icon btn-light" type="button">
                <span class="btn-inner--icon"><i class="fas fa-th-large"></i></span>
              </a>
              <a href="{{ route('family.index', 'list') }}" class="btn btn-sm btn-icon btn-light" type="button">
                <span class="btn-inner--icon"><i class="fas fa-th-list"></i></span>
              </a>
          </div>
        </div>
      </div>
      <div class="row row-cols-2 row-cols-md-4 mt-2">
        <div class="col mb-4 box">
          <div class="card">
            <a href="{{ !empty(auth()->user()->family->spouse) ? route('family.show', Auth::user()->id) : route('spouse.create') }}" class="card__image">
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
              <a href="{{ !empty(auth()->user()->family->spouse) ? route('family.show', Auth::user()->id) : route('spouse.create') }}" class="is-hover-underline has-text-black">
                <h2 style="font-weight: bold">Spouse</h2>
              </a>
            </div>
          </div>  
        </div>
        <div class="col mb-4">
            <div class="card">
                <a href="{{ !empty(auth()->user()->family()->children) ? route('family.show', Auth::user()->id) : route('children.create') }}" class="card__image">
                  <img src="{{ asset('img/for-family/children.png') }}">
                </a>
                <div class="card__content">
                  <p class="grid has-no-col-padding has-text-grey">
                    <small class="column">
                      @if (!empty(auth()->user()->family->children->first()->created_at))
                        Updated at {{ auth()->user()->family->children->first()->created_at->diffForhumans() }}
                      @else
                        No Data
                      @endif
                    </small>
                  </p>
                  <a href="{{ !empty(auth()->user()->family()->children) ? route('family.show', Auth::user()->id) : route('children.create') }}" class="is-hover-underline has-text-black">
                    <h2 style="font-weight: bold">Children</h2>
                  </a>
                </div>
            </div>
        </div>
        <div class="col mb-4">
           <div class="card">
                <a href="{{ !empty(auth()->user()->family->father) ? route('family.show', Auth::user()->id) : route('father.create') }}" class="card__image">
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
                  <a href="{{ !empty(auth()->user()->family->father) ? route('family.show', Auth::user()->id) : route('father.create') }}" class="is-hover-underline has-text-black">
                    <h2 style="font-weight: bold">Father</h2>
                  </a>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card">
              <a href="{{ !empty(auth()->user()->family->mother) ? route('family.show', Auth::user()->id) : route('mother.create') }}" class="card__image">
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
                <a href="{{ !empty(auth()->user()->family->mother) ? route('family.show', Auth::user()->id) : route('mother.create') }}" class="is-hover-underline has-text-black">
                  <h2 style="font-weight: bold">Mother</h2>
                </a>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection