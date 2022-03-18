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
              <a href="{{ route('portfolio.index', 'list') }}" class="btn btn-sm btn-icon btn-light" type="button">
                <span class="btn-inner--icon"><i class="fas fa-th-list"></i></span>
              </a>
          </div>
        </div>
      </div>
      <div class="row row-cols-2 row-cols-md-4">
        <div class="col mb-3">
            <div class="card  bg-gradient-white">
                <a href="{{ route('personal.index') }}" class="card__image">
                  <img class="bd-placeholder-img card-img-top" width="100%" height="180" src="{{ asset('img/for-portfolio/Personal site-cuate.svg') }}" alt="">
                </a>
                <div class="card-body">
                  <p class="grid has-no-col-padding has-text-grey">
                    <small class="column">
                      @if (!empty(auth()->user()->personal))
                        Updated at {{ auth()->user()->personal->updated_at->diffForHumans() }}
                      @else
                        No data yet
                      @endif
                    </small>
                  </p>
                  <a href="{{ route('personal.index') }}" class="is-hover-underline has-text-black">
                    <h4 style="font-weight: bold">Personal Information</h4>
                  </a>
                </div>
            </div>
        </div>
        <div class="col mb-3">
            <div class="card bg-gradient-white">
                <a href="{{ route('family.index', 'card') }}" class="card__image">
                  <img  class="bd-placeholder-img card-img-top" width="100%" height="180" src="{{ asset('img/for-portfolio/Family-cuate.svg') }}" alt="">
                </a>
                <div class="card-body">
                  <p class="grid has-no-col-padding has-text-grey">
                    <small class="column">
                      @if (!empty(auth()->user()->family->father || auth()->user()->family->mother) )
                        Updated at {{ auth()->user()->family->updated_at->diffForHumans() }}
                      @else
                        No data yet
                      @endif
                    </small>
                  </p>
                  <a href="{{ route('family.index', 'card') }}" class="is-hover-underline has-text-black">
                    <h4  style="font-weight: bold">Family Background</h4>
                  </a>
                </div>
            </div>
        </div>
        <div class="col mb-3">
         <div class="card  bg-gradient-white">
              <a href="{{ route('educ.index', 'card') }}" class="card__image">
                <img  class="bd-placeholder-img card-img-top" width="100%" height="180" src="{{ asset('img/for-portfolio/Mathematics-pana.svg') }}" alt="">
              </a>
              <div class="card-body">
                <p class="grid has-no-col-padding">
                  <small class="column">
                      @if (!empty(auth()->user()->education->elem))
                        Updated at {{ auth()->user()->education->updated_at->diffForHumans() }}
                      @else
                        No data yet
                      @endif
                  </small>
                </p>
                <a href="{{ route('educ.index', 'card') }}" class="is-hover-underline has-text-black">
                  <h4  style="font-weight: bold">Educational Background</h4>
                </a>
              </div>
          </div>
        </div>
        <div class="col mb-3">
          <div class="card  bg-gradient-white">
            <a href="{{ route('work.index') }}" class="card__image">
              <img  class="bd-placeholder-img card-img-top" width="100%" height="180" src="{{ asset('img/for-portfolio/experience.png') }}" alt="">
            </a>
            <div class="card-body">
              <p class="grid has-no-col-padding">
                <small class="column">
                  @if (!empty(auth()->user()->experiences->first()))
                    Updated at {{ auth()->user()->experiences()->latest('updated_at')->first()->updated_at->diffForHumans() }}
                  @else
                    No data yet
                  @endif
                </small>
              </p>
              <a href="{{ route('work.index') }}" class="is-hover-underline has-text-black">
                <h4  style="font-weight: bold">Work Experience</h4>
              </a>
            </div>
          </div>
        </div>
        <div class="col mb-3">
          <div class="card  bg-gradient-white">
            <a href="{{ route('training.index') }}" class="card__image">
              <img  class="bd-placeholder-img card-img-top" width="100%" height="180" src="{{ asset('img/for-portfolio/trainings.svg') }}" alt="">
            </a>
            <div class="card-body">
              <p class="grid has-no-col-padding">
                <small class="column">
                  @if (!empty(auth()->user()->trainings->first()))
                    Updated at {{ auth()->user()->trainings()->latest('updated_at')->first()->updated_at->diffForHumans() }}
                  @else
                    No Data yet
                  @endif
                </small>
              </p>
              <a href="{{ route('training.index') }}" class="is-hover-underline has-text-black">
                <h4  style="font-weight: bold">Training Programs</h4>
              </a>
            </div>
          </div>
        </div>
      <div class="col mb-3">
        <div class="card  bg-gradient-white">
          <a href="{{ route('voluntary.index') }}" class="card__image">
            <img  class="bd-placeholder-img card-img-top" width="100%" height="180" src="{{ asset('img/for-portfolio/volunteer.png') }}" alt="">
          </a>
          <div class="card-body">
            <p class="grid has-no-col-padding">
              <small class="column">
                @if (!empty(auth()->user()->voluntary_works->first()))
                  Updated at {{ auth()->user()->voluntary_works()->latest('updated_at')->first()->updated_at->diffForHumans() }}
                @else
                  No Data yet
                @endif
              </small>
            </p>
            <a href="{{ route('educ.index', 'card') }}" class="is-hover-underline has-text-black">
              <h4  style="font-weight: bold">Civic Works</h4>
            </a>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
</div>
@endsection
