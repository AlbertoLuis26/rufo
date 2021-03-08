<?php 

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
    include ("../conexion/conexion.php");
		
require ("mc_table.php");
//$id_usuario = $_GET['user'];

 $total_padres = 10.50;
$query = mysqli_query($conn,"SELECT * FROM matricula WHERE Cedula = '$cedula'");
while($row = mysqli_fetch_assoc($query)){
	$id_usuario = $row['id_usuario'];
	$id_matricula = $row['id_matricula'];
	$nombre = $row['Nombre'];
	$apellido = $row['Apellido'];
	$cedula = $row['Cedula'];
	$grado = $row['Grado'];
	$letra = $row['Letra'];
	$club = $row['Club'];
	$total_matricula = $row['Total_matricula'];
}
$query2 = mysqli_query($conn,"SELECT * FROM curso_matricula WHERE id_usuario = '$id_usuario'");

$pdf = new PDF_MC_Table();
$pdf->AliasNbPages();// para  mostrar el numero total de paginsas
$pdf->Addpage();// añadir paginas nueva
$pdf->image('../imagen/logo_rufo.jpg',8,5,50,50,'jpg');
$pdf->SetXY(90,20);
$pdf->SetFont('Arial','B',20);
$pdf->Write(5,utf8_decode('RECIBO DE MATRÍCULA'));
$pdf->SetFontSize(16);
$pdf->SetXY(120,30);
$pdf->Write(5, utf8_decode('N°'.$id_matricula));
$pdf->SetFontSize(11);
$pdf->SetXY(8,60);
$pdf->SetFillColor(189, 195, 199  );
$pdf->Cell(193,5,'',1,1,'C');
$pdf->SetX(8);
$pdf->Cell(28,7,'Nombre:',1,0,'L',1);
$pdf->Cell(70,7,$nombre,1,0,'C');
$pdf->Cell(28,7,'Apellido:',1,0,'l',1);
$pdf->Cell(67,7,$apellido,1,1,'C');
$pdf->SetX(8);
$pdf->Cell(193,5,'',1,1,'C');
$pdf->SetX(8);
$pdf->Cell(28,7,'Cedula:',1,0,'L',1);
$pdf->Cell(70,7,$cedula,1,0,'C');
$pdf->Cell(28,7,utf8_decode('Año:'),1,0,'l',1);
$pdf->Cell(67,7,utf8_decode($grado.' - '.$letra),1,1,'C');
$pdf->SetX(8);
$pdf->Cell(193,5,'',1,1,'C');
$pdf->SetXY(8,100);
$pdf->Cell(150,8,'Descripcion',1,0,'C',1);
$pdf->Cell(43,8,'Valor',1,1,'C',1);


$pdf->SetX(8);
$pdf->Cell(150,100,'',1,0,'L');
$pdf->Cell(43,100,'',1,1,'L');
$pdf->SetX(8);
$pdf->SetTextColor(227, 22, 22 );
$pdf->Cell(150,8,'TOTAL:',1,0,'R',1);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(43,8,'$'.$total_matricula,1,0,'C');

$pdf->SetXY(10,110);
$pdf->Cell(30,8,$club,0,0,'L');
$pdf->SetX(165);
$pdf->Cell(30,8,$total_padres,0,1,'C');
$pdf->SetY(118);
while($row2 = mysqli_fetch_assoc($query2)){
	$pdf->SetX(10);
	$pdf->Cell(30,8,$row2['Curso'],0,0,'L');
	$pdf->SetX(165);
	$pdf->Cell(30,8,$row2['precio'],0,1,'C');
}
$pdf->Output();//mostrar o imprimir resultado de pdf
 ?>