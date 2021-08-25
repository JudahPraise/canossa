<?php

namespace App\Http\Controllers\Medical;

use App\User;
use App\Nurse;
use App\Diagnosis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DiagnosisController extends Controller
{
    public function store(Request $request, $id)
    {
        $diagnosis = new Diagnosis();

        $diagnosis->employee_id = $id;
        $diagnosis->nurse = Auth::guard('nurse')->user()->name;
        $diagnosis->diagnosis = $request->diagnosis;

        $diagnosis->save();

        return redirect()->back();
    }
}
