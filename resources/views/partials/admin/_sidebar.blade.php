<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion m-0 p-0" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('img/circle-logo.png') }}" alt="..." class="rounded-circle mr-2" height="40" width="40">
        </div>
        <div class="sidebar-brand-text mx-2">{{ config('app.name') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Nav Item - Announcements -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('announcement.index') }}">
            <span>Announcements</span>
        </a>
    </li>

    <!-- Nav Item - Announcements -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('message.index') }}">
            <span>Messages</span>
        </a>
    </li>

    <!-- Nav Item - Announcements -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('accounts.index') }}">
            <span>Manage Accounts</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <span>Logout</span>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="GET" class="d-none">
                @csrf
            </form>
        </a>
    </li>


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>


@include('partials.admin._newstudent')
@include('partials.admin._newsubject')
