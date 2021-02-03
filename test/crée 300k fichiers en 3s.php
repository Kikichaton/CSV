<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$filename="jajaja.xlsx";
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
        if (!file_exists($filename)) {
            $writer->save('jajaja.xlsx');
            $verifname=1;
        } if(file_exists($filename)){
            $i=1;
            while ($verifname=1){
                $newfilename="jajaja"." (".$i.") .xlsx";
                if (!file_exists($newfilename)){
                    $writer->save($newfilename);
                    $verifname=1;
                }
                $i++;
            }
        }
        //$writer->save('jajaja.xlsx');
    }


}
?>




