<?php



require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Hello World !');
//je change la couleur des titres
$sheet->getStyle('A1:AZ1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('9BC2E6');

//$sheet->getStyle('C1:F1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('BDD7EE');
0000000000000000
0//je change la taille de chacune des cellules
foreach(range('A','Z') as $columnID) {
    $sheet->getColumnDimension($columnID)->setWidth(20);
}
foreach(range('1','100') as $columnID) {
    $sheet->getRowDimension($columnID)->setRowHeight(24);
}


$writer = new Xlsx($spreadsheet);
$writer->save('test.csv');
?>