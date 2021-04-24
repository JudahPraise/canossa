@extends('layouts.app')

@section('content')

<div class="container-fluid d-flex flex-column align-items-center"  style="width: 100%; background-color: #e9ecef;">
  @include('partials.student_nav')
</div>

<div class="container-fluid d-flex flex-column align-items-center mt-3 border-bottom"  style="width: 95%;">
    <h5 class="h3 mb-4 text-gray-800 text-center">My Grade</h5>   
</div>

<div class="container-fluid d-flex flex-column p-5 mt-0"  style="width: 100%;">
    <label class="mr-4">Student ID: </label> <i class="text-dark font-weight-bold mr-5"></i> <br>
    <label class="mr-4">Course: </label> <i class="text-dark font-weight-bold text-uppercase"></i> <br>
    
    

    <table border="1" class="text-center w-100">
        <thead>
            <tr>
                <th rowspan="2">Subject</th>
                <th colspan="3">Term Rating</th>
                <th rowspan="2">Grade <br> Result</th>
                
            </tr>
            <tr>
                <th>Prelim</th>
                <th>Midterm</th>
                <th>Final</th>
            </tr>
        </thead>
        <tbody>
           

        </tbody>
    </table>
    
</div>


@endsection


