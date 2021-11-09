<div class="row mx-2 d-flex justify-content-between">
    <p class="font-weight-bold">Files/Documents</p>
    <a href="" data-toggle="modal" data-target="#addFileModal">
        <p class="font-weight-bold"><i class="far fa-file-alt mr-2"></i>Add File</p>
    </a>
</div>
<div class="row d-flex justify-content-center">
    @if (!empty($labtest))
    <div class="list-group px-3 w-100">
        <div class="list-group-item d-flex justify-content-between p-3">
            <span class="d-flex" style="font-size: 1rem">
                <span class="d-flex justify-content-center align-items-center">
                    <i class="far fa-file-alt mr-3" style="font-size: 1.2rem"></i>
                </span>
                <span class="d-flex flex-column justify-content-center">
                    {{  $labtest->file }}
                    <small class="text-muted">{{  $labtest->updated_at->diffForHumans() }}</small>
                </span>
            </span>
            <span class="d-flex align-items-center" style="font-size: 1.1rem">
                <a href="" class="text-primary" data-toggle="modal" data-target="#showFileModal"><i class="far fa-eye mx-1"></i></a>
                <a href="" class="text-success"><i class="far fa-arrow-alt-circle-down mx-1"></i></a>
                <a href="" class="text-danger" data-toggle="modal" data-target="#deleteFileModal"><i class="far fa-trash-alt mx-1"></i></a>
            </span>
            @component('components.modals')
                @slot('file')
                    {{ $labtest->file }}
                @endslot
                @slot('id')
                    {{ $labtest->id }}
                @endslot
                @slot('addFile')
                {{ 'addFileModal' }}
                @endslot
                @slot('showFile')
                    {{ 'showFileModal' }}
                @endslot
                @slot('deleteFile')
                    {{ 'deleteFileModal' }}
                @endslot
            @endcomponent
        </div>
    </div> 
    @else
        @component('components.modals')
            @slot('addFile')
               {{ 'addFileModal' }}
            @endslot
            {{-- @slot('schoolYear')
                {{ Request::get('school_year') }}
            @endslot --}}
            @slot('showFile')
                   {{ 'showFileModal' }}
            @endslot
            @slot('deleteFile')
                   {{ 'deleteFileModal' }}
            @endslot
        @endcomponent
        <div class="container">
            <div class="row py-2">
              <div class="container-fluid d-flex flex-column align-items-center p-1" data-toggle="modal" data-target="#addModal">
                <img src="{{ asset('SVG/undraw_add_file.svg') }}" alt="" srcset="" height="250" width="250">
                <span>Add File  </span>
              </div>
            </div>
        </div>
    @endif
</div>