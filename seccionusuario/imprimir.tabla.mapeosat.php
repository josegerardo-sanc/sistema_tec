<?php 
include '../fpdf/fpdf.php';
include 'class_mapeosat.php';
$mapeosat = new mapeo();

$valor = $_GET['valor'];
$area = $_GET['area'];
class PDF extends FPDF
{
	function Header()
	{
	    $this->SetFont('Arial','B',15);
	    $this->SetFont('Arial','',12);
	    $this->Image('../img/logo.jpg',10,6,22);
	    $this->Cell(280,10,utf8_decode('SADCTI'),0,0,'C');
	    $this->Ln(5);
	$this->Cell(280,10,utf8_decode('Diseño y Desarrollo Tecnológico  Para La SADCTI Tabasco "1".'),0,0,'C');
	    $this->Ln(5);
	    $this->Cell(280,10,utf8_decode('Mapeo SAT'),0,0,'C');
	    $this->Ln(20);
	}
}
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L');

$cm = "";
if ($valor == 0 AND $area == "") {
	$cm = $mapeosat->select("SELECT * FROM `mapeosat` M INNER JOIN situacionnodo S ON M.idsituacionnodo = S.idsituacionnodo");
}
if ($valor != 0 AND $area == "") {
	$cm = $mapeosat->select("SELECT * FROM mapeosat M INNER JOIN situacionnodo S ON M.idsituacionnodo = S.idsituacionnodo  WHERE M.idsituacionnodo = '$valor'");
}
if ($valor != 0 AND $area != "") {
	$cm = $mapeosat->select("SELECT * FROM mapeosat M INNER JOIN situacionnodo S ON M.idsituacionnodo = S.idsituacionnodo  WHERE M.area = '$area' AND  M.idsituacionnodo = '$valor'");
}
$filas = mysqli_num_rows($cm);
$pdf->SetFont('Arial','B',8);
// $pdf->Cell(168,5,'',1,0,'J');
$pdf->Cell(235,5,'',0,0,'J');
$pdf->Cell(45,5,utf8_decode('Total de registro: '.$filas),0,0,'C');
$pdf->SetFont('Arial','B',6);
$pdf->Ln();
$pdf->Cell(20,5,'Nomeclaturado',1,0,'J');
$pdf->Cell(20,5,'Ubicacion Switch',1,0,'J');
$pdf->Cell(17,5,'N.patch Panel',1,0,'J');
$pdf->Cell(24,5,'N.Puerto Patch Panel',1,0,'J');
$pdf->Cell(15,5,'N.Switch',1,0,'J');
$pdf->Cell(20,5,'Serie Switch',1,0,'J');
$pdf->Cell(15,5,'P.Switch',1,0,'J');
$pdf->Cell(20,5,'Tipo de Equipo',1,0,'J');
$pdf->Cell(20,5,'Administracion',1,0,'J');
$pdf->Cell(20,5,'Area',1,0,'J');
$pdf->Cell(10,5,'Vlan',1,0,'J');
$pdf->Cell(20,5,'Actividad',1,0,'J');
$pdf->Cell(35,5,'Observaciones',1,0,'J');
$pdf->Cell(20,5,'Situacion Nodo',1,0,'J');
$pdf->Ln();
$pdf->SetFont('Arial','',7);
while ($a = mysqli_fetch_row($cm)) {
		$pdf->Cell(20,5,utf8_decode($a[1]),1,0,'J');
		$pdf->Cell(20,5,utf8_decode($a[2]),1,0,'J');
		$pdf->Cell(17,5,utf8_decode($a[3]),1,0,'J');
		$pdf->Cell(24,5,utf8_decode($a[4]),1,0,'J');
		$pdf->Cell(15,5,utf8_decode($a[5]),1,0,'J');
		$pdf->Cell(20,5,utf8_decode($a[6]),1,0,'J');
		$pdf->Cell(15,5,utf8_decode($a[7]),1,0,'J');
		$ce = $mapeosat->select("SELECT * FROM `tipoequipo` WHERE idtipoequipo = '$a[8]'");
		$ae = mysqli_fetch_row($ce);
		$pdf->Cell(20,5,utf8_decode($ae[1]),1,0,'J');
		$ca = $mapeosat->select("SELECT * FROM `administracion` WHERE idadministracion  = '$a[9]'");
		$aa = mysqli_fetch_row($ca);
		$pdf->Cell(20,5,utf8_decode($aa[1]),1,0,'J');
		$pdf->Cell(20,5,utf8_decode($a[10]),1,0,'J');
		$pdf->Cell(10,5,utf8_decode($a[11]),1,0,'J');
		$caa = $mapeosat->select("SELECT * FROM `actividad` WHERE idactividad = '$a[12]'");
		$aaa = mysqli_fetch_row($caa);
		$pdf->Cell(20,5,utf8_decode($aaa[1]),1,0,'J');
		$pdf->Cell(35,5,utf8_decode($a[13]),1,0,'J');
		$pdf->Cell(20,5,utf8_decode($a[16]),1,0,'J');
		$pdf->Ln();
}
$pdf->Output();
 ?>