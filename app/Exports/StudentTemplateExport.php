<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class StudentTemplateExport implements WithHeadings
{
    public function headings(): array
    {
        return [
            'Name',
            'Level',
            'Class',
            'Parent Contact',
        ];
    }
}
