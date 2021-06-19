<div class="c-sidebar-brand d-lg-down-none">     
    <div class="c-sidebar-brand-full">
      <h5 class="text-white">Canossa</h5>
    </div>
    <div class="c-sidebar-brand-minimized" style="background: none">
      <img src="{{ asset('img/circle-logo.png') }}" width="35" height="35" alt="Canossa Logo">
    </div>
</div>
<ul class="c-sidebar-nav m-0">
  <li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link" href="{{ route('home') }}">
      <svg class="c-sidebar-nav-icon">
        <use xlink:href="{{ asset('core-ui/sprites/free.svg#cil-speedometer') }}"></use>
      </svg>
      Dashboard
    </a>
  </li>
  <li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link" href="{{ route('portfolio.index', 'card') }}">
      <svg class="c-sidebar-nav-icon">
        <use xlink:href="{{ asset('core-ui/sprites/free.svg#cil-address-book') }}"></use>
      </svg>
      Portfolio
    </a>
  </li>
  <li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link" href="{{ route('profile.index') }}">
      <svg class="c-sidebar-nav-icon">
        <use xlink:href="{{ asset('core-ui/sprites/free.svg#cil-user') }}"></use>
      </svg>
      Profile
    </a>
  </li>
  <li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link" href="{{ route('resume') }}">
      <svg class="c-sidebar-nav-icon">
        <use xlink:href="{{ asset('core-ui/sprites/free.svg#cil-file') }}"></use>
      </svg>
      Resume
    </a>
  </li>
  <li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link" href="{{ route('document.index') }}">
      <svg class="c-sidebar-nav-icon">
        <use xlink:href="{{ asset('core-ui/sprites/free.svg#cil-folder-open') }}"></use>
      </svg>
      Documents
    </a>
  </li>
  <li class="c-sidebar-nav-item mt-auto">
    <a class="c-sidebar-nav-link c-sidebar-nav-link-danger text-white" onclick="document.getElementById('logoutForm').submit()">
      <svg class="c-sidebar-nav-icon">
        <use xlink:href="{{ asset('core-ui/sprites/free.svg#cil-exit-to-app') }}"></use>
      </svg>
      Logout
      <form action="{{ route('logout') }}" method="POST" id="logoutForm">@csrf</form>
    </a>
  </li>
</ul>

<button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>  

</div>