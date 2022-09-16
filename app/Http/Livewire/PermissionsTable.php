<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissionsTable extends LivewireDatatable
{
    

    public function builder()
    {
        return User::query()->with('roles');
    }

    public function columns(): array
    {
         return [
            
            Column::name('name')->label('User name:')->sortable()
            ->searchable(),
            Column::name('roles.name')->label('Role:')->sortable()
            ->searchable(),
            Column::callback(['id'], function($id){
                
                return view('tables.permissions.actions.select-role',['id' => $id]);
                
            })
        ];
    }
    
}