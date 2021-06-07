@extends('employee.portfolio.index')

@section('portfolio')

<div class="container-fluid">
    <div class="row">
        <div class="col-6 d-flex align-items-center" style="height: 4rem;">
          <h2 class="font-weight-bold" style="color: black">Training Programs</h2>
        </div>
        <div class="col-6 d-flex justify-content-end align-items-center" style="height: 4rem;">
            <a href="{{ route('portfolio.index', 'card') }}" class="btn btn-icon btn-secondary btn-sm" type="button">
                <span class="btn-inner--icon"><i class="fas fa-caret-left"></i></span>
            </a>
        </div>
    </div>
    
    <div class="row">
        @yield('training')
    </div>
</div>
@endsection