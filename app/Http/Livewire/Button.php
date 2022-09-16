<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Button extends Component
{
    public $buttonText;

    public function mount($buttonText) {
        $this->buttonText = $buttonText;
    }

    public function buttonFunction() {

    }

    public function render()
    {
        return view('livewire.button');
    }
}
