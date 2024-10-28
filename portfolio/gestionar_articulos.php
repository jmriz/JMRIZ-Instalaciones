<?php

	ob_start();

	session_start();

	if(isset($_GET["usuar"]))  { // ESTA DEFINIDA Viene de sesion.php
                                    
                                    $_SESSION['usuario'] = $_GET["usuar"]; 
                                    $usuario = $_SESSION['usuario'];  

    } else { // NO ESTA DEFINIDA
                
                $usuario = $_SESSION['usuario'];  
            }  
	
    if(isset($_REQUEST["cerrar"])){
                                     $_SESSION['usuario'] = "Sin Registar"; 
                                     $usuar = $_SESSION['usuario'];
                                     $usuario = "Sin Registar";           
                                     
                                     header("Location:../index.php?usuar=$usuar");  
  
                                    }   

    $imagenes = [
    					"1" => "../imagenes_video/solar.png",
    					"2" => "../imagenes_video/hidraulica.png",
    					"3" => "../imagenes_video/oceanica.png",
    					"4" => "../imagenes_video/eolica.png",
    					"5" => "../imagenes_video/hidraulica01.png",
						];

	$indice = rand(1,5);

	$imagen_fondo = $imagenes [$indice];


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
		<link rel="stylesheet" href="../css/gestion.css"> 
    
		<style type="text/css"></style>  

    </head>

		<header>

			<p style='position:absolute; top: 25px;text-indent: 380px;'><strong>Usuario: </strong><span style='color: blue;font-size:15px;'><?=$_SESSION['usuario']?></span></strong>&ensp;&ensp;<a style='text-decoration: underline red;' href='../index.php'><span style='font-size:15px; border-radius: 5px 5px 5px 5px; color: white; background-color: red;'>&ensp;Cerrar Sesión&ensp;</a></strong></p>

        	<div id="titulo">
        		<figure>
					<img src="../imagenes_video/oip.png" alt="logo">
				</figure>
				<h1>J.M.R.IZ. <br>Instalaciones&ensp;</h1>

				<p>&ensp;&ensp;&ensp;
    			
				</p>
			</div>	

		</header>

		<nav>

			<ul>

				<center>
                <?php 
               
		 		echo "<li><a href='compras.php?index=true&usuar=$usuario' rel='noopener noreferrer'>&ensp;Inicio&ensp;</a></li>&ensp;";
				echo "<li><a href='index01.php?usuar=$usuario' rel='noopener noreferrer'>&ensp;La Empresa&ensp;</a></li>&ensp;";
				echo "<li><a href='index02.php?usuar=$usuario' rel='noopener noreferrer'>&ensp;Trabajos&ensp;</a></li>&ensp;";
				echo "<li><a href='index03.php?usuar=$usuario' rel='noopener noreferrer'>&ensp;Contacto&ensp;</a></li>&ensp;";
                ?>
              </center> 
				
			</ul>	
		</nav> 

<body>

	<section>

		<article>
			<p>&emsp;</p>
			<p>&emsp;</p>
			<p>&emsp;</p>
			<p>&emsp;</p>

	
			
			<center>
	  		<div class='box01' style='background:url(../imagenes_video/<?=$imagen_fondo?>) center center no-repeat scroll;'> 

				<center>

			<?php
	   
				// intenta conectarse con la base de datos MySQL 

				require('conexionBD.php');
				// echo "Conexión realizada con éxito<br>"; 

       			// CONEXION 02

       			unset($enlace);
       			unset($conexion);


       		// INICIO "ALTAS"	

				if (isset($_POST['altas'])) {

					// INICIO "OBTENER ( id_articulo ) de la tabla ( articulos )" 	 	

              		$sql = "SELECT pkId_articulo FROM tarticulos";
					$articulos = $mysqli->query($sql);

							$k=0;
                         	foreach ($articulos as $articulo) {

                         		$k++;
                         		
								$id_articulo = $articulo['pkId_articulo'];

							} // endforeach 

							if ( $k == 0 ) {
												$id_articulo = 1;
							}

							$id_articulo++;
							unset($sql);

						
				// FIN "OBTENER ( id_albaran ) de la tabla ( articulos )" 


					// recupera y verifica los valores de entrada
					$inputError = false;
					if (empty($_POST['nombre'])) {
													echo 'ERROR: Por favor ingrese un nombre de Artículo válido';
													$inputError = true;
					} else {
							 $nombre = $mysqli->escape_string($_POST['nombre']);
							}

					if (empty($_POST['existencias'])) {
														echo 'ERROR: Por favor ingrese una cantidad del Artículo válida';
														$inputError = true;
					} else {
							 	$existencias = $mysqli->escape_string($_POST['existencias']);
							}

					if (empty($_POST['precio'])) {
													echo 'ERROR: Por favor ingrese un precio válido';
													$inputError = true;
					} else {
							 $precio = $mysqli->escape_string($_POST['precio']);
							}

					if (empty($_POST['descripcion'])) {
														echo 'ERROR: Por favor ingrese una descripción válida';
														$inputError = true;
					} else {
							 $descripcion = $mysqli->escape_string($_POST['descripcion']);
							}

					if (empty($_POST['oferta'])) {
													echo 'ERROR: Por favor ingrese una oferta válida (s) o (n)';
													$inputError = true;
					} else {
							 $oferta = $mysqli->escape_string($_POST['oferta']);
							}

					if ($inputError != true && empty($_POST['baja'])) {
																		echo 'ERROR: Por favor ingrese un valor válido para baja (s) o (n)';
																		$inputError = true;
					} else {
							 $baja = $mysqli->escape_string($_POST['baja']);
							}
			
					// AÑADE valores a la base de datos utilizando el consulta INSERT
					if ($inputError != true) {
												$sql_1 = "INSERT INTO tarticulos (pkId_articulo, Nombre, Existencias, Precio, Descripcion, Oferta, Baja) VALUES ('$id_articulo', '$nombre', '$existencias', '$precio', '$descripcion', '$oferta', '$baja')";

												if ($mysqli->query($sql_1) === true) {
																				// echo"Registro añadido";
												} else {
														 echo "ERROR: No fue posible ejecutar el consulta: $sql_1. " . $mysqli->error;
														}
					}	
				}

			// FIN "ALTAS"	


			// INICIO "BAJAS"		

				if (isset($_POST['bajas'])) {

					// recupera y verifica los valores de entrada
					$inputError = false;

					if (empty($_POST['id_articulo'])) {
														echo 'ERROR: Por favor ingrese un ID válido';
														$inputError = true;
					} else {
							 $id_articulo = $mysqli->escape_string($_POST['id_articulo']);
							}

			
					if ($inputError != true && empty($_POST['baja'])) {
																		echo 'ERROR: Por favor ingrese un borrado válido para baja (s) o (n)';
																		$inputError = true;
					} else {
							 $baja = $mysqli->escape_string($_POST['baja']);
						 	}
			
					
					if ($inputError != true) {
												$sql_2 = "UPDATE tarticulos SET Baja='si' WHERE pkId_articulo='$id_articulo'";
												
												if ($mysqli->query($sql_2) === true) {
													// echo"Articulo actualizado";
																				
												} else {
														 echo "ERROR: No fue posible ejecutar la consulta: $sql_2. " . $mysqli->error;
														}
					}
				}

			// FIN "BAJAS"	

			// INICIO "MODIFICAR"	

				if (isset($_POST['modificas'])) {

					// recupera y verifica los valores de entrada
					$inputError = false;

					if (empty($_POST['id_articulo'])) {
														echo 'ERROR: Por favor ingrese un ID válido';
														$inputError = true;
					} else {
						 	 $id_articulo = $mysqli->escape_string($_POST['id_articulo']);
					   		}

					if (empty($_POST['nombre'])) {
													echo 'ERROR: Por favor ingrese un nombre de Artículo válido';
													$inputError = true;
					} else {
						 	 $nombre = $mysqli->escape_string($_POST['nombre']);
							}

					if (empty($_POST['existencias'])) {
														echo 'ERROR: Por favor ingrese una cantidad del Artículo válida';
												  		$inputError = true;
					} else {
						 	 $existencias = $mysqli->escape_string($_POST['existencias']);
							}

					if (empty($_POST['precio'])) {
												 	echo 'ERROR: Por favor ingrese un precio válido';
													$inputError = true;
					} else {
						 	 $precio = $mysqli->escape_string($_POST['precio']);
							}

					if (empty($_POST['descripcion'])) {
														echo 'ERROR: Por favor ingrese una Descripción válida';
														$inputError = true;
					} else {
						 	 $descripcion = $mysqli->escape_string($_POST['descripcion']);
							}

					if (empty($_POST['oferta'])) {
													echo 'ERROR: Por favor ingrese oferta válida (s) o (n)';
													$inputError = true;
					} else {
					  		 $oferta = $mysqli->escape_string($_POST['oferta']);
							}

					if ($inputError != true && empty($_POST['baja'])) {
																		echo 'ERROR: Por favor ingrese un valor válido para baja (s) o (n)';
																		$inputError = true;
					} else {
							 $baja = $mysqli->escape_string($_POST['baja']);
							}
			
			
					// MODIFICA valores a la base de datos utilizando el consulta UPDATE
					if ($inputError != true) {
										
									   			 $sql_3 = "UPDATE tarticulos SET Nombre='$nombre', Existencias='$existencias', Precio='$precio' , Descripcion='$descripcion' , Oferta='$oferta' , Baja='$baja' WHERE pkId_articulo='$id_articulo'";

												if ($mysqli->query($sql_3) === true) {
																				// echo 'Registro modificado' ;
												} else {
														 echo "ERROR: No fue posible ejecutar el consulta: $sql_3. " . $mysqli->error;
														}
					}
				}

			// FIN "MODIFICAR"	

			?>

				<div class="box02">

					<form action="gestionar_articulos.php" method="POST">
					<!--<fieldset>
					<legend></legend>-->
						<h2><strong>ARTICULOS</strong></h2>
		
						<strong>ID del artículo: </strong><br />
						<p><input type="number" name="id_articulo" size="4"></p>

						&nbsp;&nbsp;<strong>Nombre del artículo: </strong><br />
						<p><input type="text" name="nombre" size="30" required></p>

						<strong>Cantidad del artículo: </strong><br />
						<p><input type="number" name="existencias" size="3" required></p>

						<strong>Precio del artículo: </strong><br />
						<p><input type="number" name="precio" size="6" required></p>

						<strong>Descripción del artículo: </strong><br />
						<p><input type="text" name="descripcion" size="30" required></p> 
						
						<strong>Artículo en Oferta: </strong><br />
						<p><input type="radio" name="oferta" value="si" required />&nbsp;<span  style="color: blue;" ><strong>si</strong></span></p>
            			<p><input type="radio" name="oferta" value="no" required />&nbsp;<span  style="color: red;" ><strong>no</strong></span></p>

						<strong>Dar artículo de Baja: </strong><br /> 
            			<p><input type="radio" name="baja" value="no" required />&nbsp;<span  style="color: blue;"><strong>no</strong></span></p> 
            			<p><input type="radio" name="baja" value="si" required />&nbsp;<span  style="color: red;"><strong>si</strong></span></p>

						<p><button style="color: white; background-color: green" type="submit" name="altas">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alta&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button> </p>
			
						<p><button style="color: white; background-color: red" type="submit" name="bajas">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Baja&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button> </p>

						<p><button style="color: white; background-color: orange" type="submit" name="modificas">&nbsp;&nbsp;&nbsp;&nbsp;Modificacion&nbsp;&nbsp;&nbsp;&nbsp;</button> </p>
					<!--</fieldset>-->
		
					</form></br>

				</div class="box02" >


	 			<div class="box03">

					<p>&nbsp;</p>
					<br><br><h3><strong>Lista de artículos</strong></h3>

			<?php

					echo "<br>";
					$sql_4 = "SELECT pkId_articulo, Nombre, Existencias, Precio, Descripcion, Oferta, Baja FROM tarticulos ORDER BY pkId_articulo";

					$articulos = $mysqli->query($sql_4); 
			?>
					<table style='font-size:12px'>
						<tr class='heading'>
							<td>ID</td>
							<td>Nombre</td>
							<td>Existencias</td>
							<td>Precio</td>
							<td>Descripción</td>
							<td>En Oferta</td>
							<td>Dado Baja</td>
						</tr>
			<?php
					foreach ($articulos as $articulo) { 
	?>
						<tr>
							<td><?=$articulo['pkId_articulo']?></td>	
							<td><?=$articulo['Nombre']?></td>
							<td><?=$articulo['Existencias']?></td>
							<td><?=$articulo['Precio']?></td>
							<td><?=$articulo['Descripcion']?></td>
							<td><?=$articulo['Oferta']?></td>
							<td><?=$articulo['Baja']?></td>
						</tr>

			<?php	} //endforeach
				
			  echo "</table>";	

			// cierra conexión
			//$mysqli->close();

			?>

				</div class="box03">

  				</center>

  			</div class="box01"> 

	<?php 
			echo" <br><div><span style='font-size:25px; border-radius: 5px 5px 5px 5px; color: white; background-color: orange;'><a href='compras.php?usuar=$usuario'>&LeftArrow; Atrás&ensp;</a><span></div>";
	?>

			</center> 

		</article>

	</section>

        <aside id="info">
            <h3>Cuida del medio ambiente</h3>
            <div class="contenedor">
                <div class="info-imagenes">
                	<figure>
                        <img src="../imagenes_video/instalacion01.jpg" alt="Intalacion">
                	</figure>
                    <h4>Viviendas<br>Unifamiliares</h4>
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
                    <h4>Batería de<br>Contadores</h4>
                </div>
            </div>
        </aside><br> 
		
        <footer>
			<div class="contenedor">
				<p class="copy"><b>J.M.R.IZ - Instalaciones &copy; 2024</b></p>
				<div class="sociales">
					<a class="icon-facebook" href="https://www.facebook.com" target="_blank" rel="noopener noreferrer"></a>
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

</html>