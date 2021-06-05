@extends('employee.portfolio.index')

@section('portfolio')

<div class="container-fluid">
    <div class="row d-flex justify-content-between pl-2">
        <strong style="font-weight: bold; color: black; font-size: 1.8rem">Educational Background</strong>
        <a href="{{ url()->current() === route('educ.index', 'card') ? route('educ.index', 'card') : route('educ.index', 'card') }}" class="neu-effect d-flex justify-content-center align-items-center mr-2 text-decoration-none py-2 px-4" style="display:inline-block; "><i class="fas fa-caret-left text-primary" style="font-size: 1.6rem"></i></a>
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
                <strong style="color: black; font-size: 1.3rem">{{ $education->elem->sy_graduated }}</strong>
            </div>
            @if(!empty($education->elem->academic_award))
                <div class="col mb-3 d-flex flex-column">
                    <strong style="font-size: 1rem">Academic award</strong>
                    <strong style="color: black; font-size: 1.3rem">{{ $education->elem->academic_reward }}</strong>
                </div>
            @endif
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
                <strong style="color: black; font-size: 1.3rem">{{ $education->sec->sy_graduated }}</strong>
            </div>
            @if(!empty($education->sec->academic_award))
                <div class="col mb-3 d-flex flex-column">
                    <strong style="font-size: 1rem">Academic award</strong>
                    <strong style="color: black; font-size: 1.3rem">{{ $education->sec->academic_reward }}</strong>
                </div>
            @endif
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
                <strong style="color: black; font-size: 1.3rem">{{ $education->col->sy_graduated }}</strong>
            </div>
            @if(!empty($educatio->col->academic_award))
                <div class="col mb-3 d-flex flex-column">
                    <strong style="font-size: 1rem">Academic award</strong>
                    <strong style="color: black; font-size: 1.3rem">{{ $education->col->academic_reward }}</strong>
                </div>
            @endIf
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
            <form action="{{ !empty(auth()->user()->education->grad->first()) ? route('grad.delete', auth()->user()->education->id) : '#' }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="neu-effect d-flex justify-content-center align-items-center text-decoration-none py-2 px-2" style="display:inline-block; border: 0; width: 2.6rem; height: 2.6rem"><i class="fas fa-trash text-danger" style="font-size: 1.6rem"></i></button>
            </form>
            <a href="{{ !empty(auth()->user()->education->grad->first()) ? route('grad.edit', auth()->user()->education->id ) : '#' }}" class="neu-effect ml-2 d-flex justify-content-center align-items-center text-decoration-none py-2 px-2" style="display:inline-block;"><i class="fas fa-edit" style="font-size: 1.6rem"></i></a>
        </div>
    </div>
    @if (!empty(auth()->user()->education->grad->first()))
        @foreach ($education->grad as $grad)
            <div class="row row-cols-2 row-cols-md-5 mt-3">
                <div class="col mb-3 d-flex flex-column">
                    <strong style="font-size: 1rem">Name of school</strong>
                    <strong style="color: black; font-size: 1.3rem">{{ $grad->name_of_school }}</strong>
                </div>
                <div class="col mb-3 d-flex flex-column">
                    <strong style="font-size: 1rem">Degree</strong>
                    <strong style="color: black; font-size: 1.3rem">{{ $grad->degree }}</strong>
                </div>
                <div class="col mb-3 d-flex flex-column">
                    <strong style="font-size: 1rem">Course</strong>
                    <strong style="color: black; font-size: 1.3rem">{{ $grad->course }}</strong>
                </div>
                @if(!empty($grad->level_units_earned))
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">Level units earned</strong>
                        <strong style="color: black; font-size: 1.3rem">{{ $grad->level_units_earned }}</strong>
                    </div>
                @endif
                <div class="col mb-3 d-flex flex-column">
                    <strong style="font-size: 1rem">Year graduated</strong>
                    <strong style="color: black; font-size: 1.3rem">{{ $grad->sy_graduated }}</strong>
                </div>
                @if(!empty($grad->academic_award))
                    <div class="col mb-3 d-flex flex-column">
                        <strong style="font-size: 1rem">Academic award</strong>
                        <strong style="color: black; font-size: 1.3rem">{{ $grad->academic_reward }}</strong>
                    </div>
                @endIf
            </div>
        @endforeach
    @else
        <div class="col-md-12 d-flex justify-content-center p-5">
            <strong class="text-muted font-italic text-center">No data</strong>
        </div>
    @endif
</div>

@endsection