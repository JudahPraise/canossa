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
            return view('employee.portfolio.training-program.empty');
        }else{
            return redirect()->route('training.show', Auth::user()->id);
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

        $training = new TrainingProgram();

        $training->user_id = Auth::user()->id;
        $training->training_date = $request->input('training_date');
        $training->training_title = $request->input('training_title');
        $training->training_sponsor = $request->input('training_sponsor');

        if($request->hasFile('training_certificate')){

            $file = $request->file('training_certificate');
            $filename = $file->getClientOriginalName();
            $request->training_certificate->storeAs('documents', $filename, 'public');
            $training->training_certificate = $filename;
        }

        $training->save();

        return redirect()->route('training.show', Auth::user()->id);
    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trainings = TrainingProgram::where('user_id','=',$id)->get();
        //dd($trainings);
        return view('employee.portfolio.training-program.show', compact('trainings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $training = TrainingProgram::where('id','=',$id)->first();
        return view('employee.portfolio.training-program.edit', compact('training'));
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
        $training = TrainingProgram::where('id','=',$id)->first();

        $training->user_id = Auth::user()->id;
        $training->training_date = $request->input('training_date');
        $training->training_title = $request->input('training_title');
        $training->training_sponsor = $request->input('training_sponsor');

        if($request->hasFile('training_certificate')){

            $file = $request->file('training_certificate');
            $filename = $file->getClientOriginalName();
            $request->training_certificate->storeAs('documents', $filename, 'public');
            $training->training_certificate = $filename;
        }

        $training->update();

        return redirect()->route('training.show', Auth::user()->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $training = TrainingProgram::where('id','=',$id)->first();
        $training->delete();

        return redirect()->back();
    }
}
