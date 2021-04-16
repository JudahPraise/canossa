<nav class="navbar navbar-expand-lg navbar-dark bg-dark is-desktop-up" style="width: 80%;">
    <a class="navbar-brand col-md-3 col-lg-2 d-flex align-items-center" href="{{ route('admin') }}">
      <img src="{{ asset('img/circle-logo.png') }}" width="40" height="40" class="d-inline-block align-top mx-3" alt="" loading="lazy">
      Canossa
    </a>

    <input class="form-control form-control-dark w-100 order-1" type="text" placeholder="Search" aria-label="Search">

    <ul class="navbar-nav px-3 order-2">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </li>
    </ul>
</nav>

<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap pb-3 shadow is-desktop-down">

  <a class="navbar-brand col d-flex align-items-center" href="{{ route('admin') }}">
    <img src="{{ asset('img/circle-logo.png') }}" width="40" height="40" class="d-inline-block align-top mr-2" alt="" loading="lazy">
    Canossa
  </a>
  <button class="navbar-toggler d-md-none collapsed m-3" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <input class="form-control form-control-dark w-100 px-3" type="text" placeholder="Search" aria-label="Search">

    <div class="collapse navbar-collapse" id="sidebarMenu">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
      </ul>
    </div>
  
</nav>