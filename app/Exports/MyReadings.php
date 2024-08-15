<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use Illuminate\Contracts\View\View;

class MyReadings implements FromView, WithStyles, WithHeadings, ShouldAutoSize, WithTitle
{
    private $readings;
    private $description;

    public function __construct(Collection $data, $description)
    {
        $this->readings = $data;
        $this->description = $description;
    }

    public function view(): View
    {
        return view('pages.reports.exports.excel', [
            'readings' => $this->readings,
        ]);
    }

    public function headings(): array
    {
        return [];
    }
    public function styles(Worksheet $sheet)
    {}
    public function title(): string
    {
        return 'Scale Reading Report'; // Set the document title
    }

    public function description(): string
    {
        return $this->description; // Set the document description
    }
}
