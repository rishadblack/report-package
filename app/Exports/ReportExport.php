<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class ReportExport implements FromView, ShouldAutoSize, WithEvents
{
    public string $currentView;
    public array $currentData = [];

    public function view(): View
    {
        return view($this->currentView, $this->currentData);
    }

    public function setCurrentView($currentView)
    {
        $this->currentView = $currentView;
        return $this;
    }

    public function setCurrentData($currentData)
    {
        $this->currentData = $currentData;
        return $this;
    }

    // public function drawings()
    // {
    //     $drawing = new Drawing();
    //     $drawing->setName('Logo');
    //     $drawing->setDescription('This is my logo');
    //     $drawing->setPath(public_path('images/logo.png'));
    //     $drawing->setHeight(90);
    //     $drawing->setCoordinates('A1'); // Adjust coordinates for centering
    //     $drawing->setOffsetX(200); // Offset X to center the image more accurately

    //     return [$drawing];
    // }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet;

                // Merge cells for the logo row to span across columns
                $sheet->mergeCells('A1:C1');

                // Center the image and text in the merged cells
                $sheet->getStyle('A1:C1')->applyFromArray([
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);


                // Adjust column widths to help center the content
                $sheet->getColumnDimension('A')->setWidth(30);
                $sheet->getColumnDimension('B')->setWidth(30);
                $sheet->getColumnDimension('C')->setWidth(30);

                // Adjust the row height to fit the logo
                $sheet->getRowDimension(1)->setRowHeight(90);

                // // Apply styles to other rows if needed (e.g., headers)
                $sheet->getStyle('A2:C2')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 14,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ]);
            },
        ];
    }
}
