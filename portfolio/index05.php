<?php 

   
    
    if(isset($_GET["usuar"]))  { // ESTA DEFINIDA Viene de sesion.php
                                    
                                    $_SESSION['usuario'] = $_GET["usuar"]; 
                                    $usuario = $_SESSION['usuario'];  

        } else { // NO ESTA DEFINIDA
               
                $_SESSION['usuario'] = "Sin Registar";
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
		 		echo "<li><a href='index05.php?index=true&usuar=$usuario' rel='noopener noreferrer'>&ensp;Inicio&ensp;</a></li>&ensp;"; 
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
               		<img src="../imagenes_video/proyecto.jpg" alt="Proyecto" >
            	</figure>  
        	</article>

        	<article id="bienvenidos05">

				<div id="contenedor">

				 
			   		<form action='presupuesto.php' method='GET'>


						<fieldset>

							<br/>&emsp;&ensp;&emsp;&ensp;&emsp;&ensp;&emsp;&ensp;&emsp;&ensp;&emsp;&ensp;&emsp;&ensp;&emsp;&ensp;&emsp;&ensp;<b>PRESUPUESTO</b>
							<br/><br/>

							<?php echo"<input type='hidden' name='usuario' id='usuario' value='$usuario'>"; ?>  

							&emsp;&ensp;<b>- NOMBRE:</b>
							<input type="text" name="nombre" id="nombre" placeholder="CAMPO OBLIGATORIO" pattern="^[A-Za-z]{4,16}$" autofocus required /><br/><br/>
							
						 	&emsp;&ensp;<b>- CODIGO POSTAL:</b>
						 	<input type="text" name="codigo" id="codigo" placeholder="33000" pattern="^[0-9]{5}$" required size="6" /><br/><br/>

                        	&emsp;&ensp;<b>- CORREO ELECTRONICO:</b>
							<input type="email" name="email" id="email" placeholder="CAMPO OBLIGATORIO" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" required /><br/><br/>

							&emsp;&ensp;<b>- TELEFONO:</b>
                            <input type="tel" name="telefono" id="telefono" placeholder="666112233" pattern="^[0-9]{9}$" size="10" /><br/><br/>

                        	<br/>&ensp;&ensp;&emsp;&emsp;&ensp;&emsp;&emsp;&ensp;&emsp;&emsp;&ensp;&emsp;&emsp;&ensp;&emsp;&emsp;&ensp;<input style="color: black; background-color: turquoise;border-radius: 10px 10px 10px 10px" type="submit" value="&ensp;Siguiente&ensp;">
                        	<br/><br />

						</fieldset>
						<br/>
					</form>

                	<script>
							document.getElementById("nombre").value = valor;
							document.getElementById("email").value = valor1;
							document.getElementById("codigo").value = valor2;
							document.getElementById("telefono").value = valor3;
							document.getElementById("usuario").value = valor4;
					</script>

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
		
    </body>
  
</html>
  
     
  



