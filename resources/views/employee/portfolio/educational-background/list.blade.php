@extends('employee.portfolio.educational-background.index')

@section('educ')
<div class="container-fluid">
  <div class="row w-100 m-0">
    <div class="card has-no-shadow w-100">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h1 class="mb-0">Educational Background</h1>
          </div>
          <div class="col text-right">
              <a href="{{ route('portfolio.index', 'card') }}" class="btn btn-icon btn-light" type="button">
                <span class="btn-inner--icon"><i class="fas fa-caret-left"></i></span>
              </a>
              <a href="{{ route('educ.index', 'card') }}" class="btn btn-icon btn-light" type="button">
                <span class="btn-inner--icon"><i class="fas fa-th-large"></i></span>
              </a>
              <a href="{{ route('educ.index', 'list') }}" class="btn btn-icon btn-light" type="button">
                <span class="btn-inner--icon"><i class="fas fa-th-list"></i></span>
              </a>
          </div>
        </div>
      </div>
      <div class="row p-3 w-100">
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
                  <strong style="font-size: 1.5rem">Elementary</strong>
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
                  <strong style="font-size: 1.5rem">Secondary</strong>
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
                  <strong style="font-size: 1.5rem">College</strong>
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
                  <strong style="font-size: 1.5rem">Graduate Studies</strong>
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