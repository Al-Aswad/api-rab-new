<?php

namespace App\Exports;

use App\Anggaran;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;
// use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

// class AnggaranExcel implements FromView, WithStyles, WithColumnWidths
class AnggaranExcel implements FromView, WithStyles, WithEvents, ShouldAutoSize
{
    public function view(): View
    {
        return view('anggaran', [
            'anggaran' => Anggaran::all()
        ]);
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            'C2'   => [
                'font' => [
                    'bold' => array('rgb' => 'FF0000')
                    // 'bold' => true,
                    // 'color' => array('rgb' => 'FF0000')
                ]
            ],

            // Styling a specific cell by coordinate.
            // 'B2' => ['font' => ['italic' => true]],

            // Styling an entire column.
            9  => [
                'font' => ['size' => 16],
                'alignment' => ['center']
            ],
            // $event->sheet->getStyle('9')->getAlignment()->applyFromArray(
            //     array('horizontal' => 'right') //left,right,center & vertical
            // );
            // Set alignment to center
            // 9=>setAlignment('center');
        ];
    }
    // public function columnWidths(): array
    // {
    //     return [
    //         'A' => 10,
    //         'B' => 10,
    //     ];
    // }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {
                $event->sheet->getDelegate()->getRowDimension('9')->setRowHeight(40);
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(10);
                $event->sheet->getDelegate()->getRowDimension('1')->setRowHeight(40);
                $event->sheet->getDelegate()->getStyle('9')
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('9')
                    ->getAlignment()
                    ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                $event->sheet->getDelegate()->getStyle('10')
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            }
        ];
    }
};
