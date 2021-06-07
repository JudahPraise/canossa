<?php

namespace App\Http\Controllers\Employee\Portfolio;

use App\TrainingProgram;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TrainingProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainings = TrainingProgram::where('user_id','=',Auth::user()->id)->first();
        if($trainings === null){
            return view('employee.portfolio.training-program.empty', compact('trainings', $trainings));
        }else{
            return view('employee.portfolio.training-program.show', compact('trainings', $trainings));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.portfolio.training-program.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TrainingProgram::create([
            'training_date' => $request->training_date,
            'training_title' => $request->training_title,
            'training_sponsor' => $request->training_sponsor,
            'training_certificate' => $request->training_certificate,
        ]);

        return redirect()->route('profile.index');
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
        $trainings = TrainingProgram::where('user_id','=',Auth::user()->id)->first();
        // dd($trainings);
        return view('employee.portfolio.training-program.edit', compact('trainings'));
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
        TrainingProgram::where('id','=',$id)->update([
            'training_date' => $request->training_date,
            'training_title' => $request->training_title,
            'training_sponsor' => $request->training_sponsor,
            'training_certificate' => $request->training_certificate,
        ]);

        return redirect()->route('profile.index');
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
