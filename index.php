
<?php 

	//session_start();  

	if(isset($_GET["usuar"]))  { // ESTA DEFINIDA Viene de sesion.php
									
		  							$_SESSION['usuario'] = $_GET["usuar"]; 
		  							$usuario = $_GET["usuar"];   

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
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> 
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="css/fontello.css">
		<link rel="stylesheet" href="css/estilo.css"> 
    </head>

    <body>
    	
        <header>  

        	 <p style='position:absolute;top: 25px;text-indent: 380px;'><strong>Usuario: </strong><span style='color: blue;font-size:15px;'><?=$usuario?></span></p>
        	 	
        	 <p style='position:absolute;top: 50px;text-indent: 400px;'><strong><a style='text-decoration: underline red;'href='index.php'><span style='font-size:15px; border-radius: 5px 5px 5px 5px; color: white; background-color: red;'>&ensp;Cerrar Sesión&ensp;</span></a></strong></p>

    		<?php 
					echo"<p style='position:absolute;top: 75px;text-indent: 400px;'><strong><span style='border-radius: 5px; background-color: turquoise;'><a style='text-decoration: underline turquoise;' href='portfolio/compras.php?usuar=$usuario' rel='noopener noreferrer'>&ensp;Tu espacio&ensp;</a></span></strong></p>";?>

        	<div id="titulo">

        		<figure>
					<img src="imagenes_video/oip.png" alt="logo">
				</figure>

				<h1>J.M.R.IZ. <br> &ensp;Instalaciones&ensp;</h1>
				
				<p>&ensp;&ensp;&ensp;
    			
				</p>
				
			</div>
        	
 		</header>

		<nav>

			<ul>

		 	  <center>
		 		 <li><a href="#" rel="noopener noreferrer">&ensp;Inicio&ensp;</a></li>&ensp;
				<?php 
					echo"<li><a href='portfolio/index01.php?usuar=$usuario' rel='noopener noreferrer'>&ensp;La Empresa&ensp;</a></li>&ensp;";
					echo "<li><a href='portfolio/index02.php?usuar=$usuario' rel='noopener noreferrer'>&ensp;Trabajos&ensp;</a></li>&ensp;";
					echo "<li><a href='portfolio/index03.php?usuar=$usuario' rel='noopener noreferrer'>&ensp;Contacto&ensp;</a></li>&ensp;";
				?>
			  </center>

				<form method="POST" action="portfolio/acceso.php">
					<div id="form"  style='font-size:12px'> 
					
						<fieldset style="width: 420px";>
							<center><br><p></p><a style='font-size:25px;border-radius: 20px; background-color: grey;color: orange" color: black;'href="portfolio/captcha_caracteres.php"> &emsp;Iniciar Sesion&emsp;</a><br><p></p><a style='color: blue;'href="portfolio/captcha_fontaneria.php">&emsp;Si no tienes cuenta, ¡crea una!&emsp;</a><br><p></p></center>
						</fieldset>
					</div>
				</form>
			</ul>	
		
		</nav>
              
		<section >
			
			<article id="banner" style='position: relative; margin-left: 50px; margin-top:10px;'>  

		    	<figure>
					<img style='position: relative; margin-left: 180px; margin-top:10px;width: 100%; height: 100%;'  src="imagenes_video/material01.jpg" alt="Instalación" >
				</figure>

				<div class="contenedor"  style="color:black;" >
					<h2>&emsp;&ensp;&emsp;&ensp;&emsp;&ensp;Instalaciones<br>&emsp;&ensp;&emsp;&ensp;&emsp;&ensp; de Fontanería y Calefacción</h2>
					<p>&emsp;&ensp;&emsp;&ensp;&emsp;&ensp;&emsp;&ensp;&emsp;&ensp;&emsp;&ensp;&emsp;&ensp;¿Que es una buena empresa de instalación para usted?</p>
					<?php echo"<a  style='position: relative; margin-left: 200px; margin-top:10px;color:black;' href='portfolio/index04.php?usuar=$usuario' rel='noopener noreferrer'><strong>Leer màs</strong></a>";?>
				</div>

			</article>

        	<article id="bienvenidos">
            	<br><h2>Tu empresa de confianza</h2><figure><img src="imagenes_video/mariposa1.png" alt="Mariposa"></figure>
            	<p>En ella encontraras la MEJOR INFORMACION para tu PROYECTO DE INSTALACION en ENERGIAS RENOVABLES.</p><br>
        	</article>
			
        	<article> 

        		<div id="container01">
					<h3><b><u>Fontanería y Calefacción mediante</u></b></h3><br>
					<ul class="c1">
						<li><b>&emsp;&ensp;&emsp;&ensp;&emsp;&ensp;&ensp;- Energía Solar Térmica</b></li>
						<li><b>- Aerotermia</b></li>
						<li><b>- Geotermia</b></li>
						<li><b>- Bioenergía</b></li>
					</ul>
					<br>
				</div>		       
	
				<div id="container">
					<h3><b>&emsp;&ensp;&emsp;&ensp;NUESTROS PROVEEDORES </b></h3>
					<table>
						<thead>
							<tr>
								<th>EMPRESA</th><th>SEDE</th><th>MERCADO</th><th>AÑO</th>
							</tr>
						</thead>	
				
						<tr>
							<td><a href="https://www.baxi.es" target="_blank" rel="noopener noreferrer">Baxi Roca</a></td><td>Barcelona</td><td>Calefacción y Climatización</td><td>1929</td>
						</tr>
					
						<tr>
							<td><a href="https://www.junkers-bosch.es/inicio/" target="_blank" rel="noopener noreferrer">Junkers - Bosch</a></td><td>Madrid</td><td>Calefacción y Climatización</td><td>1886</td>
						</tr>

						<tr>
							<td><a href="https://www.ferroli.com/es" target="_blank" rel="noopener noreferrer">Ferroli</a></td><td>Madrid</td><td>Calefacción y Climatización</td><td>1955</td>
						</tr>	

						<tr>
							<td><a href="https://www.saunierduval.es/para-el-usuario/" target="_blank" rel="noopener noreferrer">Sunier Duval</a></td><td>Vizcaya</td><td>Calefacción y Climatización</td><td>1907</td>
						</tr>

						<tr>
							<td><a href="https://www.vaillant.es/usuarios/" target="_blank" rel="noopener noreferrer">Vaillant</a></td><td> Madrid</td><td>Calefacción y Climatización</td><td>1981</td>
						</tr>	

						<tr>
							<td><a href="https://www.calometal.es/" target="_blank" rel="noopener noreferrer">Calometal</a></td><td> Madrid</td><td>Calefacción y Climatización</td><td>1998</td>
						</tr>	
					</table>
				</div>
			</article> 

        </section>
						
        <aside id="info">
            <h3>La satisfacción de nuestros clientes es lo más importante para nosotros</h3>
            <div class="contenedor">
                <div class="info-imagenes">
                    <figure>
                        <img src="imagenes_video/instalaciones.jpg" alt="Instalaciones">
                    </figure>
                    <h4>Instalaciones</h4>
                </div>

                <div class="info-imagenes">
                    <figure>
                        <img src="imagenes_video/calefaccion.jpg" alt="Calefacción">
                    </figure>
                    <h4>Calefacción</h4>
                </div>

                <div class="info-imagenes">
                    <figure>
                    	<img src="imagenes_video/griferia.jpg" alt="Grifería">
                    </figure>	
                    <h4>Grifería</h4>
                </div>

                <div class="info-imagenes">
                    <figure>
                        <img src="imagenes_video/sanitarios.jpg" alt="Sanitarios">
                    </figure>	
                    <h4>Sanitarios</h4>
                </div>
            </div>
			<blockquote></blockquote>

        </aside><br>
			   	  
		
        <footer>
			<div class="contenedor">
				<p class="copy"><b>J.M.R.IZ - Instalaciones &copy; 2024</b></p>
				<div class="sociales">
					<a class="icon-facebook" href="https://www.facebook.com" target="_blank" rel="noopener noreferrer"></a>
					<?php echo"<a class='icon-phone' href='portfolio/index03.php?usuar=$usuario' rel='noopener noreferrer'></a>";?>
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
  
