<?php

	ob_start();

	if(isset($_GET["usuar"]))  { // ESTA DEFINIDA Viene de ver_operaciones.php
                                    
                                    $_SESSION['usuario'] = $_GET["usuar"]; 
                                    $usuario = $_SESSION['usuario'];  

    } else { // NO ESTA DEFINIDA
               
                $_SESSION['usuario'] = "Sin Registrar"; 
                $usuario = $_SESSION['usuario'];  
            }  

    if(isset($_GET["alba"]))  { // ESTA DEFINIDA Viene de ver-operaciones.php
                                    
                                    $_SESSION['albaran'] = $_GET["alba"]; 
                                    $num_albaran = $_SESSION['albaran']; 

    } else { // NO ESTA DEFINIDA
               
                $_SESSION['albaran'] = 0;
                $num_albaran = $_SESSION['albaran'];  
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

		<section>

			<article>

				<?php 

					try {
							require('conexionBD.php');
							//echo "Conexión realizada con éxito<br>";

							// CONEXION 03

							unset($conexion);
				  			unset($mysqli);

							$sql_1 = 'SELECT Usuario, Rol FROM tusuarios';
							$usuarios = $enlace->query($sql_1);

							foreach ($usuarios as $u) {
								if ($u['Usuario'] == $_SESSION['usuario']){
									$rol = $u['Rol'];
								}
							}

							$sql_2 = 'SELECT * FROM toperaciones';
							$articulos = $enlace->query($sql_2);

							$sql_3 = 'SELECT * FROM tventas';
							$albaranes = $enlace->query($sql_3);

							$sql_4 = 'SELECT * FROM tarticulos';
							$arti = $enlace->query($sql_4);

							// unset($conexion);
							// unset($sql);

						} catch (PDOException $e) {
							echo '<strong>Error de conexión: </strong>'.$e->getMessage();
						} catch (Exception $e) {
							echo $e->getMessage();
						} 

				?>

						<p style='position:absolute; top: 200px;text-indent: 450px;font-size:35px;'><strong><span style="color: blue;"><?=$_SESSION['usuario']?></span></strong> estas son las VENTAS</p><br><br><br><br><br><br>
							    			
						<center><strong><span style="font-size: 18px;background-color: yellow;">Pulsa en el Nº de Factura para ver el detalle de la misma</span></strong></center><br>
						<p></p>
						<p></p>

						<center>
							<table style='font-size:13px;'>
								<thead>

									<tr class="heading">
										<th>Id Op.</th> 
										<th>Nº Factura</th>
										<th>Importe Total</th>
										<th>Id Usu.</th>
										<th>Nombre y Apellidos</th>
										<th>Dirección</th>
										<th>Fecha Operación</th>
										<th>Tarjeta</th>
										<th>Número Tarjeta</th>
										<th>Mes</th>
										<th>Año</th>
										<th>CVV</th>
									</tr>	

								</thead>
								<tbody>

								<?php 
										$a=0;
              							$alba; 

										foreach ($articulos as $articulo): ?>
										<tr>
											<td><?=$articulo['pkId_operacion']?></td> 
											
								<?php 	
										$Idoper = $articulo['pkId_operacion'];
										
									   	$sql_5 = "SELECT pkId_factura, fkId_usuario FROM tfacturas WHERE ( fkId_operacion = '$Idoper')"; 
				
										$ides = $enlace->query($sql_5);
										$b=0;
									   	foreach ($ides as $ide){
									   		$idfact = $ide['pkId_factura'];
									   		$idusua = $ide['fkId_usuario'];
									   		
									   }
									   $alba[$a] = $idfact; 
									   $total_alba[$a] = $articulo['Importe'];
									   $total_albaran = $total_alba[$a];
									   $p = $alba[$a];                           
									   
									   echo"<form action='ver_operaciones.php?usuar=$usuario&alba=$p' method='post'>";

							     	   echo"<td><input type='submit' name='ver_albaran' value='&ensp;$p&ensp;' style='color: white; background-color: blue;'></td>";              
                					   $a++;
							     	   echo"</form>";

							    ?>
							    			<td><?=$articulo['Importe']?> €</td>

							    			<td><span style="color: brown;background-color: turquoise;font-size:17px;"><strong>&ensp;<?=$idusua?>&ensp;</strong></span></td>
											
											<td><?=$articulo['Nombre_apellidos']?></td>
											<td><?=$articulo['Direccion_fact']?></td>
											<td><?=$articulo['Fecha']?></td>
											<td><?=$articulo['Nombre_tarjeta']?></td>
											<td><?=$articulo['Numero_tarjeta']?></td>
											<td><?=$articulo['Mes_caducidad']?></td>
											<td><?=$articulo['Ano_caducidad']?></td>
											<td><?=$articulo['Cvv']?></td>
										</tr>
								<?php 

										endforeach 

										// CERRAR CONEXION CON LA BD 
										//$mysqli->close();
								?>

								</tbody>
							</table>
						 
						   <?php

						   		if(isset($_REQUEST["ver_albaran"])){

						   			echo "<p>&ensp;</p>";
						   			echo "<br> <span style='font-size:25px;'>Albaran Nº : <span style='color: white; background-color: blue;'>&ensp;" .  $num_albaran . "&ensp;</span></span><br>";


						   			$total=0;
						   			$j=0;
						   			echo "<center>"; ?>

						   			<table style='font-size:15px;'>
										<thead>

											<tr class="heading">
												<th>Id Art.</th> 
												<th>Nombre</th>
												<th>Descripcion</th>
												<th>Cantidad</th>
												<th>Precio Unidad</th>
												<th>TOTAL ARTICULO</th>
												
											</tr>	

										</thead>
									<tbody>
						   					
								<?php  	  
						   			foreach ($albaranes as $albaran){

						   				if ( $albaran['fkId_factura'] == $num_albaran ) {  

						   					$total_al = ( $albaran['Cantidad'] * $albaran['Precio']);

						   		?>			<tr>
												<td><?=$albaran['fkId_articulo']?></td>

								<?php 	

												$albid = $albaran['fkId_articulo'];
												$sql_6 = "SELECT Nombre, Descripcion FROM tarticulos WHERE ( pkId_articulo = '$albid') "; 

												$albarides = $enlace->query($sql_6);
												foreach ($albarides as $albar){
													$nombre = $albar['Nombre'];
													$descripcion = $albar['Descripcion'];
													
												}

										?>

												<td><?=$nombre?></td>
												<td><?=$descripcion?></td>
												<td><?=$albaran['Cantidad']?></td>
												<td><?=$albaran['Precio']?> €</td>
												<td><?=$total_al?> €</td>

								<?php 
						   					
						 
						   						$total = $total + ( $albaran['Cantidad'] * $albaran['Precio']);	
						   						$j++;
						   				}
						   			}
						   		?>
											<tr>
										</tbody>
									</table>

						   		<?php 

						   			echo "<br>Total Albaran: <strong><span style='color: white; background-color: red;'>" . $total . "</span> € </strong>";
						   
						   			echo "<p>&ensp;</p>";
	  	
						 		}  

								echo" <br><div><span style='font-size:25px; border-radius: 5px 5px 5px 5px; color: white; background-color: orange;'><a href='compras.php?usuar=$usuario'>&LeftArrow; Atrás&ensp;</a><span></div>";
						?>

						<!-- -->
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