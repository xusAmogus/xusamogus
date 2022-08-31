<?php

namespace App\Imports;


use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;


class ImportSchedule implements WithMultipleSheets,WithCalculatedFormulas
{
 
    public function sheets(): array
    {
        return [
            new FirstSheetImport(),
            new SecondSheetImport(),
            new ThirdSheetImport()
        ];
    }

    
}
