<?php

namespace App\Http\Controllers;

use File;
use App\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        if($request->hasFile('file')){

            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $request->file->storeAs('documents', $filename, 'public');
            $document->file = $filename;
            $document->extension = $extension;
        }
        
        $document->save();
        return response()->json(['success'=>$filename]);

    }

    public function download($id){
        $document = Document::where('id','=',$id)->first();
        return response()->download(storage_path("app/public/documents/{$document->document_filename}"));
    }

    public function delete($id){

        $document = Document::where('id','=',$id)->first();
        $document->delete($document);
        return redirect()->back()->with('delete', "{$document->type_document} has been deleted!");

    }
    
}
