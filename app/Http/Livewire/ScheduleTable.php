<?php

namespace App\Http\Livewire;

use App\Models\Schedule;
use Livewire\Component;
use Illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ScheduleTable extends LivewireDatatable
{
    public $model = User::class;
   
    public function columns()
    {
        return [
            NumberColumn::name('id')->label('ID')->sortBy('id'),   
            DateColumn::name('datum')->label('Datum:')->sortable(),   
            Column::name('filmtitel')->label('Film Titel:'),   
            Column::name('zaalwacht')->label('Zaalwacht:'),
            Column::name('start')->label('Aanvang voorstelling:'),
            Column::name('end')->label('Einde voorstelling:')               
        ];
    }
}