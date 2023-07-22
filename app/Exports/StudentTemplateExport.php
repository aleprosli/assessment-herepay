<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Faker\Factory as Faker;

class StudentTemplateExport implements WithHeadings
{
    public function headings(): array
    {
        return [
            [
                'Name',
                'Level',
                'Class',
                'Parent Contact',
            ],
            [
                'Aliff',
                '1',
                'Delima',
                '0135162634',
            ]
         ];
    }
}
