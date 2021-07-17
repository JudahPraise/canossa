@extends('employee.portfolio.educational-background.index')

@section('educ')
<div class="container-fluid">
  <div class="row w-100 m-0">
    <div class="card has-no-shadow w-100">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h2 class="mb-0">Educational Background</h2>
          </div>
          <div class="col text-right">
              <a href="{{ route('portfolio.index', 'card') }}" class="btn btn-sm btn-icon btn-light" type="button">
                <span class="btn-inner--icon"><i class="fas fa-caret-left"></i></span>
              </a>
              <a href="{{ route('educ.index', 'card') }}" class="btn btn-sm btn-icon btn-light" type="button">
                <span class="btn-inner--icon"><i class="fas fa-th-large"></i></span>
              </a>
          </div>
        </div>
      </div>
      <div class="row p-3">
        <a href="{{ route('educ.show', Auth::user()->id) }}" style="width: 100%; color: inherit" class="mb-3">
          <div class="card card-stats">
            <div class="card-body">
              <div class="media d-flex align-items-center">
                <div class="media__left">
                  <div class="image is-small-square">
                    <img src="{{ asset('img/for-educ/elementary.png') }}">
                  </div>
                </div>
                <div class="media__content d-flex flex-column">
                  <h2 style="font-weight: bold">Elementary</h2>
                  <small style="text-muted" style="font-size: 1rem">
                    @if (auth()->user()->education->elementary)
                        {{ auth()->user()->education->elem->updated_at->diffForhumans() }}
                      @else
                        No data yet
                      @endif
                  </small>
                </div>
              </div>
            </div>
          </div>
        </a>
        <a href="{{ route('educ.show', Auth::user()->id) }}" style="width: 100%; color: inherit" class="mb-3">
          <div class="card card-stats">
            <div class="card-body">
              <div class="media d-flex align-items-center">
                <div class="media__left">
                  <div class="image is-small-square">
                    <img src="{{ asset('img/for-educ/secondary.png') }}">
                  </div>
                </div>
                <div class="media__content d-flex flex-column">
                  <h2 style="font-weight: bold">Secondary</h2>
                  <small style="text-muted" style="font-size: 1rem">
                    @if (!empty(auth()->user()->education->secondary))
                        {{ auth()->user()->education->sec->updated_at->diffForhumans() }}
                    @else
                        No data yet
                    @endif
                  </small>
                </div>
              </div>
            </div>
          </div>
        </a>
        <a href="{{ route('educ.show', Auth::user()->id) }}" style="width: 100%; color: inherit" class="mb-3">
          <div class="card card-stats">
            <div class="card-body">
              <div class="media d-flex align-items-center">
                <div class="media__left">
                  <div class="image is-small-square">
                    <img src="{{ asset('img/for-educ/college.png') }}">
                  </div>
                </div>
                <div class="media__content d-flex flex-column">
                  <h2 style="font-weight: bold">College</h2>
                  <small style="text-muted" style="font-size: 1rem">
                    @if (!empty(auth()->user()->education->college))
                        {{ auth()->user()->education->col->updated_at->diffForhumans() }}
                    @else
                      No data yet
                    @endif
                  </small>
                </div>
              </div>
            </div>
          </div>
        </a>
        <a href="{{ route('educ.show', Auth::user()->id) }}" style="width: 100%; color: inherit" class="mb-3">
          <div class="card card-stats">
            <div class="card-body">
              <div class="media d-flex align-items-center">
                <div class="media__left">
                  <div class="image is-small-square">
                    <img src="{{ asset('img/for-educ/graduatestudy.png') }}">
                  </div>
                </div>
                <div class="media__content d-flex flex-column">
                  <h2 style="font-weight: bold">Graduate Studies</h2>
                  <small style="text-muted" style="font-size: 1rem">
                    @if (!empty(auth()->user()->education->graduate_study))
                      {{ auth()->user()->education->grad()->latest('updated_at')->first()->updated_at->diffForhumans() }}
                    @else
                      No data yet
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