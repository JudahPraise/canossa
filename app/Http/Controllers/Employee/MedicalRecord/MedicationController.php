<?php

namespace App\Http\Controllers\Employee\MedicalREcord;

use App\MedicalRecord;
use App\EmployeeMedication;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MedicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $record = MedicalRecord::select('user_id')->where('user_id','=',$id)->first();
        
        if(Auth::guard('nurse')->check())
        {
            // dd($record->user_id);
            return view('medical-record.dashboard.medication.create', compact('record'));
        }

        return view('employee.medical.record-forms.medication.create', compact('record'));
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
    public function store(Request $request, $id)
    {
        $record = MedicalRecord::where('user_id','=',$id)->with('medications')->first();

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

        if(Auth::guard('nurse')->check())
        {
            return redirect()->route('medical.show', $record->user_id )->with('success', 'Record saved!');
        }

        return redirect()->route('record.index')->with('success', 'Record saved!');
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

        
        if(Auth::guard('nurse')->check())
        {
            $user = MedicalRecord::select('user_id')->where('id','=',$medicine->record_id)->first();
            return redirect()->route('medical.show', $user->user_id )->with('update', 'Record updated!');
        }

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

        
        if(Auth::guard('nurse')->check())
        {
            $record = MedicalRecord::select('user_id')->where('id','=',$medicine->record_id)->first();
            return redirect()->route('medical.show', $record->user_id )->with('delete', 'Record deleted!');
        }

        return redirect()->route('record.index')->with('delete', 'Record deleted!');
    }
}
