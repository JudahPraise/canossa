@extends('employee.layouts.home')

@section('css')
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('argon/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('argon/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('argon/css/argon.css?v=1.2.0') }}" type="text/css">
@endsection

@section('employee-home')

<div class="container-fluid p-4">
  @component('components.alerts')@endcomponent
  <div class="row w-100 m-0">
    <div class="card w-100">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Documents</h3>
          </div>
          <div class="col text-right">
            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#uploadModal"><span class="cil-cloud-upload btn-icon mr-2"></span> Upload File</button>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col">Document</th>
              <th scope="col">File</th>
              <th scope="col">Type</th>
              <th scope="col">Updated</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($documents as $document)
              <tr id="document">
                <th scope="row">
                  {{ $document->type }}
                </th>
                <td>
                  {{ $document->file }}
                </td>
                <td>
                  {{ $document->extension }}
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="mr-2">{{ $document->updated_at->diffForHumans() }}</span>
                  </div>
                </td>
                <td class="d-flex">
                  <button class="btn btn-icon btn-primary btn-sm mr-2" type="submit" id="update"  data-toggle="modal" data-target="#updateModal"
                  data-id="{{ $document->id }}"
                  >
                    <span class="btn-inner--icon text-white"><i class="fas fa-edit"></i></span>
                  </button>

                  <form action="{{ route('document.download', $document->id) }}" method="GET" class="mr-2">
                    @csrf
                    <button class="btn btn-icon btn-success btn-sm" type="submit">
                      <span class="btn-inner--icon text-white"><i class="fas fa-download"></i></span>
                    </button>
                  </form>
                  <form action="{{ route('document.delete', $document->id) }}" method="POST">
                    @method('delete')
                    @csrf
                    <button class="btn btn-icon btn-danger btn-sm" type="submit">
                      <span class="btn-inner--icon text-white"><i class="fas fa-trash"></i></span>
                    </button>
                  </form>  
                </td>
              </tr>
            @empty
              <tr class="text-center">
                <td colspan="5">No documents</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
    <!-- Upload Modal -->
    <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Upload File</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('document.store') }}" class="d-flex flex-column w-100" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-row mb-3">
                <label for="validationCustom01">Type of Document</label>
                <select class="custom-select" id="validationDefault04" name="type">
                  <option selected disabled value="">Choose ...</option>
                  <option>Birth Certificate</option>
                  <option>Baptismal Certificate</option>
                  <option>Marriage Certificate</option>
                </select>   
              </div>
              <div class="form-row mb-3">
                <label for="validationCustom01">Document</label>
                <div class="file-drop-area mb-3 w-100">
                  <span class="fake-btn">Choose files</span>
                  <span class="file-msg">or drag and drop files here</span>
                  <input class="file-input" type="file" name="file" multiple>
                </div>
              </div>
              <button class="btn btn-sm btn-primary" type="submit" value="Submit Form">Upload File</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Update Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Update File</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="formUpdate" class="d-flex flex-column w-100" method="POST" enctype="multipart/form-data">
              @method('PUT')
              @csrf
              <div class="form-row mb-3">
                <label for="validationCustom01">Type of Document</label>
                <select class="custom-select" id="validationDefault04" name="type">
                  <option selected disable>Choose ...</option>
                  <option>Birth Certificate</option>
                  <option>Baptismal Certificate</option>
                  <option>Marriage Certificate</option>
                </select>   
              </div>
              <div class="form-row mb-3">
                <label for="validationCustom01">Document</label>
                <div class="file-drop-area mb-3 w-100">
                  <span class="fake-btn">Choose files</span>
                  <span class="file-msg">or drag and drop files here</span>
                  <input class="file-input" type="file" name="file" multiple>
                </div>
              </div>
              <button class="btn btn-sm btn-primary" type="submit" value="Submit Form">Update File</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script type="application/javascript">
    $(document).ready(function () {
        $('#update').each(function() {
          $(this).click(function(event){
            $('#formUpdate').attr("action", "/employee/portfolio/document/update/"+$(this).data('id')+"")
            // console.log($(this).data('id'));
          })
        });
      });
</script>

<!-- Script -->
<script>
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