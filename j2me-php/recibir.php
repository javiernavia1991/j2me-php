<?php 

	//obtiene los datos 
 
	$sbCedula     =$_GET['cedula'];
	$sbNombre     =$_GET['nombre'];
	$sbApellido   =$_GET['apellido'];
	$sbDireccion  =$_GET['direccion'];
	$sbTelefono   =$_GET['telefono'];
	$sbEmail      =$_GET['email']; 
	


	echo "DATOS ENVIADOS AL SERVIDOR\n" . " Cedula		:	".$sbCedula
										. " \nNombre	:	".$sbNombre   																							
										. " \nApellido	:	".$sbApellido
										. " \nDireccion	:	".$sbDireccion  																							
										. " \nTelefono	:	".$sbTelefono
										. " \nEmail		:	".$sbEmail;
									
	
	//conexion base de datos
	$conexion = mysql_connect("localhost", "root", "");

	
	//valida si se puede estrablecer la conexion al servidor
	if (!$conexion){
	   echo "Error al intentar conectarse con el servidor MySQL";
	   exit();
	}
	else{
		 
		 //selecciono la base de datos
		 mysql_select_db("dbestudiante", $conexion); 
		 
		 //realiza la sentencia SQL
		 $sqlQuery = "insert into infoestudiante 			
					 values('$sbCedula','$sbNombre','$sbApellido',
							'$sbDireccion','$sbTelefono','$sbEmail')"; 
							
	}//fin del else
		
	//se ejecuta el query
	$resultado = mysql_query($sqlQuery, $conexion) or die(mysql_error());

?>