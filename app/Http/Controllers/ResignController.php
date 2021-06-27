<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResignController extends Controller
{
    public function resign($id){

        User::where('id','=',$id)->update([
            'status' => 'resigned',
            'password' => Hash::make('resigned_employee')
        ]);

        return redirect()->back();

    }
}
