<!-- Sidebar-->
<div class="bg-light border-right" id="sidebar-wrapper" style="color: black">
    <div class="sidebar-heading d-flex align-items-center">
        <div class="is-tiny-square image is-rounded mr-2">
            <img src="{{ asset('img/circle-logo.png') }}">
        </div>
        Canossa College<br>
        San Pablo
    </div>

    <div class="list-group list-group-flush d-flex flex-row align-items-center p-2" style="height: 10rem">
        <div class="is-square image is-rounded">
            <img src="https://orbitcss.com/img/square.png">
        </div>
        <div class="section py-0 px-3">
            <p>{{ Auth::user()->name }}</p>
            <p>{{ Auth::user()->role }} | {{ Auth::user()->department }}</p>
        </div>
    </div>

    <div class="sidenavs">
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action bg-light" href="#!">Dashboard</a>
            <a class="list-group-item list-group-item-action bg-light" href="#!">Shortcuts</a>
            <a class="list-group-item list-group-item-action bg-light" href="#!">Portfolio</a>
            <a class="list-group-item list-group-item-action bg-light" href="#!">Documents</a>
            <a class="list-group-item list-group-item-action bg-light" href="#!">Overview</a>
        </div>


        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action bg-light" href="#!">Logout</a>
        </div>
    </div>
</div>