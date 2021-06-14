<?php

namespace App\Http\Controllers\Employee;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function update(Request $request){

        $image = Auth::user()->image;
        
        if(File::exists(storage_path("app/public/images/{$image}"))){
            File::delete(storage_path("app/public/images/{$image}"));
        }

        if($request->hasFile('image')){

            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $request->image->storeAs('images', $filename, 'public');
            auth()->user()->update(['image' => $filename]);

        }

        return redirect()->back()->with('message', 'Profile updated successfully');

    }

}
