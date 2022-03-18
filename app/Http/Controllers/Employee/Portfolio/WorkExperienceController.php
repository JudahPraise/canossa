<?php

namespace App\Http\Controllers\Employee\Portfolio;

use App\WorkExperience;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WorkExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experiences = WorkExperience::where('user_id','=',Auth::user()->id)->first();
        if($experiences === null){
            return view('employee.portfolio.work-experience.empty');
        }else{
            return redirect()->route('work.show', Auth::user()->id);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.portfolio.work-experience.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $experiences = [];

        foreach($request->duration as $item => $key){
            $experiences[] = ([
                'user_id' => Auth::user()->id,
                'duration' => $request->duration[$item],
                'work_description' => $request->work_description[$item],
                'work_place' => $request->work_place[$item],
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ]);
        }

        WorkExperience::insert($experiences);

        return redirect()->route('work.show', Auth::user()->id)->with('success', 'Record saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $experiences = WorkExperience::where('user_id','=',$id)->get();
        return view('employee.portfolio.work-experience.show', compact('experiences'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $experiences = WorkExperience::where('user_id','=',$id)->get();
        return view('employee.portfolio.work-experience.edit', compact('experiences'));
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
        WorkExperience::where('user_id','=',$id)->delete();

        $experiences = [];

        foreach($request->duration as $item => $key){
            $experiences[] = ([
                'user_id' => Auth::user()->id,
                'duration' => $request->duration[$item],
                'work_description' => $request->work_description[$item],
                'work_place' => $request->work_place[$item],
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ]);
        }

        WorkExperience::insert($experiences);

        return redirect()->route('work.show', Auth::user()->id)->with('update', 'Record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        WorkExperience::where('id','=',$id)->delete();
        return redirect()->back()->with('delete', 'Record deleted successfully!');
    }
}
