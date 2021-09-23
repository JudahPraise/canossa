<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResignController extends Controller
{
    public function resign($id)
    {

        User::where('id','=',$id)->update([
            'category' => 'Resigned',
        ]);

        return redirect()->back();
    }

    public function retrieve(Request $request, $id)
    {
        User::where('id','=',$id)->update([
            'category' => $request->category,
        ]);

        return redirect()->back();
    }
}
