@extends('medical-record.layouts.home')

@section('css')
  {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/orbitcss/css/orbit.css"> --}}
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('argon/vendor/nucleo/css/nucleo.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('argon/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('argon/css/argon.css?v=1.2.0') }}" type="text/css">
@endsection

@section('medical-home')

<div class="row row-cols-1 row-cols-md-2">

  <div class="col col-md-8">
    <div class="card p-2">
      <div class="card-body">
        <p>col-md-8</p>
      </div>
    </div>
  </div>

  <div class="col col-md-4">
    <div class="card p-2">
      <div class="card-body">
        <p>col-md-4</p>
      </div>
    </div>
  </div>

  <div class="col col-md-2">
    <div class="card p-2">
      <div class="card-body">
        <h3>1</h3>
        <p>col-md-2</p>
      </div>
    </div>
  </div>

  <div class="col col-md-2">
    <div class="card p-2">
      <div class="card-body">
        <h3>2</h3>
        <p>col-md-2</p>
      </div>
    </div>
  </div>

  <div class="col col-md-2">
    <div class="card p-2">
      <div class="card-body">
        <h3>2</h3>
        <p>col-md-2</p>
      </div>
    </div>
  </div>

  <div class="col col-md-2">
    <div class="card p-2">
      <div class="card-body">
        <h3>1</h3>
        <p>col-md-2</p>
      </div>
    </div>
  </div>

  <div class="col col-md-4">
    <div class="card p-2">
      <div class="card-body">
        <p>col-md-4</p>
      </div>
    </div>
  </div>

</div>

@endsection

@section('js')
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{ asset('argon/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('argon/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('argon/vendor/js-cookie/js.cookie.j') }}s"></script>
    <script src="{{ asset('argon/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('argon/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <!-- Argon JS -->
    <script src="{{ asset('argon/js/argon.js?v=1.2.0') }}"></script>
@endsection