<?php

  ob_start();
	
    if(isset($_GET["usuar"])) {
                                $_SESSION['usuario'] = $_GET["usuar"]; 
                                $usuario = $_SESSION['usuario'];	 

    } else {
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
         	<article style='position: relative; margin-left: 10px; margin-top:100px;'>
         	<h2>&emsp;&ensp;</h2>
         	
        		<figure>
               		<center><img src="../imagenes_video/todo_material.jpg" alt="materiales de instalación" ></center>
            	</figure>
            	<p>&emsp;&ensp;</p>    
        	</article>

        	<article id="bienvenidos05">

				<div id="contenedor">

					<div align="center">
						<p></p><p></p>   
						
            <h3><strong><span style='background-color: orange;color: black;'>&ensp;NUESTROS PRODUCTOS&ensp;</strong></span></h3>
						
            <p><strong><span style='font-size:25px;'>Solo para </span><span style='font-size:25px;background-color: yellow;'>" usuarios REGISTRADOS "</span></strong></p>
          
						<?php echo"<a href='index06uno.php?usuar=$usuario'><img src='../imagenes_video/carrito.png' width='50px;' alt='carrito' rel='noopener noreferrer'><strong><span style='background-color: turquoise;color: blue;font-size:25px;'>&ensp;Productos en Oferta&ensp;</strong></span></a>&ensp;&ensp;&ensp;&ensp;<a href='index06dos.php?usuar=$usuario'><img src='../imagenes_video/carrito.png' width='50px;' alt='carrito1' rel='noopener noreferrer'><strong><span style='background-color: turquoise;color: blue;font-size:25px;'>&ensp;Todos los productos&ensp;<strong></span></a>";?> 
						
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
  
     
  



