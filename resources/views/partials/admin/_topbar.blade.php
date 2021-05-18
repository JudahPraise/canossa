<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    
    <div class="container is-mobile-only" style="width: 40%; margin-left: 10rem" id="sidebarToggleTop" >
        <div class="has-dropdown has-arrow is-hoverable is-right d-flex align-items-center" style="width: 250px">
            <img src="{{ asset('img/circle-logo.png') }}" alt="..." class="rounded-circle mr-2" height="40" width="40">
            <a href="#">Admin</a>
            <div class="dropdown is-right" style="position: absolute;">
                <li class="dropdown__link"><a href="#">Account Settings</a></li>
                <li class="dropdown__link"><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a></li>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="GET" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>

    <!-- Topbar Search -->
    <div class="grid-container is-desktop-up">
        <section  class="d-flex align-items-center justify-content-start">
            <span>Subjects/Units</span>
        </section>
        <section class="d-flex align-items-center">
            <form class="form-inline w-100">
                <input class="form-control mr-sm-2 w-100" type="search" placeholder="Search" aria-label="Search">
                {{-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> --}}
              </form>
        </section>
        <section class="d-flex align-items-center justify-content-center">
            <img src="{{ asset('img/circle-logo.png') }}" alt="..." class="rounded-circle mr-2" height="40" width="40">
            <div class="has-dropdown has-arrow is-hoverable">
                <a href="#">Admin</a>
                <div class="dropdown" style="position: absolute; left: 0">
                    <li class="dropdown__link"><a href="#">Account Settings</a></li>
                    <li class="dropdown__link"><a href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a></li>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="GET" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </section>
    </div>

</nav>