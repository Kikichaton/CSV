<?php
/*
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

*/

$file = fopen("gradebook-export.csv","r");
$i=0;
while(! feof($file)) {
    $i++;
    //print_r(fgetcsv($file));
    $data[i]=fgetcsv($file);
    print_r($data[i]);

    ?> <br></br> <?php
}
while(! feof($file)) {
    $data[i]=fgetcsv($file);
    print_r($data[i]);}
fclose($file);
?>
    if (!file_exists($filename)) {
    $writer->save('jajaja.xlsx');
    $verifname=1;
    } if(file_exists($filename)){
    $i=1;
    $verifname=0;

    }
    while ($verifname<1){
    $newfilename="jajaja"." (".$i.").xlsx";
    if (!file_exists($newfilename)){
    $filename=$newfilename;
    $writer->save($filename);
    echo ($newfilename);
    ?> <br> <?php
$verifname=2;
}
$i++;
}

