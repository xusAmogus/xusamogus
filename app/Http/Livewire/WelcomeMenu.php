<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Blog;

class WelcomeMenu extends Component
{
    public $searchTerm;

    public function render()
    {
        return view('livewire.welcome-menu');
    }

    

    public function updatedSearchTerm()
    {
       $this->emit('search', $this->searchTerm);
    }

    
}
