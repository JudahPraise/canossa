<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <i class="fas fa-align-left" id="menu-toggle"></i>
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0 d-flex flex-row">
            
            <ul class="nav-item has-dropdown is-right is-hoverable m-0 mt-2 px-2">
                <li onclick="this.closest('.has-dropdown').classList.toggle('is-active');" class="nav-item" style="height: 2rem; list-style: none;">
                    <i class="fas fa-envelope" style="font-size: 1.5rem"></i>
                </li>

                <ul class="dropdown" style="height: 10rem; position: absolute">
                  <li class="nav-item dropdown__link">
                      <a href="#" class="nav-link" >Profile</a>
                    </li>
                  <li class="nav-item dropdown__link">
                      <a href="#" class="nav-link" >Account Settings</a>
                    </li>
                  <li class="nav-item dropdown__link">
                      <a class="dropdown-item nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt px-2 is-desktop-down is-tablet-only"></i>{{ __('Logout') }}</a>
                    </li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
               </ul>

            </ul>

            <ul class="nav-item has-dropdown is-right is-hoverable m-0 mt-2 px-2">
                <li onclick="this.closest('.has-dropdown').classList.toggle('is-active');" class="nav-item" style="height: 2rem; list-style: none;">
                    <i class="fas fa-bell" style="font-size: 1.5rem"></i>
                </li>
                <ul class="dropdown" style="height: 10rem; position: absolute">
                    <li class="nav-item dropdown__link">
                        <a href="#" class="nav-link" >Profile</a>
                    </li>
                    <li class="nav-item dropdown__link">
                        <a href="#" class="nav-link" >Account Settings</a>
                    </li>
                    <li class="nav-item dropdown__link">
                        <a class="dropdown-item nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt px-2 is-desktop-down is-tablet-only"></i>{{ __('Logout') }}</a>
                    </li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
               </ul>
            </ul>

            <ul class="nav-item has-dropdown is-right is-hoverable m-0 is-desktop-up">
                <li onclick="this.closest('.has-dropdown').classList.toggle('is-active');" class="nav-item" style="height: 2rem; list-style: none;"><a class="has-arrow nav-link" href="#">{{ Auth::user()->name }}</a></li>
                <ul class="dropdown" style="height: 10rem; position: absolute">
                    <li class="nav-item dropdown__link">
                      <a href="#" class="nav-link" >Profile</a>
                    </li>
                    <li class="nav-item dropdown__link">
                        <a href="#" class="nav-link" >Account Settings</a>
                    </li>
                    <li class="nav-item dropdown__link">
                        <a class="dropdown-item nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt px-2 is-desktop-down is-tablet-only"></i>{{ __('Logout') }}</a>
                    </li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
               </ul>
            </ul>
            <ul class="nav-item has-dropdown is-left is-hoverable m-0 is-desktop-down">
                <li onclick="this.closest('.has-dropdown').classList.toggle('is-active');" class="nav-item" style="height: 2rem; list-style: none;">
                    <a class="has-arrow nav-link" href="#">{{ Auth::user()->name }}</a>
                </li>
                <ul class="dropdown" style="height: 10rem; position: absolute">
                    <li class="nav-item dropdown__link">
                        <a href="#" class="nav-link" >Profile</a>
                    </li>
                    <li class="nav-item dropdown__link">
                        <a href="#" class="nav-link" >Account Settings</a>
                    </li>
                    <li class="nav-item dropdown__link">
                        <a class="dropdown-item nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt px-2 is-desktop-down is-tablet-only"></i>{{ __('Logout') }}</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
               </ul>
            </ul>
        </ul>
</nav>