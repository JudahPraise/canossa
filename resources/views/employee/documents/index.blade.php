@extends('employee.layouts.home')

@section('dropzone-css')
  <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('employee-home')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom">
    <h1 class="h2">Documents</h1>
    <div class="btn-toolbar">
      <div class="btn-group mr-2">
        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
      </div>
      <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
        <span data-feather="calendar"></span>
      </button>
    </div>
</div>

<div class="row w-100 d-flex flex-column align-items-center p-3" style="height: 90%">

  <div class="container h-50 w-100">
    <div class="row">
      
      @forelse ($documents as $document)
        <div class="col-sm-3 m-3 d-flex flex-column justify-content-center align-items-center document-icons">
          <div class="document d-flex flex-column justify-content-center align-items-center">
            @if($document->extension == 'docx') 
              <i class="fas fa-file-word mb-2 document-icon" ></i>
            @elseif($document->extension == 'png' || $document->extension == 'jpg') 
              <i class="fas fa-file-image mb-2 document-icon"></i>
            @elseif($document->extension == 'pdf') 
              <i class="fas fa-file-pdf mb-2 document-icon"></i>
            @endif
            <span>{{ $document->file }}</span>
          </div>

          <div class="row m-0 d-flex justify-content-around align-items-center overlay">
            <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center download">
              <a href="{{ route('document.download', $document->id) }}" style="text-decoration: none;">
                <i class="fas fa-cloud-download-alt" data-toggle="tooltip" data-placement="top" title="Download"></i>
              </a>
            </div>
            <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center remove">
              <form action="{{ route('document.delete', $document->id) }}" method="POST" id='delete'>
                @csrf
                @method('DELETE')
                <i class="fas fa-trash-alt" data-toggle="tooltip" data-placement="top" title="Remove" onclick="event.preventDefault();
                document.getElementById('delete').submit();"></i>
              </form>
            </div>
          </div>
        </div>

      @empty
        No Document
      @endforelse

    </div>
  </div>

  {{-- <form action="{{ route('document.store') }}" class="dropzone w-100 h-50 d-flex flex-column justify-content-center align-items-center" method="POST" enctype="multipart/form-data" style="border: 2px dashed gray; ">
    @csrf
    <i class="fas fa-folder-open" style="font-size: 5rem"></i>
    <div class="fallback">
      <input name="file" type="file" multiple />
    </div>
  </form> --}}
</div>






<script type="text/javascript">
  $(document).ready(function () {

      $("div#myUploader").dropzone({ 
        maxFileSize: 1,
        acceptedFiles: '.jpeg,.jpg,.png,.gif',
      });

      $('#example').tooltip(options);
  });
</script>

@endsection


@section('dropzone-js')
  <script src="{{ asset('js/dropzone.js') }}"></script>
@endsection
