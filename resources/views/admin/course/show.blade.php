@extends('admin.layouts.main')

@section('home')
 
<div class="container-fluid" style="width: 80%; color: black">
    <div class="row">
        <div class="col-lg-10">
            <h3>{{ $course[0]->course_title }}<span class="text-primary ml-3">({{ $course[0]->acronym }})</span></h3>
            <p>{{ $course[0]->description }}</p>
            <p class="text-muted">No. of students: 500</p>
        </div>
        <div class="col-lg-2 p-4">
            <a href="{{ route('course.create', $course[0]->id) }}" class="btn btn-success text-decoration-none"><ion-icon name="add"></ion-icon> Add Subject</a>
        </div>
    </div>

    <div class="row" style="color: black;">
        <table class="table table-hover">
            <thead>
              <tr>
                <th>Subject Code</th>
                <th>Units</th>
                <th>Description</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($course[0]->subjects as $subject)
              <tr>
                <td>{{ $subject->code }}</td>
                <td>{{ $subject->units }}</td>
                <td>{{ $subject->description }}</td>
                <td>
                  {{-- FIXME: Add Functionality --}}
                  <a href="#" class="btn btn-primary">Edit</a>
                  <a href="#" class="btn btn-danger">Remove</a>
                </td>
              </tr>
              @empty
                
              @endforelse
              
            </tbody>
          </table>
    </div>
</div>

@endsection