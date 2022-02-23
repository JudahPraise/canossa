<?php

namespace App\Http\Controllers\Employee\Portfolio\Educational;

use App\Secondary;
use Illuminate\Http\Request;
use App\EducationalBackground;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SecondaryController extends Controller
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
        return view('employee.portfolio.educational-background.secondary.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $elem_year_graduated = EducationalBackground::where('user_id','=',Auth::user()->id)->with('elem')->first();
        // dd($elem_year_graduated->elem->sy_graduated <= $request->sy_graduated);

        // if($request->sy_graduated <= $elem_year_graduated->elem->sy_graduated)
        // {
            
        //     return dd('sinungaling');

        // }

        Secondary::create([
            'educ_id' => Auth::user()->education->id,
            'name_of_school' => $request->name_of_school,
            'level_units_earned' => $request->level_units_earned,
            'sy_graduated' => $request->sy_graduated,
            'academic_reward' => $request->academic_reward,
        ]);

        EducationalBackground::where('user_id','=',Auth::user()->id)->update([
            'secondary' => true
        ]);

        return redirect()->route('educ.show', Auth::user()->id)->with('success', 'Record saved!');

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
        $secondary = Secondary::where('id','=',$id)->first();
        return view('employee.portfolio.educational-background.secondary.edit', compact('secondary'));
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
        Secondary::where('id','=',$id)->update([
            'educ_id' => Auth::user()->education->id,
            'name_of_school' => $request->name_of_school,
            'level_units_earned' => $request->level_units_earned,
            'sy_graduated' => $request->sy_graduated,
            'academic_reward' => $request->academic_reward,
        ]);

        EducationalBackground::where('user_id','=',Auth::user()->id)->update([
            'secondary' => true
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
        $secondary = Secondary::where('id','=',$id)->first();
        $secondary->delete();
        
        return redirect()->back();
    }
}
