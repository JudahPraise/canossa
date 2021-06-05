@extends('employee.portfolio.index')

@section('portfolio')
    <div class="container-fluid pl-4 pr-3 cont">
      <div class="row">
        <div class="col-6 d-flex align-items-center" style="height: 4rem;">
          <h3 class="font-weight-bold" style="color: black">Portfolio</h3>
        </div>
        <div class="col-6 d-flex justify-content-end align-items-center" style="height: 4rem;">
            <a href="{{ route('portfolio.index', 'card') }}" class="neu-effect d-flex justify-content-center align-items-center mr-2 text-decoration-none p-2" style="display:inline-block; "><i class="fas fa-th-large text-primary" style="font-size: 1.4rem"></i></a>
            <a href="{{ route('portfolio.index', 'list') }}" class="neu-effect d-flex justify-content-center align-items-center text-decoration-none p-2" style="display:inline-block; "><i class="fas fa-th-list text-primary" style="font-size: 1.4rem"></i></a>
        </div>
      </div>
      <a class="panel mb-3 mt-3 text-decoration-none has-text-black bg-gradient-white" href="{{ route('personal.index') }}" style="background-color: white">
        <div class="media d-flex align-items-center">
          <div class="media__left">
            <div class="image is-small-square">
              <img src="{{ asset('img/for-portfolio/Personal site-cuate.svg') }}">
            </div>
          </div>
          <div class="media__content d-flex flex-column">
              <strong style="font-size: 1.5rem">Personal Information</strong>
              <small style="text-muted" style="font-size: 1rem">
                @if (!empty(auth()->user()->personal()))
                  Updated at {{ auth()->user()->personal()->created_at->diffForHumans() }}
                @else
                  No data yet
                @endif
              </small>
          </div>
        </div>
      </a>
      <a class="panel mb-3 mt-3 text-decoration-none has-text-black bg-gradient-white" href="{{ route('family.index', 'card') }}" style="background-color: white">
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
      </a>
      <a class="panel mb-3 mt-3 text-decoration-none has-text-black bg-gradient-white" href="{{ route('educ.index', 'card') }}" style="background-color: white">
        <div class="media d-flex align-items-center">
          <div class="media__left">
            <div class="image is-small-square">
              <img src="{{ asset('img/for-portfolio/Mathematics-pana.svg') }}">
            </div>
          </div>
          <div class="media__content d-flex flex-column">
              <strong style="font-size: 1.5rem">Educational Background</strong>
              <small style="text-muted" style="font-size: 1rem">updated at 27m ago</small>
          </div>
        </div>
      </a>
      <a class="panel mb-3 mt-3 text-decoration-none has-text-black bg-gradient-white" href="{{ route('work.index', 'card') }}" style="background-color: white">
        <div class="media d-flex align-items-center">
          <div class="media__left">
            <div class="image is-small-square">
              <img src="{{ asset('img/for-portfolio/experience.png') }}">
            </div>
          </div>
          <div class="media__content d-flex flex-column">
              <strong style="font-size: 1.5rem">Work Experience</strong>
              <small style="text-muted" style="font-size: 1rem">updated at 27m ago</small>
          </div>
        </div>
      </a>
      <a class="panel mb-3 mt-3 text-decoration-none has-text-black bg-gradient-white" href="{{ route('training.index') }}" style="background-color: white">
        <div class="media d-flex align-items-center">
          <div class="media__left">
            <div class="image is-small-square">
              <img src="{{ asset('img/for-portfolio/trainings.svg') }}">
            </div>
          </div>
          <div class="media__content d-flex flex-column">
              <strong style="font-size: 1.5rem">Training Programs</strong>
              <small style="text-muted" style="font-size: 1rem">updated at 27m ago</small>
          </div>
        </div>
      </a>
      <a class="panel mb-3 mt-3 text-decoration-none has-text-black bg-gradient-white" href="{{ route('voluntary.index') }}" style="background-color: white">
        <div class="media d-flex align-items-center">
          <div class="media__left">
            <div class="image is-small-square">
              <img src="{{ asset('img/for-portfolio/volunteer.png') }}">
            </div>
          </div>
          <div class="media__content d-flex flex-column">
              <strong style="font-size: 1.5rem">Voluntary Works</strong>
              <small style="text-muted" style="font-size: 1rem">updated at 27m ago</small>
          </div>
        </div>
      </a>
    </div>
@endsection