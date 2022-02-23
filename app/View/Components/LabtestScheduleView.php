<?php

namespace App\View\Components;

use App\LabtestSchedule;
use Illuminate\View\Component;

class LabtestScheduleView extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $labtestSched = LabtestSchedule::latest()->first();
        // dd($labtestSched->date_from);
        return view('components.labtest-schedule', compact('labtestSched'));
    }
}
