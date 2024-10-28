<?php 
     session_start();

    if (isset($_GET['ar'])) {

         $c = ($_GET['ar']); 
    }

    if (isset($_GET['usu'])) {

        $usuario = ($_GET['usu']); 
        $_SESSION['usuario'] = $usuario;
    }

    if (isset($_GET['numope'])) {

        $ul_ope = ($_GET['numope']);    

        // echo "<br> Existe Operacion";   
    
    }else{

        $ul_ope = 0;
        // echo "<br> NO EXITE Operacion"; 
    }

    if (isset($_GET['numfact'])) {

        $ul_factura = ($_GET['numfact']); 

        // echo "<br> Existe Albaran: ( " . $ul_factura . " ) "; 

     }else{   

        $ul_factura = 0;
        // necho "<br> NO EXITE Albaran"; 
    }
    
 
    // INICIO "CONEXION CON LA BD"


    require('conexionBD.php');
    // echo "Conexión realizada con éxito<br>"; 

    // CONEXION 02

    unset($enlace);
    unset($conexion);

    // FIN "CONEXION CON LA BD" 
        
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
        <link rel="stylesheet" href="../css/pago.css"> 

    </head>

    <body>

        </article> 
            <?php 

                // INICIO "OPCION 1 - COMPRA CONFIRMADA"

                if ($c == 1) {  

                            // INICIO "EXISTENCIAS"
                               
                                $sql_1 = "SELECT * FROM tventas WHERE fkId_factura = '$ul_factura'"; //REVISAR
                                $ventas = $mysqli->query($sql_1);
                    
                                $n=0;
                                foreach ($ventas as $venta) {

                                    $alba_art[$n] = $venta['fkId_articulo'];
                                    $alba_cant[$n] = $venta['Cantidad'];
                                    
                                    $n++;
                                }

                                unset($sql_1);           

                                $sql_2 = "SELECT pkId_articulo, Existencias FROM tarticulos";
                                $articulos = $mysqli->query($sql_2);

                                $m=0;
                                foreach ($articulos as $articulo) {
                                
                                    $art_id[$m] = $articulo['pkId_articulo'];
                                    $art_ex[$m] = $articulo['Existencias'];
                                    $m++;

                                }  // endforeach


                                $longitud = $n; 
                                $longitud_01 = $m;  

                                // VER EL ARRAY 

                                for($i=0; $i < $longitud; $i++) {

                                    for($j=0; $j < $longitud_01; $j++) {

                                        if ($alba_art[$i] == $art_id[$j]) {

                                            // echo "<br><br> ES IGUAL ";
                                                    
                                            $articulo = $art_id[$j];
                                            $existencias = $art_ex[$j] - $alba_cant[$i];

                                            $sql_3 = "UPDATE tarticulos SET Existencias = $existencias WHERE pkId_articulo = $articulo";


                                            if ($mysqli->query($sql_3) === true) {
                                                                                  // echo '<br>Nuevo albaran añadido<br>';
                                            } else {
                                                        echo "ERROR: No fue posible ejecutar la consulta: $sql_3. " . $mysqli->error;
                                                    }

                                        } else { 
                                                   // echo "<br>NO ES IGUAL";
                                                }

                                    } // end for ($j)

                                } // end for ($i)

                                 unset($sql_2);
                                 unset($sql_3);                             
                                 

                            // FIN "EXISTENCIAS"

                                unset($mysqli);    
                                //session_destroy();

                                echo"<p style='position:absolute;top: 350px;text-indent: 360px;'><a style='text-decoration: underline green;' href='factura.php?usu=$usuario&numfact=$ul_factura'><span style='font-size:30px; border-radius: 5px 5px 5px 5px; color: white; background-color: green; text-decoration-color:green'>&ensp;OPERACION REALIZADA - FACTURA&ensp;</span></p>";
 

                // FIN "OPCION 1 - COMPRA CONFIRMADA"    


                // INICIO "OPCION 2 - CANCELAR COMPRA"

                } else if ($c == 2) {
    

                                // INICIO "BORRA LA ULTIMA FACTURA"

                                        $sql_4 = "DELETE FROM tventas WHERE fkId_factura = '$ul_factura'"; 

                                        if ($mysqli->query($sql_4) === true) {
                                                   // echo"Albaran borrado";
                                        } else {
                                                echo "ERROR: No fue posible ejecutar la consulta: $sql_4. " . $mysqli->error;
                                            }
   

                                        $sql_5 = "DELETE FROM tfacturas WHERE pkId_factura = '$ul_factura'"; 

                                        if ($mysqli->query($sql_5) === true) {
                                                   // echo"Factura borrada"; 
                                        } else {
                                                echo "ERROR: No fue posible ejecutar la consulta: $sql_5. " . $mysqli->error;
                                            }

                                        $sql_6 = "DELETE FROM toperaciones WHERE pkId_operacion = '$ul_ope'"; 

                                        if ($mysqli->query($sql_6) === true) {
                                                   // echo"Operación borrada";
                                        } else {
                                                echo "ERROR: No fue posible ejecutar la consulta: $sql_6. " . $mysqli->error;
                                            }

                                  
                                // FIN "BORRA LA ULTIMA FACTURA"


                                        // INICIO "VOLVER A ( index06.php ) PAGINA DECOMPRAS"

                                        unset($sql_4);
                                        unset($sql_5);
                                        unset($sql_6);
                                        mysqli_close($mysqli);

                                        session_destroy(); 

                                        echo"<p style='position:absolute;top: 350px;text-indent: 360px;'><a style='text-decoration: underline red;' href='index06.php?usuar=$usuario'><span style='font-size:30px; border-radius: 5px 5px 5px 5px; color: white; background-color: red; text-decoration-color:red'>&ensp;OPERACION CANCELADA - VOLVER&ensp;</span></p>";

                                        // FIN "VOLVER A ( index06.php ) PAGINA DECOMPRAS"
                                }

                // FIN "OPCION 2 - CANCELAR COMPRA"                 
               
            ?>


        </article>  

        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.creditCardValidator.js"></script>

    </body>

</html>