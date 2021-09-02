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

        $problems =[];

        foreach ($request->problem as $item => $key) {
            $problems[] = ([
                'user_id' => $id,
                'problem' => $request->problem[$item],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        HealthProblem::insert($problems);

        $diagnosis->employee_id = $id;
        $diagnosis->nurse = Auth::guard('nurse')->user()->name;
        $diagnosis->diagnosis = $request->diagnosis;

        $diagnosis->save();

        return redirect()->back();
    }
}
