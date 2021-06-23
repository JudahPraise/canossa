@extends('employee.portfolio.index')

@section('portfolio')
<div class="container-fluid">
  <div class="row w-100 m-0">
    <div class="card has-no-shadow w-100">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h1 class="mb-0">Portfolio</h1>
          </div>
          <div class="col text-right">
              <a href="{{ route('portfolio.index', 'card') }}" class="btn btn-sm btn-icon btn-light" type="button">
                <span class="btn-inner--icon"><i class="fas fa-th-large"></i></span>
              </a>
              <a href="{{ route('portfolio.index', 'list') }}" class="btn btn-sm btn-icon btn-light" type="button">
                <span class="btn-inner--icon"><i class="fas fa-th-list"></i></span>
              </a>
          </div>
        </div>
      </div>
      <a href="{{ route('personal.index') }}" style="width: 100%; color: inherit;" class="mb-3">
        <div style="width: 100%" class="mb-3">
          <div class="card card-stats">
            <div class="card-body">
              <div class="media d-flex align-items-center">
                <div class="media__left">
                  <div class="image is-small-square">
                    <img src="{{ asset('img/for-portfolio/Personal site-cuate.svg') }}">
                  </div>
                </div>
                <div class="media__content d-flex flex-column">
                    <strong style="font-size: 1.5rem">Personal Information</strong>
                    <small style="text-muted" style="font-size: 1rem">
                      @if (!empty(auth()->user()->personal))
                        Updated at {{ auth()->user()->personal->updated_at->diffForHumans() }}
                      @else
                        No data yet
                      @endif
                    </small>
                </div>
              </div>
            </div>
          </div>
        </div>
        <a href="{{ route('family.index', 'card') }}" style="width: 100%; color: inherit;" class="mb-3">
          <div class="card card-stats">
            <div class="card-body">
              <div class="media d-flex align-items-center">
                <div class="media__left">
                  <div class="image is-small-square">
                    <img src="{{ asset('img/for-portfolio/Family-cuate.svg') }}">
                  </div>
                </div>
                <div class="media__content d-flex flex-column">
                    <strong style="font-size: 1.5rem">Family Background</strong>
                    <small style="text-muted" style="font-size: 1rem">
                        @if (!empty(auth()->user()->family))
                          Updated at {{ auth()->user()->family->updated_at->diffForHumans() }}
                        @else
                          No data yet
                        @endif
                    </small>
                </div>
              </div>
            </div>
          </div>
        </a>
        <a href="{{ route('educ.index', 'card') }}" style="width: 100%; color: inherit;" class="mb-3">
          <div class="card card-stats">
            <div class="card-body">
              <div class="media d-flex align-items-center">
                <div class="media__left">
                  <div class="image is-small-square">
                    <img src="{{ asset('img/for-portfolio/Mathematics-pana.svg') }}">
                  </div>
                </div>
                <div class="media__content d-flex flex-column">
                    <strong style="font-size: 1.5rem">Educational Background</strong>
                    <small style="text-muted" style="font-size: 1rem">
                      @if (!empty(auth()->user()->education))
                        Updated at {{ auth()->user()->education->updated_at->diffForHumans() }}
                      @else
                        No data yet
                      @endif
                    </small>
                </div>
              </div>
            </div>
          </div>
        </a>
        <a href="{{ route('work.index') }}" style="width: 100%; color: inherit;" class="mb-3">
          <div class="card card-stats">
            <div class="card-body">
              <div class="media d-flex align-items-center">
                <div class="media__left">
                  <div class="image is-small-square">
                    <img src="{{ asset('img/for-portfolio/experience.png') }}">
                  </div>
                </div>
                <div class="media__content d-flex flex-column">
                    <strong style="font-size: 1.5rem">Work Experience</strong>
                    <small style="text-muted" style="font-size: 1rem">
                      @if (!empty(auth()->user()->experiences->first()))
                        Updated at {{ auth()->user()->experiences()->latest('updated_at')->first()->updated_at->diffForHumans() }}
                      @else
                        No data yet
                      @endif
                    </small>
                </div>
              </div>
            </div>
          </div>
        </a>
        <a href="{{ route('training.index') }}" style="width: 100%; color: inherit;" class="mb-3">
          <div class="card card-stats">
            <div class="card-body">
              <div class="media d-flex align-items-center">
                <div class="media__left">
                  <div class="image is-small-square">
                    <img src="{{ asset('img/for-portfolio/trainings.svg') }}">
                  </div>
                </div>
                <div class="media__content d-flex flex-column">
                    <strong style="font-size: 1.5rem">Training Programs</strong>
                    <small style="text-muted" style="font-size: 1rem">
                      @if (!empty(auth()->user()->trainings->first()))
                        Updated at {{ auth()->user()->trainings()->latest('updated_at')->first()->updated_at->diffForHumans() }}
                      @else
                        No Data
                      @endif
                    </small>
                </div>
              </div>
            </div>
          </div>
        </a>
        <a href="{{ route('voluntary.index') }}" style="width: 100%; color: inherit;" class="mb-3">
          <div class="card card-stats">
            <div class="card-body">
              <div class="media d-flex align-items-center">
                <div class="media__left">
                  <div class="image is-small-square">
                    <img src="{{ asset('img/for-portfolio/volunteer.png') }}">
                  </div>
                </div>
                <div class="media__content d-flex flex-column">
                    <strong style="font-size: 1.5rem">Voluntary Works</strong>
                    <small style="text-muted" style="font-size: 1rem">
                      @if (!empty(auth()->user()->voluntary_works->first()))
                        Updated at {{ auth()->user()->voluntary_works()->latest('updated_at')->first()->updated_at->diffForHumans() }}
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