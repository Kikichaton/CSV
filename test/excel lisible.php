<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$row = 0;
// on separe nos valeurs sans ;
if (($handle = fopen("gradebook-export.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        $num = count($data);
        /*  echo "<p> $num champs à la ligne $row: <br /></p>\n";

            for ($c=0; $c < $num; $c++) {
                echo $data[$c] . "<br />\n";
            }*/
        $colonnes=0;
        for ($c=0; $c < $num; $c++) {
            $colonnes++;
        }
        $row++;
    }
    echo $row.'<br/>'.$colonnes;
    fclose($handle);
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
        $writer->save('jajajaja.xlsx');
        echo ($numero);
        fclose($handle);
    }


}
?>




