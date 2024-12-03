<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class HistoryExport implements FromCollection, WithHeadings, WithColumnWidths, WithColumnFormatting
{
    public function __construct(private $collection) {}

    public function collection()
    {
        return $this->collection->map(function ($item, $index) {
            return [
                $index + 1,
                $item->created_at->format('Y-m-d'),
                $item->created_at->format('H:i'),
                $item->device->name,
                $item->value,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'No',
            'Tanggal',
            'Waktu',
            'Perangkat',
            'Nilai',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'B' => 15,
            'D' => 10,
        ];
    }

    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_DATE_YYYYMMDD,
            'E' => NumberFormat::FORMAT_NUMBER_00,
        ];
    }
}
