<?php

	session_start();


		if(isset($_GET["usuar"]))  { // ESTA DEFINIDA Viene de sesion.php
									
		  							$_SESSION['usuario'] = $_GET["usuar"]; 
		  							$usuario = $_GET["usuar"];   

		} else { // NO ESTA DEFINIDA
				
		  		$_SESSION['usuario'] = "Sin Registrar"; 
		  		$usuario = $_SESSION['usuario'];  
		  	}



		$array_mis_strings = array("([3V?&U2", "7Ya>xc{C", "pic;X0Ij", "#OLv}UKr", "-|D,!zh#", "N&=ce5L7", "J^9cY*U/", "!BavM|%Z", ")U=jThL#", "z3;5&p4l", "cf)3};7b", "DKIsdy3>",
                                   "p+KjYt7u", "@8FHGY3[", "D2%d=VZs", "fOw2NYCV", "0e-!gkzX", "U3ezI>gL", "aPS);nL=", "_d;I3iLA", "s}1&j@-%", "(+Lwv%p-", "OvmnA+yt", "5bCL*1wk", "R94h^XlB");        
        $longitud = 24;  
        $posicion = rand(1, $longitud);
    	//$str = mb_convert_encoding($array_strings[$posicion], "UTF-8");             
        $str = $array_mis_strings[$posicion];      

		$mensaje = '';
		$mensaje_error ="";
		$mensaje_valido ="";

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {    
             
        	//$valorIntroducido = mb_convert_encoding($_POST['valor'], "UTF-8");
                
               $valorIntroducido =  $_POST['valor'];
               $str = $_POST['campo_oculto'];
                
  
    		if ($valorIntroducido == $str) { // $cadena_aleatorios[$posicion]
            	$mensaje_error ="";    
        		$mensaje_valido = '✔ ¡CAPTCHA correcta!';
            	sleep(5);  
                    
                 // SOLUCION AL PROBLEMA *** Cannot modify header information - headers already sent by (output started at ***
                
           	if (headers_sent()) {
    			// las cabeceras ya se han enviado, no intentar añadir una nueva
			}
			else {
    				// es posible añadir nuevas cabeceras HTTP
                    $usuar = "Sin Registrar";
               
                    header("Location:sesion.php?usuar=$usuar"); 
				}  
                
                
             	// OTRA MANERA DE SOLUCIONAR EL PROBLEMA
                
                
                /* antes de cualquier línea de código html o php:

				<?php
					ob_start();
				?>

				// al final del documento:
 
				<?php
					ob_end_flush();
				?>
				Con esto, se pueden enviar los headers en cualquier lugar del documento. */
                
                
            // SOLUCION AL PROBLEMA *** Cannot modify header information - headers already sent by (output started at ***       
        	
            
                
    		} else {
                	$mensaje_valido ="";
        			$mensaje_error = '✘ CAPTCHA incorrecta. Inténtalo de nuevo.';
                      
        			$posicion = rand(1, $longitud);
    				//$str = mb_convert_encoding($array_strings[$posicion], "UTF-8");             
        			$str = $array_mis_strings[$posicion];    
    			}
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
                        
    					<p><strong><span style='font-size:18px;color: white;background-color: black;'>&emsp;<?=$str?>&emsp;</span></strong>   
    					<!-- Otra forma de presentar la variable en PHP dentro de HTML -->   
    					<!-- <p>Cadena generada: <?php // echo $str; ?></p> -->
                        
    					<form method="post">
         					<!-- <label for="valor">Introduce la cadena:</label>  -->
                            <input type="text" id="valor" name="valor" placeholder="Introduce la Captcha" size="14" minlength='8' required>
        					<input type="hidden" name="campo_oculto" value="<?=$str?>">    
        					<button style='color: white;background-color: green;' type="submit">&ensp;Validar&ensp;</button>
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
