<?php

namespace App\Http\Controllers\Employee\MedicalREcord;

use App\Immunization;
use App\MedicalRecord;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImmunizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $record = MedicalRecord::where('id','=',auth()->user()->id)->with('immunizations')->first();
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
    public function store(Request $request)
    {
        $record = MedicalRecord::where('user_id','=',auth()->user()->id)->with('immunizations')->first();

        $immunizations = [];

        foreach ($request->vaccine_recieved as $item => $key) {
            $immunizations[] = ([
                'record_id' => $record->id,
                'vaccine_recieved' => $request->vaccine_recieved[$item],
                'status' => $request->status[$item],
                'brand' => !empty($request->brand[$item]) ? $request->brand[$item] : '',
                'date' => $request->date[$item],
            ]);
        }

        $record->immunizations()->insert($immunizations);

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
        Immunization::where('id','=',$id)->update([
            'vaccine_recieved' => $request->vaccine_recieved,
            'status' => $request->status,
            'brand' => $request->brand,
            'date' => $request->date,
        ]);

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
        Immunization::where('id','=',$id)->first()->delete();
        return redirect()->back()->with('delete', 'Record deleted!');
    }
}
