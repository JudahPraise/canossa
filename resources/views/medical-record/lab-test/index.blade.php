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

<div class="container-fluid p-4">
  @component('components.alerts')@endcomponent
  <div class="row w-100 m-0">
    <div class="card w-100">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Lab Tests</h3>
          </div>
          <div class="col  d-flex justify-content-end">
            <input type="text" class="form-control form-control-alternative w-50" placeholder="Search employee" type="text" id="myInput" onkeyup="myFunction()">
          </div>
        </div>
      </div>

      <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush" id="myTable">
          <thead class="thead-light">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Document</th>
              <th scope="col">Last Updated</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($employees as $employee)
              <tr id="document">
                <th scope="row">
                  {{ $employee->employee_id }}
                </th>
                <td>
                  {{ $employee->name }}
                </td>
                <td>
                  {{ !empty($employee->labtest) ? $employee->labTest->file : 'N/A' }}
                </td>
                <td>
                  {{ !empty($employee->labtest) ? Carbon\Carbon::parse($employee->labTest->created_at)->format('M d, Y') : 'N/A' }}
                </td>
                <td>
                  @if (!empty($employee->labtest))
                    <button class="btn btn-icon btn-primary btn-sm" type="button">
                      <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                    </button>
                    <button class="btn btn-icon btn-success btn-sm" type="button">
                      <span class="btn-inner--icon"><i class="fas fa-cloud-upload-alt"></i></span>
                    </button>
                  @else
                    <button class="btn btn-icon btn-success btn-sm" type="button">
                      <span class="btn-inner--icon"><i class="fas fa-cloud-upload-alt"></i></span>
                    </button>
                  @endif
                </td>
              </tr>
            @empty
              <tr class="text-center">
                <td colspan="5">No documents</td>
              </tr>
            @endforelse
          </tbody>
        </table>
        <div class="row d-flex justify-content-end w-100 p-2">
          {{ $employees->links() }}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('js')
  <script>
    function myFunction() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }       
      }
    }
  </script>
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