@extends('admin.layouts.main')

@section('home')

    <div class="container-fluid">
        <h2 style="margin-left: 11rem; font-size: 3rem; color: black">Courses</h2>
        <div class="row d-flex justify-content-center">
            @foreach ($courses as $course)
                <a href="{{ route('course.show', $course->id) }}" class="col-lg-3 neu-effect py-4 px-3 m-4 animation text-decoration-none" style="color: black">
                    <div class="container p-0 d-flex flex-column">
                        <section>
                            <h3 class="text-primary">({{ $course->acronym }})</h3>
                            <h4>{{ $course->course_title }}</h4>
                            <p>{{ $course->description }}</p>
                        </section>
                        <section>
                            <p class="text-success">No of students: 500</p>
                        </section>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

@endsection