<?php

namespace App\Http\Controllers\Employee\MedicalRecord;

use App\User;
use App\Immunization;
use App\MedicalRecord;
use App\Hospitalization;
use App\EmployeeMedication;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class MedicalRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id','=',auth()->user()->id)->with('personal', 'records')->first();
        // $record = MedicalRecord::where('user_id','=',auth()->user()->id)->with('labtests','hospitalizations','medications','immunizations','history')->first();
        // dd($record->medications);
        return view('employee.medical.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $record = MedicalRecord::where('user_id','=',auth()->user()->id)->first();
        return view('employee.medical.create', compact('record'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::where('id','=',auth()->user()->id)->with('records')->first();
        $record = new MedicalRecord();

        $record->year_from = $request->year_from;
        $record->year_to = $request->year_to;

        $user->records()->save($record);

        return redirect()->route('record.index')->with('success', 'School year updated!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MedicalRecord  $medicalRecord
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $user = User::where('id','=',auth()->user()->id)->with('personal')->first();
        $record = MedicalRecord::where('user_id','=',auth()->user()->id)->with('labtests','hospitalizations')->first();
        return view('employee.medical.index', compact('user', 'record', 'records'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MedicalRecord  $medicalRecord
     * @return \Illuminate\Http\Response
     */
    public function edit(MedicalRecord $medicalRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MedicalRecord  $medicalRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MedicalRecord  $medicalRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicalRecord $medicalRecord)
    {
        //
    }

    public function storeRecord(Request $request, $id)
    {
        if(!empty($request->disease))
        {
            $hospitalization = new Hospitalization();

            $hospitalization->record_id = $id;
            $hospitalization->disease = $request->disease;
            $hospitalization->d_date = $request->d_date;
            $hospitalization->operation = $request->operation;
            $hospitalization->o_date = $request->o_date;
    
            $hospitalization->save();
        }


        if(!empty($request->medicine))
        {
            $medications = new EmployeeMedication();
            $medications->record_id = $id;
            $medications->medicine = $request->medicine;
            
            $medications->save();
        }
        
       if(!empty($request->vaccine_recieved))
       {
        $immunizations =[];

        foreach ($request->vaccine_recieved as $item => $key) {
            $immunizations[] = ([
                'record_id' => $id,
                'vaccine_recieved' => $request->vaccine_recieved[$item],
                'status' => $request->status[$item],
                'brand' => $request->brand[$item],
                'date' => $request->date[$item],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        Immunization::insert( $immunizations);

       }

        return redirect()->route('record.index')->with('success', 'Record saved!');
    }
}
