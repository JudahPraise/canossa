<?php

namespace App\View\Components;

use App\LabTest;
use Illuminate\View\Component;

class LabtestFile extends Component
{
   
    public $labtests;
    public $record;

    public function __construct($labtests, $record)
    {
        $this->labtests = $labtests;
        $this->record = $record;
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
