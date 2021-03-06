<?php

namespace App\Http\Controllers\Employee\Portfolio\Educational;

use App\User;
use App\Elementary;
use Illuminate\Http\Request;
use App\EducationalBackground;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ElementaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.portfolio.educational-background.elementary.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::where('id','=',Auth::user()->id)->first();
        if($request->sy_graduated <= $user->dob)
        {
            
            return redirect()->back()->with('error', 'Year graduated is not accurate');

        }

        Elementary::create([
            'educ_id' => Auth::user()->education->id,
            'name_of_school' => $request->name_of_school,
            'level_units_earned' => $request->level_units_earned,
            'sy_graduated' => $request->sy_graduated,
            'academic_reward' => $request->academic_reward,
        ]);

        EducationalBackground::where('user_id','=',Auth::user()->id)->update([
            'elementary' => true
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
        $elementary = Elementary::where('id','=',$id)->first();
        return view('employee.portfolio.educational-background.elementary.edit', compact('elementary'));
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
        $user = User::where('id','=',Auth::user()->id)->first();
        if($request->sy_graduated <= $user->dob)
        {
            
            return redirect()->back()->with('error', 'Year graduated is not accurate');

        }
        
        Elementary::where('id','=',$id)->update([
            'educ_id' => Auth::user()->education->id,
            'name_of_school' => $request->name_of_school,
            'level_units_earned' => $request->level_units_earned,
            'sy_graduated' => $request->sy_graduated,
            'academic_reward' => $request->academic_reward,
        ]);

        EducationalBackground::where('user_id','=',Auth::user()->id)->update([
            'elementary' => true
        ]);

        return redirect()->route('educ.show', Auth::user()->id)->with('update', 'Elementary updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $elementary = Elementary::where('id','=',$id)->first();
        $elementary->delete();
        
        return redirect()->back()->with('delete', 'Elementary data deleted successfully!');
    }
}
