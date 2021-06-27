<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Feedback::where('user_id','=',Auth::user()->id)->first();
        return view('employee.feedback.index', compact('user'));
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
        Feedback::create([
            'user_id' => Auth::user()->id,
            'feedback' => $request->input('feedback'),
            'suggestion' => $request->input('suggestion')
        ]);

        return redirect()->route('employee.logout');
    }

    public function storeToFeedback(Request $request)
    {
        Feedback::create([
            'user_id' => Auth::user()->id,
            'feedback' => $request->input('feedback'),
            'suggestion' => $request->input('suggestion')
        ]);

        return redirect()->route('feedback.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Feedback::where('user_id','=',$id)->update([
            'user_id' => Auth::user()->id,
            'feedback' => $request->input('feedback'),
            'suggestion' => $request->input('suggestion')
        ]);

        return redirect()->route('feedback.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        //
    }
}
