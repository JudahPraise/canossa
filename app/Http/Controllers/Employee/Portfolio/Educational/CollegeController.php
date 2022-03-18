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
        $sec_year_graduated = EducationalBackground::where('user_id','=',Auth::user()->id)->with('sec')->first();
        if($request->sy_graduated <= $sec_year_graduated->sec->sy_graduated)
        {
            
            return redirect()->back()->with('error', 'Year graduated is not accurate');

        }

        College::create([
            'educ_id' => Auth::user()->education->id,
            'name_of_school' => $request->name_of_school,
            'level' => 'college',
            'course_degree' => $request->course_degree,
            'level_units_earned' => $request->level_units_earned,
            'sy_graduated' => $request->sy_graduated,
            'academic_reward' => $request->academic_reward
        ]);

        EducationalBackground::where('user_id','=',Auth::user()->id)->update([
            'college' => true
        ]);

        return redirect()->route('educ.show', Auth::user()->id)->with('success', 'Record saved successfully!');
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
        $sec_year_graduated = EducationalBackground::where('user_id','=',Auth::user()->id)->with('sec')->first();
        if($request->sy_graduated <= $sec_year_graduated->sec->sy_graduated)
        {
            
            return redirect()->back()->with('error', 'Year graduated is not accurate');

        }

        College::where('id','=',$id)->update([
            'educ_id' => Auth::user()->education->id,
            'name_of_school' => $request->name_of_school,
            'level' => 'college',
            'course_degree' => $request->course_degree,
            'level_units_earned' => $request->level_units_earned,
            'sy_graduated' => $request->sy_graduated,
            'academic_reward' => $request->academic_reward
        ]);

        EducationalBackground::where('user_id','=',Auth::user()->id)->update([
            'college' => true
        ]);

        return redirect()->route('educ.show', Auth::user()->id)->with('update', 'Record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $college = College::where('id','=',$id)->first();
        $college->delete();
        
        return redirect()->back()->with('delete', 'Record deleted successfully!');
    }
}
