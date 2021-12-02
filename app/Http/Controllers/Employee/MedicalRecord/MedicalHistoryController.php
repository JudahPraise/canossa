<?php

namespace App\Http\Controllers\Employee\MedicalRecord;

use App\MedicalRecord;
use App\MedicalHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class MedicalHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $record = MedicalRecord::where('user_id','=',auth()->user()->id)->with('history')->first();
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
        $histories = MedicalHistory::where('record_id','=',$id)->get();
        $otherHistories = $histories->where('isOther','=','true');
        return view('employee.medical.record-forms.history.create', compact('histories', 'otherHistories'));
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

        return redirect()->route('record.index')->with('success', 'Record save!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MedicalHistory::where('id','=',$id)->first()->delete();
        return redirect()->route('record.index')->with('delete', 'Record deleted!');
    }
}
