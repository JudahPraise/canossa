<?php

namespace App\Http\Controllers\Medical;

use App\PersonalHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonalHistoryController extends Controller
{
    public function store(Request $request, $id)
    {
        $illness = new PersonalHistory();

        $illness->user_id = $id;
        $illness->illnesses = $request->illnesses;

        $illness->save();

        return redirect()->back()->with('success', 'Record save successfully!');
    }
}
