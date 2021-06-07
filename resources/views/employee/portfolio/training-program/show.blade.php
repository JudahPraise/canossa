@extends('employee.portfolio.training-program.index')

@section('css')
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('argon/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('argon/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('argon/css/argon.css?v=1.2.0') }}" type="text/css">
@endsection

@section('training')

<div class="container-fluid d-flex flex-column align-items-center" style="height: 70vh">
    <div class="card w-100">
        <div class="table-responsive w-100">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Date</th>
                <th scope="col">Title</th>
                <th scope="col">Sponsor</th>
                <th scope="col">Certificate</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($trainings as $training)
                <tr>
                  <td>{{ $training->training_date }}</td>
                  <td>{{ $training->training_title }}</td>
                  <td>{{ $training->training_sponsor }}</td>
                  <td>{{ $training->training_certificate }}</td>
                  <td class="d-flex">
                    <form  class="mr-2" action="{{ route('training.delete', $training->id) }}" method="POST">
                      @method('DELETE')
                      @csrf
                      <button class="btn btn-icon btn-danger btn-sm" type="submit">
                          <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                      </button>
                    </form>
                    <a href="{{ route('training.edit', $training->id) }}" class="btn btn-icon btn-info btn-sm" type="button">
                        <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
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