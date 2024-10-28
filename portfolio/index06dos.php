<?php
    
    ob_start();

    session_start();

	 if(isset($_SESSION['o']))  {

	 								$o = $_SESSION['o'];
	 } else {
	 			$_SESSION['o'] = 0;
	 			$o = $_SESSION['o'];
	 		} 

    if(isset($_GET["usuar"]))  { // ESTA DEFINIDA Viene de sesion.php
									
		  							$_SESSION['usuario'] = $_GET["usuar"]; 
		  							$usuario = $_SESSION['usuario'];  
                                    
		  							

	} else { // NO ESTA DEFINIDA
				
		  		$usuario = $_SESSION['usuario'];  
		  	} 

	 if ( $usuario == "Sin Registrar" ) {  

	 	echo "<script>alert('SOLO PARA USUARIOS REGISTRADOS');</script>";
	 	
	 	header("Location:sesion.php?usuar=$usuario"); 
	 }


	if(isset($_REQUEST["cerrar"])){

                $_SESSION['usuario']= "";
                $usuario = $_SESSION['usuario'];
                header("Location:../index.php?usuar=$usuario"); 
            }   

    if(isset($_REQUEST["index"])){

		  		$usuario = $_SESSION['usuario'];  
                header("Location:../index.php?usuar=$usuario");  
  			}  

  	if(isset($_REQUEST["agregarProd"])){
  							$o++;
  							$_SESSION['o'] = $o;

  								$producto  = $_REQUEST["txtProducto"];
								$cantidad  = $_REQUEST["cant"];
								$precio    = $_REQUEST["txtPrecio"];
				 
								$_SESSION["carrito"][$producto]["cant"] = $cantidad; 
								$_SESSION["carrito"][$producto]["precio"] = $precio;
				
								echo "<script>alert('Has agregado :  [  $cantidad ] unidades del ARTICULO nº [ $producto ]  a tu compra');</script>";
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

    	<?php ?>

    	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
        <header>

        	<p style='position:absolute;top: 25px;text-indent: 380px;'><strong>Usuario: </strong><span style='color: blue;font-size:15px;'><?=$usuario?></span></p>
                
        	<p style='position:absolute;top: 50px;text-indent: 400px;'><strong><a style='text-decoration: underline red;'href='../index.php'><span style='font-size:15px; border-radius: 5px 5px 5px 5px; color: white; background-color: red;'>&ensp;Cerrar Sesión&ensp;</span></a></strong></p>

    		<?php echo"<p style='position:absolute;top: 75px;text-indent: 400px;'><strong><span style='border-radius: 5px; background-color: turquoise;'><a style='text-decoration: underline turquoise;' href='compras.php?usuar=$usuario' rel='noopener noreferrer'>&ensp;Tu espacio&ensp;</a></span></strong></p>";?>

        	<div id="titulo">
        		<figure>
					<img src="../imagenes_video/oip.png" alt="logo">
				</figure>
				<h1>J.M.R.IZ. <br> &ensp;Instalaciones&ensp;</h1>

				<p>&ensp;&ensp;&ensp;
    			
				</p>
			</div>

		</header>

		<nav>

			<ul>
			  <center>
			  	<?php 
		 		
		 		echo "<li><a href='../index.php?usuar=$usuario' rel='noopener noreferrer'>&ensp;Inicio&ensp;</a></li>&ensp;";
				echo "<li><a href='index01.php?usuar=$usuario' rel='noopener noreferrer'>&ensp;La Empresa&ensp;</a></li>&ensp;";
				echo "<li><a href='index02.php?usuar=$usuario' rel='noopener noreferrer'>&ensp;Trabajos&ensp;</a></li>&ensp;";
				echo "<li><a href='index03.php?usuar=$usuario' rel='noopener noreferrer'>&ensp;Contacto&ensp;</a></li>&ensp;";
				?> 
			  </center>
			</ul>	
		</nav>   
        
        <section>
        	<h2>&emsp;&ensp;</h2>
         	<article id="banner01">
         		<h2>&emsp;&ensp;</h2>	
        		<figure>
               		<img src="../imagenes_video/calefa.jpg" alt="articulo de calefaccion" >
            	</figure>  
        	</article>

        	<article id="bienvenidos05">

				<!-- <center> -->
				<div class="box11">
			
				  	<?php 

				  		try {
								
								require('conexionBD.php');
								// echo "Conexión realizada con éxito<br>";	
							 	
							 	// CONEXION 03

				  				unset($conexion);
				  				unset($mysqli);

      
							$sql_1 = 'SELECT * FROM tarticulos  WHERE ( Baja = "no" AND Existencias > 0)';
							$articulos = $enlace->query($sql_1);
							
							unset($enlace);
							unset($sql_1);

							$imagenes = [
    							"1" => "../imagenes_video/caldera_gas.jpg",
    							"2" => "../imagenes_video/caldera_gasoil.jpg",
    							"3" => "../imagenes_video/termo_electrico.jpg",
    							"4" => "../imagenes_video/radiador_aluminio.jpg",
    							"5" => "../imagenes_video/llaves_radiador.jpg",
    							"6" => "../imagenes_video/accesorios_radiador.jpg",
    							"7" => "../imagenes_video/Roca T-500.jpg"
								];

						} catch (PDOException $e) {
						echo '<strong>Error de conexión: </strong>'.$e->getMessage();
						} catch (Exception $e) {
						echo $e->getMessage();
						} 

						$a=0;
					?>

						<br>
						<center><h3>Vista de TODOS los artículos disponibles</h3></center>
						<br>
	 				
	 						<br>
							<table class="table-dark"  style="width: 600px;">
								<thead>
	
									<th>ID</th>
									<th>PRODUCTO</th>
									<th>IMAGEN</th>
									<th>DESCRIPCION</th>
									<th>PRECIO</th>
									<th>ACCIONES</th>
		
								</thead>

								<tbody>

									<?php foreach ($articulos as $articulo):

									$art[$a] = $articulo['pkId_articulo'];
									$pre[$a] = $articulo['Precio'];
									
								 ?>

								 	
									<tr style = "width:600px;">
										<td style='border: 1px solid #A4A4A4;'><?=$articulo['pkId_articulo']?></td>
										<td style='border: 1px solid #A4A4A4;'><?=$articulo['Nombre']?></td>

									<?php

										if (empty($imagenes [$articulo['pkId_articulo']])) { // Si no exite 
    																$imagen="../imagenes_video/no_disponible.jpg";
												} else { // Si existe
    														$imagen=$imagenes[$articulo['pkId_articulo']];}
									?>

			    						<td style = "width:100px;" ><img src="<?=$imagen ?>" width="100px" height="150px" alt="articulo a la venta" ></td> 

										<td style='border: 1px solid #A4A4A4;'><?=$articulo['Descripcion']?></td>
										<td style='border: 1px solid #A4A4A4;'><?=$articulo['Precio']?> €</td>
										<td style="width:80px;border: 1px solid #A4A4A4;"><?php echo"<form action='index06dos.php?usuar=$usuario' method='post'>";?>
										<input type="submit" name="agregarProd" value="añadir al carro" >
										<input type='number' name='cant' value='1' style='width:50px;'><br></td>

										 <?php echo"<input type='hidden' name='txtProducto' value='$art[$a]'>";?> 
										 <?php echo"<input type='hidden' name='txtPrecio' value='$pre[$a]'>"; $a++; ?>             
                						
										</form>
									</tr>
								<?php 
										endforeach 

										// CERRAR CONEXION CON LA BD 
										//$mysqli->close(); 

								?>

								</tbody>
							</table>
							<p>&ensp;</p>			
				 

					<div class="box13">
					<?php

						$total_comp=0;
						$total=0;
						echo "<style>a { text-decoration: none; }</style>"; 

					// INICIO "CARRITO COMPRAS"

						if(isset($_SESSION["carrito"])){

							echo "&ensp;";
							echo "<center><h5><p><b>Usted ha seleccionado estos productos</b></p></h5>";
							echo"<a href='#'><img src='../imagenes_video/carrito.png' width='50px;' alt='carrito'></a></center>";  
						
							echo"<hr>"; 
              
              				$a = 0;
							foreach($_SESSION["carrito"] as $indice => $arreglo){

								foreach ($articulos as $articulo) {
	
							   			if (( $indice == $articulo['pkId_articulo'] ) && ( $arreglo["cant"] >  $articulo['Existencias'])) {

							   				$arreglo["cant"] = $articulo['Existencias'];
							   				$articulo['Existencias'] = 0;

							   				echo "<span style='color: white; background-color: red;'>&ensp;EXISTENCIAS&ensp;</span> ( <span style='font-size:15px; color: white; background-color: blue;'>&ensp;" . $arreglo["cant"] . "&ensp;</span> ) Articulo nº " . $indice . "<br>";
							   				
							   			}

							   	} // endforeach
				
								//echo "&ensp;";
								
								echo "<div class='cuadrado' style='text-align:center; margin: auto;width: 450px; height: 50px; border: 1px solid #000; background-color:  #f9e79f' ><br><p>Producto: <strong> ". $indice ."</strong>&ensp;";

								$total_comp += $arreglo["cant"] * $arreglo["precio"];
								
								$art[$a] = $indice;
								$can[$a] = $arreglo["cant"]; 
								$pre[$a] = $arreglo["precio"];
								$a++;

								foreach($arreglo as $key => $value){
									echo $key . " : ( " . $value . " )&ensp;";
								} //endforeach

								
								echo "<a style='text-decoration: underline red;' href='index06dos.php?eliminar=true&eliminar=$indice&usuar=$usuario'><span style='font-size:15px; border-radius: 5px 5px 5px 5px; color: white; background-color: red;'>&ensp;Eliminar&ensp;</span></a></p></div>";

		  					} //endforeach

		  					$longitud = $a;

		  					echo "&ensp;";

		  					echo "<center><h5><p>Total productos seleccionados es de : [ <span style='color: black;'>$total_comp € </span>]</h5></p></center>"; 

		  					echo "<br><center><p>&emsp;&ensp;<a style='text-decoration: underline orange;'href='index06dos.php?usuar=$usuario&vaciar=true'><span style='font-size:20px; border-radius: 5px 5px 5px 5px; color: white; background-color: orange;'>&ensp;Vaciar carrito&ensp;</a>&emsp;&ensp;<a style='text-decoration: underline turquoise;' href='index06dos.php?usuar=$usuario&comprar=true'><span style='font-size:20px; border-radius: 5px 5px 5px 5px; color: black; background-color: turquoise;'>&ensp;Comprar&ensp;</span></a></p></center>"; 
		 					
						}else{

								echo "&ensp;";
								echo"<center><h2>CARRITO DE COMPRA<h2>";
								echo"<img src='../imagenes_video/carrito.png' width='50px;' alt='carrito'></center>";  
						
								echo"<hr>";  
								echo "<center><p><b>EL CARRITO ESTA VACIO</b></p></center>";   
							}


		  			// FIN "CARRITO COMPRAS"	
	

							
					// Acciones "VACIAR" , "COMPRAR", "ELIMINAR" 

						
						if(isset($_REQUEST["vaciar"])){

							unset($_SESSION["carrito"]);
							session_destroy();
							header("Location:index06dos.php?usuar=$usuario");
                    	}

                	// INICIO "COMPRAR"

            			if(isset($_REQUEST["comprar"])){

            			// INICIO "CONEXION A LA BD ( jmriventas )" 

            				require('conexionBD.php');
							// echo "Conexión realizada con éxito<br>";	

            				// CONEXION 03

            				unset($conexion);
				  			unset($mysqli);
            	
        				// FIN "CONEXION A LA BD ( jmriventas )" 


				  		// FECHA

				  			date_default_timezone_set("Europe/Madrid");
              				$horaActual = date("h:i:s");
              				$fecha_actual = date("Y-m-d h:i:s"); 
              				$fecha = $_POST['fecha'] = date("Y-m-d"); 


                
                        // INICIO "OBTENER ( id_usuario y correo ) de la tabla ( usuarios )" 

                         	$sql_2 = "SELECT * FROM tusuarios";
							$usuarios = $enlace->query($sql_2);

							foreach ($usuarios as $u) {
								if ($u['Usuario'] == $usuario){
										$id_usu = $u['pkId_usuario'];
										$correo = $u['Correo'];
								}
							}

							unset($sql_2);

						// FIN "OBTENER ( id_usuario y correo ) de la tabla ( usuarios )" 

              			// INICIO "OBTENER ULTIMO pkId_operacion" 	 	

              				$sql_3 = 'SELECT pkId_operacion FROM toperaciones';
							$operaciones = $enlace->query($sql_3);

							$k=0;
                         	foreach ($operaciones as $ope) {

                         		$k++;
                         		$id_operacion  = $ope['pkId_operacion']; 

							} // endforeach 

							$id_operacion++;

							if ( $k == 0 ) {
												$id_operacion = 1;
							}

							unset($sql_3);


						// FIN "OBTENER ULTIMO pkId_operacion" 

						// INICIO "INTRODUCIR NUEVO pkId_operacion"

							$sql_4 = "INSERT INTO `toperaciones` (`pkId_operacion`, `Importe`, `Correo` ) VALUES ('$id_operacion', '$total_comp', '$correo')";   

                				if ($enlace->query($sql_4) === true) {
                                                     				//echo '<br>Su compra se ha registado correctamente<br>';
                				} else {
                      		 				//echo "ERROR: No fue posible ejecutar la consulta: $sql_4. " . $enlace->error;
                      		 				$no_insertar = true;
 		              		 			}

 		              		unset($sql_4);
 		              		 	
 		                // FIN "INTRODUCIR NUEVO pkId_operacion"
 		                
 		                // INICIO "OBTENER ULTIMO pkId_factura"

        					$sql_5 = 'SELECT pkId_factura FROM tfacturas';
							$facturas = $enlace->query($sql_5);

							$k=0;
                         	foreach ($facturas as $fact) {

                         		$k++;
								$id_factura  = $fact['pkId_factura']; 

							} // endforeach 

							$id_factura++;

							if ( $k == 0 ) {
											 $id_factura = 1;
							}

							unset($sql_5);

							echo "<br>Id_factura: " . $id_factura;

						// FIN "OBTENER ULTIMO ID"	

						// INICIO "INTRODUCIR NUEVO pkId_factura"

							$sql_6 = "INSERT INTO `tfacturas` (`pkId_factura`, `fkId_operacion`, `fkId_usuario`, `Importe`, `Fecha`) VALUES ('$id_factura', '$id_operacion', '$id_usu', '$total_comp', '$fecha')";

                				if ($enlace->query($sql_6) === true) {
                                                     				//echo '<br>Su compra se ha registado correctamente<br>';
                				} else {
                      		 				//echo "ERROR: No fue posible ejecutar la consulta: $sql. " . $enlace->error;
                      		 				$no_insertar = true;
 		              		 			}
 		              		 unset($sql_6);
 		              		
 		              	// FIN "INTRODUCIR NUEVO pkId_factura"

						// INICIO "INSERTAR ALBARAN EN LA TABLA ( albaranes ) EN LA BD"	

							// AÑADE valores a la base de datos utilizando el consulta INSERT

							$no_insertar = false;
							$id_detalle = 0;

							for ($c = 0; $c <= $longitud-1; $c++) {

								$id_detalle++;

                				$sql_8 = "INSERT INTO `tventas` (`pkId_detalle`, `fkId_factura`, `fkId_articulo`, `Cantidad`, `Precio`) VALUES ('$id_detalle', '$id_factura', '$art[$c]', '$can[$c]', '$pre[$c]')"; 

                				// REVISAR FECHA

                				if ($enlace->query($sql_8) === true) {
                                                     				//echo '<br>Su compra se ha registado correctamente<br>';
                				} else {
                      		 				//echo "ERROR: No fue posible ejecutar la consulta: $sql. " . $enlace->error;
                      		 				$no_insertar = true;
 		              		 			}
                 				
                    		}

                    		if ($no_insertar == false) {
                    										// echo "<br><span style='color: blue;font-size:25px;'>" . $usuario . "</span><span style='font-size:25px;'> Su compra se ha registado correctamente</span><br>";
							} else { 
									 echo "<br><span style='color: orange;font-size:25px;'>ERROR: alguna compra no ha sido introducida en la BD</span><br>";

									}

							unset($sql_8);

							echo "<br>ID_ALBARAN: " . $id_factura;

							$sql_9 = "SELECT * FROM tventas WHERE fkId_factura = '$id_factura'"; 
							$ventas = $enlace->query($sql_9);

							$total=0;
							foreach ($ventas as $v) {
	
														$total = $total + ( $v['Cantidad'] * $v['Precio']);					
							} // endforeach 

							 unset($mysqli);

                    		$numeroFactura = $id_factura;	
						
                        // INICIO "IR A ( formulario_pago.php)"

                            // unset($enlace);

              				$_SESSION["total"]=$total;
              				$_SESSION["fecha_actual"]=$fecha_actual;
              				header("Location:formulario_pago.php?var1=$total&var2=$fecha_actual&usuar=$usuario&ulfactura=$numeroFactura&uloperacion=$id_operacion");

              			// FIN "IR A ( formulario_pago.php)"

            			}

            		// FIN "COMPRAR"	


            		// INICIO "ELIMINAR ( PRODUCTO DEL FORMULARIO )"

						if(isset($_REQUEST["eliminar"])){

								$producto = $_REQUEST["eliminar"];
								unset($_SESSION["carrito"][$producto]);
								$o--;
								$_SESSION['o'] = $o;
					
								$_SESSION['usuario'] = $usuario;
								header("Location:index06dos.php?usuar=$usuario");
								
						}

					// FIN "ELIMINAR PRODUCTO DEL FORMULARIO"

					?> 

			  		</div>
 				</div>
 				
			</article>

        </section>

        <aside id="info">
            <h3>Cuida del medio ambiente</h3>
            <div class="contenedor">
                <div class="info-imagenes">
					<figure>
                        <img src="../imagenes_video/solar_termico.jpg" alt="Solar">
					</figure>
                    <h4>Solar</h4>
                </div>

                <div class="info-imagenes">
                	<figure>
                        <img src="../imagenes_video/geotermia01.jpg" alt="Geotermia">
                    </figure>    
					<h4>Geotermia</h4>
                </div>

                <div class="info-imagenes">
                	<figure>
                        <img src="../imagenes_video/aerotermia.jpg" alt="Aerotermia">
                    </figure>   
                    <h4>Aerotermia</h4>
                </div>

                <div class="info-imagenes">
                	<figure>
                        <img src="../imagenes_video/biomasa.jpg" alt="Biomasa">
                    </figure>    
                    <h4>Biomasa</h4>
                </div>
            </div>
			<blockquote></blockquote>
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

		<!-- Llamada a un fichero JavaScript externo -->
		<script src="presupuesto.js"></script>		
		
    </body>
  
</html>
 