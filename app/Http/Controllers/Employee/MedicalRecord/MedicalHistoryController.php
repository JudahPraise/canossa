<?php

namespace App\Http\Controllers\Employee\MedicalRecord;

use App\MedicalRecord;
use App\MedicalHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MedicalHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $histories = MedicalHistory::where('record_id','=',$id)->get();
        $otherHistories = $histories->where('isOther','=','true');
        $record = MedicalRecord::where('user_id','=',$id)->first();

        if(Auth::guard('nurse')->check())
        {
            return view('medical-record.dashboard.history.create', compact('histories','otherHistories', 'record'));
        }

        return view('employee.medical.record-forms.history.create', compact('histories','otherHistories', 'record'));
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
        $record = MedicalRecord::where('user_id','=',$id)->with('history')->first();

        $illnesses = [];

        foreach($request->illnesses as $item => $key)
        {
            $illnesses[] = ([
                'record_id' => $record->id,
                'illnesses' => $request->illnesses[$item],
                'isOther' => $request->isOther[$item],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        // dd($illnesses);
        MedicalHistory::where('record_id','=',$record->id)->delete();
        MedicalHistory::insert($illnesses);

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
        $histories = MedicalHistory::where('record_id','=',$id)->get();
        $otherHistories = $histories->where('isOther','=','true');
        $record = MedicalRecord::select('user_id')->where('id','=',$id)->first();

        if(Auth::guard('nurse')->check())
        {
            return view('medical-record.dashboard.history.create', compact('record', 'histories', 'otherHistories'));
        }

        return view('employee.medical.record-forms.history.create', compact('record','histories', 'otherHistories'));
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
        $record = MedicalRecord::select('id','user_id')->where('user_id','=',$id)->first();

        $illnesses = [];

        foreach($request->illnesses as $item => $key)
        {
            $illnesses[] = ([
                'record_id' => $record->id,
                'illnesses' => $request->illnesses[$item],
                'isOther' => $request->isOther[$item],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        MedicalHistory::where('record_id','=',$id)->delete();
        MedicalHistory::insert($illnesses);

        
        if(Auth::guard('nurse')->check())
        {
            return redirect()->route('medical.show', $record->user_id )->with('update', 'Record updated!');
        }

        return redirect()->route('record.index' )->with('update', 'Record updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = MedicalHistory::where('id','=',$id)->first();
        $record->delete();

        
        if(Auth::guard('nurse')->check())
        {
            $user = MedicalRecord::select('user_id')->where('id','=',$record->record_id)->first();
            return redirect()->route('medical.show', $user->user_id )->with('delete', 'Record deleted!');
        }
        return redirect()->route('record.index')->with('delete', 'Record deleted!');
    }
}
