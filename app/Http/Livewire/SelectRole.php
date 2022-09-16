<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log; 
class SelectRole extends Component
{
    

    public $role = " ";
    
    protected $rules = [

        'role' => 'required|min:3',


    ];
    
    public function render()
    {
        $roles = Role::all();
        return view('livewire.select-role', [ 'roles' => $roles ] );
    }

    public function updateRole(Role $role) {
        
        $this->role = $role;
    }
}
