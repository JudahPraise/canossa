<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <script src="{{ asset('js/app.js') }}"></script>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

        <style>
            *{
                font-family: 'Poppins', sans-serif;
            }
        </style>
  
    </head>
    <body>
        <div class="container-fluid p-0" style="height: 100vh">
           <div class="row w-100 d-flex m-0 h-100">
               <div class="col-lg-8 bg-blue h-100 p-0">
                <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade w-100" data-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                          <img src="{{ asset('img/for-sliders/image-1.JPG') }}" class="d-block w-100" alt="..." style="height: 100vh; width: 100%; overflow: hidden;">
                      </div>
                      <div class="carousel-item">
                        <img src="{{ asset('img/for-sliders/image-2.JPG') }}" class="d-block w-100" alt="..." style="height: 100vh; width: 100%;  overflow: hidden;">
                      </div>
                      <div class="carousel-item">
                        <img src="{{ asset('img/for-sliders/image-3.JPG') }}" class="d-block w-100" alt="..." style="height: 100vh; width: 100%;  overflow: hidden;">
                      </div>
                      <div class="carousel-item">
                        <img src="{{ asset('img/for-sliders/image-4.JPG') }}" class="d-block w-100" alt="..." style="height: 100vh; width: 100%;  overflow: hidden;">
                      </div>
                      <div class="carousel-item">
                        <img src="{{ asset('img/for-sliders/image-5.JPG') }}" class="d-block w-100" alt="..." style="height: 100vh; width: 100%;  overflow: hidden;">
                      </div>
                      <div class="carousel-item">
                        <img src="{{ asset('img/for-sliders/image-6.JPG') }}" class="d-block w-100" alt="..." style="height: 100vh; width: 100%;  overflow: hidden;">
                      </div>
                      <div class="carousel-item">
                        <img src="{{ asset('img/for-sliders/image-7.JPG') }}" class="d-block w-100" alt="..." style="height: 100vh; width: 100%;  overflow: hidden;">
                      </div>
                      <div class="carousel-item">
                        <img src="{{ asset('img/for-sliders/image-8.JPG') }}" class="d-block w-100" alt="..." style="height: 100vh; width: 100%;  overflow: hidden;">
                      </div>
                    </div>
                </div>

               </div>

               <div class="col-lg-4 h-100">
                  <div class="container p-lg-4 d-flex align-items-center">
                      <img src="{{ asset('img/circle-logo.png') }}" alt="" height="80" width="80">
                      <div class="container">
                          <h2>Canossa College</h2>
                          <h3>San Pablo</h3>
                      </div>
                  </div>

                  @yield('login')

                  <div class="row p-lg-4 d-flex align-items-center justify-content-center">
                    <p class="text-center">By using this service, you understood and agree to the Canossa College <a href="#">Terms of Use</a> and <a href="#">Privacy Statement</a></p>
                  </div>
               </div>
           </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
        <script>
           $('.carousel').carousel({
                interval: 15000
            });
        </script>
    </body>
</html>
