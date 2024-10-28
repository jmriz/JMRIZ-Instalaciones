<?php

	ob_start();
	
	
	if(isset($_GET["usuar"]))  { // ESTA DEFINIDA Viene de sesion.php
                                   
                                    $_SESSION['usuario'] = $_GET["usuar"]; 
                                    $usuario = $_SESSION['usuario'];  

    } else { // NO ESTA DEFINIDA
               
                $_SESSION['usuario'] = "Sin Registar"; 
                $usuario = $_SESSION['usuario'];  
            } 

    if(isset($_REQUEST["cerrar"])){
                                     $_SESSION['usuario'] = "Sin Registrar"; 
                                     $usuar = $_SESSION['usuario'];
                                     $usuario = "Sin Registrar";            
                                     // exit;
                                     header("Location:../index.php?usuar=$usuar");  
  
                                    } 

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
		 
    </head>

	<body>

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
               
		 		echo "<li><a href='../index.php?index=true&usuar=$usuario' rel='noopener noreferrer'>&ensp;Inicio&ensp;</a></li>&ensp;";
				echo "<li><a href='index01.php?usuar=$usuario' rel='noopener noreferrer'>&ensp;La Empresa&ensp;</a></li>&ensp;";
				echo "<li><a href='index02.php?usuar=$usuario' rel='noopener noreferrer'>&ensp;Trabajos&ensp;</a></li>&ensp;";
				echo "<li><a href='index03.php?usuar=$usuario' rel='noopener noreferrer'>&ensp;Contacto&ensp;</a></li>&ensp;";
                ?>
              </center>
				
			</ul>	
		</nav> 

		<section>

			<article>

				<?php 

					
				    echo "<br>";

					if ($_SESSION['usuario'] != "Sin Registrar") {   


						try {

								require('conexionBD.php');
								// echo "Conexión realizada con éxito<br>";	

								// CONEXION 03

								unset($conexion);
				  				unset($mysqli);

								echo" <center><div class='box01' style='border: 5px solid black; background:url(../imagenes_video/herramientas.png) center center no-repeat scroll; width: 500px; height: 300px;' ></br>";

								$sql_1 = 'SELECT Usuario, Rol, Correo FROM tusuarios';
								$usuarios = $enlace->query($sql_1);

								foreach ($usuarios as $u) {
									if ($u['Usuario'] == $_SESSION['usuario']){
										$rol = $u['Rol'];
										$correo = $u['Correo'];
									}
								}
								
								unset($sql_1);
								//echo $correo;
				?>

							

								<?php echo"<form action='ver_albaranes.php?usuar=$usuario' method='POST'>";?>
								<!--<fieldset>
								<legend></legend>-->
									<h2><span style='color: orange;'><strong>ALBARANES</strong></span></h2>

									<span style='color: orange;'><strong>Fecha Inicio: </strong></span><br />
									<p><input type="date" name="fecha_inicio" size="10" required ></p>

									<span style='color: orange;'>&nbsp;&nbsp;<strong>Fecha Fin: </strong></span><br />
									<p><input type="date" name="fecha_fin" size="10" required ></p>

									<input class="loginbutton" style='background:green;color:#ffdd00' type="submit" value="&nbsp;Listar Albaranes&nbsp;" name="listado">
	
								
								<!--</fieldset>-->
								</form></br>
								
						<?php 

					 			$usu = $u['Usuario'];

					 			echo"</div>";

								if (isset($_POST['listado'])) {

									$fecha_inicio =  $_POST['fecha_inicio'];
									$fecha_fin = $_POST['fecha_fin'];

									$fecha_inicio01 =  $_POST['fecha_inicio'] . " 00:00:00";
									$fecha_fin01 = $_POST['fecha_fin'] . " 00:00:00";

									$sql_2 = "SELECT * FROM tarticulos";
									$articulos = $enlace->query($sql_2);

									

											// Consulta SQL

											$sql_3 = "SELECT  v.fkId_factura, v.fkId_articulo, v.Cantidad, v.Precio, f.fkId_usuario AS 'ID USUARIO', f.Fecha
											    FROM tventas v
        										JOIN tfacturas f ON v.fkId_factura = f.pkId_factura
        										WHERE f.Fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'
        										ORDER BY fkId_factura";

											$result = mysqli_query($enlace, $sql_3);

 											//unset($enlace);
											//unset($sql);

											echo "<p>&ensp;</p>";
											echo "<h2>Lista de albaranes</h2>del ( " . $fecha_inicio . " ) al ( " . $fecha_fin . " )" ;
											
						?>
											<center>
										
										<?php 

											// Mostrar resultados en forma de tabla

											if (mysqli_num_rows($result) > 0) {
    		
													echo " <table class='h' style='font-size:12px;'>\n";

													echo " <tr class='h'>";
													echo " <thead>";
													echo " <th>Nº Factura</td>\n";
													echo " <th>Fecha</td>\n";
													echo " <th>Id Usu.</th>\n";
													echo " <th>Id Art.</td>\n";
													echo " <th>Nombre</td>\n";
													echo " <th>Cantidad</td>\n";
													echo " <th>Precio</td>\n";
													echo " <th>TOTAL ARTICULO</td>\n";
													echo " </tr>";
													echo " </thead>";
													echo " <tbody>";

            									 $total = 0;
            									 $x=0;

   												 while ($row = mysqli_fetch_assoc($result)) {

   												 	$total = ( $row['Cantidad'] * $row['Precio']);
   												 	$x++;

														echo " <tr>";
														echo " <td class='h'><span style='color: white;background-color: blue;font-size:17px;'><strong>&ensp;" . $row["fkId_factura"] . "&ensp;</strong></span></td>\n";
														echo " <td class='h'>" . $row['Fecha'] . "</td>\n";

														echo " <td class='h'><span style='color: black;background-color: violet;font-size:17px;'><strong>&ensp;" . $row["ID USUARIO"] . "&ensp;</strong></span></td>\n";
														
														echo " <td class='h'>" . $row["fkId_articulo"] . "</td>\n";

														$albid = $row['fkId_articulo'];
														
														$sql_4 = "SELECT Nombre FROM tarticulos WHERE ( pkId_articulo = '$albid') ";
														$resultado = mysqli_query($enlace, $sql_4);

														if (mysqli_num_rows($resultado) > 0) {
															while ($row1 = mysqli_fetch_assoc($resultado)) {
																$nombre = $row1['Nombre'];
																// echo "<br> Nombre: " . $nombre . "<br>";
															}
														} 
														echo " <td class='h'>" . $nombre . "</td>\n";
														echo " <td class='h'>" . $row['Cantidad'] . "</td>\n";
														echo " <td class='h'>" . $row['Precio'] . " €</td>\n";
														echo " <td class='h' style='color: blue;'>" . $total . " €</td>\n";
														echo " </tr>";
													}

													echo "</table>";
        										   
											} else {
    												 echo "No se encontraron resultados.";
    												 $x = 0; 
													}

											mysqli_close($enlace);
										

										if  ( $x == 0 ) { ?>  

						               						<center></br><div style="font-size:30px;background-color: red; color: white; width: 750px;height: 50px; z-index: 40;"> 

								          					<p>&emsp;***  NO HAY NINGUN ALBARAN ***</p>
						               						</div></center> 		
 															
									<?php 	
							
 										 }
								}

							}catch (PDOException $e) {
								echo '<strong>Error de conexión: </strong>'.$e->getMessage();
							} catch (Exception $e) {
								echo $e->getMessage();
								} 

										
 					} else { ?>

						 <div style="font-size:30px;background-color: red; color: white; position: relative; left: 350px; top: 1px; width: 750px;height: 150px; z-index: 40;"> 

						 
								<br><center><p>&emsp;*** NO HAS INICIADO SESION  ***</p></center>
						 <div>

				<?php
							}
													
					echo" <center><br><span style='font-size:25px; border-radius: 5px 5px 5px 5px; color: white; background-color: orange;'><a href='compras.php?usuar=$usuario'>&LeftArrow; Atrás&ensp;</a><span></center>";

	
				?> 

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