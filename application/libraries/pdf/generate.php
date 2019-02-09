<?php 
require('MC_Table.php');
$pdf=new MC_Table();
$pdf->AddPage();
$pdf->SetFont('Arial','',14);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(30,50,30,40));
  $pdf->Ln();
    $pdf->Row(array(
                array("Kolom 1"),
                array("Kolom 2"),
                array("Kolom 3"),
                array("Kolom 4")
    ));
    $pdf->Row(array(
                array("baris 1,1"),
                array("baris 1,2"),
                array("baris 1,3"),
                array("baris 1,4")
    ));
    $pdf->Row(array(
                array("baris 2,1 asdasdasdasdasdadasdasdasdsadasdasd"),
                array("baris 2,2"),
                array("baris 2,3"),
                array("baris 2,4")
    ));
    $pdf->Row(array(
                array("baris 3,1asdasdasdasdasdasdasdasdasdasdasdasdas"),
                array("baris 3,2"),
                array("baris 3,3"),
                array("baris 3,4")
    ));

$pdf->Output();
?>