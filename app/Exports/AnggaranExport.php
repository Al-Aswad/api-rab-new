<?php

namespace App\Exports;

use App\Anggaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
// use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class AnggaranExport implements FromCollection, WithHeadings,WithMapping, WithEvents, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // dd(Anggaran::all());
        return Anggaran::all();
    }

   

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            'A1:C1'   => ['font' => ['bold' => true]],

            // Styling a specific cell by coordinate.
            // 'B2' => ['font' => ['italic' => true]],

            // // Styling an entire column.
            // 'C'  => ['font' => ['size' => 16]],
        ];
    }

    public function headings(): array
    {
        return [
            // '#',
            // 'Email',
            // 'Country',
            'A1:L1' => "Rancangan Anggaran Biaya"
        ];
    }

    public function map($anggaran):array{
        return[
            $anggaran->uraian,
            $anggaran->volume,
            $anggaran->satuan,
            $anggaran->harga_satuan,
            $anggaran->jumlah_total,
        ];
    }

    public function registerEvents(): array
    {
        return[
            AfterSheet::class=> function(AfterSheet $event){
                
                $event->$sheet->mergeCells('A1:E1');
                // $event->sheet->getDelegate()->getStyle($cellRange)->mergeCells()->setSize(14)
                // $spreadsheet->getStyle()->mergeCells('A18:E22');

                $event->sheet->getStyle('A1:C1')->applyFromArray([
                    'font'=>[
                        'bold'=>true,
                        'color' => 'fff000'
                    ]
                    ]);
            }
            // AfterSheet::class => function(AfterSheet $event) {
            //     // $event->sheet->getDelegate()->mergeCells('A1:E1');
            //     $event->$sheet->getActiveSheet()->mergeCells('A18:E22');
            //  },
        ];
    }
}
