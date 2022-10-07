<?php

namespace App\Http\Livewire\Generic;

use Livewire\Component;
use App\Models\Blog;

class Modal extends Component
{
    public $showModal = false;
    public $blog;
    protected $listeners =['modalcontent' => 'fillModal'];

    public function fillModal($blog)
    {        
        $this->blog = $blog;
        $this->showModal = true;
        
    }

    public function render()
    {
        return view('livewire.generic.modal');
    }
}
