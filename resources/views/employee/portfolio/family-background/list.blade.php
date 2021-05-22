@extends('employee.portfolio.family-background.index')

@section('family')
    <div class="container-fluid p-0">
      <div class="row pt-5">
        <div class="col-6 d-flex align-items-center" style="height: 4rem;">
          <h3 class="font-weight-bold" style="color: black">Family Background</h3>
        </div>
        <div class="col-6 d-flex justify-content-end align-items-center" style="height: 4rem;">
            <a href="{{ route('family.index', 'card') }}" class="neu-effect d-flex justify-content-center align-items-center mr-2 text-decoration-none p-2" style="display:inline-block; "><i class="fas fa-th-large" style="font-size: 1.4rem"></i></a>
            <a href="{{ route('family.index', 'list') }}" class="neu-effect d-flex justify-content-center align-items-center text-decoration-none p-2" style="display:inline-block; "><i class="fas fa-th-list" style="font-size: 1.4rem"></i></a>
        </div>
      </div>
        <a class="panel mb-3 mt-3 text-decoration-none has-text-black" href="{{ route('personal.index') }}">
            <div class="media d-flex align-items-center">
              <div class="media__left">
                <div class="image is-small-square">
                  <img src="{{ asset('img/for-portfolio/Personal site-cuate.svg') }}">
                </div>
              </div>
              <div class="media__content d-flex flex-column">
                <strong style="font-size: 1.5rem">Spouse</strong>
                <small style="text-muted" style="font-size: 1rem">updated at 27m ago</small>
              </div>
            </div>
        </a>
        <a class="panel mb-3 mt-3 text-decoration-none has-text-black">
            <div class="media d-flex align-items-center">
              <div class="media__left">
                <div class="image is-small-square">
                  <img src="{{ asset('img/for-portfolio/Family-cuate.svg') }}">
                </div>
              </div>
              <div class="media__content d-flex flex-column">
                <strong style="font-size: 1.5rem">Children</strong>
                <small style="text-muted" style="font-size: 1rem">updated at 27m ago</small>
              </div>
            </div>
        </a>
        <a class="panel mb-3 mt-3 text-decoration-none has-text-black">
          <div class="media d-flex align-items-center">
            <div class="media__left">
              <div class="image is-small-square">
                <img src="{{ asset('img/for-portfolio/Mathematics-pana.svg') }}">
              </div>
            </div>
            <div class="media__content d-flex flex-column">
              <strong style="font-size: 1.5rem">Father</strong>
              <small style="text-muted" style="font-size: 1rem">updated at 27m ago</small>
            </div>
          </div>
      </a>
      <a class="panel mb-3 mt-3 text-decoration-none has-text-black">
        <div class="media d-flex align-items-center">
          <div class="media__left">
            <div class="image is-small-square">
              <img src="{{ asset('img/for-portfolio/Mathematics-pana.svg') }}">
            </div>
          </div>
          <div class="media__content d-flex flex-column">
            <strong style="font-size: 1.5rem">Mother</strong>
            <small style="text-muted" style="font-size: 1rem">updated at 27m ago</small>
          </div>
        </div>
    </a>
    </div>
@endsection