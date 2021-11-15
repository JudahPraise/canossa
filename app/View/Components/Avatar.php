<?php

namespace App\View\Components;

use App\User;
use Illuminate\View\Component;

class Avatar extends Component
{
    public $image;

    public function __construct($image)
    {
        $this->image = $image;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $user = User::where('id','=',auth()->user()->id)->with('personal')->first();
        return view('components.avatar', compact('user'));
    }
}
