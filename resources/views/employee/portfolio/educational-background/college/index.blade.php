@extends('employee.portfolio.educational-background.index')

@section('educ')

<div class="container-fluid pl-4 pr-3">
    <div class="row pt-5 mb-3">
        <div class="col-6 d-flex align-items-center" style="height: 4rem;">
          <h3 class="font-weight-bold" style="color: black">College</h3>
        </div>
        <div class="col-6 d-flex justify-content-end align-items-center" style="height: 4rem;">
            <a href="{{ url()->current() === route('educ.index', 'card') ? route('educ.index', 'card') : route('educ.index', 'card') }}" class="neu-effect d-flex justify-content-center align-items-center mr-2 text-decoration-none py-2 px-3" style="display:inline-block; "><i class="fas fa-caret-left" style="font-size: 1.6rem"></i></a>
            @if (url()->current() != route('col.create'))
                <a href="{{ route('col.edit', Auth::user()->id) }}" class="{{ !empty(auth()->user()->education->col) ? 'neu-effect' : 'neu-effect-inset btn disabled' }} d-flex justify-content-center align-items-center text-decoration-none py-2 px-2" style="display:inline-block; "><i class="fas fa-edit" style="font-size: 1.6rem"></i></a>
            @endif
        </div>
    </div>
    
    <div class="row">
        @yield('col')
    </div>
</div>
@endsection