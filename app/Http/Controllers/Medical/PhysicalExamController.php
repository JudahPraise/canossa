<?php

namespace App\Http\Controllers\Medical;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Nurse;
use App\PhysicalExam;

class PhysicalExamController extends Controller
{
    public function store(Request $request, $id)
    {
        $physical = new PhysicalExam();

        $physical->employee_id = $id;
        $physical->school_year = $request->school_year;
        $physical->height = $request->height;
        $physical->weight = $request->weight;
        $physical->bmi = $request->bmi;
        $physical->bp = $request->bp;
        $physical->rr = $request->rr;
        $physical->hr = $request->hr;

        $physical->save();

        return redirect()->back();
    }
}
