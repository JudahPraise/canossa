<?php

namespace App\View\Components;

use App\User;
use Illuminate\View\Component;

class Avatar extends Component
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $user = User::where('id','=',$this->id)->with('personal')->first();
        return view('components.avatar', compact('user'));
    }
}
