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
@endsection

@section('medical-home')

<div class="container-fluid p-3">
  @component('components.alerts')@endcomponent
  <div class="row d-flex justify-content-center p-1 mx-2">
    <div class="col-md-7 m-2 shadow bg-white rounded">
      <div class="row align-items-center m-2">
          <h3 class="mb-0">Lab Tests</h3>
      </div>
      <div class="table-responsive" style="overflow: hidden">
        <table class="table table-borderless dt-responsive nowrap" id="hosTable" width="100%">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">ID</th>
              <th scope="col">Document</th>
              <th scope="col">Last Updated</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($labtests as $labtest)
                <tr>
                  <td>
                    <a href="{{ route('medical.show', $labtest->record->user->id) }}">{{ $labtest->record->user->fullName() }}</a>
                  </td>
                  <td>{{ $labtest->record->user->employee_id }}</td>
                  <td>{{ $labtest->file }}</td>
                  <td>{{ !empty($labtest) ? Carbon\Carbon::parse($labtest->created_at)->format('M d, Y') : 'N/A' }}</td>
                  <td>
                    <a href="" class="text-primary" data-toggle="modal" data-target="{{ "#showFile".$labtest->id }}"><i class="far fa-eye mx-1"></i></a>
                    <a href="" class="text-danger" data-toggle="modal" data-target="{{ "#delete".$labtest->id }}"><i class="far fa-trash-alt mx-1"></i></a>
                  </td>
                  <x-showlabtest :file="$labtest->file" :modal="$labtest->id"></x-showlabtest>
                  <x-deletelabtest :file="$labtest->id"></x-deletelabtest>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-md-4 m-2">  
      <div class="row">
        <div class="col-md-12 shadow bg-white rounded p-3 mx-2">
          <x-labtest-schedule-view />
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('js')

  <!-- Script -->
  <script>
    $( document ).ready(function() {
      $('.table').DataTable( {
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
      $('.uploadBtn').each(function() {
        $(this).click(function(event){
          $('#formUpload').attr("action", "/medical-record/lab-tests/upload/"+$(this).data('id')+"")
        })
      });
    });
    var $fileInput = $('.file-input');
    var $droparea = $('.file-drop-area');
      
    // highlight drag area
    $fileInput.on('dragenter focus click', function() {
      $droparea.addClass('is-active');
    });
    
    // back to normal state
    $fileInput.on('dragleave blur drop', function() {
      $droparea.removeClass('is-active');
    });
    
    // change inner text
    $fileInput.on('change', function() {
      var filesCount = $(this)[0].files.length;
      var $textContainer = $(this).prev();
    
      if (filesCount === 1) {
        // if single file is selected, show file name
        var fileName = $(this).val().split('\\').pop();
        $textContainer.text(fileName);
      } else {
        // otherwise show number of files
        $textContainer.text(filesCount + ' files selected');
      }
    });

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
    {{-- DataTable --}}
    <script src="{{ asset('vendor/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.responsive.min.js') }}"></script>
@endsection