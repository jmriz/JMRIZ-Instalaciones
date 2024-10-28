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

        <p style='position:absolute;top: 25px;text-indent: 380px;'><strong>Usuario: </strong><span style='color: blue;font-size:15px;'><?=$usuario?></span></p>
                
        <p style='position:absolute;top: 50px;text-indent: 400px;'><strong><a style='text-decoration: underline red;'href='../index.php'><span style='font-size:15px; border-radius: 5px 5px 5px 5px; color: white; background-color: red;'>&ensp;Cerrar Sesión&ensp;</span></a></strong></p>

        <?php echo"<p style='position:absolute;top: 75px;text-indent: 400px;'><strong><span style='border-radius: 5px; background-color: turquoise;'><a style='text-decoration: underline turquoise;' href='compras.php?usuar=$usuario' rel='noopener noreferrer'>&ensp;Tu espacio&ensp;</a></span></strong></p>";?>  
    
        <header>
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
		 		echo "<li><a href='index04.php?index=true&usuar=$usuario' rel='noopener noreferrer'>&ensp;Inicio&ensp;</a></li>&ensp;";
				echo "<li><a href='index01.php?usuar=$usuario' rel='noopener noreferrer'>&ensp;La Empresa&ensp;</a></li>&ensp;";
				echo "<li><a href='index02.php?usuar=$usuario' rel='noopener noreferrer'>&ensp;Trabajos&ensp;</a></li>&ensp;";
				echo "<li><a href='index03.php?usuar=$usuario' rel='noopener noreferrer'>&ensp;Contacto&ensp;</a></li>&ensp;";
                ?> 
              </center>
			</ul>	
		</nav>  
              
		<section>
			<h2>&nbsp;&nbsp;</h2>

			<article id="banner01">
				<h2>&nbsp;&nbsp;</h2>
				<figure>
            		<img src="../imagenes_video/instalaciones02.jpg" alt="instalaciones">
            	</figure>
        	</article>
              
        	<article id="bienvenidos04">
            	<br><h2><b>UNA BUENA EMPRESA DE INSTALACIONES</b></h2><br>
				<br>
            	<p><b>- Asesora a su clientes sobre las energías y materiales más eficientes para realización de su proyecto. &emsp; <br>
            	
            	- La generación de Energías Renovables, <a href="https://www.idae.es/sites/default/files/documentos/publicaciones_idae/guiasolartermica_idae-asit_v3.0_20210111_nipo.pdf" target="_blank" rel="noopener noreferrer">&ensp;<u>Térmica</u>,</a><a href="https://www.idae.es/uploads/documentos/documentos_14_Guia_tecnica_diseno_de_sistemas_de_intercambio_geotermico_de_circuito_cerrado_1d03dc08.pdf" target="_blank" rel="noopener noreferrer">&ensp;<u>Geotermia</u>,</a>&ensp;<u>Aerotermia</u> y <u>Bioenergía</u> produce <br> muchas menos emisiones que la quema de combustibles fósiles.&emsp;&ensp;&emsp;&emsp;&emsp;&emsp;  
            	</b></p>

                <br><h3> Energias Renovables </h3> 
    
                <div class="video-container">
                   <center>
                    <video controls="controls" width="420" height="315" autoplay="autoplay" muted="muted">
                        <source src="../imagenes_video/renovables.mp4" type="video/mp4">
                        <p>Fallback code if video isn't supported</p>/
                    </video>
                  </center>
                </div>

                <br>
                <strong><p><a href="https://www.idae.es/tecnologias/eficiencia-energetica/edificacion/reglamento-de-instalaciones-termicas-de-los-0" target="_blank" rel="noopener noreferrer">Guías Técnicas de Ahorro y Eficiencia Energética en Climatización</a></p></strong>

                <strong><a href="https://repositorio.upct.es/bitstream/handle/10317/1735/mif.pdf" target="_blank" rel="noopener noreferrer" style="color:orange;">Manual de Instalaciones</a><br>
                <p style="color:orange;">de fontanería, evacuación, saneamiento y energía solar en edificación</strong></p><br>



                <p><span style='font-size:30px;color: black;'>MATERIALES MAS USADOS</span></p>
                
                <div id="banner" style='position: relative; margin-left: 50px; margin-top:10px;'>  

                    <figure>
                        <img style='position: relative; margin-left: 180px; margin-top:10px;width: 75%; height: 75%;'  src="../imagenes_video/todo_material.jpg" alt="Materiales de Instalación" >
                    </figure>
                </div>

                <div id="pdf" style="font-size: 20px;">  

               
                    <a href="../documentos/cobre_manual.pdf" target="_blank" rel="noopener noreferrer">Cobre</a><br>
                    <a href="../documentos/inox_manual.pdf" target="_blank" rel="noopener noreferrer">Acero Inoxicable (Inox)</a><br>
                    <a href="../documentos/multicapa_manual.pdf" target="_blank" rel="noopener noreferrer">Tubo Multicapa</a><br>
                    <a href="../documentos/pex_manual.pdf" target="_blank" rel="noopener noreferrer">PEX (Polietileno Reticulado)</a><br>
                    <a href="../documentos/pb_manual.pdf" target="_blank" rel="noopener noreferrer">PB (Polibutileno)</a><br>
                    <a href="../documentos/ppr_manual.pdf" target="_blank" rel="noopener noreferrer">PPR ( Polipropileno Reticulado)</a><br>

                </div>

			</article>

		</section><br>

        <aside id="info">
            <h3>Cuida del medio ambiente</h3>
            <div class="contenedor">
                 <div class="info-imagenes">
                    <figure>
                        <img src="../imagenes_video/calderas.jpg" alt="Calderas">
                    </figure>   
                    <h4>Calderas</h4>
                </div>
                
                <div class="info-imagenes">
                    <figure>
                        <img src="../imagenes_video/gas.jpg" alt="Gas">
                    </figure>
                    <h4>Gas</h4>
                </div>

                <div class="info-imagenes">
                    <figure>
                        <img src="../imagenes_video/equipos_presion.jpg" alt="Equipos de Presión">
                    </figure>
                    <h4>Equipos Presión</h4>
                </div>

                <div class="info-imagenes">
                    <figure>
                        <img src="../imagenes_video/depositos.jpg" alt="Depósitos">
                    </figure>	
                    <h4>Depósitos</h4>
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
	 
      </body>
	  
</html>
  
     
  



