<?php

namespace App\Http\Controllers\Employee\MedicalRecord;

use App\MedicalRecord;
use App\Hospitalization;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HospitalizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee.medical.record-forms.hospitalization.create');
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
        $record = MedicalRecord::where('user_id','=',auth()->user()->id)->with('hospitalizations')->first();

        $hospitalization = new Hospitalization();
        $hospitalization->disease = $request->disease;
        $hospitalization->d_date = $request->d_date;
        $hospitalization->operation = $request->operation;
        $hospitalization->o_date = $request->o_date;

        $record->hospitalizations()->save($hospitalization);

        if($record->hospitalizations->isEmpty()){
            return redirect()->route('employee.medication.create')->with('success', 'Record save!');
        }

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
        $record = MedicalRecord::where('id','=',$id)->with('hospitalizations')->first();
        // dd($record->hospitalizations);
        return view('employee.medical.record-forms.hospitalization.update', compact('record'));
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
        Hospitalization::where('id','=',$id)->update([
            'disease' => $request->disease,
            'd_date' => $request->d_date,
            'operation' => $request->operation,
            'o_date' => $request->o_date,
        ]);

        return redirect()->back()->with('udpate', 'Record updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Hospitalization::where('id','=',$id)->first()->delete();
        return redirect()->back()->with('delete', 'Record deleted!');
    }
}
