<?php 

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Log;

class ThirdSheetImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach($rows as $row) {
           // Log::info($row);
        }
    }
}