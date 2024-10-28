 var ventana;

            function abrir(){
                ventana = window.open("url_name","nombre ventana","status=no,toolbar=yes,menubar=yes,top=200,left=50,width=300,height=400");
                ventana.document.body.style.backgroundColor= 'green';

                //  Crea el documento

                ventana.document.write("<html><head><title>Nueva Ventana</title></head>");
                ventana.document.write("<script></script></head>");
                ventana.document.write("<body>");
                ventana.document.write("<h1>Dirección de Facturación</h1>");
                ventana.document.write("<p></p>");
                ventana.document.write("<h2>Debes Consignar:</h2>");
                ventana.document.write("<form>\n");
                ventana.document.write("<p>C/ Nombre de la calle, nº, Piso, Letra, Población, Municipio, Comunidad Autonoma, Pais y Codigo Postal</p>");
                ventana.document.write("<a>CERRAR:</a><input type='button' value='C/' onclick='opener.dar(this.value)'><br><br>");
                ventana.document.write("<p></p>");
                ventana.document.write("</form></body>");
                ventana.document.write("</html>");  
            }
            
            function dar(valor){
                document.getElementById("home").value=valor;
                ventana.close();
            }