<?php 
       

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
    </head>

    <body>

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
		 		
                echo" <li><a href='index02.php?index=true&usuar=$usuario' rel='noopener noreferrer'>&ensp;Inicio&ensp;</a></li>&ensp;"; 
				echo"<li><a href='index01.php?usuar=$usuario' rel='noopener noreferrer'>&ensp;La Empresa&ensp;</a></li>&ensp;";
				echo"<li><a href='#' rel='noopener noreferrer'>&ensp;Trabajos&ensp;</a></li>&ensp;"; 
				echo"<li><a href='index03.php?usuar=$usuario' rel='noopener noreferrer'>&ensp;Contacto&ensp;</a></li>&ensp;"; 
                ?>
              </center>
			</ul>	
		</nav> 
        
        <section>
			<h2>&nbsp;&nbsp;</h2>

        	<article id="banner01">
        		<h2>&nbsp;&nbsp;</h2>
        		<figure>
					<img src="../imagenes_video/mantenimiento01.jpg" alt="Mantenimiento" >
				</figure>
			</article>

            <article id="bienvenidos01">

                <p></p>
            
                <br><h2><b>Catálogo de servicios</b></h2><br>

                <figure>
                        <img src="../imagenes_video/texto.png" alt="Texto">
                </figure>
                
                    <br>
            </article>
        	
        	<article id="blog">

            	<div class="contenedor">
                    <br>
                	<figure>
                    	<img src="../imagenes_video/cocina.jpg" alt="Cocinas">
                	</figure>

                    <figure>
                        <img src="../imagenes_video/baño.jpg" alt="Baño">
                    </figure>

                    <figure>
                        <img src="../imagenes_video/calefaccion01.jpg" alt="Calefaccdión">
                    </figure>
                    
                 </div>
                  
        	</article>

            <!-- Presupuesto -->

            <article id="bienvenidos01">
                <br>
                <?php echo"<p><a style='font-size:25px;color: black; background-color: rgb(55,145,190)' href='captcha_movilidad.php?usuar=$usuario' rel='noopener noreferrer'> &emsp;Calcular Presupuesto&emsp;</a></p>";?>

            </article>

            <!-- Presupuesto -->

    	</section>

        <aside id="info">
            <h3>Cuida del medio ambiente</h3>
            <div class="contenedor">
                <div class="info-imagenes">
                	<figure>
                        <img src="../imagenes_video/instalacion01.jpg" alt="Viviendas Unifamiliares">
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
