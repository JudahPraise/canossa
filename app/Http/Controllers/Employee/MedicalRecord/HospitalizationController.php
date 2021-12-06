<?php

namespace App\Http\Controllers\Employee\MedicalRecord;

use App\MedicalRecord;
use App\Hospitalization;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HospitalizationController extends Controller
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
            return view('medical-record.dashboard.hospitalization.create', compact('record'));
        }

        return view('employee.medical.record-forms.hospitalization.create', compact('record'));
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
        $record = MedicalRecord::where('user_id','=',$id)->with('hospitalizations')->first();

        $hospitalization = new Hospitalization();
        $hospitalization->disease = $request->disease;
        $hospitalization->d_date = $request->d_date;
        $hospitalization->operation = $request->operation;
        $hospitalization->o_date = $request->o_date;

        $record->hospitalizations()->save($hospitalization);

        if(Auth::guard('nurse')->check())
        {
            return redirect()->route('medical.show', $record->user_id )->with('update', 'Record saved!');
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
        $hospitalization = Hospitalization::where('id','=',$id)->first();
        $hospitalization->disease = $request->disease;
        $hospitalization->d_date = $request->d_date;
        $hospitalization->operation = $request->operation;
        $hospitalization->o_date = $request->o_date;

        $hospitalization->update();

        $record = MedicalRecord::select('user_id')->where('id','=',$hospitalization->record_id)->first();

        if(Auth::guard('nurse')->check())
        {
            return redirect()->route('medical.show', $record->user_id )->with('update', 'Record updated!');
        }

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
        $hospitalization = Hospitalization::where('id','=',$id)->first();
        $hospitalization->delete();
        
        $record = MedicalRecord::select('user_id')->where('id','=',$hospitalization->record_id)->first();

        if(Auth::guard('nurse')->check())
        {
            return redirect()->route('medical.show', $record->user_id )->with('delete', 'Record deleted!');
        }
        return redirect()->back()->with('delete', 'Record deleted!');
    }
}
