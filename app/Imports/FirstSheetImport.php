<?php 

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\HasReferencesToOtherSheets;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class FirstSheetImport implements ToCollection, HasReferencesToOtherSheets,WithCalculatedFormulas
{
    public function collection(Collection $rows)
    {
        foreach($rows as $row) {
            //Log::info($row);
        }
    }
}
