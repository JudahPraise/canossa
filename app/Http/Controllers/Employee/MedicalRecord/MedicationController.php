<?php

namespace App\Http\Controllers\Employee\MedicalREcord;

use App\MedicalRecord;
use App\EmployeeMedication;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class MedicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee.medical.record-forms.medication.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $record = MedicalRecord::where('user_id','=',auth()->user()->id)->with('medications')->first();

        $medicines = [];

        foreach($request->name as $item => $key)
        {
            $medicines[] = ([
                'record_id' => $record->id,
                'name' => $request->name[$item],
                'condition' => $request->condition[$item],
                'strength' => !empty($request->strength[$item]) ? $request->strength[$item] : '',
                'frequency' => !empty($request->frequency[$item]) ? $request->frequency[$item] : '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        EmployeeMedication::insert($medicines);

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
        $medicine = EmployeeMedication::where('id','=',$id)->first();
        $medicine->name = $request->name;
        $medicine->condition = $request->condition;
        $medicine->strength = $request->strength;
        $medicine->frequency = $request->frequency;

        $medicine->update();

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
        $medicine = EmployeeMedication::where('id','=',$id)->first();
        $medicine->delete();
        return redirect()->route('record.index')->with('delete', 'Record deleted!');
    }
}
