<?php

namespace App\Http\Livewire;

use App\Schedule;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ScheduleTable extends LivewireDatatable
{
    public $model = Schedule::class;

    public function columns()
    {
        //
    }
}