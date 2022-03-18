<?php

namespace App\Http\Controllers\Employee\MedicalREcord;

use App\Immunization;
use App\MedicalRecord;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ImmunizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $record = MedicalRecord::where('user_id','=',$id)->with('immunizations')->first();

        if(Auth::guard('nurse')->check())
        {
            return view('medical-record.dashboard.immunization.create', compact('record'));
        }

        return view('employee.medical.record-forms.immunization.create', compact('record'));
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
    public function store(Request $request, $id)
    {
        $record = MedicalRecord::where('user_id','=',$id)->with('immunizations')->first();

        Immunization::create([
            'record_id' => $record->id,
            'vaccine_recieved' => $request->vaccine_recieved,
            'status' => $request->status,
            'brand' => $request->brand,
            'date' => $request->date
        ]);

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
        $immunization = Immunization::where('id','=',$id)->first();

        $immunization->vaccine_recieved = $request->vaccine_recieved;
        $immunization->status = $request->status;
        $immunization->brand = $request->brand;
        $immunization->date = $request->date;

        $immunization->update();

        
        if(Auth::guard('nurse')->check())
        {
            $record = MedicalRecord::select('user_id')->where('id','=',$immunization->record_id)->first();
            return redirect()->route('medical.show', $record->user_id )->with('update', 'Record updated!');
        }

        return redirect()->back()->with('update', 'Record updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $immunization = Immunization::where('id','=',$id)->first();
        $immunization->delete();
        
        if(Auth::guard('nurse')->check())
        {
            $record = MedicalRecord::select('user_id')->where('id','=',$immunization->record_id)->first();
            return redirect()->route('medical.show', $record->user_id )->with('delete', 'Record deleted!');
        }

        return redirect()->back()->with('delete', 'Record deleted!');
    }
}
