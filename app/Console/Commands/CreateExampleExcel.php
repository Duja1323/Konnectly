<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class CreateExampleExcel extends Command
{
    protected $signature = 'contacts:create-example-excel';
    protected $description = 'Create an example Excel file for contacts import';

    public function handle()
    {
        $this->info('Creating example Excel file...');

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        // Set headers
        $sheet->setCellValue('A1', 'name');
        $sheet->setCellValue('B1', 'email');
        $sheet->setCellValue('C1', 'phone');
        $sheet->setCellValue('D1', 'group');
        $sheet->setCellValue('E1', 'notes');
        
        // Add sample data
        $data = [
            ['John Doe', 'john.doe@example.com', '+33612345678', 'amis', 'Un ami de longue date'],
            ['Jane Smith', 'jane.smith@example.com', '+33687654321', 'famille', 'Ma cousine'],
            ['Robert Martin', 'robert.martin@example.com', '+33698765432', 'travail', 'Collègue du service marketing'],
            ['Alice Johnson', 'alice.johnson@example.com', '+33654321987', 'amis', 'Rencontrée à la conférence'],
            ['Thomas Dubois', 'thomas.dubois@example.com', '+33612378945', 'travail', 'Chef de projet'],
            ['Marie Leroy', 'marie.leroy@example.com', '+33678945612', 'famille', 'Ma soeur'],
        ];
        
        $row = 2;
        foreach ($data as $rowData) {
            $sheet->setCellValue('A' . $row, $rowData[0]);
            $sheet->setCellValue('B' . $row, $rowData[1]);
            $sheet->setCellValue('C' . $row, $rowData[2]);
            $sheet->setCellValue('D' . $row, $rowData[3]);
            $sheet->setCellValue('E' . $row, $rowData[4]);
            $row++;
        }
        
        // Auto size columns
        foreach (range('A', 'E') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }
        
        // Create the Excel file
        $writer = new Xlsx($spreadsheet);
        $filePath = public_path('examples/contacts_example.xlsx');
        $writer->save($filePath);
        
        $this->info('Example Excel file created at: ' . $filePath);
        
        return Command::SUCCESS;
    }
}
