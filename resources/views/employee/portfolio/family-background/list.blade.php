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
      <div class="row">
        <a href="{{ !empty(auth()->user()->family->spouse) ? route('family.show', Auth::user()->id) : route('spouse.create') }}" style="width: 100%; color: inherit" class="mb-3">
          <div class="card card-stats">
            <div class="card-body">
            <div class="media d-flex align-items-center">
              <div class="media__left">
                <div class="image is-small-square">
                  <img src="{{ asset('img/for-family/spouse.png') }}">
                </div>
              </div>
              <div class="media__content d-flex flex-column">
                <h2 style="font-weight: bold">Spouse</h2>
                <small style="text-muted" style="font-size: 1rem">
                  @if (!empty(auth()->user()->family->spouse))
                    Updated at {{ auth()->user()->family->spouse->created_at->diffForHumans() }}
                  @else
                    No Data
                  @endif
                </small>
              </div>
            </div>
            </div>
          </div>
        </a>
        <a href="{{ !empty(auth()->user()->family()->children) ? route('family.show', Auth::user()->id) : route('children.create') }}" style="width: 100%; color: inherit" class="mb-3">
          <div class="card card-stats">
            <div class="card-body">
              <div class="media d-flex align-items-center">
                <div class="media__left">
                  <div class="image is-small-square">
                    <img src="{{ asset('img/for-family/children.png') }}">
                  </div>
                </div>
                <div class="media__content d-flex flex-column">
                  <h2 style="font-weight: bold">Children</h2>
                  <small style="text-muted" style="font-size: 1rem">
                    @if (!empty(auth()->user()->family->children->first()->created_at))
                    Updated at {{ auth()->user()->family->children->first()->created_at->diffForhumans() }}
                    @else
                      No Data
                    @endif
                  </small>
                </div>
              </div>
            </div>
          </div>
        </a>
        <a href="{{ !empty(auth()->user()->family->father) ? route('family.show', Auth::user()->id) : route('father.create') }}" style="width: 100%; color: inherit" class="mb-3">
          <div class="card card-stats">
            <div class="card-body">
              <div class="media d-flex align-items-center">
                <div class="media__left">
                  <div class="image is-small-square">
                    <img src="{{ asset('img/for-family/father.png') }}">
                  </div>
                </div>
                <div class="media__content d-flex flex-column">
                  <h2 style="font-weight: bold">Father</h2>
                  <small style="text-muted" style="font-size: 1rem">
                    @if (!empty(auth()->user()->family->father))
                      Updated at {{ auth()->user()->family->father->created_at->diffForHumans() }}
                    @else
                      No Data
                    @endif
                  </small>
                </div>
              </div>
            </div>
          </div>
        </a>
        <a href="{{ !empty(auth()->user()->family->mother) ? route('family.show', Auth::user()->id) : route('mother.create') }}" style="width: 100%; color: inherit" class="mb-3">
          <div class="card card-stats">
            <div class="card-body">
              <div class="media d-flex align-items-center">
                <div class="media__left">
                  <div class="image is-small-square">
                    <img src="{{ asset('img/for-family/mother.png') }}">
                  </div>
                </div>
                <div class="media__content d-flex flex-column">
                  <h2 style="font-weight: bold">Mother</h2>
                  <small style="text-muted" style="font-size: 1rem">
                    @if (!empty(auth()->user()->family->mother))
                      Updated at {{ auth()->user()->family->mother->created_at->diffForHumans() }}
                    @else
                      No Data
                    @endif
                  </small>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>
@endsection