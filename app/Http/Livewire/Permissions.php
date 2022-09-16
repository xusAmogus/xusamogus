<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Permissions extends Component
{
    public $toggle = false;
    protected $listeners = ['toggle' => 'toggle'];
 
    public function render()
    {
        return view('livewire.permissions');
    }

    public function toggle() {
        
        $this->toggle = !$this->toggle;
    }
    
}
