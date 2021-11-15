<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ShowLabtest extends Component
{
    public $file;
    public $modal;

    public function __construct($file, $modal)
    {
        $this->file = $file;
        $this->modal = $modal;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.show-labtest');
    }
}
