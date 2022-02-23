<div class="c-wrapper">
  <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
    <button class="c-header-toggler c-class-toggler d-lg-none mr-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show"><span class="c-header-toggler-icon"></span></button>
    <button class="c-header-toggler c-class-toggler ml-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true"><span class="c-header-toggler-icon"></span></button>

    {{-- Profile Icon --}}
    <ul class="c-header-nav ml-auto">
      <li class="c-header-nav-item has-dropdown dropdown-left m-2">
        <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <div class="c-avatar"><img class="c-avatar-img" src="{{ asset('img/default-male.svg') }}" style=" height: 40px; overflow: hidden;"></div>
        </a>
        <div class="dropdown-menu dropdown-menu-right pt-0">
          <div class="dropdown-header bg-light py-2"><strong>Settings</strong></div>
          <a class="dropdown-item" href="{{ route('admin.accounts') }}">
            <svg class="c-icon mr-2">
              <use xlink:href="{{ asset('core-ui/sprites/free.svg#cil-people') }}"></use>
            </svg>Admins
          </a>
          <div class="dropdown-header bg-light py-2"><strong>Account</strong></div>
          <a class="dropdown-item" href="{{ route('admin.account.index', Auth::guard('admin')->user()->id) }}">
            <svg class="c-icon mr-2">
              <use xlink:href="{{ asset('core-ui/sprites/free.svg#cil-user') }}"></use>
            </svg>{{ Auth::guard('admin')->user()->admin_id }}
          </a>
          <a class="dropdown-item" onclick="document.getElementById('logoutForm').submit()">
            <svg class="c-icon mr-2">
              <use xlink:href="{{ asset('core-ui/sprites/free.svg#cil-exit-to-app') }}"></use>
            </svg>
            Logout
            <form action="{{ route('admin.logout') }}" method="GET" id="logoutForm">@csrf</form>
          </a>
        </div>
      </li>
    </ul>
    {{-- End Profile Icon --}}

  </header>