<?php

namespace App\Http\Controllers\Medical;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LabTest;
use App\User;

class LabTestController extends Controller
{
    public function index()
    {
        $employees = User::with('labTest')->paginate(15);
        return view('medical-record.lab-test.index', compact('employees'));
    }
}
