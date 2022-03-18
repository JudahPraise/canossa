<?php

namespace App\Http\Controllers\Employee\Portfolio\Family;

use App\Family;
use App\Children;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChildrenController extends Controller
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
        return view('employee.portfolio.family-background.children.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $children =[];

        foreach ($request->name as $item => $key) {
            $children[] = ([
                'family_id' => Auth::user()->family->id,
                'name' => $request->name[$item],
                'date_of_birth' => $request->date_of_birth[$item],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        Children::insert($children);

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
        // $family = Family::where('user_id','=',$id)->with('children')->get();
        // $children = $family->children;
        // dd($children);
        // return view('employee.portfolio.family-background.children.show', compact('children'));
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
        $family = Family::where('user_id','=',$id)->with('children')->get();
        $children = $family->first()->children;
        return view('employee.portfolio.family-background.children.edit', compact('children'));
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
        Children::where('family_id','=',$id)->delete();

        $children =[];

        foreach ($request->name as $item => $key) {
            $children[] = ([
                'family_id' => Auth::user()->family->id,
                'name' => $request->name[$item],
                'date_of_birth' => $request->date_of_birth[$item],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        Children::insert($children);

        $family = Family::where('id','=',Auth::user()->family->id)->update([
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('children.show', Auth::user()->id)->with('update', 'Record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $child = Children::where('id', $id)->first()->delete();
        return redirect()->route('children.show', Auth::user()->id)->with('delete', 'Record deleted successfully!');
    }
}
