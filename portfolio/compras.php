<?php

	ob_start();
	

      if(isset($_GET["usuar"]))  { // ESTA DEFINIDA Viene de sesion.php
                                    
                                    $_SESSION['usuario'] = $_GET["usuar"]; 
                                    $usuario = $_SESSION['usuario'];  

        } else { // NO ESTA DEFINIDA
               
                $_SESSION['usuario'] = "Sin Registrar"; 
                $usuario = $_SESSION['usuario'];  
            }  

    if(isset($_REQUEST["index"])){

                                    $usuar = $_SESSION['usuario']; 
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
		<style type="text/css"></style>
		
    </head>

	<body>

		<header>

			<p style='position:absolute; top: 25px;text-indent: 380px;'><strong>Usuario: </strong><span style='color: blue;font-size:15px;'><?=$_SESSION['usuario']?></span></p>

			<p style='position:absolute; top: 50px;text-indent: 400px;'></strong><a style='text-decoration: underline red;' href='../index.php'><span style='font-size:15px; border-radius: 5px 5px 5px 5px; color: white; background-color: red;'>&ensp;Cerrar Sesión&ensp;</a></strong></p>

         	<?php echo"<p style='position:absolute;top: 75px;text-indent: 400px;'><strong><span style='border-radius: 5px; background-color: turquoise;'><a style='text-decoration: underline turquoise;' href='compras.php?usuar=$usuario' rel='noopener noreferrer'>&ensp;Tu espacio&ensp;</a></span></strong></p>";?>

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
					echo"<li><a href='compras.php?index=true&usuar=$usuario' rel='noopener noreferrer'>&ensp;Inicio&ensp;</a></li>&ensp;";
					echo"<li><a href='index01.php?usuar=$usuario' rel='noopener noreferrer'>&ensp;La Empresa&ensp;</a></li>&ensp;";
					echo "<li><a href='index02.php?usuar=$usuario' rel='noopener noreferrer'>&ensp;Trabajos&ensp;</a></li>&ensp;";
					echo "<li><a href='index03.php?usuar=$usuario' rel='noopener noreferrer'>&ensp;Contacto&ensp;</a></li>&ensp;";
				?>
				</center>
			</ul>	
		</nav> 

		<section>
			
		
			<article>

				<?php 

					//echo "<br><br>mi usuario" . $_SESSION['usuario'] ;
				    echo "<br>";

					if ($_SESSION['usuario'] != "Sin Registrar") { 

						try {

								require('conexionBD.php');
								// echo "Conexión realizada con éxito<br>";	

								// CONEXION 01

								//unset($enlace);
				  				unset($mysqli);

								$sql_1 = 'SELECT * FROM tusuarios';
								$usuarios = $conexion->query($sql_1);
								foreach ($usuarios as $u) {

									if ($u['Usuario'] == $_SESSION['usuario']){

										$id_usuario = $u['pkId_usuario'];
										$usuario = $u['Usuario'];
										$rol = $u['Rol'];
									}
								}

								unset($sql_1);
								//echo $correo;
									
								// echo "<br> Id_usuario: " . $id_usuario;  // PRUEBA

								 $sql_2 = "SELECT pkId_factura FROM tfacturas WHERE (fkId_usuario = '$id_usuario')";  
								$facturas = $conexion->query($sql_2);

							
							// INICIO "RECOJER NUMEROS DE FACTURAS ASIGNADAS AL USUARIO ACTUAL"	
								
								$cont=0;
								foreach ($facturas as $factura){

									$num_factura[$cont] = $factura['pkId_factura'];

									$cont++; 
								} //endforeach 

								$x = $cont;

										$sql_3 = "SELECT * FROM tventas"; 
										$albaranes = $conexion->query($sql_3);

										unset($conexion);

										// Consulta SQL

										$sql_4 =   "SELECT v.fkId_factura, v.pkId_detalle, v.fkId_articulo, v.Cantidad, v.Precio
        											FROM tventas v
        											INNER JOIN tfacturas f ON v.fkId_factura = f.pkId_factura
        											WHERE f.fkId_usuario = $id_usuario
        											ORDER BY v.fkId_factura";

										$result = mysqli_query($enlace, $sql_4);
									
									
							// FIN "RECOJER NUMEROS DE FACTURAS ASIGNADAS AL USUARIO ACTUAL"	
								
 								// unset($conexion);
								// unset($sql);
							} catch (PDOException $e) {
								echo '<strong>Error de conexión: </strong>'.$e->getMessage();
							} catch (Exception $e) {
								echo $e->getMessage();
							} 

							if ($rol == 'administrador') { ?>

								<center>

									<br><br>

									<div class="caja" style="font-size: 30px;position: relative;top: 30px; width: 1200px;height: 1000px;"> 

										<center>

								      		<br>
									        <h2>&nbsp;</h2>
											<p ><span style="font-size: 55px;border-radius: 20px;background-color: rgb(65,180,195); color:white;">&emsp;*** VENTAS ***&emsp;<span></p>
													

											<?php 
					
											echo"<p><a style='font-size:30px;background-color: black;color: orange;text-decoration: underline black;' href='gestionar_articulos.php?usuar=$usuario'>&emsp;Gestionar todos los artículos&emsp;</a></p><br>";

											echo"<p><a style='font-size:30px;background-color: orange; color: black; text-decoration: underline orange;' href='ver_articulos.php?usuar=$usuario'><strong>&emsp;Listar todos los artículos&emsp;</strong></a></p><br>";

											echo"<p><a style='font-size:30px;background-color: black; color: orange; text-decoration: underline black;' href='ver_albaranes.php?usuar=$usuario'>&emsp;Listar todos los albaranes&emsp;</a></p><br>";

											echo"<p><a style='font-size:30px;background-color: orange;color: black;text-decoration: underline orange;' href='ver_operaciones.php?usuar=$usuario'><strong>&emsp;Listar todas las ventas&emsp;</strong></a></p><br>";

											echo"<p><a style='font-size:30px;background-color: black; color: orange; text-decoration: underline black;' href='ver_presupuestos.php?usuar=$usuario'>&emsp;Listar todos los presupuestos&emsp;</a></p>";
											?>
											
										</center>
									</div>	
								</center>

						<?php 

							} else { 
     	
										if  ( $cont == 0 ) { ?>  

															<p style='position:absolute; top: 250px;text-indent: 600px;font-size:35px;'><strong><span style="color: blue;"><?=$_SESSION['usuario']?></span></strong></p><br><br><br><br><br><br>

						               						<br><div style="font-size:30px;background-color: red; color: white; position: relative; left: 280px; top: 1px; width: 750px;height: 50px; z-index: 40;"> 

								          					<p>&emsp;***  NO HAS REALIZADO NINGUNA COMPRA ***</p>
						               						<div> 		
 															
																
 								<?php   }else{ ?>
 										 
								       			<p style='position:absolute; top: 250px;text-indent: 450px;font-size:35px;'><strong><span style="color: blue;"><?=$_SESSION['usuario']?></span></strong> estas son TUS COMPRAS</p><br><br><br><br><br><br>
								 						
								 				<center>

								<?php 

												// Mostrar los resultados   

												$sql_5 = "SELECT * FROM tfacturas WHERE ( fkId_usuario = '$id_usuario') ";

												$resultado = mysqli_query($enlace, $sql_5);

												if (mysqli_num_rows($resultado) > 0) {

														echo " <table class='h' style='font-size:12px;'>\n";

														echo " <tr class='h'>";
														echo " <thead>";
														echo " <th>Nº Factura</td>\n";
														echo " <th>Fecha</td>\n";
														echo " <th>Importe</td>\n";
														echo " </tr>";
														echo " </thead>";
														echo " <tbody>";


														while ($row2 = mysqli_fetch_assoc($resultado)) {

															echo " <tr>";
															echo " <td class='h'><span style='color: white;background-color: blue;font-size:17px;'><strong>&ensp;" . $row2['pkId_factura'] . "&ensp;</strong></span></td>\n";
															echo " <td class='h' style='font-size:17px;'>" . $row2['Fecha'] . "</td>\n";
															echo " <td class='h' style='color: red;font-size:17px;'><strong>" . $row2['Importe'] . " €</strong></td>\n";
															echo " </tr>";
														}

														echo "</table>";
															
													} else {
    													      echo "No se encontraron resultados.";
												            }

												echo"<br>";

												if (mysqli_num_rows($result) > 0) {
    		
													echo " <table class='h' style='font-size:12px;'>\n";

													echo " <tr class='h'>";
													echo " <thead>";
													echo " <th>Nº Factura</td>\n";
													echo " <th>Id_Articulo</td>\n";
													echo " <th>Nombre</td>\n";
													echo " <th>Cantidad</td>\n";
													echo " <th>Precio</td>\n";
													echo " <th>TOTAL</td>\n";
													echo " </tr>";
													echo " </thead>";
													echo " <tbody>";

													$total = 0;
													$ul_factura=0;
													while ($row = mysqli_fetch_assoc($result)) {

														$total = ( $row['Cantidad'] * $row['Precio']);

														echo " <tr>";

														if ($ul_factura == $row['fkId_factura']){
															
															echo " <td class='h'><span style='color: black;font-size:17px;'><strong>&ensp;" . $row['fkId_factura'] . "&ensp;</strong></span></td>\n";

														} else {

																 echo " <td class='h'><span style='color: white;background-color: blue;font-size:17px;'><strong>&ensp;" . $row['fkId_factura'] . "&ensp;</strong></span></td>\n";
																	
																 }

														
														echo " <td class='h'>" . $row['fkId_articulo'] . "</td>\n";

														$albid = $row['fkId_articulo'];
														
														$sql_6 = "SELECT Nombre FROM tarticulos WHERE ( pkId_articulo = '$albid') ";
														$resultado = mysqli_query($enlace, $sql_6);

														if (mysqli_num_rows($resultado) > 0) {
															while ($row1 = mysqli_fetch_assoc($resultado)) {
																$nombre = $row1['Nombre'];
															}
														} 

														echo " <td class='h'>" . $nombre . "</td>\n";
														echo " <td class='h'>" . $row['Cantidad'] . "</td>\n";
														echo " <td class='h'>" . $row['Precio'] . " €</td>\n";
														echo " <td class='h' style='color: blue;'>" . $total . " €</td>\n";

														echo " </tr>";
														$ul_factura = $row['fkId_factura'];
													}

													echo "</table>";

												} else {
    													  echo "No se encontraron resultados.";
														}

												// Cerrar la conexión
												mysqli_close($enlace);
											}     
												
 									}
					} else { ?>

						 <div style="font-size:30px;background-color: red; color: white; position: relative; left: 350px; top: 1px; width: 600px;height: 150px; z-index: 40;"> 

						 
								<br><center><p>&emsp;*** NO HAS INICIADO SESION  ***</p></center>
						 <div>

				<?php     }    ?>				

			
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
</html>