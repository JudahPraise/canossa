<?php

namespace App\Http\Controllers\Employee\Portfolio\Educational;

use App\GraduateStudy;
use Illuminate\Http\Request;
use App\EducationalBackground;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GraduateStudyController extends Controller
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
        return view('employee.portfolio.educational-background.graduate-study.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $graduate_studies = [];

        foreach($request->name_of_school as $item => $key){
            $graduate_studies[] = ([
                'educ_id'=> Auth::user()->education->id,
                'name_of_school'=> $request->name_of_school[$item],
                'course'=> $request->course[$item],
                'degree'=> $request->degree[$item],
                'level_units_earned'=> $request->level_units_earned[$item],
                'sy_graduated'=> $request->sy_graduated[$item],
                'academic_reward'=> $request->academic_reward[$item],
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ]);
        }

        GraduateStudy::insert($graduate_studies);

        EducationalBackground::where('user_id','=',Auth::user()->id)->update([
            'graduate_study' => true
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
        $grad = GraduateStudy::where('educ_id','=',$id)->get();
        return view('employee.portfolio.educational-background.graduate-study.edit', compact('grad'));
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
        GraduateStudy::where('educ_id','=',$id)->delete();

        $graduate_studies = [];

        foreach($request->name_of_school as $item => $key){
            $graduate_studies[] = ([
                'educ_id'=> Auth::user()->education->id,
                'name_of_school'=> $request->name_of_school[$item],
                'course'=> $request->course[$item],
                'degree'=> $request->degree[$item],
                'level_units_earned'=> $request->level_units_earned[$item],
                'sy_graduated'=> $request->sy_graduated[$item],
                'academic_reward'=> $request->academic_reward[$item],
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ]);
        }

        GraduateStudy::insert($graduate_studies);

        EducationalBackground::where('user_id','=',Auth::user()->id)->update([
            'graduate_study' => true
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
        $grad = GraduateStudy::where('id','=',$id)->first()->delete();
        return redirect()->back();
    }
}
