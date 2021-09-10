<?php

namespace App\Http\Controllers\Medical;

use App\User;
use App\Nurse;
use App\Diagnosis;
use App\HealthProblem;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DiagnosisController extends Controller
{
    public function store(Request $request, $id)
    {
        $diagnosis = new Diagnosis();

        $diagnosis->user_id = $id;
        $diagnosis->nurse = Auth::guard('nurse')->user()->name;
        $diagnosis->date = Carbon::now();
        $diagnosis->diagnosis = $request->diagnosis;
        $diagnosis->isHealthy = $request->isHealthy;
        $diagnosis->problems = $request->problem;
        $diagnosis->medications = $request->medications;

        $diagnosis->save();

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $diagnosis = Diagnosis::where('id','=',$id)->first();

        $diagnosis->user_id = $diagnosis->user_id;
        $diagnosis->nurse = Auth::guard('nurse')->user()->name;
        $diagnosis->date = Carbon::now();
        $diagnosis->diagnosis = $request->diagnosis;
        $diagnosis->isHealthy = $request->isHealthy;
        $diagnosis->problems = $request->problem;
        $diagnosis->medications = $request->medications;

        $diagnosis->update();

        return redirect()->back();
    }
}
