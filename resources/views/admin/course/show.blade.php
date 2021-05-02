@extends('admin.layouts.main')

@section('home')
 
<div class="container-fluid" style="width: 80%; color: black">
    <div class="row">
        <div class="col-md-10">
            <h3>{{ $course->course_title }}<span class="text-primary ml-3">({{ $course->acronym }})</span></h3>
            <p>{{ $course->description }}</p>
            <p class="text-muted">No. of students: 500</p>
        </div>
        <div class="col-md-2">
            <a href="{{ route('course.create', $course->id) }}" class="btn btn-sm btn-outline-success text-decoration-none"><i class="fas fa-plus mr-2"></i> Add Subject</a>
        </div>
    </div>

    <div class="row" style="color: black;">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Subject Code</th>
                <th>Units</th>
                <th>Description</th>
                <th>Teacher</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($subjects as $subject)
                <tr>
                  <td>{{ $subject->code }}</td>
                  <td>{{ $subject->units }}</td>
                  <td>{{ $subject->description }}</td>
                  <td>{{ $subject->teacher->fname }}</td>
                  <td>
                    {{-- FIXME: Add Functionality --}}
                    <a href="#" class="btn btn-primary">Edit</a>
                    <a href="#" class="btn btn-danger">Remove</a>
                  </td>
                </tr>
              @empty
                <p>No Data</p>
              @endforelse
            </tbody>
          </table>
    </div>
</div>

@endsection