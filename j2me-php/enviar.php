<?php


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
		 $sqlQuery = "select cedula, nombre, apellido, direccion, telefono, email from infoestudiante";
						
	}//fin del else


	//se ejecuta el query
	$resultado = mysql_query($sqlQuery, $conexion) or die(mysql_error());
  

      if ($row = mysql_fetch_array(	$resultado ) ){

	   //obtiene los datos	
          echo   "Cedula   : ". $row["cedula"]. "\n";
	    echo   "Nombre   : ". $row["nombre"]. "\n";
	    echo   "Apellido : ". $row["apellido"]. "\n";
	    echo   "Direccion: ". $row["direccion"]. "\n";
	    echo   "Telefono : ". $row["telefono"]. "\n";
	    echo   "Email    : ". $row["email"]. "\n";

      }//fin del if


?>
