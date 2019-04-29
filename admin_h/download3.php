<?php
$d_id =$_GET['id'];


require_once("dbcontroller.php");
$db_handle = new DBController();
$result = $db_handle->runQuery("Select first_name , last_name from personal_details where id = '$d_id'");

require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);		

$pdf->Cell(40, 10, 'test', 1, 0, 'L', FALSE);
$pdf->Cell(40, 10, 'Description', 1, 0, 'L', FALSE);
$pdf->Cell(40, 10, 'demo', 1, 0, 'L', FALSE);
foreach($result as $row) {
	$pdf->SetFont('Arial','',12);	
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(25,12,$column,1);
}
$pdf->Output();

?>
