@extends('employee.portfolio.index')

@section('portfolio')
<div class="container-fluid">
    <div class="row w-100 m-0">
        <div class="card has-no-shadow w-100">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                      <h2 class="mb-0">Educational Background</h2>
                    </div>
                    <div class="col text-right">
                      <a href="{{ route('educ.index', 'card') }}" class="btn btn-sm btn-icon btn-light" type="button">
                          <span class="btn-inner--icon"><i class="fas fa-caret-left"></i></span>
                      </a>
                    </div>
                </div>
            </div>
            <div class="card-body w-100">
                <div class="row d-flex justify-content-between align-items-center px-2">
                    <strong style="font-weight: bold; color: black; font-size: 1.3rem">Elementary</strong>
                    <div class="d-flex align-items-center">
                        <a href="{{ !empty(auth()->user()->education->elem) ? route('elem.edit', $education->elem->id ) : '#' }}" class="btn btn-sm btn-icon btn-info mr-2" type="button">
                            <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                        </a>
                        <form action="{{ !empty(auth()->user()->education->elem) ? route('elem.delete', $education->elem->id) : '#' }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-sm btn-icon btn-danger" type="button">
                                <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                            </button>
                        </form>
                    </div>
                </div>
                @if (!empty(auth()->user()->education->elem))
                    <div class="row row-cols-2 row-cols-md-4 mt-3">
                        <div class="col mb-3 d-flex flex-column">
                            <small style="font-size: .8">Name of school</small>
                            <strong style="color: black; font-size: 1.3rem">{{ $education->elem->name_of_school }}</strong>
                        </div>
                        @if(!empty($education->elem->level_units_earned))
                            <div class="col mb-3 d-flex flex-column">
                                <small style="font-size: .8">Level units earned</small>
                                <strong style="color: black; font-size: 1.3rem">{{ $education->elem->level_units_earned }}</strong>
                            </div>
                        @endif
                        <div class="col mb-3 d-flex flex-column">
                            <small style="font-size: .8">Year graduated</small>
                            <strong style="color: black; font-size: 1.3rem">{{ $education->elem->sy_graduated }}</strong>
                        </div>
                        @if(!empty($education->elem->academic_award))
                            <div class="col mb-3 d-flex flex-column">
                                <small style="font-size: .8">Academic award</small>
                                <strong style="color: black; font-size: 1.3rem">{{ $education->elem->academic_reward }}</strong>
                            </div>
                        @endif
                    </div>
                @else
                    <div class="col-md-12 d-flex justify-content-center p-5">
                        <small class="text-muted font-italic text-center">No data</small>
                    </div>
                @endif
                <hr>
                <div class="row d-flex justify-content-between align-items-center px-2">
                    <strong style="font-weight: bold; color: black; font-size: 1.3rem">Secondary</strong>
                    <div class="d-flex align-items-center">
                        <a href="{{  !empty(auth()->user()->education->sec) ? route('sec.edit', $education->sec->id ) : '#' }}" class="btn btn-sm btn-icon btn-info mr-2" type="button">
                            <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                        </a>
                        <form action="{{ !empty(auth()->user()->education->sec) ? route('sec.delete', $education->sec->id) : "#" }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-sm btn-icon btn-danger" type="button">
                                <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                            </button>
                        </form>
                    </div>
                </div>
                @if (!empty(auth()->user()->education->sec))
                    <div class="row row-cols-2 row-cols-md-4 mt-3">
                        <div class="col mb-3 d-flex flex-column">
                            <small style="font-size: .8">Name of school</small>
                            <strong style="color: black; font-size: 1.3rem">{{ $education->sec->name_of_school }}</strong>
                        </div>
                        @if(!empty($education->sec->level_units_earned))
                            <div class="col mb-3 d-flex flex-column">
                                <small style="font-size: .8">Level units earned</small>
                                <strong style="color: black; font-size: 1.3rem">{{ $education->sec->level_units_earned }}</strong>
                            </div>
                        @endif
                        <div class="col mb-3 d-flex flex-column">
                            <small style="font-size: .8">Year graduated</small>
                            <strong style="color: black; font-size: 1.3rem">{{ $education->sec->sy_graduated }}</strong>
                        </div>
                        @if(!empty($education->sec->academic_award))
                            <div class="col mb-3 d-flex flex-column">
                                <small style="font-size: .8">Academic award</small>
                                <strong style="color: black; font-size: 1.3rem">{{ $education->sec->academic_reward }}</strong>
                            </div>
                        @endif
                    </div>
                @else
                    <div class="col-md-12 d-flex justify-content-center p-5">
                        <small class="text-muted font-italic text-center">No data</small>
                    </div>
                @endif
                <hr>
                <div class="row d-flex justify-content-between align-items-center px-2">
                    <strong style="font-weight: bold; color: black; font-size: 1.3rem">College</strong>
                    <div class="d-flex align-items-center">
                        <a href="{{ !empty(auth()->user()->education->col) ? route('col.edit', $education->col->id ) : '#' }}" class="btn btn-sm btn-icon btn-info mr-2" type="button">
                            <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                        </a>
                        <form action="{{ !empty(auth()->user()->education->col) ? route('col.delete', $education->col->id) : '#' }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-sm btn-icon btn-danger" type="button">
                                <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                            </button>
                        </form>
                    </div>
                </div>
                @if (!empty(auth()->user()->education->col))
                    <div class="row row-cols-2 row-cols-md-4 mt-3">
                        <div class="col mb-3 d-flex flex-column">
                            <small style="font-size: .8">Name of school</small>
                            <strong style="color: black; font-size: 1.3rem">{{ $education->col->name_of_school }}</strong>
                        </div>
                        <div class="col mb-3 d-flex flex-column">
                            <small style="font-size: .8">Course</small>
                            <strong style="color: black; font-size: 1.3rem">{{ $education->col->course_degree }}</strong>
                        </div>
                        @if(!empty($education->col->level_units_earned))
                            <div class="col mb-3 d-flex flex-column">
                                <small style="font-size: .8">Level units earned</small>
                                <strong style="color: black; font-size: 1.3rem">{{ $education->col->level_units_earned }}</strong>
                            </div>
                        @endif
                        <div class="col mb-3 d-flex flex-column">
                            <small style="font-size: .8">Year graduated</small>
                            <strong style="color: black; font-size: 1.3rem">{{ $education->col->sy_graduated }}</strong>
                        </div>
                        @if(!empty($educatio->col->academic_award))
                            <div class="col mb-3 d-flex flex-column">
                                <small style="font-size: .8">Academic award</small>
                                <strong style="color: black; font-size: 1.3rem">{{ $education->col->academic_reward }}</strong>
                            </div>
                        @endIf
                    </div>
                @else
                    <div class="col-md-12 d-flex justify-content-center p-5">
                        <small class="text-muted font-italic text-center">No data</small>
                    </div>
                @endif
                <hr>
                <div class="row d-flex">
                    <div class="col-md-6 px-2">
                        <strong style="font-weight: bold; color: black; font-size: 1.3rem">Graduate Studies</strong>
                    </div>
                </div>
                @if (!empty(auth()->user()->education->grad->first()))
                    @foreach ($education->grad as $grad)
                        <div class="row row-cols-2 row-cols-md-6 mt-3">
                            <div class="col mb-3 d-flex flex-column">
                                <small style="font-size: .8">Name of school</small>
                                <strong style="color: black; font-size: 1.3rem">{{ $grad->name_of_school }}</strong>
                            </div>
                            <div class="col mb-3 d-flex flex-column">
                                <small style="font-size: .8">Degree</small>
                                <strong style="color: black; font-size: 1.3rem">{{ $grad->degree }}</strong>
                            </div>
                            <div class="col mb-3 d-flex flex-column">
                                <small style="font-size: .8">Course</small>
                                <strong style="color: black; font-size: 1.3rem">{{ $grad->course }}</strong>
                            </div>
                            @if(!empty($grad->level_units_earned))
                                <div class="col mb-3 d-flex flex-column">
                                    <small style="font-size: .8">Level units earned</small>
                                    <strong style="color: black; font-size: 1.3rem">{{ $grad->level_units_earned }}</strong>
                                </div>
                            @endif
                            <div class="col mb-3 d-flex flex-column">
                                <small style="font-size: .8">Year graduated</small>
                                <strong style="color: black; font-size: 1.3rem">{{ $grad->sy_graduated }}</strong>
                            </div>
                            @if(!empty($grad->academic_award))
                                <div class="col mb-3 d-flex flex-column">
                                    <small style="font-size: .8">Academic award</small>
                                    <strong style="color: black; font-size: 1.3rem">{{ $grad->academic_reward }}</strong>
                                </div>
                            @endIf
                            <div class="col mb-3 d-flex flex-column">
                                <small style="font-size: .8">Action</small>
                                <div class="d-flex">
                                    <a href="{{ !empty(auth()->user()->education->grad) ? route('grad.edit', $grad->educ_id ) : '#' }}" class="btn btn-sm btn-icon btn-info mr-2" type="button">
                                        <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                                    </a>
                                    <form action="{{ !empty(auth()->user()->education->grad) ? route('grad.delete', $grad->id) : '#' }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-icon btn-danger" type="button">
                                            <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12 d-flex justify-content-center p-5">
                        <small class="text-muted font-italic text-center">No data</small>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
{{-- <div class="container-fluid">
    <div class="row d-flex justify-content-between pl-2">
        <strong style="font-weight: bold; color: black; font-size: 1.8rem">Educational Background</strong>
        <a href="{{ route('educ.index', 'card') }}" class="btn btn-icon btn-light" type="button">
            <span class="btn-inner--icon"><i class="fas fa-caret-left"></i></span>
        </a>
    </div>
    <hr>
    
</div> --}}

@endsection