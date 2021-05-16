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

    <li class="nav-item">
        <a class="nav-link  collapsed" href="#" data-toggle="collapse" data-target="#collapseManage"
            aria-expanded="true" aria-controls="collapseTwo">
            <span>Manage Accounts</span>
        </a>
        <div id="collapseManage" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" data-target="#AddSubjectModal" href="#">Student</a>
                <a class="collapse-item" href="{{ route('register.index') }}">Employee</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <span>Logout</span>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
