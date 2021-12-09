<?php

namespace App\Http\Controllers\Medical;

use App\Medication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MedicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medications = Medication::all();
        return view('medical-record.medications.index', compact('medications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Medication::create([
            'name' => $request->name,
            'condition' => $request->condition,
            'strength' => $request->strength,
            'frequency' => $request->frequency
        ]);

        return redirect()->back()->with('success', 'Medicine saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Medication::where('id','=',$id)->update([
            'name' => $request->name,
            'condition' => $request->condition,
            'strength' => $request->strength,
            'frequency' => $request->frequency,
        ]);

        return redirect()->back()->with('update', 'Medicine updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medicine = Medication::where('id','=',$id)->first();
        $medicine->delete();
        return redirect()->back()->with('delete', 'Medicine deleted!');
    }
}
