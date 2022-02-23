<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index($id)
    {
        $admin = Admin::where('id','=',$id)->first();
        return view('admin.account.index', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        Admin::where('id','=',$id)->update([

            'admin_id' =>  $request->input('admin_id'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->back()->with('update', 'Account information updated!');
    }
}
