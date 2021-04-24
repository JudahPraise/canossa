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
            <ion-icon name="speedometer"></ion-icon>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Modules
    </div>

    <!-- Nav Item - Students Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link  collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <ion-icon name="person"></ion-icon>
            <span>Student</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" data-toggle="modal" data-target="#AddStudentModal" href="#">New Student</a>
                <a class="collapse-item" href="#">Search</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Sections -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <ion-icon name="people"></ion-icon>
            <span>Sections</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>


@include('partials.admin._newstudent')

