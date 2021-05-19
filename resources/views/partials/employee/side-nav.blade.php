<!-- Sidebar-->
<div class="bg-light border-right" id="sidebar-wrapper" style="color: black">
    <div class="sidebar-heading d-flex align-items-center">
        <div class="is-tiny-square image is-rounded mr-2">
            <img src="{{ asset('img/circle-logo.png') }}">
        </div>
        Canossa College<br>
        San Pablo
    </div>

    <div class="list-group list-group-flush d-flex flex-row align-items-center p-2 wrapper" style="height: 10rem">
        <div class="is-square image is-rounded d-flex justify-content-center align-items-center">
            @if(!empty(Auth::user()->image))
              <img class="img" src="{{ asset('/storage/images/'.Auth::user()->image) }}" alt="">
            @else
                <img src="https://orbitcss.com/img/square.png">
            @endIf
        </div>
        <div class="is-square image is-rounded d-flex justify-content-center align-items-center overlay">
            <div class="is-file-input">
                <form action="{{ route('image.update') }}" id="form" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                  <input type="file" id="exampleFileInput" name="image" onchange="event.preventDefault();
                  document.getElementById('form').submit();">
                </form>
                <label for="exampleFileInput" data-toggle="modal" data-target="#staticBackdrop">
                  <span class="icon">
                    <i class="fas fa-upload"></i>
                  </span>
                  <span>Upload File</span>
                </label>
            </div>
        </div>
        <div class="section py-0 px-3">
            <p>{{ Auth::user()->name }}</p>
            <p>{{ Auth::user()->role }} | {{ Auth::user()->department }}</p>
        </div>
    </div>

    <div class="sidenavs">
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action bg-light" href="{{ route('home') }}">Dashboard</a>
            <a class="list-group-item list-group-item-action bg-light" href="{{ route('portfolio.index', 'card') }}">Portfolio</a>
            <a class="list-group-item list-group-item-action bg-light" href="#!">Documents</a>
            <a class="list-group-item list-group-item-action bg-light" href="#!">Overview</a>
        </div>


        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action bg-light" href="#!">Logout</a>
        </div>
    </div>
</div>