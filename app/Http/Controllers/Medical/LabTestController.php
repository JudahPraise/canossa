<?php

namespace App\Http\Controllers\Medical;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LabTest;
use App\User;

class LabTestController extends Controller
{
    public function index()
    {
        $labtests = LabTest::with('record.user')->get();
        // foreach($labtests as $labtest)
        // {
        //     dd($labtest);
        // }
        return view('medical-record.lab-test.index', compact('labtests'));
    }

    public function store(Request $request, $id){

        $labtest = new LabTest();
        $user = User::where('id','=',$id)->first();

        $labtest->user_id = $user->id;
        $labtest->type = $request->input('type');

        if($request->hasFile('file')){

            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $request->file->storeAs('labtests', $filename, 'public');
            $labtest->file = $filename;
            $labtest->extension = $extension;
        }
        
        User::where('id','=',$id)->update([
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
