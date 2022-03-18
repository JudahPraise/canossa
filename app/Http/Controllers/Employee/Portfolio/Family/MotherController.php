<?php

namespace App\Http\Controllers\Employee\Portfolio\Family;

use App\Family;
use App\Mother;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MotherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.portfolio.family-background.mother.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mother = Mother::create([
            'family_id' => Auth::user()->family->id,
            'surname' => $request->surname,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'occupation' => $request->occupation,
            'employer_business_name' => $request->employer_business_name,
            'business_address' => $request->business_address,
            'tel_no' => $request->tel_no,
        ]);

        $family = Family::where('id','=',Auth::user()->family->id)->update([
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('family.show', Auth::user()->id)->with('success', 'Record saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $family = Family::where('user_id','=',$id)->with('mother')->first();
        // $mother = $family->mother->first();
        // return view('employee.portfolio.family-background.mother.show', compact('mother'));
        return redirect()->route('family.show', Auth::user()->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $family = Family::where('user_id','=',$id)->with('mother')->first();
        return view('employee.portfolio.family-background.mother.edit', compact('family'));
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
        $mother = Mother::where('family_id','=',$id)->update([
            'family_id' => Auth::user()->family->id,
            'surname' => $request->surname,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'occupation' => $request->occupation,
            'employer_business_name' => $request->employer_business_name,
            'business_address' => $request->business_address,
            'tel_no' => $request->tel_no
        ]);

        $family = Family::where('id','=',Auth::user()->family->id)->update([
            'updated_at' => Carbon::now()
        ]);
        
        return redirect()->route('family.show', Auth::user()->id)->with('update', 'Record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
