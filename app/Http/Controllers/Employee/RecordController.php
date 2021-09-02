<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Diagnosis;
use App\PhysicalExam;
use App\Hospitalization;
use App\LabTest;

class RecordController extends Controller
{
    public function index($id)
    {
        $user = User::where('id','=',$id)->with('personal')->first();
        $diagnosis = Diagnosis::where('employee_id','=',$id)->latest()->first();
        $physical = PhysicalExam::where('employee_id','=',$id)->latest()->first();
        $hospital = Hospitalization::where('employee_id','=',$id)->latest()->first();
        $labtest = LabTest::where('user_id','=',$id)->latest()->first();
        return view('employee.medical.index', compact(['user','diagnosis','physical','hospital','labtest']));
    }

    public function store(Request $request){

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
        
        User::where('id','=',auth()->id())->update([
            'labtest' => 'true'
        ]);

        $labtest->save();

        return redirect()->back()->with('success', 'Document saved successfully!');
    }
    
    public function update(Request $request, $id){

        $labtest = LabTest::where('id','=',$id)->first();

        $labtest->user_id = auth()->id();
        $labtest->type = $request->input('type');

        if($request->hasFile('file')){

            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $request->file->storeAs('labtests', $filename, 'public');
            $labtest->file = $filename;
            $labtest->extension = $extension;
        }
        
        User::where('id','=',auth()->id())->update([
            'labtest' => 'true'
        ]);

        $labtest->update();

        return redirect()->back()->with('update', "{$request->type} has been updated!");

    }
}
