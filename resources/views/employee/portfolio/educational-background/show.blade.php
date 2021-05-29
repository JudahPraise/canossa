@extends('employee.portfolio.index')

@section('portfolio')

<div class="container-fluid p-5">
    <div class="row d-flex justify-content-between">
        <strong style="font-weight: bold; color: black; font-size: 2rem">Educational Background</strong>
        <a href="{{ url()->current() === route('educ.index', 'card') ? route('educ.index', 'card') : route('educ.index', 'card') }}" class="neu-effect d-flex justify-content-center align-items-center mr-2 text-decoration-none py-2 px-4" style="display:inline-block; "><i class="fas fa-caret-left" style="font-size: 1.6rem"></i></a>
    </div>
    <hr>
    <div class="row d-flex">
        <div class="col-md-6">
            <strong style="font-weight: bold; color: black; font-size: 1.5rem">Elementary</strong>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
            <form action="{{ !empty(auth()->user()->education->elem) ? route('elem.delete', $education->elem->id) : '#' }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="neu-effect d-flex justify-content-center align-items-center text-decoration-none py-2 px-2" style="display:inline-block; border: 0; width: 2.6rem; height: 2.6rem"><i class="fas fa-trash text-danger" style="font-size: 1.6rem"></i></button>
            </form>
            <a href="{{ !empty(auth()->user()->education->elem) ? route('elem.edit', $education->elem->id ) : '#' }}" class="neu-effect ml-2 d-flex justify-content-center align-items-center text-decoration-none py-2 px-2" style="display:inline-block;"><i class="fas fa-edit" style="font-size: 1.6rem"></i></a>
        </div>
    </div>
    @if (!empty(auth()->user()->education->elem))
        <div class="row row-cols-2 row-cols-md-4 mt-3">
            <div class="col mb-3 d-flex flex-column">
                <strong style="font-size: 1rem">Name of school</strong>
                <strong style="color: black; font-size: 1.3rem">{{ $education->elem->name_of_school }}</strong>
            </div>
            @if(!empty($education->elem->level_units_earned))
                <div class="col mb-3 d-flex flex-column">
                    <strong style="font-size: 1rem">Level units earned</strong>
                    <strong style="color: black; font-size: 1.3rem">{{ $education->elem->level_units_earned }}</strong>
                </div>
            @endif
            <div class="col mb-3 d-flex flex-column">
                <strong style="font-size: 1rem">Year graduated</strong>
                <strong style="color: black; font-size: 1.3rem">{{ $education->elem->graduated_date_from.' '.'-'.' '.$education->elem->graduated_date_to }}</strong>
            </div>
            <div class="col mb-3 d-flex flex-column">
                <strong style="font-size: 1rem">Academic award</strong>
                <strong style="color: black; font-size: 1.3rem">{{ $education->elem->academic_reward }}</strong>
            </div>
        </div>
    @else
        <div class="col-md-12 d-flex justify-content-center p-5">
            <strong class="text-muted font-italic text-center">No data</strong>
        </div>
    @endif
    <hr>
    <div class="row d-flex">
        <div class="col-md-6">
            <strong style="font-weight: bold; color: black; font-size: 1.5rem">Secondary</strong>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
            <form action="{{ !empty(auth()->user()->education->sec) ? route('sec.delete', $education->sec->id) : "#" }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="neu-effect d-flex justify-content-center align-items-center text-decoration-none py-2 px-2" style="display:inline-block; border: 0; width: 2.6rem; height: 2.6rem"><i class="fas fa-trash text-danger" style="font-size: 1.6rem"></i></button>
            </form>
            <a href="{{  !empty(auth()->user()->education->sec) ? route('sec.edit', $education->sec->id ) : '#' }}" class="neu-effect ml-2 d-flex justify-content-center align-items-center text-decoration-none py-2 px-2" style="display:inline-block;"><i class="fas fa-edit" style="font-size: 1.6rem"></i></a>
        </div>
    </div>
    @if (!empty(auth()->user()->education->sec))
        <div class="row row-cols-2 row-cols-md-4 mt-3">
            <div class="col mb-3 d-flex flex-column">
                <strong style="font-size: 1rem">Name of school</strong>
                <strong style="color: black; font-size: 1.3rem">{{ $education->sec->name_of_school }}</strong>
            </div>
            @if(!empty($education->sec->level_units_earned))
                <div class="col mb-3 d-flex flex-column">
                    <strong style="font-size: 1rem">Level units earned</strong>
                    <strong style="color: black; font-size: 1.3rem">{{ $education->sec->level_units_earned }}</strong>
                </div>
            @endif
            <div class="col mb-3 d-flex flex-column">
                <strong style="font-size: 1rem">Year graduated</strong>
                <strong style="color: black; font-size: 1.3rem">{{ $education->sec->graduated_date_from.' '.'-'.' '.$education->sec->graduated_date_to }}</strong>
            </div>
            <div class="col mb-3 d-flex flex-column">
                <strong style="font-size: 1rem">Academic award</strong>
                <strong style="color: black; font-size: 1.3rem">{{ $education->sec->academic_reward }}</strong>
            </div>
        </div>
    @else
        <div class="col-md-12 d-flex justify-content-center p-5">
            <strong class="text-muted font-italic text-center">No data</strong>
        </div>
    @endif
    <hr>
    <div class="row d-flex">
        <div class="col-md-6">
            <strong style="font-weight: bold; color: black; font-size: 1.5rem">College</strong>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
            <form action="{{ !empty(auth()->user()->education->col) ? route('col.delete', $education->col->id) : '#' }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="neu-effect d-flex justify-content-center align-items-center text-decoration-none py-2 px-2" style="display:inline-block; border: 0; width: 2.6rem; height: 2.6rem"><i class="fas fa-trash text-danger" style="font-size: 1.6rem"></i></button>
            </form>
            <a href="{{ !empty(auth()->user()->education->col) ? route('col.edit', $education->col->id ) : '#' }}" class="neu-effect ml-2 d-flex justify-content-center align-items-center text-decoration-none py-2 px-2" style="display:inline-block;"><i class="fas fa-edit" style="font-size: 1.6rem"></i></a>
        </div>
    </div>
    @if (!empty(auth()->user()->education->col))
        <div class="row row-cols-2 row-cols-md-4 mt-3">
            <div class="col mb-3 d-flex flex-column">
                <strong style="font-size: 1rem">Name of school</strong>
                <strong style="color: black; font-size: 1.3rem">{{ $education->col->name_of_school }}</strong>
            </div>
            <div class="col mb-3 d-flex flex-column">
                <strong style="font-size: 1rem">Course</strong>
                <strong style="color: black; font-size: 1.3rem">{{ $education->col->course_degree }}</strong>
            </div>
            @if(!empty($education->col->level_units_earned))
                <div class="col mb-3 d-flex flex-column">
                    <strong style="font-size: 1rem">Level units earned</strong>
                    <strong style="color: black; font-size: 1.3rem">{{ $education->col->level_units_earned }}</strong>
                </div>
            @endif
            <div class="col mb-3 d-flex flex-column">
                <strong style="font-size: 1rem">Year graduated</strong>
                <strong style="color: black; font-size: 1.3rem">{{ $education->col->graduated_date_from.' '.'-'.' '.$education->col->graduated_date_to }}</strong>
            </div>
            <div class="col mb-3 d-flex flex-column">
                <strong style="font-size: 1rem">Academic award</strong>
                <strong style="color: black; font-size: 1.3rem">{{ $education->col->academic_reward }}</strong>
            </div>
        </div>
    @else
        <div class="col-md-12 d-flex justify-content-center p-5">
            <strong class="text-muted font-italic text-center">No data</strong>
        </div>
    @endif
    <hr>
    <div class="row d-flex">
        <div class="col-md-6">
            <strong style="font-weight: bold; color: black; font-size: 1.5rem">Graduate Studies</strong>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
            <form action="{{ !empty(auth()->user()->education->grad->first()) ? route('grad.delete', $education->grad->id) : '#' }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="neu-effect d-flex justify-content-center align-items-center text-decoration-none py-2 px-2" style="display:inline-block; border: 0; width: 2.6rem; height: 2.6rem"><i class="fas fa-trash text-danger" style="font-size: 1.6rem"></i></button>
            </form>
            <a href="{{ !empty(auth()->user()->education->grad->first()) ? route('grad.edit', $education->grad->id ) : '#' }}" class="neu-effect ml-2 d-flex justify-content-center align-items-center text-decoration-none py-2 px-2" style="display:inline-block;"><i class="fas fa-edit" style="font-size: 1.6rem"></i></a>
        </div>
    </div>
    @if (!empty(auth()->user()->education->grad->first()))
        <div class="row row-cols-2 row-cols-md-4 mt-3">
            <div class="col mb-3 d-flex flex-column">
                <strong style="font-size: 1rem">Name of school</strong>
                <strong style="color: black; font-size: 1.3rem">{{ $education->grad->name_of_school }}</strong>
            </div>
            @if(!empty($education->col->level_units_earned))
                <div class="col mb-3 d-flex flex-column">
                    <strong style="font-size: 1rem">Level units earned</strong>
                    <strong style="color: black; font-size: 1.3rem">{{ $education->grad->level_units_earned }}</strong>
                </div>
            @endif
            <div class="col mb-3 d-flex flex-column">
                <strong style="font-size: 1rem">Year graduated</strong>
                <strong style="color: black; font-size: 1.3rem">{{ $education->grad->graduated_date_from.' '.'-'.' '.$education->grad->graduated_date_to }}</strong>
            </div>
            <div class="col mb-3 d-flex flex-column">
                <strong style="font-size: 1rem">Academic award</strong>
                <strong style="color: black; font-size: 1.3rem">{{ $education->grad->academic_reward }}</strong>
            </div>
        </div>
    @else
        <div class="col-md-12 d-flex justify-content-center p-5">
            <strong class="text-muted font-italic text-center">No data</strong>
        </div>
    @endif
</div>

@endsection