<nav class="navbar navbar-expand-lg navbar-light px-5" style="width: 100%; height: 5rem;  background-color: #e9ecef;">
  <a class="navbar-brand d-flex align-items-center"  href="{{ route('home') }}">
      <img src="{{ asset('img/circle-logo.png') }}" width="40" height="40" class="d-inline-block align-top" alt="" loading="lazy">
      <p class="ml-2 mt-2" style="font-size: 1.4rem">CSIS</p>
  </a>
 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-end"" id="navbarNavDropdown">
    <ul class="navbar-nav" style="height: 2rem">
      <li class="nav-item" style="height: 2rem"><a href="{{  route('student') }}" class="nav-link"><i class="fas fa-home px-2 is-desktop-down"></i>Home</a></li>
      <li class="nav-item" style="height: 2rem"><a href="{{ route('schedule') }}" class="nav-link"><i class="fas fa-calendar-alt px-2 is-desktop-down"></i>Schedule</a></li>
      <li class="nav-item" style="height: 2rem"><a href="{{ route('grade') }}" class="nav-link"><i class="fas fa-chalkboard-teacher px-2 is-desktop-down"></i>Grading</a></li>
      <ul class="nav-item has-dropdown is-right is-hoverable">
        <li onclick="this.closest('.has-dropdown').classList.toggle('is-active');" class="nav-item" style="height: 2rem; list-style: none;"><a class="has-arrow nav-link" href="#"><i class="fas fa-user px-2 is-desktop-down"></i>{{ Auth::user()->name }}</a></li>
        <ul class="dropdown" style="height: 10rem; position: absolute">
          <li class="nav-item dropdown__link"><a href="#" class="nav-link" >Profile</a></li>
          <li class="nav-item dropdown__link"><a href="#" class="nav-link" >Account Settings</a></li>
          <li class="nav-item dropdown__link"><a class="dropdown-item nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt px-2 is-desktop-down is-tablet-only"></i>{{ __('Logout') }}</a></li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
       </ul>
      </ul>
    </ul>
  </div>
</nav>