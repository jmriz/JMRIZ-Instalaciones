<?php 

	ob_start();


	if(isset($_GET["usuar"]))  { // ESTA DEFINIDA Viene de sesion.php
                                    
                                    $_SESSION['usuario'] = $_GET["usuar"]; 
                                    $usuario = $_SESSION['usuario'];  

    } else { // NO ESTA DEFINIDA
                
                $_SESSION['usuario'] = "Sin Registar";  // Modificado 24/10/2024
                $usuario = $_SESSION['usuario'];  
    }    

	require('conexionBD.php');
	//echo "Conexión realizada con éxito (acceso.php)<br>";

	// CONEXION 01

	unset($enlace);
	unset($mysqli);

	// INICIO RECOGIDA DE VARIABLES DEL FORMULARIO 

	$tusuario = strtolower($_POST['usuario']); 
	$tucontra = $_POST['contra'];

	// FIN RECOGIDA DE VARIABLES DEL FORMULARIO 

	// encripto el password
	$tucontraseña = hash_hmac('sha512',$tucontra, 'primeraweb');

	$sql_1 = 'SELECT Usuario, Password, Rol FROM tusuarios';
	$usuarios = $conexion->query($sql_1);

	unset($conexion);
	unset($sql);
	
	// echo "tu usuario: " . $tusuario . " " . $tucontraseña . "<br>";

	foreach ($usuarios ?: [] as $u) {
	//foreach ($usuarios as $u) {	

		$us = $u['Usuario'];
		$pa = $u['Password'];

		// echo $us . " " . $pa . "<br>";	

		if (($us == $tusuario) && ($pa == $tucontraseña)) { 

				echo "correcto <br>";
				header("Location:../index.php?usuar=$us", true, 301);

				exit(); 

		}
						
	}
		

	echo "<br><br><center>";

	echo "<div class='cuadrado' style='position: relative;left: 120;width: 700px; height: 250px; border: 1px solid #000; background-color:  #f9e79f'>";

	echo "<p  style='text-indent: 70px;'>Se ha intentado conectar como <strong>Usuario: <span style='font-size:35px;color: blue;'>" . $_POST['usuario'] . "</strong></span></p><br/>";

	echo "<p  style='text-indent: 70px;'><span  style='font-size:25px; color: red;'>El usuario no existe o la clave es incorrecta. </span></p><br>";
	echo "<p  style='text-indent: 70px;'><span style='font-size:25px; border-radius: 5px 5px 5px 5px; background-color: orange; color: black;'><a href='sesion.php'>&ensp;Vuelva a intentarlo&ensp;</a></span></p></div>";

	echo "</center><br><br>";
	
?>


<!DOCTYPE html>
<html lang="es">  

    <head>
		<title>JMRIZ Instalaciones</title>
		<meta content="JoseManuel_RodriguezIzquierdo" name="Author">
		<meta name="description" content="La mejor web de Fontaneria en Avilés - Principado de Asturias(España) tanto para instalación en obra nueva, reforma o reparaciones de fontanería y calefacción">	
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<link rel="stylesheet" href="../css/fontello.css">
		<link rel="stylesheet" href="../css/estilo.css"> 
		
		 
    </head>

    <body>	
	
    	<header>

        	<div id="titulo">
        		<figure>
					<img src="../imagenes_video/oip.png" alt="logo">
				</figure>
				<h1>J.M.R.IZ. <br>Instalaciones&ensp;</h1>

				<p>&ensp;&ensp;&ensp;
    			
				</p>
			</div>	

		</header>

	<!-- <nav>

			<ul>
		 		<li><</li>
				<li></li>
				<li></li>
				<li></li>
			</ul>	
		</nav>  -->

		<br>
        
        <section>

			<article>
<html>
<head>
	<meta charset="utf-8" />
	<title></title>
</head>
<body>

</article>

		</section>

        <aside id="info">
            <h3>Cuida del medio ambiente</h3>
            <div class="contenedor">
                <div class="info-imagenes">
                	<figure>
                        <img src="../imagenes_video/instalacion01.jpg" alt="Intalacion">
                	</figure>
                    <h4>Viviendas <br>Unifamiliares</h4>
                </div>

                <div class="info-imagenes">
                	<figure>
                        <img src="../imagenes_video/suelo_radiante.jpg" alt="Suelo Radiante">
                	</figure>
                    <h4>Suelo Radiante</h4>
                </div>

                <div class="info-imagenes">
                	<figure>
                    	<img src="../imagenes_video/sala_calderas.jpg" alt="Sala Calderas">
                	</figure>
                    <h4>Sala Calderas</h4>
                </div>

                <div class="info-imagenes">
                	<figure>
                    	<img src="../imagenes_video/bateria_contadores.jpg" alt="Batería de Contadores">
                	</figure>
                    <h4>Batería <br>Contadores</h4>
                </div>
            </div>
        </aside><br> 
		
        <footer>
			<div class="contenedor">
				<p class="copy"><b>J.M.R.IZ - Instalaciones &copy; 2024</b></p>
				<div class="sociales">
					<a class="icon-facebook" href="https://www.facebook.com" target="_blank" rel="noopener noreferrer"></a>
					<!-- <a class="icon-instagram" href="#"></a> -->
                    <?php echo"<a class='icon-phone' href='index03.php?usuar=$usuario' rel='noopener noreferrer'></a>";?>
					<a class="icon-whatsapp" href="https://api.whatsapp.com/send?phone=34666000000" target="_blank" rel="noopener noreferrer"></a>
				</div>
			</div>
        </footer> 

		<!-- JavaScript -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
<html>
