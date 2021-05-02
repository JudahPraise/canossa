<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Course;
use App\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index(){

        $courses = Course::all();
        return view('admin.course.index', compact('courses', $courses));

    }
    
    public function show($id){

        $subjects = Subject::where('course_id','=',$id)->with('teacher')->get();
        // dd($subjects)
        $course = Course::where('id','=',$id)->first();
        return view('admin.course.show', compact(['subjects', $subjects, 'course', $course]));

    }

    public function create($id){

        $course = Course::where('id','=',$id)->first();
        $teachers = User::where('role','=','Teacher')->where('department','=','College')->get();
        return view('admin.course.create', compact(['course', $course, 'teachers', $teachers]));
        
    }

    public function store(Request $request, $id){

    
        $subjects =[];
        // dd($request->teacher_id);
        foreach ($request->code as $item => $key) {
            $subjects[] = ([
                'course_id' => $request->id,
                'code' => $request->code[$item],
                'units' => $request->units[$item],
                'description' => $request->description[$item],
                'year' => $request->year,
                'semester' => $request->semester,
                'teacher_id' => $request->teacher_id[$item],
            ]);
        }

        Subject::insert($subjects);
        return redirect()->route('course.show', $id);
    }
}
