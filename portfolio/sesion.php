<?php
		

		if(isset($_GET["usuar"]))  { // ESTA DEFINIDA Viene de sesion.php
									
		  							$_SESSION['usuario'] = $_GET["usuar"]; 
		  							$usuario = $_GET["usuar"];   

		} else { // NO ESTA DEFINIDA
				
		  		$_SESSION['usuario'] = "Sin Registrar"; 
		  		$usuario = $_SESSION['usuario'];  
		  	} 




		try {
						require('conexionBD.php');
						//echo "Conexión realizada con éxito (sesion.php)<br>";

						// CONEXION 03

						unset($conexion);
				  		unset($mysqli);	


						$sql_1 = 'SELECT Usuario, Rol FROM tusuarios';
						$usuarios = $enlace->query($sql_1);

							foreach ($usuarios ?: [] as $u) {
							
								if ($u['Usuario'] == $_SESSION['usuario']): 
 								endif;
							}
						
						unset($enlace);
						unset($sql_1);

				} catch (PDOException $e) {
											echo '<strong>Error de conexión: </strong>'.$e->getMessage();
						} catch (Exception $e) {
													echo $e->getMessage();
							
												}

		if(isset($_REQUEST["index"])){

                                    	
                                    	header("Location:../index.php");  
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

				<center>
			  	<?php 
		 		
		 		echo "<li><a href='sesion.php?index=true' rel='noopener noreferrer'>&ensp;Inicio&ensp;</a></li>&ensp;";
				echo "<li><a href='index01.php' rel='noopener noreferrer'>&ensp;La Empresa&ensp;</a></li>&ensp;";
				echo "<li><a href='index02.php' rel='noopener noreferrer'>&ensp;Trabajos&ensp;</a></li>&ensp;";
				echo "<li><a href='index03.php' rel='noopener noreferrer'>&ensp;Contacto&ensp;</a></li>&ensp;";
				?> 
			  </center>
		 		
			</ul>	
		</nav> 
        
        <section>

			<article>

					<form method="POST" action="acceso.php">
					
					<div id="form" style='font-size:15px; position: relative; margin-left: 120px; margin-top:10px;'>	
					
						<fieldset style="width: 420px";>

							<center><legend>Iniciar sesión</legend>
							<p>

								<strong><label style='color: blue;' for="usuario">Usuario: </label></strong>

								<input type="text"  placeholder="Entre 4-16 Caracteres" pattern="^[A-Za-z0-9]{4,16}$" name="usuario" required  minlength="4" maxlength="16" autofocus="autofocus" />
							</p>
							<p>
								<strong><label style='color: blue;' for="contra">Contraseña: </label></strong>
								<input type="password" placeholder="Entre 4-12 Caracteres, una letra minúscula, una letra mayúscula, un número y un caracter expecial"  pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@#$%^&*!])[A-Za-z\d@#$%^&*!]{4,12}$" name="contra" required minlength="4" maxlength="12" autofocus="autofocus"/>

							</p>
		
							<input type="submit" style='background-color: green;color:white' value="&emsp;Entrar&emsp;" /><br>
			
							<a style='color: blue;'href="signup.php"> Si no tienes cuenta, ¡crea una! </a>

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
 
		