@extends('employee.portfolio.index')

@section('portfolio')

<div class="container-fluid p-5">
    <div class="row">
        <strong style="font-weight: bold; color: black; font-size: 2rem">Educational Background</strong>
    </div>
    <hr>
    <div class="row d-flex">
        <div class="col-md-6">
            <strong style="font-weight: bold; color: black; font-size: 1.5rem">Elementary</strong>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
            <form action="{{ route('elem.delete', $education->elem->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="neu-effect d-flex justify-content-center align-items-center text-decoration-none py-2 px-2" style="display:inline-block; border: 0; width: 2.6rem; height: 2.6rem"><i class="fas fa-trash text-danger" style="font-size: 1.6rem"></i></button>
            </form>
            <a href="{{ route('elem.edit', $education->elem->id ) }}" class="neu-effect ml-2 d-flex justify-content-center align-items-center text-decoration-none py-2 px-2" style="display:inline-block;"><i class="fas fa-edit" style="font-size: 1.6rem"></i></a>
        </div>
    </div>
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
    <hr>
    <div class="row d-flex">
        <div class="col-md-6">
            <strong style="font-weight: bold; color: black; font-size: 1.5rem">Secondary</strong>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
            <a href="#" class="d-flex justify-content-center align-items-center text-decoration-none py-2 px-2" style="display:inline-block; "><i class="fas fa-edit" style="font-size: 1.6rem"></i></a>
        </div>
    </div>
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
    <hr>
    <div class="row d-flex">
        <div class="col-md-6">
            <strong style="font-weight: bold; color: black; font-size: 1.5rem">College</strong>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
            <a href="#" class="d-flex justify-content-center align-items-center text-decoration-none py-2 px-2" style="display:inline-block; "><i class="fas fa-edit" style="font-size: 1.6rem"></i></a>
        </div>
    </div>
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
    <hr>
    <div class="row d-flex">
        <div class="col-md-6">
            <strong style="font-weight: bold; color: black; font-size: 1.5rem">Graduate Studies</strong>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
            <a href="#" class="d-flex justify-content-center align-items-center text-decoration-none py-2 px-2" style="display:inline-block; "><i class="fas fa-edit" style="font-size: 1.6rem"></i></a>
        </div>
    </div>
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
</div>

@endsection