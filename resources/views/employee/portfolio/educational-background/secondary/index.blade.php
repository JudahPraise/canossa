@extends('employee.portfolio.educational-background.index')

@section('educ')

<div class="container-fluid pl-4 pr-3">
    <div class="row mb-3">
        <div class="col-6 d-flex align-items-center" style="height: 4rem;">
          <h2 class="font-weight-bold" style="color: black">Secondary</h2>
        </div>
        <div class="col-6 d-flex justify-content-end align-items-center" style="height: 4rem;">
            <a href="{{ url()->current() === route('educ.index', 'card') ? route('educ.index', 'card') : route('educ.index', 'card') }}" class="btn btn-sm btn-icon btn-light mr-2" type="button">
                <span class="btn-inner--icon"><i class="fas fa-caret-left"></i></span>
            </a>
            @if (url()->current() != route('personal.create'))
                <a href="{{ route('personal.edit', Auth::user()->id) }}" class="btn btn-sm btn-icon btn-info mr-2" type="button">
                    <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                </a>
            @endif
        </div>
    </div>
    
    <div class="row">
        @yield('sec')
    </div>
</div>
@endsection