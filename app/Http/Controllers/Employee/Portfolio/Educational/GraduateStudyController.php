<?php

namespace App\Http\Controllers\Employee\Portfolio\Educational;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
                'level'=> $request->level[$item],
                'course'=> $request->course[$item],
                'degree'=> $request->degree[$item],
                'level_units_earned'=> $request->level_units_earned[$item],
                'graduated_date_from'=> $request->graduated_date_from[$item],
                'graduated_date_to'=> $request->graduated_date_to[$item],
                'academic_reward'=> $request->academic_reward[$item],
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
        //
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
                'level'=> $request->level[$item],
                'course'=> $request->course[$item],
                'degree'=> $request->degree[$item],
                'level_units_earned'=> $request->level_units_earned[$item],
                'graduated_date_from'=> $request->graduated_date_from[$item],
                'graduated_date_to'=> $request->graduated_date_to[$item],
                'academic_reward'=> $request->academic_reward[$item],
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
        //
    }
}
