@extends('employee.portfolio.family-background.index')

@section('family')
    <div class="container-fluid p-0 ">
      <div class="row pt-5">
        <div class="col-6 d-flex align-items-center" style="height: 4rem;">
          <h3 class="font-weight-bold" style="color: black">Family Background</h3>
        </div>
        <div class="col-6 d-flex justify-content-end align-items-center" style="height: 4rem;">
            <a href="{{ route('portfolio.index', 'card') }}" class="neu-effect d-flex justify-content-center align-items-center mr-2 text-decoration-none py-2 px-3" style="display:inline-block; "><i class="fas fa-caret-left" style="font-size: 1.6rem"></i></a>
            <a href="{{ route('family.index', 'card') }}" class="neu-effect d-flex justify-content-center align-items-center mr-2 text-decoration-none p-2" style="display:inline-block; "><i class="fas fa-th-large" style="font-size: 1.4rem"></i></a>
            <a href="{{ route('family.index', 'list') }}" class="neu-effect d-flex justify-content-center align-items-center text-decoration-none p-2" style="display:inline-block; "><i class="fas fa-th-list" style="font-size: 1.4rem"></i></a>
        </div>
      </div>
        <div class="row row-cols-2 row-cols-md-4 mt-3">
          <div class="col mb-4">
              <div class="card has-no-shadow">
                  <a href="#" class="card__image">
                    <img src="{{ asset('img/for-family/spouse.png') }}">
                  </a>
                  <div class="card__content">
                    <p class="grid has-no-col-padding has-text-light-grey">
                      <small class="column">
                        Updated at 3 mins ago
                      </small>
                    </p>
                    <a href="#" class="is-hover-underline has-text-black">
                      <h5 style="font-weight: bold">Spouse</h5>
                    </a>
                  </div>
              </div>
          </div>
          <div class="col mb-4">
              <div class="card has-no-shadow">
                  <a href="#" class="card__image">
                    <img src="{{ asset('img/for-family/children.png') }}">
                  </a>
                  <div class="card__content">
                    <p class="grid has-no-col-padding has-text-light-grey">
                      <small class="column">
                        Updated at 3 mins ago
                      </small>
                    </p>
                    <a href="#" class="is-hover-underline has-text-black">
                      <h5 style="font-weight: bold">Children</h5>
                    </a>
                  </div>
              </div>
          </div>
          <div class="col mb-4">
             <div class="card has-no-shadow">
                  <a href="#" class="card__image">
                    <img src="{{ asset('img/for-family/father.png') }}">
                  </a>
                  <div class="card__content">
                    <p class="grid has-no-col-padding has-text-light-grey">
                      <small class="column">
                        Updated at 3 mins ago
                      </small>
                    </p>
                    <a href="#" class="is-hover-underline has-text-black">
                      <h5 style="font-weight: bold">Father</h5>
                    </a>
                  </div>
              </div>
          </div>
          <div class="col mb-4">
              <div class="card has-no-shadow">
                <a href="#" class="card__image">
                  <img src="{{ asset('img/for-family/mother.png') }}">
                </a>
                <div class="card__content">
                  <p class="grid has-no-col-padding has-text-light-grey">
                    <small class="column">
                      Updated at 3 mins ago
                    </small>
                  </p>
                  <a href="#" class="is-hover-underline has-text-black">
                    <h5 style="font-weight: bold">Mother</h5>
                  </a>
                </div>
              </div>
          </div>
      </div>
    </div>
@endsection