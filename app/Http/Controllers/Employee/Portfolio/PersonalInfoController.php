<?php

namespace App\Http\Controllers\Employee\Portfolio;

use App\User;
use App\PersonalInformation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PersonalInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personal = PersonalInformation::where('user_id','=',Auth::user()->id)->first();
        if($personal === null){
            return view('employee.portfolio.personal-information.empty', compact('personal', $personal));
        }else{
            return view('employee.portfolio.personal-information.show', compact('personal', $personal));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.portfolio.personal-information.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $personal = PersonalInformation::create([
            'user_id' => auth()->user()->id,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'surname' => $request-> surname, 
            'date_of_birth' => $request->date_of_birth,
            'sex' => $request->sex,
            'citizenship' => $request->citizenship,
            'civil_status' => $request->civil_status,
            'height' => $request->height,
            'weight' => $request->weight,
            'blood_type' => $request->blood_type,
            'address' => $request->address,
            'zip_code' => $request->zip_code,
            'tel_number' => $request->tel_number,
            'cell_number' => $request->cell_number,
            'email_address' => $request->email_address,
            'prc' => $request->prc,
            'gsis' => $request->gsis,
            'sss' => $request->sss,
            'pag_ibig' => $request->pag_ibig,
            'driver_license' => $request->driver_license,
            'phil_health' => $request->phil_health
        ]);

        User::where('id','=',Auth::user()->id)->update([
            'name' => $personal->fullName()
        ]);

        return redirect()->route('personal.index');
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
        $personal = PersonalInformation::where('user_id','=',Auth::user()->id)->first();
        return view('employee.portfolio.personal-information.edit', compact('personal', $personal));
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
        $personal = PersonalInformation::where('user_id','=',$id)->update([
            'user_id' => auth()->user()->id,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'surname' => $request->surname, 
            'date_of_birth' => $request->date_of_birth,
            'sex' => $request->sex,
            'citizenship' => $request->citizenship,
            'civil_status' => $request->civil_status,
            'height' => $request->height,
            'weight' => $request->weight,
            'blood_type' => $request->blood_type,
            'address' => $request->address,
            'zip_code' => $request->zip_code,
            'tel_number' => $request->tel_number,
            'cell_number' => $request->cell_number,
            'email_address' => $request->email_address,
            'prc' => $request->prc,
            'gsis' => $request->gsis,
            'sss' => $request->sss,
            'pag_ibig' => $request->pag_ibig,
            'driver_license' => $request->driver_license,
            'phil_health' => $request->phil_health
        ]);

        User::where('id','=',Auth::user()->id)->update([
            'name' => $request->surname.','.' '.$request->first_name.','.' '.$request->middle_name
        ]);

        return redirect()->route('personal.index');
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
