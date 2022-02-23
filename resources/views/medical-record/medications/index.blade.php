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
  <link rel="stylesheet" href="{{ asset('vendor/datatables/datatables.min.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('vendor/datatables/responsive.bootstrap.min.css') }}" type="text/css">

  <style>
    .pull-left{float:left!important;}
    .pull-right{float:right!important;}
  </style>
@endsection

@section('medical-home')

<div class="container-fluid d-flex justify-content-center">
  @component('components.alerts')@endcomponent

  <div class="row d-flex p-1 m-3 w-100 shadow bg-white rounded">
    <div class="row d-flex justify-content-between w-100 m-2">
        <h2 class="mb-0">Medications</h2>
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createModal">Add</button>
    </div>
    <div class="table-responsive mx-2" style="overflow: hidden">
      <table class="table table-borderless dt-responsive nowrap" id="hosTable" width="100%">
        <thead>
          <tr>
            <th scope="col">Medicine</th>
            <th scope="col">Condition</th>
            <th scope="col">Strength</th>
            <th scope="col">Frequency</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($medications as $medication)
            <tr>
              <td>{{ $medication->name }}</td>
              <td>{{ $medication->condition }}</td>
              <td>{{ $medication->strength }}</td>
              <td>{{ $medication->frequency }}</td>
              <td>
                <a class="text-primary med-update"
                  data-id="{{ $medication->id }}"
                  data-name="{{ $medication->name }}"
                  data-condition="{{ $medication->condition }}"
                  data-strength="{{ $medication->strength }}"
                  data-frequency="{{ $medication->frequency }}"
                  data-toggle="modal" data-target="#updateModal"
                ><i class="far fa-edit mx-1"></i></a>
                <a class="text-danger" onclick="document.getElementById('medicineDelete').submit()"><i class="far fa-trash-alt mx-1"></i></a>
                <form action="{{ route('medication.delete', $medication->id) }}" method="POST" id="medicineDelete">
                  @method('DELETE')
                  @csrf
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <!-- Create Modal -->
  <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form  action="{{ route('medication.store') }}" method="POST" id="medForm">
            @csrf
            <div class="row mb-3">
              <div class="col">
                <label for="">Medicine</label>
                <input type="text" class="form-control" name="name">
              </div>
              <div class="col">
                <label for="">Condition</label>
                <input class="form-control" type="text" list="conditions" name="condition" id="condition"/>
                <datalist id="conditions">
                  <option value="Hypertension">Hypertension</option>
                  <option value="Diabetes">Diabetes</option>
                  <option value="Asthma">Asthma</option>
                  <option value="Allergy (Food, Medicine)">Allergy (Food, Medicine)</option>
                  <option value="Hepatitis">Hepatitis</option>
                  <option value="Urinary Tract Infection">Urinary Tract Infection</option>
                  <option value="Typhoid">Typhoid</option>
                  <option value="Anemia">Anemia</option>
                  <option value="Food Supplement">Food Supplement</option>
                </datalist>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col">
                <label for="">Strength</label>
                <input type="number" class="form-control" name="strength">
              </div>
              <div class="col">
                <label for="">Frequency</label>
                <select class="form-control" id="frequency" name="frequency">
                  <option disabled selected>Choose ...</option>
                  <option>Once a day</option>
                  <option>Twice a day</option>
                </select>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="document.getElementById('medForm').submit()">Save</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Update Modal -->
  <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" id="medFormUpdate">
              @method('PUT')
              @csrf
              <div class="row mb-3">
                <div class="col">
                  <label for="">Medicine</label>
                  <input type="text" class="form-control" name="name">
                </div>
                <div class="col">
                  <label for="">Condition</label>
                  <input class="form-control" type="text" list="conditions" name="condition" id="condition"/>
                  <datalist id="conditions">
                    <option value="Hypertension">Hypertension</option>
                    <option value="Diabetes">Diabetes</option>
                    <option value="Asthma">Asthma</option>
                    <option value="Allergy (Food, Medicine)">Allergy (Food, Medicine)</option>
                    <option value="Hepatitis">Hepatitis</option>
                    <option value="Urinary Tract Infection">Urinary Tract Infection</option>
                    <option value="Typhoid">Typhoid</option>
                    <option value="Anemia">Anemia</option>
                    <option value="Food Supplement">Food Supplement</option>
                  </datalist>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col">
                  <label for="">Strength</label>
                  <input type="number" class="form-control" name="strength">
                </div>
                <div class="col">
                  <label for="">Frequency</label>
                  <select class="form-control" id="frequency" name="frequency">
                    <option disabled selected>Choose ...</option>
                    <option>Once a day</option>
                    <option>Twice a day</option>
                  </select>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="document.getElementById('medFormUpdate').submit()">Update</button>
          </div>
        </div>
      </div>
  </div>
</div>

@endsection

@section('js')
    <!-- Core -->
    <script src="{{ asset('argon/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('argon/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('argon/vendor/js-cookie/js.cookie.j') }}s"></script>
    <script src="{{ asset('argon/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('argon/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <!-- Argon JS -->
    <script src="{{ asset('argon/js/argon.js?v=1.2.0') }}"></script>
    {{-- DataTable --}}
    <script src="{{ asset('vendor/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.responsive.min.js') }}"></script>

    <script>
      $( document ).ready(function() {
        $('.table').DataTable( {
            dom: '<"pull-left"f><"pull-right"l>tip',
            responsive:true,
            columnDefs: [
		                { responsivePriority: 1, targets: 0 },
		                { responsivePriority: 2, targets: 1 }
		            ],
                "pageLength": 15,
                "pagingType": "numbers",
            searching: true,
            bInfo: false,
            bLengthChange: false,
            // bPaginate: true,
        });
      });
      $('.med-update').each(function(){
        $(this).click(function(){
          $('#medFormUpdate').attr("action", "/medical-record/medication/update/"+$(this).data('id')+"")
          $('input[name="name"]').val($(this).data('name'));
          $('input[name="condition"]').val($(this).data('condition'));
          $('input[name="strength"]').val($(this).data('strength'));
          $('input[name="frequency"]').val($(this).data('frequency'));
        });
      });
    </script>
@endsection