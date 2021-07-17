@extends('employee.portfolio.educational-background.index')

@section('educ')
<div class="container-fluid">
  <div class="row w-100 m-0">
    <div class="card has-no-shadow w-100">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Educational Background</h3>
          </div>
          <div class="col text-right">
            <a href="{{ route('portfolio.index', 'card') }}" class="btn btn-sm btn-icon btn-light" type="button">
              <span class="btn-inner--icon"><i class="fas fa-caret-left"></i></span>
            </a>
              <a href="{{ route('educ.index', 'list') }}" class="btn btn-sm btn-icon btn-light" type="button">
                <span class="btn-inner--icon"><i class="fas fa-th-list"></i></span>
              </a>
          </div>
        </div>
      </div>
      <div class="row row-cols-2 row-cols-md-4 mt-3">
        <div class="col mb-3">
            <div class="card">
                <a href="{{ !empty(auth()->user()->education->elem ) ? route('educ.show', Auth::user()->id) : route('elem.create') }}" class="card__image">
                  <img src="{{ asset('img/for-educ/elementary.png') }}">
                </a>
                <div class="card__content">
                  <p class="grid has-no-col-padding">
                    <small class="column">
                      @if (auth()->user()->education->elementary)
                        {{ auth()->user()->education->elem->updated_at->diffForhumans() }}
                      @else
                        No data yet
                      @endif
                    </small>
                  </p>
                  <a href="{{ !empty(auth()->user()->education->elem ) ? route('educ.show', Auth::user()->id) : route('elem.create') }}" class="is-hover-underline has-text-black">
                    <h3 style="font-weight: bold">Elementary</h3>
                  </a>
                </div>
            </div>
        </div>
        <div class="col mb-3">
            @if (empty(auth()->user()->education->elementary))
                <div class="stack-top">
                  <span class="d-flex flex-column align-items-center">
                    <span><i class="fas fa-lock mb-3" style="color: white; font-size: 3rem"></i></span>
                    {{-- <small class="mb-3" style="color: white; font-size: 1rem">You're civil status is {{ auth()->user()->personal()->civil_status }}</small> --}}
                  </span>
                </div>
            @endif
            <div class="card">
                <a href="{{ !empty(auth()->user()->education->sec ) ? route('educ.show', Auth::user()->id) : route('sec.create') }}" class="card__image">
                  <img src="{{ asset('img/for-educ/secondary.png') }}">
                </a>
                <div class="card__content">
                  <p class="grid has-no-col-padding">
                    <small class="column">
                      @if (!empty(auth()->user()->education->secondary))
                        {{ auth()->user()->education->sec->updated_at->diffForhumans() }}
                      @else
                        No data yet
                      @endif
                    </small>
                  </p>
                  <a href="{{ !empty(auth()->user()->education->sec ) ? route('educ.show', Auth::user()->id) : route('sec.create') }}" class="is-hover-underline has-text-black">
                    <h3 style="font-weight: bold">Secondary</h3>
                  </a>
                </div>
            </div>
        </div>
        <div class="col mb-3">
          @if (empty(auth()->user()->education->secondary))
            <div class="stack-top">
              <span class="d-flex flex-column align-items-cen        ter">
                <span><i class="fas fa-lock mb-3" style="color: white; font-size: 3rem"></i></span>
                {{-- <small class="mb-3" style="color: white; font-size: 1rem">You're civil status is {{ auth()->user()->personal()->civil_status }}</small> --}}
              </span>
            </div>
          @endif
           <div class="card">
                <a href="{{ !empty(auth()->user()->education->col ) ? route('educ.show', Auth::user()->id) : route('col.create') }}" class="card__image">
                  <img src="{{ asset('img/for-educ/college.png') }}">
                </a>
                <div class="card__content">
                  <p class="grid has-no-col-padding">
                    <small class="column">
                      @if (!empty(auth()->user()->education->college))
                        {{ auth()->user()->education->col->updated_at->diffForhumans() }}
                      @else
                        No data yet
                      @endif
                    </small>
                  </p>
                  <a href="{{ !empty(auth()->user()->education->col ) ? route('educ.show', Auth::user()->id) : route('col.create') }}" class="is-hover-underline has-text-black">
                    <h3 style="font-weight: bold">College</h3>
                  </a>
                </div>
            </div>
        </div>
        <div class="col mb-3">
          @if (empty(auth()->user()->education->college))
            <div class="stack-top">
              <span class="d-flex flex-column align-items-center">
                <span><i class="fas fa-lock mb-3" style="color: white; font-size: 3rem"></i></span>
                {{-- <small class="mb-3" style="color: white; font-size: 1rem">You're civil status is {{ auth()->user()->personal()->civil_status }}</small> --}}
              </span>
            </div>
          @endif
            <div class="card">
              <a href="{{ !empty(auth()->user()->education()->grad ) ? route('educ.show', Auth::user()->id) : route('grad.create') }}" class="card__image">
                <img src="{{ asset('img/for-educ/graduatestudy.png') }}">
              </a>
              <div class="card__content">
                <p class="grid has-no-col-padding">
                  <small class="column">
                    @if (!empty(auth()->user()->education->graduate_study))
                      {{ auth()->user()->education->grad()->latest('updated_at')->first()->updated_at->diffForhumans() }}
                    @else
                      No data yet
                    @endif
                  </small>
                </p>
                <a href="{{ !empty(auth()->user()->education()->grad ) ? route('educ.show', Auth::user()->id) : route('grad.create') }}" class="is-hover-underline has-text-black">
                  <h3 style="font-weight: bold">Graduate Studies</h3>
                </a>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection