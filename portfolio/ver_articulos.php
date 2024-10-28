<?php

	ob_start();
	
	if(isset($_GET["usuar"]))  { // ESTA DEFINIDA Viene de sesion.php
                                   
                                    $_SESSION['usuario'] = $_GET["usuar"]; 
                                    $usuario = $_SESSION['usuario'];  

    } else { // NO ESTA DEFINIDA
               
                $_SESSION['usuario'] = "Sin Registrar"; 
                $usuario = $_SESSION['usuario'];  
            } 

    if(isset($_REQUEST["cerrar"])){
                                     $_SESSION['usuario'] = "Sin Registrar"; 
                                     $usuar = $_SESSION['usuario'];
                                     $usuario = "Sin Registrar";             
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

						$sql_2 = 'SELECT * FROM tarticulos ORDER BY Existencias';
						$articulos = $enlace->query($sql_2);
						unset($enlace);
						unset($sql_1);
						unset($sql_2);


						$imagenes = [
    					"1" => "../imagenes_video/caldera_gas.jpg",
    					"2" => "../imagenes_video/caldera_gasoil.jpg",
    					"3" => "../imagenes_video/termo_electrico.jpg",
    					"4" => "../imagenes_video/radiador_aluminio.jpg",
    					"5" => "../imagenes_video/llaves_radiador.jpg",
    					"6" => "../imagenes_video/accesorios_radiador.jpg",
    					"7" => "../imagenes_video/Roca T-500.jpg"
						];

			?>

					<p style='position:absolute; top: 200px;text-indent: 450px;font-size:35px;'><strong><span style="color: blue;"><?=$_SESSION['usuario']?></span></strong> estos son los ARTICULOS</p><br><br><br><br><br><br><br>
					<p></p>
					<p></p>

					  <center>
						<table class="h">
							<thead>
								<tr class="h">
									<th>ID Articulo</th>
									<th>Imagen</th>
									<th>Existencias</th>
									<th>Nombre</th>
									<th>Descripción</th>
									<th>Precio</th>
									<th>Oferta</th>
									<th>De Baja&ensp;</th>
									
								</tr>	
							</thead>
							<tbody>

								<?php foreach ($articulos as $articulo): 
									
										if ( $articulo['Existencias'] == 0 ) { ?>
										<tr>
			    							<td class="h" style='font-size: 25px;color: black; background-color: red;'><strong><?=$articulo['pkId_articulo']?><strong></td>
			    						
			    				<?php	} else { ?>
			    									<tr>
			    										<td class="h"><?=$articulo['pkId_articulo']?></td>
			    				<?php		} 

									
										if (empty($imagenes [$articulo['pkId_articulo']])) { // Si no exite 
    																$imagen="../imagenes_video/no_disponible.jpg";
												} else { // Si existe
    														$imagen=$imagenes[$articulo['pkId_articulo']];}
								?>

			    		<td style = "width:100px;" ><img src="<?=$imagen ?>" width="100px" height="150px" alt="articulo a la venta" ></td> 
								
								<?php
			    						if ( $articulo['Existencias'] == 0 ) { ?>

			    							<td class='h'><span style='color: white; background-color: red;'>&ensp;<?=$articulo['Existencias']?>&ensp;</span></td>
			    						
			    				<?php	} else { ?>
			    									<td class='h'><span style='color: white; background-color: blue;'>&ensp;<?=$articulo['Existencias']?>&ensp;</span></td>
			    				<?php			} ?>
			    				

			    						<td class="h"><?=$articulo['Nombre']?></td>
										<td class="h"><?=$articulo['Descripcion']?></td>
										<td class="h"><?=$articulo['Precio']?> €</td>

								<?php
			    						if ( $articulo['Oferta'] == "si" ) { ?>

			    							<td class='h'><span style='color: white; background-color: green;'>&ensp;<?=$articulo['Oferta']?>&ensp;</span></td>
			    						
			    				<?php	} else { ?>
			    									<td class='h'><span style='color: white; background-color: black;'>&ensp;<?=$articulo['Oferta']?>&ensp;</span></td>
			    				<?php			} 

			    						if ( $articulo['Baja'] == "si" ) { ?>

			    							<td class='h'><span style='color: white; background-color: red;'>&ensp;<?=$articulo['Baja']?>&ensp;</span></td>
			    						
			    				<?php	} else { ?>
			    									<td class='h'><span style='color: white; background-color: black;'>&ensp;<?=$articulo['Baja']?>&ensp;</span></td>
			    				<?php			} ?>
											
									</tr>
								<?php 
										endforeach 

										// CERRAR CONEXION CON LA BD 
										//$conexion->close(); 
								?>

							</tbody>
						</table>
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