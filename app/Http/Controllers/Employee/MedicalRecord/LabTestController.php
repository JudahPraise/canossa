<?php

namespace App\Http\Controllers\Employee\MedicalRecord;

use App\LabTest;
use App\MedicalRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
       $record = MedicalRecord::where('user_id','=',$id)->with('user','labtests')->first();
        
        $labtest = new LabTest();  

        $labtest->user_id = $id;
        $labtest->type = $request->input('type');

        $date = Carbon::now();

        if($request->hasFile('file')){

            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $file = $filename.'.'.$extension;
            $request->file->storeAs('labtests', $file, 'public');
            $labtest->file = $file;
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

    public function download($id){
        $labtest = LabTest::where('id','=',$id)->first();
        return response()->download(storage_path("app/public/labtests/{$labtest->file}"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LabTest  $labTest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        LabTest::where('id','=',$id)->delete();
        return redirect()->back()->with('delete', 'File deleted successfully!');
    }
}
