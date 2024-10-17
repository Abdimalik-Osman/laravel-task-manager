<?php

namespace App\Exports;

use App\Models\Task;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TasksExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Task::all(); // Or apply filters as needed
    }

    public function headings(): array
    {
        return [
            'ID', 'Name', 'Description', 'Completed', 'Created At', 'Updated At',
        ];
    }
}
