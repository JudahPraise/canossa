  <div class="c-sidebar-brand d-lg-down-none">     
      <div class="c-sidebar-brand-full">
        <h5 class="text-white">Canossa</h5>
      </div>
      <div class="c-sidebar-brand-minimized" style="background: none">
        <img src="{{ asset('img/circle-logo.png') }}" width="46" height="46" alt="Canossa Logo">
      </div>
  </div>
  <ul class="c-sidebar-nav m-0">
    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link" href="{{ route('admin') }}">
        <svg class="c-sidebar-nav-icon">
          <use xlink:href="{{ asset('core-ui/sprites/free.svg#cil-speedometer') }}"></use>
        </svg>
        Dashboard
      </a>
    </li>
    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link" href="{{ route('employees') }}">
        <svg class="c-sidebar-nav-icon">
          <use xlink:href="{{ asset('core-ui/sprites/free.svg#cil-user') }}"></use>
        </svg>
        Employees
      </a>
    </li>
    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link" href="{{ route('message.index') }}">
        <svg class="c-sidebar-nav-icon">
          <use xlink:href="{{ asset('core-ui/sprites/free.svg#cil-envelope-closed') }}"></use>
        </svg>
        Messages
        {{-- <span class="badge badge-info">45</span> --}}
      </a>
    </li>
    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link" href="{{ route('announcement.index') }}">
        <svg class="c-sidebar-nav-icon">
          <use xlink:href="{{ asset('core-ui/sprites/free.svg#cil-bell') }}"></use>
        </svg>
        Announcements
      </a>
    </li>
    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link" href="{{ route('accounts.index') }}">
        <svg class="c-sidebar-nav-icon">
          <use xlink:href="{{ asset('core-ui/sprites/free.svg#cil-people') }}"></use>
        </svg>
        Manage Accounts
      </a>
    </li>
    <li class="c-sidebar-nav-item mt-auto">
      <a class="c-sidebar-nav-link c-sidebar-nav-link-danger" onclick="document.getElementById('logoutForm2').submit()">
        <svg class="c-sidebar-nav-icon">
          <use xlink:href="{{ asset('core-ui/sprites/free.svg#cil-exit-to-app') }}"></use>
        </svg>
        Logout
        <form action="{{ route('admin.logout') }}" method="POST" id="logoutForm2">@csrf</form>
      </a>
    </li>
  </ul>

  <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>  
  
</div>