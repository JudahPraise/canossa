@extends('employee.portfolio.index')

@section('portfolio')

<div class="container-fluid">
    <div class="row">
        <div class="col-6 d-flex align-items-center" style="height: 4rem;">
          <h3 class="font-weight-bold" style="color: black">Training Programs</h3>
        </div>
        <div class="col-6 d-flex justify-content-end align-items-center" style="height: 4rem;">
            <a href="{{ route('portfolio.index', 'card') }}" class="neu-effect d-flex justify-content-center align-items-center mr-2 text-decoration-none py-2 px-3" style="display:inline-block; "><i class="fas fa-caret-left text-primary" style="font-size: 1.6rem"></i></a>
        </div>
    </div>
    
    <div class="row w-100">
        @yield('training')
    </div>
</div>
@endsection