@extends('employee.layouts.main')

@section('home')
<div class="row" style="width: 80%; height: 85vh;" >
    <div class="col-lg-3 d-flex flex-column justify-content-start border-right is-desktop-up">
        
      <div class="mt-4 mr-5" style="width: 200px; height: 200px overflow: hidden;">
          <img src="{{ asset('img/profile.jpg') }}" alt="..." style="width: 200px; height: 200px; border-radius: 50%; ">
      </div>

      <nav class="menu ml-lg-4 mt-5 w-75">
          <ul class="menu__list">
            <li class="py-2"><a href="#"><i class="fas fa-tasks mr-2"></i>Load</a></li>
            <li class="py-2"><a href="#"><i class="fas fa-calendar-alt mr-2"></i>Schedule</a></li>
            <li class="py-2"><a href="#"><i class="fas fa-folder mr-2"></i>Portfolio</a></li>
            <li class="py-2"><a href="{{  route('document.index') }}"><i class="fas fa-file mr-2"></i>Documents</a></li>
            <li class="py-2"><a href="#"><i class="fas fa-chalkboard-teacher mr-2"></i>Grading</a></li>
          </ul>
      </nav>
    </div>
    
    <div class="col-lg-9 d-flex justify-content-center">
        <main role="main" class="col">
            @yield('employee-home')
        </main>
    </div>
</div>
@endsection
