@extends('employee.portfolio.family-background.index')

@section('family')

<div class="container-fluid cont">
    <div class="row mb-3">
        <div class="col-6 d-flex align-items-center" style="height: 4rem;">
          <h3 class="font-weight-bold" style="color: black">Spouse</h3>
        </div>
        <div class="col-6 d-flex justify-content-end align-items-center" style="height: 4rem;">
            <a href="{{ url()->current() === route('family.index', 'card') ? route('family.index', 'card') : route('family.index', 'card') }}" class="neu-effect d-flex justify-content-center align-items-center mr-2 text-decoration-none py-2 px-3" style="display:inline-block; "><i class="fas fa-caret-left text-primary" style="font-size: 1.6rem"></i></a>
            @if (url()->current() != route('spouse.create'))
                <a href="{{ route('spouse.edit', Auth::user()->id) }}" class="{{ !empty(auth()->user()->family->spouse) ? 'neu-effect' : 'neu-effect-inset btn disabled' }} d-flex justify-content-center align-items-center text-decoration-none py-2 px-2" style="display:inline-block; "><i class="fas fa-edit text-primary" style="font-size: 1.6rem"></i></a>
            @endif
        </div>
    </div>
    
    <div class="row">
        @yield('spouse')
    </div>
    
</div>
@endsection