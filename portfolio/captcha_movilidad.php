<?php

	    //session_start();
		
		ob_start();

		if(isset($_GET["usuar"]))  { // ESTA DEFINIDA Viene de sesion.php
									
		  							$_SESSION['usuario'] = $_GET["usuar"]; 
		  							$usuario = $_GET["usuar"];   

		} else { // NO ESTA DEFINIDA
				
		  		$_SESSION['usuario'] = "Sin Registrar"; 
		  		$usuario = $_SESSION['usuario'];  
		  	}

		// Crear un array con valores definidos
		
		$array_mis_strings = array("coche", "avion", "motocicleta", "barco", "autobus", "camion", "tren"); 	//	 "bicicleta"				

		$array_imagenes_movilidad = array("../imagenes_video/Movilidad/coche.png",  "../imagenes_video/Movilidad/avion.png","../imagenes_video/Movilidad/motocicleta.png",
                                         "../imagenes_video/Movilidad/barco.png", "../imagenes_video/Movilidad/autobus.png", "../imagenes_video/Movilidad/camion.png",
                                         "../imagenes_video/Movilidad/tren.png");

		// "../imagenes_video/Movilidad/bicicleta.png",
		

		$indice = rand(0,6);
		$imagen_fondo = $array_imagenes_movilidad [$indice]; //"../imagenes_video/Movilidad/coche.png"; 

        //echo "<br>";
		//print_r($array_imagenes_movilidad);

    	//$str = mb_convert_encoding($array_strings[$posicion], "UTF-8");            
		$str = $array_mis_strings[$indice];      

		$mensaje = '';
		$mensaje_error ="";
		$mensaje_valido ="";

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {    
             
        	//$valorIntroducido = mb_convert_encoding($_POST['valor'], "UTF-8");
                
               $valorIntroducido =  $_POST['valores'];
               $str = $_POST['campo_oculto'];
                
  
    		if ($valorIntroducido == $str) { // $cadena_aleatorios[$posicion]
            	$mensaje_error ="";    
        		$mensaje_valido = '✔ ¡Captcha correcta!';
            	sleep(5); 
                    
                $usuar = $_SESSION['usuario'];
                header("Location:index05.php?usuar=$usuar");            	      
                
    		} else {
                	$mensaje_valido ="";
        			$mensaje_error = '✘ Captcha incorrecta. Inténtalo de nuevo.';
                      
        			$posicion = rand(0, 6);
    				//$str = mb_convert_encoding($array_strings[$posicion], "UTF-8");             
        			$indice = rand(0,6);
                    $imagen_fondo = $array_imagenes_movilidad [$indice];
                    $str = $array_mis_strings[$indice];                    
                    
    			}
		}	
		
		ob_end_flush();
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
		 		 <li></li>&ensp;
                      
				<?php 
                      
					//echo "&ensp;";
					//echo "&ensp;";
					//echo "&ensp;";
                      
				?>
			  </center>
				
			</ul>	
		
        </nav>

		
        <section>

			<article>
                    
    			<center> 
                <div id="form" style='font-size:15px; position: relative; margin-left: 120px; margin-top:10px;'>	
					<fieldset style="width: 420px";><br>       
                        
    					<h1 style='color: blue;' >&ensp;Captcha 🔃</h1>
    					<!-- <p><strong><span style='font-size:18px;color: white;background-color: black;'>&emsp;<?//=$str?>&emsp;</span></strong></p><p></p> -->
                        <br>    
    					<!-- Otra forma de presentar la variable en PHP dentro de HTML -->   
    					<!-- <p>Cadena generada: <?php // echo $str; ?></p> -->
                         
                        <form method="post">    
                                
                       		 <input type="hidden" name="campo_oculto" value="<?=$str?>">
            
         					<center>
	  						<div class='box01' style='background:url(../imagenes_video/<?=$imagen_fondo?>) center center no-repeat scroll;'> 
             
        						<label for="opciones">Elige una opción:</label>
            						<select id="opciones" name="valores" value="">
                    					<option value="coche">Coche</option> 
                    					<option value="bicicleta">Bicicleta</option> 
                    					<option value="avion">Avión</option> 
                    					<option value="motocicleta">Motocicleta</option>
                    					<option value="barco">Barco</option>
                    					<option value="autobus">Autobús</option> 
                                        <option value="camion">Camión</option>   
                                        <option value="tren">Tren</option>        
            						</select>    
           
        						<button style='color: white;background-color: green;' type="submit">&ensp;Validar&ensp;</button>
                    
                 				<br><br><br><br><br>
         					</div>  
         					</center>         
  						</form><br>
    
            			<p style='color: red;'><?php echo $mensaje_error; ?></p>
            			<p style='color: green;'><?php echo $mensaje_valido; ?></p>
                            
                  	</fieldset>       
       			</div>
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
