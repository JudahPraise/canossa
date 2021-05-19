<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class ImageController extends Controller
{
    public function update(Request $request){

        if($request->hasFile('image')){

            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $request->image->storeAs('images', $filename, 'public');
            auth()->user()->update(['image' => $filename]);

        }

        return redirect()->back()->with('message', 'Profile updated successfully');

    }

}
