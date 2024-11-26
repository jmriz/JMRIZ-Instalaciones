<?php
		ob_start();
		session_start();

		if(isset($_GET["usuar"]))  { // ESTA DEFINIDA Viene de sesion.php
                                    
                                    $_SESSION['usuario'] = $_GET["usuar"]; 
                                    $usuario = $_SESSION['usuario'];


        } else { // NO ESTA DEFINIDA
               
                $_SESSION['usuario'] = "Sin Registrar"; 
                $usuario = $_SESSION['usuario'];  
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

		<nav>

			<ul>
		 		<li><a href="../index.php" rel="noopener noreferrer">&emsp;&ensp;Inicio&emsp;&ensp;</a></li>
				<li><a href="index01.php" rel="noopener noreferrer">&emsp;&ensp;La Empresa&emsp;&ensp;</a></li>
				<li><a href="index02.php" rel="noopener noreferrer">&emsp;&ensp;Trabajos&emsp;&ensp;</a></li>
				<li><a href="index03.php" rel="noopener noreferrer">&emsp;&ensp;Contacto&emsp;&ensp;</a></li>
			</ul>	
		</nav> 
        
        <section>

			<article>

				<form>

					<div id="form" style='font-size:15px; position: relative; margin-left: 120px; margin-top:10px;'>
					
						<fieldset style="width: 420px;">
							<center><legend>Crear cuenta</legend>
							<p>


								<strong><label style='color: blue;' for="usuario">Usuario: </label></strong>
								<input type="text" pattern="^[A-Za-z0-9]{4,16}$" name="usuario" placeholder="Entre 4-16 Caracteres" required minlength="4" maxlength="16"/>

							</p>
							<p>
								<strong><label style='color: blue;' for="contra">Contraseña: </label></strong>
								<input type="password" placeholder="&s1S" name="contra" required minlength="4" maxlength="12"/><br>
                                <span style='color: red;'> 
								* Entre 4 y 12 caracteres ( 1%Ss )
								May, Min, Num, Exp </span>
								
							</p>
							<p>
								<strong><label style='color: blue;' for="recontra">Repite la Contraseña: </label></strong>
								<input type="password" placeholder="Entre 4-12 Caracteres" name="recontra" required />
							</p>

							<p>
								<strong><label style='color: blue;' for="correo">Correo Electrónico: </label></strong>
								<input type="email" name="correo" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" placeholder="j@correo.es" required minlength="6" />
							</p>
							<input type="submit"  style='background-color: green;color:white' value="&emsp;Crear&emsp; " name="Intro"/><br>
							<p/>

					<?php            

        				if(isset($_REQUEST["Intro"])){

        				// CONEXION A LA BD  

        					require('conexionBD.php');

        					// CONEXION 01

        					unset($enlace);
				  			unset($mysqli);

        				// INICIO "CONOCER ULTIMO ID"

        					$sql_1 = 'SELECT pkId_usuario, Usuario FROM tusuarios';
							$usuarios = $conexion->query($sql_1);

							$k=0;
                         	foreach ($usuarios as $usu) {

                         			$k++;
									$id_usuario = $usu['pkId_usuario']; 

							} // endforeach 

							if ( $k == 0 ) {
											  $id_usuario = 1;
							}

							$id_usuario++;
							unset($sql_1);

							$id_usuario = $k + 1;

						// FIN "CONOCER ULTIMO ID"	

     						// Patrón para usar en expresiones regulares (admite letras acentuadas y espacios):	
							$patron_usuario = "/^[A-Za-z0-9]{4,16}$/";
     						$patron_contra = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@#$%^&*!])[A-Za-z\d@#$%^&*!]{4,12}$/";
     						$patron_correo = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";


            			// INICIO RECOGIDA DE VARIABLES DEL FORMULARIO  
                	
          					$usuario  = strtolower($_REQUEST["usuario"]);  
                			$contra  = $_REQUEST["contra"];   
                			$recontra = $_REQUEST["recontra"];
                			$correo = strtolower($_REQUEST["correo"]);     
                			$rol = "consultor";
					$fecha = date("Y-m-d");  
					
        				// FIN RECOGIDA DE VARIABLES DEL FORMULARIO 

                		// INICIO VALIDAR FORMULARIO

                			// Guardar mensajes y errores:
     						$error =0 ;

                			
                 					if ( preg_match($patron_usuario, $usuario) ) {
                    						// echo "<br>Usuario: [" . $usuario . "]";
                					}else{
                    						// echo "<br>El nombre debe de tener entre 4 y 16 caracteres, letras y números";
                    						"<script>alert(' El USUARIO ( " . $usuario . " ) no cumple las reglas')</script>";
                    						$error=1;
                    					}

           					$sql_2 = 'SELECT Usuario, Correo FROM tusuarios';
							$usuars = $conexion->query($sql_2);

                         	foreach ($usuars as $usuar) {


                         				if (($usuar["Usuario"]  == strtoupper($usuario)) || ($usuar["Usuario"]  == strtolower($usuario))) { 	
                         						// echo "<br>El Usuario ya existe";
                         						echo "<script>alert(' El USUARIO ( " . $usuario . " ) ya existe en la BD')</script>";
                         				   	 	$error=1;
                         				 }

                         				 if (($usuar["Correo"] == strtoupper($correo)) || ($usuar["Correo"] == strtolower($correo))) { 
                         				 		// echo "<br>El correo ya exite";
                         				 		echo "<script>alert(' El CORREO ( " . $correo . " ) ya existe en la BD')</script>";
                         				    	$error=1;
                         				 }			
							} // endforeach 

							unset($sql_2); 


           					// Contraseña:
             				if ( empty($contra) ) {
                				 	// echo "<br>Debes especificar la contraseña";
                				 	echo "<script>alert(' La CONTRASEÑA no cumple las reglas')</script>";
                				 	$error=1;

            				}else{
                					// Comprobar mediante una expresión regular, que sólo contiene letras y espacios:
                 					if ( preg_match($patron_contra, $contra) ) {
                    						// echo "<br>Contraseña: [" . $contra . "]";
                					}else{
                    						// echo "<br>La contraseña requiere entre 4 y 12 caracteres y al menos una letra minúscula, una letra mayúscula un número y un caracter expecial";
                    						echo "<script>alert(' La CONTRASEÑA no cumple las reglas')</script>";
                    						$error=1;
                    					}
           						}

           					// Correo:
             				if ( empty($correo) ) {
                				 	// echo "<br>Debe especificar el correo";
                				 	echo "<script>alert(' El CORREO ( " . $correo . " ) no cumple las reglas')</script>";
                				 	$error=1;
            				}else{
            						
                					// Comprobar mediante una expresión regular, que sólo contiene letras y espacios:
                 					if ( preg_match($patron_correo, $correo) ) {
                    						// echo "<br>Correo: [" . $correo . "]";
                					}else{
                    						// echo "<br>El correo requiere al menos una (@) y un (.)";
                    						echo "<script>alert(' El CORREO ( " . $correo . " ) no cumple las reglas')</script>";
                    						$error=1;
                    					}
           						}


							if ($error > 0) {

                				echo "<p><span style='color: red;'>ERROR:</span> Ha habido errores repite el registro de nuevo</p>";
                
                			}else {

                					// FIN VALIDAR FORMULARIO

                					if ($contra != $recontra) {

                						echo "<p><span style='color: red;'>ERROR:</span> No coincide la contraseña, repitela de nuevo</p>";
                
                					}else{

                							// encriptamos la contraseña

                							$contraseña  = hash_hmac('sha512',$contra, 'primeraweb');

                							// INSERTAR DATOS EN LA BD 

                					 		// creamos la instruccion de insertar
	
											$sql_3 = "INSERT INTO `tusuarios` (`pkId_usuario`, `Usuario`, `Password`, `Rol`, `Correo`, `Fecha_registro`) VALUES ('$id_usuario', '$usuario' , '$contraseña', '$rol', '$correo', '$fecha')";
                							if ($conexion->query($sql_3) === true) {
                					
                                                   		echo '<br>Nuevo usuario añadido'; // con numero ' . $conexion->idusuario;
                							} else {
                 
                										echo "ERROR: No fue posible ejecutar la consulta: $sql_3. " ;
                    								}

        									// CERRAR CONEXION CON LA BD 
											//$conexion->close();

											session_destroy();
									
											$_SESSION['usuario'] = $usuario;
             								header("Location:../index.php?usuar=$usuario");
             								exit;
                						}	
                				}		
        				}
     				?> 

							</center>
						</fieldset>
					</div>	
				</form>

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
