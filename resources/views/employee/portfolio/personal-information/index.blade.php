@extends('employee.portfolio.index')

@section('portfolio')

<div class="container-fluid">
    <div class="row pt-5">
        <div class="col-6 d-flex align-items-center" style="height: 4rem;">
          <h3 class="font-weight-bold" style="color: black">Personal Information</h3>
        </div>
        <div class="col-6 d-flex justify-content-end align-items-center" style="height: 4rem;">
            <a href="{{ url()->previous() }}" class="neu-effect d-flex justify-content-center align-items-center mr-2 text-decoration-none py-2 px-3" style="display:inline-block; "><i class="fas fa-caret-left" style="font-size: 1.6rem"></i></a>
            <a href="{{ route('personal.edit', Auth::user()->id) }}" class="{{ !empty($personals) ? 'neu-effect' : 'neu-effect-inset' }} d-flex justify-content-center align-items-center text-decoration-none py-2 px-2" style="display:inline-block; "><i class="fas fa-edit" style="font-size: 1.6rem"></i></a>
        </div>
    </div>
    
    <div class="row">
        @yield('personal')
    </div>
</div>
@endsection