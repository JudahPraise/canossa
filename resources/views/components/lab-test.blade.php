<div class="row mx-2 d-flex justify-content-between">
    <p class="font-weight-bold">Files/Documents</p>
    <a href="" data-toggle="modal" data-target="#addFileModal">
        <p class="font-weight-bold"><i class="far fa-file-alt mr-2"></i>Add File</p>
    </a>
</div>
<div class="row d-flex justify-content-center">
    {{-- @foreach ($record as $data) --}}
        <div class="list-group px-3 w-100">
            @forelse($record->labtests as $labtest)
                <div class="list-group-item list-group-item-action d-flex justify-content-between p-3">
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
                        <a href="" class="text-primary" data-toggle="modal" 
                        data-target="{{ "#showFile".$labtest->id }}"><i class="far fa-eye mx-1"></i></a>
                        <a href="{{ route('employee.labtest.download', $labtest->id) }}" class="text-success"><i class="far fa-arrow-alt-circle-down mx-1"></i></a>
                        <a href="" class="text-danger" data-toggle="modal" data-target="{{ "#delete".$labtest->id }}"><i class="far fa-trash-alt mx-1"></i></a>
                    </span>
                </div>

                <x-showlabtest :file="$labtest->file" :modal="$labtest->id"></x-showlabtest>
                <x-deletelabtest :file="$labtest->id"></x-deletelabtest>
            @empty
                <div class="container">
                    <div class="row py-2">
                      <div class="container-fluid d-flex flex-column align-items-center p-1" data-toggle="modal" data-target="#addModal">
                        <img src="{{ asset('SVG/undraw_add_file.svg') }}" alt="" srcset="" height="250" width="250">
                        <span>Add File</span>
                      </div>
                    </div>
                </div>  
            @endforelse
        </div> 
    {{-- @endforeach --}}
    

    @component('components.modals')
        @slot('addFile')
            {{ 'addFileModal' }}
        @endslot
        @slot('user_id')
            {{ $record->user_id }}
        @endslot
    @endcomponent
</div>
