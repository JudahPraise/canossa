<?php

namespace App\Http\Controllers\Employee\MedicalRecord;

use App\LabTest;
use App\MedicalRecord;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LabTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $record =  $record = MedicalRecord::where('user_id','=',auth()->user()->id)->with('labtests')->find($id);
       
        $labtest = new LabTest();  

        $labtest->user_id = auth()->user()->id;
        $labtest->type = $request->input('type');

        if($request->hasFile('file')){

            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $request->file->storeAs('labtests', $filename, 'public');
            $labtest->file = $filename;
            $labtest->extension = $extension;
        }
        $record->labtests()->save($labtest);

        return redirect()->back()->with('success', 'Document saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LabTest  $labTest
     * @return \Illuminate\Http\Response
     */
    public function show(LabTest $labTest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LabTest  $labTest
     * @return \Illuminate\Http\Response
     */
    public function edit(LabTest $labTest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LabTest  $labTest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LabTest $labTest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LabTest  $labTest
     * @return \Illuminate\Http\Response
     */
    public function destroy(LabTest $labTest)
    {
        //
    }
}
