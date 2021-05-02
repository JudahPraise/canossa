@extends('admin.layouts.main')

@section('home')

    <div class="container-fluid">
        <div class="row d-flex flex-column align-items-start">
            <h2 style="font-size: 3rem; color: black">Courses</h2>
        </div>
        <div class="row row-cols-1 row-cols-md-3">
            @foreach ($courses as $course)
            <div class="col mb-4">
                <a href="{{ route('course.show', $course->id) }}" class="card neu-effect animation text-decoration-none" style="color: black">
                    <div class="card-body">
                      <h5 class="card-title">{{ $course->course_title }}<span class="text-primary ml-2">({{ $course->acronym }})</span></h5>
                      <p class="card-text">{{ $course->description }}</p>
                    </div>
                    <div class="card-footer">
                        <p class="text-success">No of students: 500</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

@endsection