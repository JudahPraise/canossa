@extends('employee.layouts.home')

@section('employee-home')
<div class="container-fluid">
  <div class="row pt-5">
    <div class="col-6 d-flex align-items-center" style="height: 4rem;">
      <h3 class="font-weight-bold" style="color: black">Portfolio</h3>
    </div>
    <div class="col-6 d-flex justify-content-end align-items-center" style="height: 4rem;">
        <a href="{{ route('portfolio.index', 'card') }}" class="neu-effect d-flex justify-content-center align-items-center mr-2 text-decoration-none p-2" style="display:inline-block; "><i class="fas fa-th-large" style="font-size: 1.4rem"></i></a>
        <a href="{{ route('portfolio.index', 'list') }}" class="neu-effect d-flex justify-content-center align-items-center text-decoration-none p-2" style="display:inline-block; "><i class="fas fa-th-list" style="font-size: 1.4rem"></i></a>
    </div>
  </div>

  <div class="row">
      @yield('portfolio')
  </div>


</div>
@endsection