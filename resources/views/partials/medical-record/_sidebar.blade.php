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
    <a class="c-sidebar-nav-link" href="{{ route('medical.dashboard') }}">
      <svg class="c-sidebar-nav-icon">
        <use xlink:href="{{ asset('core-ui/sprites/free.svg#cil-speedometer') }}"></use>
      </svg>
      Dashboard
    </a>
  </li>
  <li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link" href="{{ route('labtest.index') }}">
      <svg class="c-sidebar-nav-icon">
        <use xlink:href="{{ asset('core-ui/sprites/free.svg#cil-beaker') }}"></use>
      </svg>
      Lab Tests
    </a>
  </li>
  <li class="c-sidebar-nav-item mt-auto">
      <a class="c-sidebar-nav-link c-sidebar-nav-link-danger text-white" href="{{ route('nurse.logout') }}">
        <svg class="c-sidebar-nav-icon">
          <use xlink:href="{{ asset('core-ui/sprites/free.svg#cil-exit-to-app') }}"></use>
        </svg>
        Logout
      </a>
  </li>
</ul>


</div>