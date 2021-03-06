@extends('employee.layouts.home')

@section('css')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/orbitcss/css/orbit.css">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('argon/vendor/nucleo/css/nucleo.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('argon/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('argon/css/argon.css?v=1.2.0') }}" type="text/css">
@endsection

@section('employee-home')

<div class="container w-100 d-flex justify-content-center align-items-center mt-5">
    <div class="card" style="width: 90vw">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h2 class="mb-0">Feedback</h2>
          </div>
        </div>
      </div>
      <div class="card-body border-0">
        <form class="w-100" enctype="multipart/form-data" id="feedbackForm"  action="{{ route('feedback.update', Auth::user()->id) }}" method="POST">
            @method('put')
            @csrf
            <div class="text-center mb-5">
              <h1>Update your feedback</h1>
              <h3>What can we do to improve the experience?</h3>
            </div>
            <div class="form-group">
              <label for="feedback">Feedback</label>
              <span role="textbox" contenteditable id="feedback" name="feedback" style="display: block;
              width: 100%;
              overflow: hidden;
              resize: both;
              min-height: 40px;
              line-height: 20px;
              border: 2px solid grey;
              padding: .7rem">{{ $user->feedback }}</span>
            </div>
            <div class="form-group">
              <label for="suggestion">Suggestion</label>
              <span role="textbox" contenteditable id="suggestion" name="suggestion" style="display: block;
              width: 100%;
              overflow: hidden;
              resize: both;
              min-height: 40px;
              line-height: 20px;
              border: 2px solid grey;
              padding: .7rem">{{ $user->suggestion }}</span>
            </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" value="Submit Form">Update</button>
          </div>
        </form>
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