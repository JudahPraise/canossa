@extends('employee.layouts.home')

@section('dropzone-css')
  <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">
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

<div class="container mt-5 mb-5" style="width: 400px">

  <!-- Or With An Input Field Fallback -->
  <form action="{{ route('document.edit', $id) }}" class="dropzone" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="fallback">
        <input name="file" type="file" multiple/>
      </div>
  </form>

</div>

<script type="text/javascript">
  $(document).ready(function () {

      $("div#myUploader").dropzone({ 
           url: "upload-target",
          // more configs here
      });
  });
</script>

@endsection


@section('dropzone-js')
  <script src="{{ asset('js/dropzone.js') }}"></script>
@endsection