<?php

namespace App\Http\Controllers\Employee\MedicalRecord;

use App\MedicalRecord;
use App\PersonalHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonalHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $record = MedicalRecord::where('id','=',auth()->user()->id)->with('history')->first();
        return view('employee.medical.record-forms.history.create', compact('record'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $record = MedicalRecord::where('user_id','=',auth()->user()->id)->with('history')->first();
        $history = new PersonalHistory();
        $history->illnesses = $request->illnesses;

        $record->history()->save($history);

        return redirect()->route('record.index')->with('success', 'Record save!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        $history = PersonalHistory::where('id','=',$id)->first();
        $history->illnesses = $request->illnesses;

        $history->update();

        return redirect()->route('record.index')->with('update', 'Record updated!');
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
