<?php 

    //session_start();

    if(isset($_REQUEST["index"])){

                                    $usuar = $_SESSION['usuario'];  
                                    header("Location:../index.php?usuar=$usuar");  
  
                                    } 

    $usuario = $_GET["usuario"];
    $nombre = strtolower($_GET["nombre"]);
    $codigo = $_GET["codigo"];
    $correo = strtolower($_GET["email"]);
    $telefono = $_GET["telefono"];
    $tarea = $_GET["tarea"];
  
    date_default_timezone_set("Europe/Madrid");
    $fecha = date("Y-m-d"); 

    // CONEXION A LA BD  opcion 1

    require('conexionBD.php');

    // CONEXION 02

    unset($enlace);
	unset($conexion);

    $t=0;
    $sql_1 = 'SELECT Correo FROM tpresupuestos';
				$correos = $mysqli->query($sql_1);

				foreach ($correos as $c) {
						if ($c['Correo'] == $correo){

														$t++;
						}
				}
								
				unset($sql_1);   

	if ($t < 1) {


                    $k=0;
                    $sql_2 = 'SELECT * FROM tpresupuestos';
                                $presupuestos = $mysqli->query($sql_2);

                                foreach ($presupuestos as $presupuesto) {
                                    $k++;
                                    $id_presupuesto = $presupuesto['pkId_presupuesto'];
                                } // endforeach 

                                if ( $k == 0 ) {
                                     $id_presupuesto = 1;
                            
                                }else{
        
                                        $id_presupuesto++;
                                }



					$sql_3 = "INSERT INTO `tpresupuestos` (`pkId_presupuesto`,`Nombre`, `Correo`, `Cp` , `Telefono` , `Fecha` , `Tarea`) VALUES ('$id_presupuesto', '$nombre', '$correo', '$codigo', '$telefono', '$fecha', '$tarea' )";

                	if ($mysqli->query($sql_3) === true) {
                                                     		//echo '<br>Nuevo presupuesto añadido';
               		} else {
                      			echo "ERROR: No fue posible ejecutar la consulta: $sql_3. " . $mysqli->error;
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    	<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		
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

					<form name="formu">
						<!--  --> 	
						<fieldset>

							<br/>&emsp;&ensp;&emsp;&ensp;&emsp;&ensp;&emsp;&ensp;&emsp;&ensp;&emsp;&ensp;&emsp;&ensp;&emsp;&ensp;&emsp;&ensp;<b>PRESUPUESTO</b>
							<br/><br/>

							&emsp;&ensp;<b>- TIPO DE OBRA:</b>
							<select name="tipobra" id="tipobra">
								<option value="blanco"></option>
								<option value="nueva">Nueva</option>
								<option value="restauracion">Restauración</option>
								<option value="reparacion">Reparación</option>
							</select><br/><br/>

							&emsp;&ensp;<b>- USO:</b>
							<select name="uso" id="uso">
								<option value="blanco"></option>
								<option value="vivienda">Vivienda</option>
								<option value="negocio">Negocio</option>
							</select><br/><br/>

							&emsp;&ensp;<b>- TIPO DE TRABAJO:</b>
							<select name="tipotra" id="tipotra">
								<option value="blanco"></option>
								<option value="fontaneria">Fontanería</option>
								<option value="calefaccion">Calefacción</option>
								<option value="gas">Gas</option>
								<option value="equipos">Equipos</option>
								<option value="desatascos">Desatascos</option>
							</select><br/><br/>

							<span style='color:red;'><strong><p>&ensp;&emsp;&emsp;&ensp;&ensp;Debes escojer al menos una de las siguientes opciones</p></strong></span>

							&emsp;&ensp;<b>- <u>Fontanería</u></b><br/><br/>
						    &ensp;&ensp;&emsp;&emsp;&ensp;&ensp;<b>Instalación:</b>
							<select name="tipofon" id="tipofon">
								<option value="blanco"></option>
								<option value="fonvivicomp">Vivienda</option>
								<option value="baño">Baño</option>
								<option value="cocina">Cocina</option>
							</select><br/><br/> 

							&ensp;&emsp;&emsp;&ensp;&ensp;&ensp;&ensp;&emsp;&emsp;&ensp;&ensp;Puntos de Agua:
							<input type="number" min="0" max="20" name="puntosag" id="puntosag" size="2" value="0" >
							</select><br/><br/>  

							&ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&emsp;&ensp;<b>Remate:</b>
							<select name="fonremate" id="fonremate">
								<option value="blanco"></option>
								<option value="fongriferia"/>Grifería</option>
								<option value="sanitarios"/>Sanitarios</option>
								<option value="accesorios"/>Accesorios</option>
							</select></br></br>

							&ensp;&emsp;&emsp;&ensp;&ensp;&ensp;&ensp;&emsp;&emsp;&ensp;&ensp;Unidades:
							<input type="number" min="0" max="20" name="unidadesre" id="unidadesre" size="2" value="0">
							</select><br/><br/>  

							&emsp;&ensp;<b>- <u>Calefacción</u></b><br/><br/>
							 &ensp;&ensp;&emsp;&emsp;&ensp;&ensp;<b>Instalación:</b>
							<select name="tipocal" id="tipocal">
								<option value="blanco"></option>
								<option value="calvivicomp"/>Vivienda Completa</option>
								<option value="radiador"/>Radiador</option>
							</select><br/><br/>

							&ensp;&emsp;&emsp;&ensp;&ensp;&ensp;&ensp;&emsp;&emsp;&ensp;&ensp;Radiadores:
							<input type="number" min="0" max="20" name="radiadores" id="radiadores" size="2" value="0">
							</select><br/><br/>  

							&ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&emsp;&ensp;<b>Remate:</b>
							<select name="calremate" id="calremate">
								<option value="blanco"></option>
								<option value="calcaldera"/>Caldera</option>
								<option value="calradiador"/>Radiador</option>
								<option value="calregulacion"/>Regulación</option>
							</select><br/><br/>

							&ensp;&emsp;&emsp;&ensp;&ensp;&ensp;&ensp;&emsp;&emsp;&ensp;&ensp;Unidades:
							<input type="number" min="0" max="20" name="unidadesra" id="unidadesra" size="2" value="0">
							</select><br/><br/>  

							&emsp;&ensp;<b>- <u>Gas</u> Instalación:</b>
							<select name="tipogas" id="tipogas">
								<option value="blanco"></option>
								<option value="gasvivicomp"/>Gas</option>
							</select><br/><br/>
						
							&emsp;&ensp;<b>- <u>Equipos</u> Instalación:</b>
							<select name="tipoequipo" id="tipoequipo">
								<option value="blanco"></option>
								<option value="aerotermia">Aerotermia</option>
								<option value="geotermia">Geotermia</option>
								<option value="solar"/>Solar Tèrmica</option>
								<option value="biomasa"/>Biomasa</option>
								<option value="salcal"/>Salas de  Calderas</option>
								<option value="grupopre"/>Grupos de Presión</option>
								<option value="arbolcon"/>Arboles de Contadores</option>
								<option value="piscina"/>Piscinas</option>
								<option value="jacuzzi"/>Jacuzzis</option>
							</select></br><br>
						
							&emsp;&ensp;<b>- <u>Desatascos</u>:</b>
							<select name="tipodes" id="tipodes">
								<option value="blanco"></option>
								<option value="descol"/>Colectores</option>
								<option value="desani"/>Sanitarios</option>
							</select><br/><br>

							&ensp;&emsp;&emsp;&ensp;&ensp;&ensp;&ensp;&emsp;&emsp;&ensp;&ensp;Unidades:
							<input type="number" min="0" max="20" name="unidadesde" id="unidadesde" size="2" value="0">
							</select><br/><br/>  

							<br/>&ensp;&ensp;&emsp;&emsp;&ensp;&emsp;&emsp;&ensp;&emsp;&emsp;&ensp;&emsp;&emsp;&ensp;&emsp;&emsp;&ensp;<input style="color: black; background-color: turquoise;border-radius: 10px 10px 10px 10px;" type="button" value=" Calcular " onclick="procesa()"/>&emsp;&ensp;<input style="color: white; background-color: red;border-radius: 10px 10px 10px 10px;" type="reset" value=" Limpiar ">
							<br/><br />

						</fieldset>
						<br/>
					
					</form>  
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
		<script src="../js/presupuesto.js"></script>		
		
    </body>
  
</html>
  
     
  



