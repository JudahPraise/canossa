<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Course;
use App\Subject;

class CourseController extends Controller
{
    public function index(){

        $courses = Course::all();
        return view('admin.course.index', compact('courses', $courses));

    }
    
    public function show($id){

        $course = Course::where('id','=',$id)->with('subjects')->get();
        // dd($course);
        return view('admin.course.show', compact('course', $course));

    }

    public function create($id){

        $course = Course::where('id','=',$id)->first();
        return view('admin.course.create', compact('course', $course));
        
    }

    public function store(Request $request, $id){

    
        $subjects =[];
        
        foreach ($request->code as $item => $key) {
            $subjects[] = ([
                'course_id' => $request->id,
                'code' => $request->code[$item],
                'units' => $request->units[$item],
                'description' => $request->description[$item],
                'year' => $request->year,
                'semester' => $request->semester,
            ]);
        }

        Subject::insert($subjects);
        return redirect()->route('course.show', $id);
    }
}
