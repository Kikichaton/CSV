<?php


$filename = 'jajaja.xlsx';

if (file_exists($filename)) {
    echo "Le fichier $filename existe.";
} else {
    echo "Le fichier $filename n'existe pas.";
}
?>
<br>
<?php
$i=1;
$newfilename="jajaja"." (".$i.") .xlsx";
echo ($newfilename);
/*
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
 */
?>