<?php

namespace App\Http\Controllers\Employee\Portfolio;

use App\VoluntaryWork;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VoluntaryWorksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voluntary = VoluntaryWork::where('user_id','=',Auth::user()->id)->first();
        if($voluntary === null){
            return view('employee.portfolio.voluntary-work.empty');
        }else{
            return redirect()->route('voluntary.show', Auth::user()->id);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.portfolio.voluntary-work.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $voluntaries = [];

        foreach($request->name_address as $item => $key){
            $voluntaries[] = ([
                'user_id' => Auth::user()->id,
                'name_address' => $request->name_address[$item],
                'duration' => $request->duration[$item],
                'no_hours' => $request->no_hours[$item],
                'position' => $request->position[$item],
            ]);
        }

        VoluntaryWork::insert($voluntaries);

        return redirect()->route('voluntary.show', Auth::user()->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $voluntaries = VoluntaryWork::where('user_id','=',$id)->get();
        return view('employee.portfolio.voluntary-work.show', compact('voluntaries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $voluntaries = VoluntaryWork::where('user_id','=',$id)->get();
        return view('employee.portfolio.voluntary-work.edit', compact('voluntaries'));
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
        VoluntaryWork::where('user_id','=',$id)->delete();

        $voluntaries = [];

        foreach($request->name_address as $item => $key){
            $voluntaries[] = ([
                'user_id' => Auth::user()->id,
                'name_address' => $request->name_address[$item],
                'duration' => $request->duration[$item],
                'no_hours' => $request->no_hours[$item],
                'position' => $request->position[$item],
            ]);
        }

        VoluntaryWork::insert($voluntaries);

        return redirect()->route('voluntary.show', Auth::user()->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        VoluntaryWork::where('id','=',$id)->delete();
        return redirect()->back();
    }
}
