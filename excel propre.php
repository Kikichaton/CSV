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
$nomfichier="jajajaPropre.xlsx";

//on vérifie si le nom du fichiers existe déja

//Si il n'existe pas on passe la boucle while
if (!file_exists($nomfichier)) {
    //$writer->save('jajajaPropre.xlsx');
    $verifname=2;
    echo ("existe pas");
    //sinon on rentre dans la boucle while
} if(file_exists($nomfichier)){
    $i=1;
    $verifname=0;
    echo ("existe");
}
//on vérifie si le nom du fichier (i) existe, si non on donne cette valeur au nom du fichiers, si oui on incrémente i
while ($verifname<1){
    $newnomdufichier="jajajaPropre"." (".$i.").xlsx";
    if (!file_exists($newnomdufichier)){
        $filename=$newnomdufichier;
        //$writer->save($nomfichier);
        $nomfichier=$newnomdufichier;
        $verifname=2;
    }
    $i++;
}

if (($handle = fopen("gradebook-export.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        $numero++;
        $row++;
        for ($c=0; $c < $num; $c++) {
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
        $writer->save($nomfichier);
    }}
?>