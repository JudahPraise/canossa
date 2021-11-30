{{-- Personal History --}}
<section class="mb-3">
    <div class="row m-3 d-flex justify-content-between align-items-center">
        <h3>Personal History</h3>
   </div>
    <div class="row m-3">
        @if (!empty($record->history))
            @foreach ($record->history as $illness)
                <form action="{{ route('employee.history.delete', $illness->id) }}" method="POST" id="historyUpdate">
                    @method('DELETE')
                    @csrf
                    <div class="form-check form-check-inline">
                        <input class="form-check-input delete-pill" type="checkbox" checked id="illness" name="illnesses[]" value="{{-- $illness --}}" onchange="document.getElementById('historyUpdate').submit()" data-historyid="{{ $record->id }}" hidden>
                        <label class="form-check-label" for="illness">
                            <span class="badge badge-pill badge-primary mb-3" style="font-size: 1rem;">
                                {{ $illness->illnesses }}
                                <span class="ml-2">
                                    <i class="fas fa-times text-danger" id="deletePill"></i>
                                </span>
                            </span>
                        </label>
                    </div>
                </form>
            @endforeach
            <div class="form-check form-check-inline">
                <input class="form-check-input delete-pill" type="checkbox" checked id="illness" name="illnesses[]" value="{{-- $illness --}}" onchange="document.getElementById('historyUpdate').submit()" data-historyid="{{ $record->id }}" hidden>
                <label class="form-check-label" for="illness">
                    <span class="badge badge-pill badge-primary mb-3" style="font-size: 1rem">
                         Add
                        <span class="ml-2">
                            <i class="fas fa-plus text-success" id="deletePill"></i>
                        </span>
                    </span>
                </label>
            </div>
        @else
            <div class="row d-flex justify-content-center w-100">
                <a href="{{ route('employee.history.create') }}">Add medical history</a>
            </div>
        @endif
    </div>
</section>