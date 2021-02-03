<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// $tools = new toolsManager();
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$row = 1;
$numero=0;
$lettre='A';
if (($handle = fopen("gradebook-export.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        $numero++;
        echo "<p> $num champs à la ligne $row: <br /></p>\n";
        $row++;
        for ($c=0; $c < $num; $c++) {
            echo $data[$c] . "<br />\n";
            $sheet->setCellValue($lettre.$numero, $data[$c]);
            $lettre++;
            $a=$lettre;

        }
        $lettre='A';
    }
    //je change la couleur des titres
    $sheet->getStyle('A1:AZ1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('9BC2E6');

//$sheet->getStyle('C1:F1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('BDD7EE');

//je change la taille de chacune des cellules
    foreach(range('A','Z') as $columnID) {
        $sheet->getColumnDimension($columnID)->setWidth(20);
    }
    foreach(range('1','100') as $columnID) {
        $sheet->getRowDimension($columnID)->setRowHeight(24);
        $writer = new Xlsx($spreadsheet);
        $writer->save('jajajajacount.csv');
    echo ($numero);
}}
?>