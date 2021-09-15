<?php

namespace App\Http\Controllers\Medical;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Hospitalization;

class HospitalizationController extends Controller
{
    public function store(Request $request, $id)
    {
        $hospital = new Hospitalization();

        $hospital->employee_id = $id;
        $hospital->disease = $request->disease;
        $hospital->d_date = $request->d_date;
        $hospital->operation = $request->operation;
        $hospital->o_date = $request->o_date;
        $hospital->medication = $request->medication;

        $hospital->save();

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $hospital = Hospitalization::where('id','=',$id)->first();

        $hospital->employee_id = $hospital->employee_id;
        $hospital->disease = $request->disease;
        $hospital->d_date = $request->d_date;
        $hospital->operation = $request->operation;
        $hospital->o_date = $request->o_date;
        $hospital->medication = $request->medication;

        $hospital->update();

        return redirect()->back();
    }
}
