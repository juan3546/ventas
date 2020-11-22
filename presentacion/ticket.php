<?php
require('../Datos/fpdf.php'); 
date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'spanish');
$anio= date("Y");
$mes = date("m");
$dia = date("d");
$completo = ucwords(strftime(" %d %B %G",strtotime($dia."-". $mes."-".$anio)));
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10, $completo);
$pdf->Output();
?>