<?php

namespace App\Http\Controllers;

use App\User;
use App\LabTest;
use App\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DocumentsController extends Controller
{

    public function index(){

        $documents = Document::where('user_id','=',Auth::user()->id)->get();
        return view('employee.documents.index', compact('documents'));

    }

    public function store(Request $request){

            
        $document = new Document();

        $document->user_id = auth()->id();
        $document->type = $request->input('type');

        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $request->file->storeAs('documents', $filename, 'public');
            $document->file = $filename;
            $document->extension = $extension;
        }
        $document->save();


        return redirect()->back()->with('success', 'Document saved successfully!');
    }
    
    public function update(Request $request, $id){

        $document = Document::where('id','=',$id)->first();
        if(File::exists(storage_path("app/public/documents/{$document->file}"))){
            File::delete(storage_path("app/public/documents/{$document->file}"));
        }

        $document->user_id = auth()->id();
        $document->type = $request->input('type');

        if($request->hasFile('file')){

            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $request->file->storeAs('documents', $filename, 'public');
            $document->file = $filename;
            $document->extension = $extension;
        }
        
        $document->update();

        return redirect()->back()->with('update', "{$request->type} has been updated!");

    }

    public function download($id){
        $document = Document::where('id','=',$id)->first();
        return response()->download(storage_path("app/public/documents/{$document->file}"));
    }

    public function delete($id){

        $document = Document::where('id','=',$id)->first();
        if(File::exists(storage_path("app/public/documents/{$document->file}"))){
            File::delete(storage_path("app/public/documents/{$document->file}"));
        }
        $document->delete($document);
        return redirect()->back()->with('delete', "{$document->file} has been deleted!");

    }
    
}
