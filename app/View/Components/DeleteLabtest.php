<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DeleteLabtest extends Component
{
    public $file;

    public function __construct($file)
    {
        $this->file = $file;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.delete-labtest');
    }
}
