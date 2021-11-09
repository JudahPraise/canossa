<?php

namespace App\View\Components;

use App\LabTest;
use Illuminate\View\Component;

class LabtestFile extends Component
{
   
    public $labtest;

    public function __construct($labtest)
    {
        $this->labtest = $labtest;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        // $labtests = LabTest::where('user_id','=',auth()->user()->id)->get();
        return view('components.lab-test');
    }
}
