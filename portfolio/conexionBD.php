<?php

		$cad_con = 'mysql:dbname=4473958_4473958;host=fdb1034.awardspace.net';
		$servername = 'fdb1034.awardspace.net';
		$username = '4473958_4473958';                 
		$password = 'M!pacies69';                      
  		$db_name =  '4473958_4473958';     	         

		// CONEXION 01

		// Creamos la conexión_01
		$conexion = new PDO($cad_con, $username, $password);

		// $conexion = true si se establece la conexion

  		if (!$conexion){

        				die("Conexion fallida: ".mysqli_connect_error());
  		}

  		// echo "Conexion exitosa!!";

  		// mysqli_close($conexion);



  		// CONEXION 02

  		// Creamos la conexión_02
  		$mysqli = new mysqli($servername,$username,$password,$db_name);
		if ($mysqli === false) {
								    die("ERROR: No fue posible conectarse con la base de datos. " . mysqli_connect_error());
		}


		// CONEXION 03

		// Creamos la conexión_03
		$enlace = mysqli_connect($servername,$username,$password,$db_name);

        					//Comprobamos si conecta
        					if (mysqli_connect_errno()){
           							 printf("Conexión fallida: %s\n", mysqli_connect_error());
            						exit();
        					}

?>