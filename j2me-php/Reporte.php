<?php
 
    //inclusion de libreria MyFPDF
    include('MyFPDF.php');
	
	
	//conexion base de datos
	$conexion = mysql_connect("localhost", "root", "");
	
	//valida si se puede estrablecer la conexion al servidor
	if (!$conexion){
	   echo "Error al intentar conectarse con el servidor MySQL";
	   exit();
	}
	else{
	 	 //selecciono la base de datos
		 mysql_select_db("dbmensajes", $conexion); 
		 
		 //realiza la sentencia SQL
		 $sqlQuery = "select Nombre, Apellido, Mensaje, Estado from mensajes where Estado='activo' or Estado='ACTIVO' ";
						
	}//fin del else


	//se ejecuta el query
	$resultado = mysql_query($sqlQuery, $conexion) or die(mysql_error());
  
 
   //inclusión de rutinas para crear informes PDF
   $pdf=new MyFPDF();
   $pdf->AddPage('L');
   $pdf->SetFont('Arial','B',11);
   $pdf->Cell(0,8,"DATOS DEL MENSAJE",0,0,'C',0);
   $pdf->Cell(0,20,"",0,1,'',0);

    //titulos de las columnas
    $pdf->SetTextColor(0,0,0); //rgb	
    $pdf->Cell(50,5,'Nombre',1,0,'C');	
	$pdf->Cell(50,5,'Apellido',1,0,'C');	
	$pdf->Cell(50,5,'Mensaje',1,0,'C');	
	$pdf->Cell(50,5,'Estado',1,1,'C');	
		
    $pdf->SetFont('Arial','',10);

    //impresion de datos obtenidos desde la BD
	 while($row = mysql_fetch_array($resultado)){          
  	      
          $pdf->Cell(50,4,$row["Nombre"],1,0,'C');
		  $pdf->Cell(50,4,$row["Apellido"],1,0,'C');
	      $pdf->Cell(50,4,$row["Mensaje"],1,0,'C');
		  $pdf->Cell(50,4,$row["Estado"],1,1,'C');

		  
      }//fin del while	
    
     //libera memoria
 	mysql_free_result ($resultado);

    //genera el PDF en el Navegador
    $pdf->Output();  
	//envia el reporte a la ruta dada
	//$pdf->Output("d:reporte.pdf");  
?>
