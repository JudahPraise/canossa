<?php

namespace App\View\Components;

use App\LabTest;
use Illuminate\View\Component;

class ShowLabtest extends Component
{
    public $file;
    public $modal;

    public function __construct($file, $modal)
    {
        $this->modal = $modal;
        $this->file = $file;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $labtest = LabTest::where('id','=',$this->modal)->first();
        return view('components.show-labtest', compact('labtest'));
    }
}
