<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{
    public function index(){

        $feedbacks = Feedback::with('user')->get();
        return view('admin.feedback.index', compact('feedbacks'));
    }
}
