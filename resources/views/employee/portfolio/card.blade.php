@extends('employee.portfolio.index')

@section('portfolio')
    <div class="container-fluid p-0 ">
      <div class="row pt-5">
        <div class="col-6 d-flex align-items-center" style="height: 4rem;">
          <h3 class="font-weight-bold" style="color: black">Portfolio</h3>
        </div>
        <div class="col-6 d-flex justify-content-end align-items-center" style="height: 4rem;">
            <a href="{{ route('portfolio.index', 'card') }}" class="neu-effect d-flex justify-content-center align-items-center mr-2 text-decoration-none p-2" style="display:inline-block; "><i class="fas fa-th-large" style="font-size: 1.4rem"></i></a>
            <a href="{{ route('portfolio.index', 'list') }}" class="neu-effect d-flex justify-content-center align-items-center text-decoration-none p-2" style="display:inline-block; "><i class="fas fa-th-list" style="font-size: 1.4rem"></i></a>
        </div>
      </div>
      
        <div class="row row-cols-2 row-cols-md-4 mt-3">
            <div class="col mb-4">
                <div class="card has-no-shadow">
                    <a href="{{ route('personal.index') }}" class="card__image">
                      <img src="{{ asset('img/for-portfolio/Personal site-cuate.svg') }}" alt="">
                    </a>
                    <div class="card__content">
                      <p class="grid has-no-col-padding has-text-grey">
                        <small class="column">
                          @if (!empty(auth()->user()->personal()))
                            Updated at {{ auth()->user()->personal()->updated_at->diffForHumans() }}
                          @else
                            No data yet
                          @endif
                        </small>
                      </p>
                      <a href="{{ route('personal.index') }}" class="is-hover-underline has-text-black">
                        <h5 style="font-weight: bold">Personal Information</h5>
                      </a>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="card has-no-shadow">
                    <a href="{{ route('family.index', 'card') }}" class="card__image">
                      <img src="{{ asset('img/for-portfolio/Family-cuate.svg') }}" alt="">
                    </a>
                    <div class="card__content">
                      <p class="grid has-no-col-padding has-text-grey">
                        <small class="column">
                          @if (!empty(auth()->user()->family))
                            Updated at {{ auth()->user()->family->updated_at->diffForHumans() }}
                          @else
                            No data yet
                          @endif
                        </small>
                      </p>
                      <a href="{{ route('family.index', 'card') }}" class="is-hover-underline has-text-black">
                        <h5 style="font-weight: bold">Family Background</h5>
                      </a>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
             <div class="card has-no-shadow">
                  <a href="{{ route('educ.index', 'card') }}" class="card__image">
                    <img src="{{ asset('img/for-portfolio/Mathematics-pana.svg') }}" alt="">
                  </a>
                  <div class="card__content">
                    <p class="grid has-no-col-padding has-text-light-grey">
                      <small class="column">
                        Updated at 3 mins ago
                      </small>
                    </p>
                    <a href="{{ route('educ.index', 'card') }}" class="is-hover-underline has-text-black">
                      <h5 style="font-weight: bold">Educational Background</h5>
                    </a>
                  </div>
              </div>
            </div>
            <div class="col mb-4">
              <div class="card has-no-shadow">
                <a href="{{ route('work.index') }}" class="card__image">
                  <img src="{{ asset('img/for-portfolio/experience.png') }}" alt="">
                </a>
                <div class="card__content">
                  <p class="grid has-no-col-padding has-text-light-grey">
                    <small class="column">
                      Updated at 3 mins ago
                    </small>
                  </p>
                  <a href="{{ route('work.index') }}" class="is-hover-underline has-text-black">
                    <h5 style="font-weight: bold">Work Experience</h5>
                  </a>
                </div>
              </div>
            </div>
            <div class="col mb-4">
              <div class="card has-no-shadow">
                <a href="{{ route('training.index') }}" class="card__image">
                  <img src="{{ asset('img/for-portfolio/trainings.svg') }}" alt="">
                </a>
                <div class="card__content">
                  <p class="grid has-no-col-padding has-text-light-grey">
                    <small class="column">
                      Updated at 3 mins ago
                    </small>
                  </p>
                  <a href="{{ route('training.index') }}" class="is-hover-underline has-text-black">
                    <h5 style="font-weight: bold">Training Programs</h5>
                  </a>
                </div>
              </div>
            </div>
          <div class="col mb-4">
            <div class="card has-no-shadow">
              <a href="{{ route('voluntary.index') }}" class="card__image">
                <img src="{{ asset('img/for-portfolio/volunteer.png') }}" alt="">
              </a>
              <div class="card__content">
                <p class="grid has-no-col-padding has-text-light-grey">
                  <small class="column">
                    Updated at 3 mins ago
                  </small>
                </p>
                <a href="{{ route('educ.index', 'card') }}" class="is-hover-underline has-text-black">
                  <h5 style="font-weight: bold">Voluntary Works</h5>
                </a>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection