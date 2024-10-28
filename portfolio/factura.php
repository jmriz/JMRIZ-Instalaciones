<?php

		session_start();

		if (isset($_GET['usu']) && isset($_GET['numfact'])) {                                                           
                                                            $usuario = ($_GET['usu']);
                                                            $ul_fact = ($_GET['numfact']); 
                                                            $_SESSION['usuario'] = $usuario;
                                            
    	} 

		try {
				require('conexionBD.php');
				//echo "Conexión realizada con éxito<br>";	

				// CONEXION 01

				unset($enlace);
				unset($mysqli);


				$sql_1 = 'SELECT pkId_usuario, Usuario FROM tusuarios';
				$usuarios = $conexion->query($sql_1);

				foreach ($usuarios as $u) {
					if ($u['Usuario'] == $_SESSION['usuario']){
					}
				}
				

				$sql_2 = "SELECT * FROM tfacturas WHERE ( pkId_factura = '$ul_fact' )";
				$facturas = $conexion->query($sql_2);

				foreach ($facturas as $factura) {

											$ope_id = $factura['fkId_operacion'];
											$ul_albaran = $factura['pkId_factura'];     
											$fecha_fact = $factura['Fecha'];
				}

				$sql_3 = "SELECT * FROM toperaciones  WHERE ( pkId_operacion = '$ope_id' )";
				$operaciones = $conexion->query($sql_3);

				$sql_4 = "SELECT * FROM tventas WHERE ( fkId_factura = '$ul_albaran' )";      
				$albaranes = $conexion->query($sql_4);

				$sql_5 = 'SELECT * FROM tarticulos';
				$articulos = $conexion->query($sql_5);

 				//unset($conexion);
				// unset($sql);
			} catch (PDOException $e) {
					echo '<strong>Error de conexión: </strong>'.$e->getMessage();
				} catch (Exception $e) {
					echo $e->getMessage();
				} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>JMRIZ Instalaciones Factura</title>
    <link rel="stylesheet" href="../css/fontello.css">
	<link rel="stylesheet" href="../css/estilo.css">
   
</head>
<body>

<header>

	<p style='position:absolute;top: 60px;text-indent: 950px;'><strong><span style='color: green;font-size:50px;'>FACTURA</span></strong></p>

	<div id="titulo">
        		<figure>
					<img src="../imagenes_video/oip.png" alt="logo">
				</figure>
				<h3><span style='color: green;font-size:30px;'>J.M.R.IZ. <br> &ensp;Instalaciones&ensp;</span></h3>

				<p>&ensp;&ensp;&ensp;</p>

				<div class="direccion" style='color: green;font-size:20px;position:absolute;top: 20px;left: 150px;width: 300px;'>

					<p>NIF 11.000.000T</p>
					<p>PEPA, C/ LA Industria Nave 8</p>
					<p>CP 33402 Avilés</p>
					<p>Principado de Asturias</p>
					<p>669 00 00 00</p>
				</div>

				<div class="datos cabecera" style='color: black;font-size:20px;position:absolute;top: 120px;left: 850px;width: 300px;'>

						<p>Nº FACTURA: <span style='color: blue;'><?=$ul_fact?></span></p>
						<p>FECHA: <span style='color: blue;'><?=$fecha_fact?></span></p>
					
				</div>

				<div class="datos facturacion" style='color: black;font-size:20px;position:absolute;top:250px;left: 30px;width: 400px;'> 

					<?php 

					foreach ($operaciones as $operacion){ 

						$tarj_nom = $operacion['Nombre_tarjeta'];
						$tarj_num = $operacion['Numero_tarjeta'];
						$fecha_op = $operacion['Fecha'];

					?>	

						<p>DATOS FACTURACION</p>

						<p>Nombre: <span style='color: blue;'><?=$operacion['Nombre_apellidos']?></span></p>
						 <!-- <p>Dni:</p> -->
						<p>Dirección: <span style='color: blue;'><?=$operacion['Direccion_fact']?></span></p>
					
				</div>

</header>
				
				<div class="datos entrega" style='color: black;font-size:20px;position:absolute;top:266px;left: 600px;width: 400px;'> 



					<p>DATOS ENTREGA</p>
					
					<p>Nombre: <span style='color: blue;'><?=$operacion['Nombre_apellidos']?></span></p>

					<?php

						if ( $operacion['Direccion_env']  == "" ) {  ?>

							<p>Dirección: <span style='color: blue;'><?=$operacion['Direccion_fact']?></span></p>

				<?php	} else { ?>

							<p>Dirección: <span style='color: blue;'><?=$operacion['Direccion_env']?></span></p>
				<?php	}  

					

			  		 } // endforeach ?>
					
				</div>

				<div class="datos albaran" style='color: black;font-size:30px;position:absolute;top:450px;left: 200px;width: 900px;'> 

					<center>

						<table class="h" style='font-size:18px;'>
								
							<thead>
								<tr class="h">
									<th>Id</th>
									<th>Nombre</th>
									<th>Descripcion</th>
									<th>Cantidad</th>
									<th>Precio Unitario</th>
									<th>Importe Productos</th>	
								</tr>
							</thead>

							<tbody>

					<?php 

						$total=0;
						$j=0;
										
						foreach ($albaranes as $albaran){

						   

						   		$total_al = ( $albaran['Cantidad'] * $albaran['Precio']);

					?>			<tr>     
									<td><?=$albaran['fkId_articulo']?></td>

					<?php 	

									$albid = $albaran['fkId_articulo'];
									$sql_6 = "SELECT Nombre, Descripcion FROM tarticulos WHERE ( pkId_articulo = '$albid') "; 

									$albarides = $conexion->query($sql_6);
									foreach ($albarides as $albar){
										$nombre = $albar['Nombre'];
										$descripcion = $albar['Descripcion'];
													
									}

					?>

									<td><?=$nombre?></td>
									<td><?=$descripcion?></td>
									<td><?=$albaran['Cantidad']?></td>
									<td><?=$albaran['Precio']?> €</td>
									<td><?=$total_al?> €</td>

					<?php 
						   					
						   			$total = $total + ( $albaran['Cantidad'] * $albaran['Precio']);	
						   			$j++;
						}

						$subtotal = ( $total / 1.21 );		
					?>
								<tr>
							</tbody>
						</table>
					</center> 	
				</div>


				<div class="totales e iva" style='color: black;font-size:30px;position:relative;top: 1100px;left: 800px;width: 200px;'> 

					<center>

						<table class="h" style='font-size:15px;width: 300px;'>
								
							<thead>
								<tr class="h">
									<th>SubTotal</th>
									<th>IVA 21 % </th>
									<th>TOTAL</th>
								</tr>
							</thead>

							<tbody>
								<tr>
									<td class="h"><?=number_format($subtotal, 2, ',', ' ')?> €</td>
									<td class="h"><?=number_format($subtotal*0.21, 2, ',', ' ')?> €</td>
									<td class="h"><?=number_format($total, 2, ',', ' ')?>  €</td>
								</tr>
							</tbody>
						</table>
					</center> 	
				</div>

				<div class="condiciones y forma pago" style='color: black;font-size:20px;position:relative;top:1200px;left:320px;width:300px;'>  

						<p>FORMA PAGO</p>
						<p>Nombre tarjeta: <span style='color: blue;'><?=$tarj_nom?></span></p>
						<p>Nª Tarjeta: <span style='color: blue;'><?=$tarj_num?></span></p>
						<p>Fecha: <span style='color: blue;'><?=$fecha_op?></span></p>
						<p>&ensp;</p>
					
				</div>


				<div class="descargar" style='position:absolute;top: 5px;left:970px;font-size:15px;'>
					<p>&ensp;</p>
					<p>&ensp;</p>
					<p><strong><a style='text-decoration: underline orange;border-color: black;color: black; background-color: orange;' href='javascript:window.print()'>&ensp;IMPRIMIR&ensp;</a>

					 <?php echo"&ensp;&ensp;<span style='background-color: turquoise;'><a style='text-decoration: underline turquoise;color: black;' href='index06.php?usuar=$usuario' rel='noopener noreferrer'>&ensp;VOLVER&ensp;</a></span></strong></p>";?>

      			</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/bower_components/jquery/dist/jquery.min.js"><\/script>')</script>
<script src="assets/js/main.js"></script>
</body>
</html>