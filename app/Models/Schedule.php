<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = ['datum','filmtitel','zaalwacht'];

    public function getDayAttribute()
    {
        return $this->attributes['datum']->format('Y-m-d');
    }
}
