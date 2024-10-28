<?php 

    ob_start();

    session_start();
    $_SESSION['usuario'] = "Sin Registar"; 
    
    date_default_timezone_set('UTC');

    if (isset($_GET['var1']) && isset($_GET["var2"]) && isset($_GET["usuar"]) && isset($_GET["uloperacion"]) && isset($_GET["ulfactura"])) {   
    
        $importe = ($_GET['var1']);  
        $fecha = ($_GET['var2']); 
        $usuario = ($_GET['usuar']);
        $ulfactura = ($_GET['ulfactura']); 
        $uloperacion = ($_GET['uloperacion']);

        $_SESSION['usuario'] = $usuario;
        $_SESSION['importe'] = $importe;
        $_SESSION['fecha'] = $fecha;
        $_SESSION['ulfactura'] = $ulfactura;
        $_SESSION['uloperacion'] = $uloperacion;

        //echo "existe";

    } else { 
             
             echo " NO existe<br>";
         
            }

                                                
        if(isset($_REQUEST["cancelar"])){
                $uloperacion =  $_SESSION['uloperacion'];
                $ulfactura = $_SESSION['ulfactura'] ;
                $usuario =  ($_GET['usuar']);
                
                $c=2;  
                header("Location:finpago.php?ar=$c&usu=$usuario&numope=$uloperacion&numfact=$ulfactura"); 
            }  


        if(isset($_REQUEST["pagar"])){

                $usuario = $_POST['usuario'];
                $importe = $_SESSION['importe'];
                $fecha = $_SESSION['fecha']; 
                $ulfactura = $_SESSION['ulfactura'];
                $uloperacion = $_SESSION['uloperacion'];

                date_default_timezone_set("Europe/Madrid");
                    $fechaActual = date("Y-m-d");
                    $horaActual = date("h:i:s");
                    $fecha_actual = date("Y-m-d h:i:s"); 

                require('conexionBD.php');
                // echo "Conexión realizada con éxito<br>"; 

                // CONEXION 02

                unset($enlace);
                unset($conexion);


                $numeroFactura = $ulfactura;
                $nombre_apellidos  = $_REQUEST["nombre_apellidos"];
                $direccion  = $_REQUEST["direccion"];
                $direccion_env = $_REQUEST["direccion_env"];
                //$correo  = $_REQUEST["correo"];
                $nombre_tarjeta = $_REQUEST["nombre_tarjeta"];
                $numero_tarjeta = $_REQUEST["numero_tarjeta"];
                $mes_caducidad =  $_REQUEST["mes_caducidad"];
                $ano_caducidad =  $_REQUEST["ano_caducidad"];
                $cvv =  $_REQUEST["cvv"];

                $sql = 'SELECT pkId_usuario, Usuario FROM tusuarios';
                                $usuarios = $mysqli->query($sql);

                                foreach ($usuarios as $u) {
                                    if ($u['Usuario'] == $_SESSION['usuario']){
                                                                                $id_usu = $u['pkId_usuario'];
                                    }
                                } //endforeach

                                unset($sql);


               $sql_2 = "UPDATE toperaciones SET Nombre_apellidos='$nombre_apellidos', Direccion_fact='$direccion', Direccion_env='$direccion_env', Fecha='$fechaActual', Hora='$horaActual', Nombre_tarjeta='$nombre_tarjeta', Numero_tarjeta='$numero_tarjeta', Mes_caducidad='$mes_caducidad', Ano_caducidad='$ano_caducidad', Cvv='$cvv' WHERE pkId_operacion='$uloperacion'";
                 
                if ($mysqli->query($sql_2) === true) {
                                                    //echo '<br>Nueva operación añadida';                                                                 
                } else {
                       
                       echo "ERROR: No fue posible ejecutar la consulta: $sql_2. " . $mysqli->error;
                    }

                session_destroy();

                // cierra conexión BD
                mysqli_close($mysqli);

                $c=1;
                header("Location:finpago.php?ar=$c&usu=$usuario&numope=$uloperacion&numfact=$ulfactura"); 
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
        <link rel="stylesheet" href="../css/pago.css"> 

    </head>

    <body>

        <section>
            <!-- -->
            <br>
            <article> 

               <h4><span style="color: green">CANTIDAD A PAGAR: </span> <?php  echo $importe; ?> € </h4><br>  
                 
                 <div class="texto"> 

                    <div id="paymentSection">
                        
                        <form class="nuevoarticulo" action="<?=$_SERVER['PHP_SELF']?>" method="POST" id="paymentForm" required>

                            <ul>
                                <br>
                                <input type="hidden" name="card_type" id="card_type" value="" required/>

                                <li>
                                    <label for="name" style="color:#EA0075">&emsp;&ensp;<strong>Usuario</strong></label>       
                                    <input type="text" name="usuario" value="<?=$usuario?>" size="4">
                                </li>

                                <li>
                                    <label for="name" style="color:#EA0075">&emsp;&ensp;<strong>Nombre y Apellidos</strong></label>       
                                    <input type="text" id="name"  autofocus maxlength="70"  name="nombre_apellidos" size="20" required>
                                </li>

                                <li>
                                    <label for="home" style="color:#EA0075">&emsp;&ensp;<strong>Dirección de Facturacion</strong></label>    
                                    <input type="button" id="ayuda" value="Ayuda" onclick="abrir()" required>    
                                    <input type="text" id="home"  placeholder="C/Palacios nº 4 3B Avilés - Asturias - España CP 33400"  maxlength="70"  name="direccion" size="20" required>
                                </li>

                                <li>
                                    <label for="home1" style="color:#EA0075">&emsp;&ensp;<strong>Dirección de Envio</strong></label>    
                                      
                                    <input type="text" id="home"  placeholder="C/Palacios nº 4 3B Avilés - Asturias - España CP 33400"  maxlength="70"  name="direccion_env" size="20" >
                                </li>

                                <li>
                                    <label for="name_on_card">&emsp;&ensp;<strong>Nombre de la tarjeta</strong></label>

                                    <select name="nombre_tarjeta" id="name_on_card" required>
                                        <option value="MasterCard">MasterCard</option>
                                        <option value="Visa">Visa</option>
                                        <option value="PayPal">PayPal</option>
                                     </select>   

                                </li>

                                <li>
                                    <label for="card_number">&emsp;&ensp;<strong>Número de la tarjeta</strong><a href="javascript:void(0);" id="sample-numbers-trigger"></a></label>
                                    <div class="numbers" style="display: none;">
                                        <p>Pruebe alguno de estos números:</p>
                                        <ul class="list">
                                            <li><a href="javascript:void(0);">4000 0000 0000 0002</a></li>
                                            <li><a href="javascript:void(0);">5018 0000 0009</a></li>
                                            <li><a href="javascript:void(0);">5100 0000 0000 0008</a></li>
                                            <li><a href="javascript:void(0);">6011 0000 0000 0004</a></li>
                                        </ul>
                                    </div>
                                    <input type="text" pattern="^[0-9]{18,19}|(([0-9]{4}\s){3}[0-9]{3,4})$" placeholder="1234 5678 9012 3456" id="card_number" name="numero_tarjeta" class="" required>
                        
                                </li>
                                
                                <li>
                                    <label for="expiry_month">&emsp;&ensp;<strong>Mes de caducidad</strong></label>
                                    <input type="text" pattern="^[0-9]{2}$" placeholder="MM" maxlength="5" id="expiry_month" name="mes_caducidad" required>
                                </li>

                                <li>
                                    <label for="expiry_year">&emsp;&ensp;<strong>Año de caducidad</strong></label>
                                    <input type="text"  pattern="^[0-9]{4}$" placeholder="AAAA" maxlength="5" id="expiry_year" name="ano_caducidad" required>
                                </li>

                                <li>
                                    <label for="cvv">&emsp;&ensp;<strong>CVV</strong></label>
                                    <input type="text" pattern="^[0-9]{3}$" placeholder="123" maxlength="3" id="cvv" name="cvv" required>
                                </li>
                            </ul>

                        <?php 
                            echo"&emsp;&ensp;&emsp;&ensp;<input type='submit' value='&ensp;PAGAR&ensp;' name='pagar' style='color: black; background-color: orange;border-radius: 10px 10px 10px 10px;'/>";

							echo"&emsp;&ensp;&emsp;&ensp;<a style='text-decoration: underline rgb(55,145,190);' href='formulario_pago.php?cancelar=true&usuar=$usuario'><span style='font-size:22px; border-radius: 5px 5px 5px 5px; color: white; background-color: rgb(55,145,190);'>Cancelar Operacion</span></a>";
                        ?>
                        </form>
                    </div>
                    <div id="orderInfo" style="display: none;"></div>

            </article>  

        </section>

        <!-- Llamada a un fichero JavaScript externo -->
        <script src="../js/validar_tarjeta.js"></script>
        <script src="../js/abrir.js"></script>

               

        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.creditCardValidator.js"></script>

    </body>

</html>