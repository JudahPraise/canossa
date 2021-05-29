@extends('employee.portfolio.educational-background.index')

@section('educ')
    <div class="container-fluid p-0">
      <div class="row pt-5">
        <div class="col-6 d-flex align-items-center" style="height: 4rem;">
          <h3 class="font-weight-bold" style="color: black">Educational Background</h3>
        </div>
        <div class="col-6 d-flex justify-content-end align-items-center" style="height: 4rem;">
          <a href="{{ route('portfolio.index', 'card') }}" class="neu-effect d-flex justify-content-center align-items-center mr-2 text-decoration-none py-2 px-3" style="display:inline-block; "><i class="fas fa-caret-left" style="font-size: 1.6rem"></i></a>
            <a href="{{ route('educ.index', 'card') }}" class="neu-effect d-flex justify-content-center align-items-center mr-2 text-decoration-none p-2" style="display:inline-block; "><i class="fas fa-th-large" style="font-size: 1.4rem"></i></a>
            <a href="{{ route('educ.index', 'list') }}" class="neu-effect d-flex justify-content-center align-items-center text-decoration-none p-2" style="display:inline-block; "><i class="fas fa-th-list" style="font-size: 1.4rem"></i></a>
        </div>
      </div>
        <a class="panel mb-3 mt-3 text-decoration-none has-text-black" href="{{ route('elem.create') }}">
            <div class="media d-flex align-items-center">
              <div class="media__left">
                <div class="image is-small-square">
                  <img src="{{ asset('img/for-educ/elementary.png') }}">
                </div>
              </div>
              <div class="media__content d-flex flex-column">
                <strong style="font-size: 1.5rem">Elementary</strong>
                <small style="text-muted" style="font-size: 1rem">updated at 27m ago</small>
              </div>
            </div>
        </a>
        <a class="panel mb-3 mt-3 text-decoration-none has-text-black" href="{{ route('sec.create') }}">
            <div class="media d-flex align-items-center">
              <div class="media__left">
                <div class="image is-small-square">
                  <img src="{{ asset('img/for-educ/secondary.png') }}">
                </div>
              </div>
              <div class="media__content d-flex flex-column">
                <strong style="font-size: 1.5rem">Secondary</strong>
                <small style="text-muted" style="font-size: 1rem">updated at 27m ago</small>
              </div>
            </div>
        </a>
        <a class="panel mb-3 mt-3 text-decoration-none has-text-black">
          <div class="media d-flex align-items-center">
            <div class="media__left">
              <div class="image is-small-square">
                <img src="{{ asset('img/for-educ/college.png') }}">
              </div>
            </div>
            <div class="media__content d-flex flex-column">
              <strong style="font-size: 1.5rem">College</strong>
              <small style="text-muted" style="font-size: 1rem">updated at 27m ago</small>
            </div>
          </div>
      </a>
      <a class="panel mb-3 mt-3 text-decoration-none has-text-black">
        <div class="media d-flex align-items-center">
          <div class="media__left">
            <div class="image is-small-square">
              <img src="{{ asset('img/for-educ/graduatestudy.png') }}">
            </div>
          </div>
          <div class="media__content d-flex flex-column">
            <strong style="font-size: 1.5rem">Graduate Studies</strong>
            <small style="text-muted" style="font-size: 1rem">updated at 27m ago</small>
          </div>
        </div>
    </a>
    </div>
@endsection