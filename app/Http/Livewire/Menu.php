<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Menu extends Component
{
    public function render()
    {
        return view('livewire.menu');
    }

    public function toggle() {
        $this->emitTo('permissions','toggle');
    }
    
}
