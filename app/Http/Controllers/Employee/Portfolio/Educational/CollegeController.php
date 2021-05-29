<?php

namespace App\Http\Controllers\Employee\Portfolio\Educational;

use App\College;
use Illuminate\Http\Request;
use App\EducationalBackground;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.portfolio.educational-background.college.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        College::create([
            'educ_id' => Auth::user()->education->id,
            'name_of_school' => $request->name_of_school,
            'level' => 'college',
            'course_degree' => $request->course_degree,
            'level_units_earned' => $request->level_units_earned,
            'graduated_date_from' => $request->graduated_date_from,
            'graduated_date_to' => $request->graduated_date_to,
            'academic_reward' => $request->academic_reward
        ]);

        EducationalBackground::where('user_id','=',Auth::user()->id)->update([
            'college' => true
        ]);

        return redirect()->route('educ.show', Auth::user()->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $college = College::where('id','=',$id)->first();
        return view('employee.portfolio.educational-background.college.edit', compact('college'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        College::where('id','=',$id)->update([
            'educ_id' => Auth::user()->education->id,
            'name_of_school' => $request->name_of_school,
            'level' => 'college',
            'course_degree' => $request->course_degree,
            'level_units_earned' => $request->level_units_earned,
            'graduated_date_from' => $request->graduated_date_from,
            'graduated_date_to' => $request->graduated_date_to,
            'academic_reward' => $request->academic_reward
        ]);

        EducationalBackground::where('user_id','=',Auth::user()->id)->update([
            'college' => true
        ]);

        return redirect()->route('educ.show', Auth::user()->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
