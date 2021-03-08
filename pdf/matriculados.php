<?php 
	include ("../conexion/conexion.php");
if (!isset($_SESSION)) {
		session_start();
	}
	
    
	$cedula= $_GET['id'];
	$permiso = $_GET['prm'];
    
		//si la conexion no exista nos redirige al login
		if (!isset($_SESSION['rol'])) {
			header("location: ../inicio_sesion/index.php");
		}
		//si no esta logueado como estudiante
		elseif ($_SESSION['rol'] != $_GET['prm']) {
			header("location: ../inicio_sesion/index.php?id=$cedula&prm=$permiso");
		}
require ("mc_table.php");

$grado = $_GET['grado'];
$letra = $_GET['letra'];

$query = mysqli_query($conn,"SELECT * FROM matricula WHERE Grado ='$grado' AND Letra = '$letra'");
$pdf = new PDF_MC_Table();
$pdf->AliasNbPages();// para  mostrar el numero total de paginsas
$pdf->Addpage();// añadir paginas nueva
$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(189, 195, 199);
$pdf->SetXY(23,20);
$pdf->Cell(40,6,'Nombre',1,0,'C',1);
$pdf->Cell(40,6,'Apellido',1,0,'C',1);
$pdf->Cell(40,6,'Cedula',1,0,'C',1);
$pdf->Cell(40,6,'Grado',1,1,'C',1);
while($row = mysqli_fetch_assoc($query)){
	$pdf->SetX(23);
	$pdf->Cell(40,6,$row['Nombre'],1,0,'C');
	$pdf->Cell(40,6,$row['Apellido'],1,0,'C');
	$pdf->Cell(40,6,$row['Cedula'],1,0,'C');
	$pdf->Cell(40,6,utf8_decode($row['Grado'].' - '. $row['Letra']),1,1,'C');

}
$pdf->Output();//mostrar o imprimir resultado de pdf
 ?>