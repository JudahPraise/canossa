@extends('employee.portfolio.voluntary-work.index')

@section('css')
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('argon/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('argon/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('argon/css/argon.css?v=1.2.0') }}" type="text/css">
@endsection

@section('voluntary')

<div class="container-fluid d-flex flex-column align-items-center " style="height: 70vh">
    <div class="card w-100">
        <div class="table-responsive w-100">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Name & Address of organization</th>
                <th scope="col">Period of attendance</th>
                <th scope="col">Number of hours</th>
                <th scope="col">Position/Nature of Work</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($voluntaries as $voluntary)
                <tr>
                  <td>{{ $voluntary->name_address }}</td>
                  <td>{{ $voluntary->duration }}</td>
                  <td>{{ $voluntary->no_hours }}</td>
                  <td>{{ $voluntary->position }}</td>
                  <td>
                    <form  class="mr-2" action="{{ route('voluntary.delete', $voluntary->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-icon btn-danger btn-sm" type="submit">
                            <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                        </button>
                    </form>
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