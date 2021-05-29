@extends('employee.portfolio.educational-background.index')

@section('educ')
    <div class="container-fluid p-0 ">
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
      
      <div class="row row-cols-2 row-cols-md-4 mt-3">
        <div class="col mb-4">
            <div class="card has-no-shadow">
                <a href="{{ !empty(auth()->user()->education->elem ) ? route('educ.show', Auth::user()->id) : route('elem.create') }}" class="card__image">
                  <img src="{{ asset('img/for-educ/elementary.png') }}">
                </a>
                <div class="card__content">
                  <p class="grid has-no-col-padding has-text-light-grey">
                    <small class="column">
                      Updated at 3 mins ago
                    </small>
                  </p>
                  <a href="{{ !empty(auth()->user()->education->elem ) ? route('educ.show', Auth::user()->id) : route('elem.create') }}" class="is-hover-underline has-text-black">
                    <h5 style="font-weight: bold">Elementary</h5>
                  </a>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            @if (empty(auth()->user()->education->elementary))
                <div class="stack-top">
                  <span class="d-flex flex-column align-items-center">
                    <span><i class="fas fa-lock mb-3" style="color: white; font-size: 3rem"></i></span>
                    {{-- <small class="mb-3" style="color: white; font-size: 1rem">You're civil status is {{ auth()->user()->personal()->civil_status }}</small> --}}
                  </span>
                </div>
            @endif
            <div class="card has-no-shadow">
                <a href="{{ !empty(auth()->user()->education->sec ) ? route('educ.show', Auth::user()->id) : route('sec.create') }}" class="card__image">
                  <img src="{{ asset('img/for-educ/secondary.png') }}">
                </a>
                <div class="card__content">
                  <p class="grid has-no-col-padding has-text-light-grey">
                    <small class="column">
                      Updated at 3 mins ago
                    </small>
                  </p>
                  <a href="{{ !empty(auth()->user()->education->sec ) ? route('educ.show', Auth::user()->id) : route('sec.create') }}" class="is-hover-underline has-text-black">
                    <h5 style="font-weight: bold">Secondary</h5>
                  </a>
                </div>
            </div>
        </div>
        <div class="col mb-4">
          @if (empty(auth()->user()->education->secondary))
            <div class="stack-top">
              <span class="d-flex flex-column align-items-center">
                <span><i class="fas fa-lock mb-3" style="color: white; font-size: 3rem"></i></span>
                {{-- <small class="mb-3" style="color: white; font-size: 1rem">You're civil status is {{ auth()->user()->personal()->civil_status }}</small> --}}
              </span>
            </div>
          @endif
           <div class="card has-no-shadow">
                <a href="#" class="card__image">
                  <img src="{{ asset('img/for-educ/college.png') }}">
                </a>
                <div class="card__content">
                  <p class="grid has-no-col-padding has-text-light-grey">
                    <small class="column">
                      Updated at 3 mins ago
                    </small>
                  </p>
                  <a href="#" class="is-hover-underline has-text-black">
                    <h5 style="font-weight: bold">College</h5>
                  </a>
                </div>
            </div>
        </div>
        <div class="col mb-4">
          @if (empty(auth()->user()->education->college))
            <div class="stack-top">
              <span class="d-flex flex-column align-items-center">
                <span><i class="fas fa-lock mb-3" style="color: white; font-size: 3rem"></i></span>
                {{-- <small class="mb-3" style="color: white; font-size: 1rem">You're civil status is {{ auth()->user()->personal()->civil_status }}</small> --}}
              </span>
            </div>
          @endif
            <div class="card has-no-shadow">
              <a href="#" class="card__image">
                <img src="{{ asset('img/for-educ/graduatestudy.png') }}">
              </a>
              <div class="card__content">
                <p class="grid has-no-col-padding has-text-light-grey">
                  <small class="column">
                    Updated at 3 mins ago
                  </small>
                </p>
                <a href="#" class="is-hover-underline has-text-black">
                  <h5 style="font-weight: bold">Graduate Studies</h5>
                </a>
              </div>
            </div>
        </div>
    </div>
    </div>
@endsection