@extends('layouts.app')

@section('content')
<div class="container-fluid p-0 m-0" style="height: 100vh;">
   <div class="row w-100 d-flex p-0 m-0" style="height: 100vh;">
        <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade w-100 p-0 m-0" data-ride="carousel">
            <div class="carousel-inner" style="height: 100vh;">
              <div class="carousel-item active">
                  <img src="{{ asset('img/for-sliders/image-1.JPG') }}" class="d-block w-100" alt="..." style="height: 100vh; min-width: 100%; overflow: hidden;">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('img/for-sliders/image-2.JPG') }}" class="d-block w-100" alt="..." style="height: 100vh; min-width: 100%;  overflow: hidden;">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('img/for-sliders/image-3.JPG') }}" class="d-block w-100" alt="..." style="height: 100vh; min-width: 100%;  overflow: hidden;">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('img/for-sliders/image-4.JPG') }}" class="d-block w-100" alt="..." style="height: 100vh; min-width: 100%;  overflow: hidden;">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('img/for-sliders/image-5.JPG') }}" class="d-block w-100" alt="..." style="height: 100vh; min-width: 100%;  overflow: hidden;">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('img/for-sliders/image-6.JPG') }}" class="d-block w-100" alt="..." style="height: 100vh; min-width: 100%;  overflow: hidden;">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('img/for-sliders/image-7.JPG') }}" class="d-block w-100" alt="..." style="height: 100vh; min-width: 100%;  overflow: hidden;">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('img/for-sliders/image-8.JPG') }}" class="d-block w-100" alt="..." style="height: 100vh; min-width: 100%;  overflow: hidden;">
              </div>
            </div>
        </div>
       </div>
       {{-- DESKTOP VIEW --}}
       <div class="container m-0 is-desktop-up" 
            style="position: absolute;
              top: 0; 
              right: 0; 
              z-index: 12; 
              width: 30%; 
              height: 100vh;
              background-color: white;
              background: linear-gradient(
                to right bottom,
              rgba(255, 255, 255, 0.7),
              rgba(255, 255, 255, 0.3)
              );
              backdrop-filter: blur(1rem);
          " >
          <div class="container p-lg-4 d-flex align-items-center">
              <img src="{{ asset('img/circle-logo.png') }}" alt="" height="80" width="80">
              <div class="container">
                  <h3>Canossa College</h3>
                  <h4>San Pablo</h4>
              </div>
          </div>

          <div class="container d-flex flex-column align-items-center p-3">
            @yield('login')
          </div>

          <div class="row p-lg-4 d-flex align-items-center justify-self-end">
            <p class="text-center">By using this service, you understood and agree to the Canossa College <a href="#">Terms of Use</a> and <a href="#">Privacy Statement</a></p>
          </div>
        </div>

        {{-- TABLET VIEW --}}
        <div class="container d-flex flex-column justify-content-center align-items-center m-0 is-tablet-only" 
            style="position: absolute;
              top: 0; 
              right: 0; 
              z-index: 12; 
              width: 100%; 
              height: 100vh;
              background-color: white;
              background: linear-gradient(
                to right bottom,
              rgba(255, 255, 255, 0.7),
              rgba(255, 255, 255, 0.3)
              );
              backdrop-filter: blur(1rem);
          ">
          <div class="container d-flex align-items-center p-2">
              <img src="{{ asset('img/circle-logo.png') }}" alt="" height="80" width="80">
              <div class="container w-100">
                  <h4>Canossa College</h4>
                  <h5>San Pablo</h5>
              </div>
          </div>

          <div class="container d-flex flex-column align-items-center p-2">
            @yield('login')
          </div>

          <div class="rowd-flex align-items-center justify-content-center p-2">
            <p class="text-center">By using this service, you understood and agree to the Canossa College <a href="#">Terms of Use</a> and <a href="#">Privacy Statement</a></p>
          </div>
        </div>

        {{-- MOBILE VIEW --}}
        <div class="container d-flex flex-column justify-content-center align-items-center m-0 is-mobile-only p-2" 
            style="position: absolute;
              top: 0; 
              right: 0; 
              z-index: 12; 
              width: 100%; 
              height: 100vh;
              background-color: white;
              background: linear-gradient(
                to right bottom,
              rgba(255, 255, 255, 0.7),
              rgba(255, 255, 255, 0.3)
              );
              backdrop-filter: blur(1rem);
          ">
          <div class="container d-flex align-items-center p-2">
              <img src="{{ asset('img/circle-logo.png') }}" alt="" height="80" width="80">
              <div class="container w-100">
                  <h4>Canossa College</h4>
                  <h5>San Pablo</h5>
              </div>
          </div>

          <div class="container d-flex flex-column align-items-center p-2">
            @yield('login')
          </div>

          <div class="rowd-flex align-items-center justify-content-center p-2">
            <p class="text-center">By using this service, you understood and agree to the Canossa College <a href="#">Terms of Use</a> and <a href="#">Privacy Statement</a></p>
          </div>
        </div>
    </div>
</div>

<script>
   $('.carousel').carousel({
        interval: 15000
    });
</script>
@endsection

