<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;
use Carbon\Carbon;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = ['datum','filmtitel','zaalwacht','start','eind','year','week'];

}
