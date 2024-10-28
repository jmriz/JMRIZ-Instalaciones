    

function procesa() {
    
    var t1,t2,t3,t4,t5,t6,t7,t8,t9,t10,t11,t12,t13,t14,t15;
    var a, apuntosag, aunidadesre, aradiadores, aunidadesra, aunidadesdes, ingas, rite, precio01,precio02, precio03,total;
    const unigas= 600;

    var t = [t1,t2,t3,t4,t5,t6,t7,t8,t9,t10];
    var b =[];

    var trabajos = ["nueva", "restauracion", "reparacion", "vivienda", "negocio", "fontaneria", "calefaccion", "gas", "equipos", "desatascos", "fonvivicomp", "baño", "cocina", "fongriferia", "sanitarios", "accesorios", "calvivicomp", "radiador", "calcaldera", "calradiador", "calregulacion", "gasvivicomp", "aerotermia", "geotermia", "solar", "biomasa", "salcal", "grupopre", "arbolcon", "piscina", "jacuzzi", "descol", "desani", "blanco"];

    var enumtrabajos = ["NUEVA", "RESTAURACION", "REPARACION", "VIVIENDA", "NEGOCIO", "FONTANERIA", "CALEFACCION", "GAS", "EQUIPOS", "DESATASCOS", "VIVIENDA COMPLETA", "BAÑO", "COCINA", "GRIFERIA", "SANITARIOS", "ACCESORIOS", "VIVIENDA COMPLETA", "RADIADOR", "CALDERA", "RADIADOR", "REGULACION", "GAS", "AEROTERMIA", "GEOTERMIA", "SOLAR", "BIOMASA", "SALA DE CALDERA", "GRUPO DE PRESION", "ARBOL DE CONTADORES", "PISCINA", "JACUZZI", "COLECTOR", "SANITARIO", "NO"];

    t1 = document.getElementById("tipobra").value;  
    t2 = document.getElementById("uso").value;
    /*a = document.formu.uso.value; alert (a);*/  
    t3 = document.getElementById("tipotra").value; 
    t4 = document.getElementById("tipofon").value; 
    t5 = document.getElementById("fonremate").value;  
    t6 = document.getElementById("tipocal").value;
    t7 = document.getElementById("calremate").value;   
    t8 = document.getElementById("tipogas").value; 
    t9 = document.getElementById("tipoequipo").value; 
    t10 = document.getElementById("tipodes").value;

    t11 = parseInt(document.getElementById("puntosag").value);  
    t12 = parseInt(document.getElementById("unidadesre").value);
    t13 = parseInt(document.getElementById("radiadores").value);
    t14 = parseInt(document.getElementById("unidadesra").value);
    t15 = parseInt(document.getElementById("unidadesde").value);  

    /*alert(t11); alert(t12); alert(t13); alert(t14); alert(t15);*/

// Inicio HTML A PDF 

    document.addEventListener("DOMContentLoaded", () => {
    // Escuchamos el click del botón
    const $boton = document.querySelector("#btnCrearPdf");
    $boton.addEventListener("click", () => {
        const $elementoParaConvertir = document.body; // <-- Aquí puedes elegir cualquier elemento del DOM
        html2pdf()
            .set({
                margin: 1,
                filename: 'JMRI_presupuesto.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 3, // A mayor escala, mejores gráficos, pero más peso
                    letterRendering: true,
                },
                jsPDF: {
                    unit: "in",
                    format: "a3",
                    orientation: 'portrait' // landscape o portrait
                }
            })
            .from($elementoParaConvertir)
            .save()
            .catch(err => console.log(err));
                
        });
    });

// Fin HTML A PDF 
    
    var i=true;

    for (let f = 0; f < trabajos.length ; f++) {

        if (t1 === trabajos[f])  {
                                    b.push(enumtrabajos[f]);                    
        }
    }   
              
     for (let f = 0; f < trabajos.length ; f++) {
                
        if (t2 === trabajos[f])  {

                                    b.push(enumtrabajos[f]);                     
        }
    } 

     for (let f = 0; f < trabajos.length ; f++) {
                
        if (t3 === trabajos[f])  {

                                    b.push(enumtrabajos[f]);                     
        }
    } 

    for (let f = 0; f < trabajos.length ; f++) {
                
        if (t4 === trabajos[f])  {

                                    b.push(enumtrabajos[f]);                     
        }
    } 

    for (let f = 0; f < trabajos.length ; f++) {
                
        if (t5 === trabajos[f])  {

                                    b.push(enumtrabajos[f]);                     
        }
    } 

     for (let f = 0; f < trabajos.length ; f++) {
                
        if (t6 === trabajos[f])  {

                                    b.push(enumtrabajos[f]);                     
        }
    } 

    for (let f = 0; f < trabajos.length ; f++) {
                
        if (t7 === trabajos[f])  {

                                    b.push(enumtrabajos[f]);                     
        }
    } 

    for (let f = 0; f < trabajos.length ; f++) {
                
        if (t8 === trabajos[f])  {

                                    b.push(enumtrabajos[f]);                     
        }
    } 

    for (let f = 0; f < trabajos.length ; f++) {
                
        if (t9 === trabajos[f])  {

                                    b.push(enumtrabajos[f]);                     
        }
    } 

     for (let f = 0; f < trabajos.length ; f++) {
                
        if (t10 === trabajos[f])  {

                                    b.push(enumtrabajos[f]); 
                                    /*alert ("- Uso:  *** " + enumtrabajos[f] + "  ***");
                                    alert(b.length);
                                    alert(b);*/                      
        }
    } 



   if (( b[3] === "VIVIENDA COMPLETA") || (b[3] === "BAÑO") || (b[3] === "COCINA"))  { 
                    apuntosag = t11*120; 
                } else { t11 = 0; apuntosag = 0; }


 /*alert("FON Instalación: [ " +  b[3] + " ]\n Puntos agua: [ " + t11 + " ] * 120 € = " + apuntosag + " € "); */

    
    if (b[4] === "ACCESORIOS") { 
            precio01=0 ; t12 = 0; aunidadesre = 0; 

        } else if (b[4] === "GRIFERIA") {
                        precio01= 60; aunidadesre = t12*60;

                    } else if (b[4] === "SANITARIOS") { 
                                    precio01= 90; aunidadesre = t12*90; 
                                
                                }else {  precio01=0; t12 = 0; aunidadesre = 0; }


/* alert("FON Remate: [ " +  b[4] + " ]\n Unidades: [ " + t12 + " ] * " + precio01 + " € = " + aunidadesre + " € "); */

 
    
    if (( b[5] === "VIVIENDA COMPLETA") || (b[5] === "RADIADOR")) { 
            rite = 190; aradiadores = t13*100;
        } else { t13 = 0; rite = 0; aradiadores = 0;apuntosag = 0;}


/* alert("CAL Instalación: [ " +  b[5] + " ]\n Radiadores: [ " + t13 + " ] * 100 € = " + aradiadores + " € \n RITE: " + rite); */

    
        if (b[6] === "CALDERA") { 
                precio02= 200; aunidadesra = t14*200;
            } else { t14 = 0; precio02= 0; aunidadesra = 0; }


/* alert("CAL Remate: [ " +  b[6] + " ]\n Unidades: [ " + t14 + " ] * " + precio02 + " € = " + aunidadesra + " € ");*/


        if (b[7] === "GAS") { 
                ingas = unigas; 
            } else { ingas = 0;} 


/* alert("GAS: [ " +  b[7] + " ]\n " + ingas); */    
                            
        
        if (b[9] === "COLECTOR") { 
                precio03= 150; aunidadesde = t15*precio03;                        

            } else if (b[9] === "SANITARIO") { 
                precio03= 70; aunidadesde = t15*precio03; 

                } else { t15 = 0; precio03= 0; aunidadesde = 0; }


/* alert("DESATASCOS: [ " +  b[9] + " ]\n Unidades: [ " + t15 + " ] * " + precio03 + " € = " + aunidadesde + " € ");*/

    
    total = /*apuntosag*/ t11*120  + aunidadesre + aradiadores + rite + aunidadesra + ingas + aunidadesde;

/* alert("TOTAL = " + total + " € IVA no incluido. Presupuesto aproximado"); */

    
    if ( (t4 === "blanco") && (t5 === "blanco") && (t6 === "blanco") && (t7 === "blanco") && (t8 === "blanco") && (t9 === "blanco") && (t10 === "blanco")) {
                              alert ('*** DEBES ESCOJER AL MENOS UNA OPCION PARA PODER REALIZAR EL PRESUPUESTO ***');
                } else {

                            ventana = window.open("",'v2','left=100,top=0,width=1000,height=1000');  with (ventana.document) {
                                                open();
                                                writeln("<Html><Head></Head><Body bgcolor='#FFFFCC'>");
                                                writeln("<b><span style='color: #0000FF'>*** DATOS RECOGIDOS PARA EL PRESUPUESTO ***&emsp;&emsp;&ensp;&ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&emsp;&emsp;JMRIZ Instalaciones</span></b><br/>");
                                                writeln("<br /> - TIPO DE OBRA: [ " + b[0] + " ]");
                                                writeln("<br /> - USO: [ " + b[1] + " ]");
                                                writeln("<br /> - TIPO DE TRABAJO: [ " +  b[2] + " ]");
                                                writeln("<br /> ");
                                                writeln("<br /> &emsp;&emsp;&ensp;&ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&emsp;&emsp;<b>*** PRECIOS VALIDOS PARA EL PRINCIPADO DE ASTURIAS ***</b>");
                                                writeln("<br /> "); 
                                                writeln("<br /> &ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&emsp;&emsp;<b>*** EL IVA NO ESTA INCLUIDO EN LOS PRECIOS ***</b>");
                                                writeln("<br /> - <b><span style='color: purple'>FONTANERIA</span></b>"); 
                                                writeln("<br /> ");
                                                writeln("<br /> &ensp;&ensp;&emsp;&emsp;<b>Instalación:</b> [ " +  b[3] + " ]");
                                                writeln("<br /> ");
                                                writeln("<br /> <b><span style='color: blue'> &ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&emsp;&emsp;Puntos agua: [ " + t11 + " ] * 120 € = " + t11*120 /*apuntosag*/ + " € </span></b>"); 
                                                writeln("<br /> ");
                                                writeln("<br /> &ensp;&ensp;&emsp;&emsp;- El precio es por PUNTO de AGUA, a razón de *** <b><span style='color: green'>120 €</span></b> *** punto.");
                                                writeln("<br /> &ensp;&ensp;&emsp;&emsp;&emsp; Un punto de agua es la toma de ACS o AFS de cada sanitario, asi como cada llave de corte de ACS o AFS al cuarto húmedo.");                                                
                                                writeln("<br /> ");
                                                writeln("<br /> &ensp;&ensp;&emsp;&emsp;&emsp;&emsp;   <b>Incluye:</b>");
                                                writeln("<br /> &ensp;&ensp;&emsp;&emsp;&emsp;&emsp; - La instalación de la tuberia de ACS y AFS en MULTICAPA, accesorios y tapones.  .");
                                                writeln("<br /> &ensp;&ensp;&emsp;&emsp;&emsp;&emsp; - La instalación de la tuberia de desagúe y accesorios en PVC (de la medida correspondiente) al enganche de la bajante");
                                                writeln("<br /> &ensp;&ensp;&emsp;&emsp;&emsp;&emsp;&emsp; o al bote sifónico." );
                                                writeln("<br /> &ensp;&ensp;&emsp;&emsp;&emsp;&emsp; - La prueba de estanqueidad de la instalación.");
                                                writeln("<br /> ");
                                                writeln("<br /> &ensp;&ensp;&emsp;&emsp;&emsp;&emsp;   <b>No incluye:</b>");
                                                writeln("<br /> &ensp;&ensp;&emsp;&emsp;&emsp;&emsp; - El ROZADO de los tabiques, o suelo ni su ALICATADO, intalación de fregaderos, griferia y sanitarios." );
                                                writeln("<br /> &ensp;&ensp;&emsp;&emsp;&emsp;&emsp; - Contador de agua, ni tuberia exterior a la vivienda." );
                                                writeln("<br /> ");
                                                writeln("<br /> &ensp;&ensp;&emsp;&emsp;<b>Remate:</b> [ " +  b[4] + " ]");
                                                writeln("<br /> ");
                                                writeln("<br /> <b><span style='color: blue'> &ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&emsp;&emsp;Unidades: [ " + t12 + " ] * " + precio01 + " € = " + aunidadesre + " € </span></b>");
                                                writeln("<br /> ");
                                                writeln("<br /> &ensp;&ensp;&emsp;&emsp;- Cambio de grifería&emsp;&emsp;*** <b><span style='color: green'>60 €</span></b> *** .");
                                                writeln("<br /> &ensp;&ensp;&emsp;&emsp;- Colocación de sanitario *** <b><span style='color: green'>90 €</span></b> *** .");
                                                writeln("<br /> &ensp;&ensp;&emsp;&emsp;- Colocación de accesorio , <b><a href='mailto:ngx60168@educastur.es' target='_blank' rel='noopener noreferrer'>pedir presupuesto PERSONALIZADO.</a></b>");
                                                writeln("<br /> ");
                                                writeln("<br /> &ensp;&ensp;&emsp;&emsp;&emsp;&emsp; - El precio del fregadero, los sanitarios y grifería <b>no se incluyen en el precio de colocación</b>, si está incluido las llaves de escuadra, ");
                                                writeln("<br /> &ensp;&ensp;&emsp;&emsp;&emsp;&emsp;&emsp; valvulas de desagüe, sifones, ramalillos, embellecedores ");
                                                writeln("<br /> ");
                                                writeln("<br /> - <b><span style='color: purple'>CALEFACCION</span></b>");
                                                writeln("<br /> "); 
                                                writeln("<br /> &ensp;&ensp;&emsp;&emsp;&ensp;<b>Instalación:</b> [ " +  b[5] + " ]");
                                                writeln("<br /> ");
                                                writeln("<br /> <b><span style='color: blue'> &ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&emsp;&emsp;Radiadores: [ " + t13 + " ] * 100 € = " + aradiadores + " € </span></b>");
                                                writeln("<br /> ");
                                                writeln("<br /> <b><span style='color: blue'> &ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&emsp;&emsp;RITE: " + rite + " € </span></b>");
                                                writeln("<br /> ");
                                                writeln("<br /> &ensp;&ensp;&emsp;&emsp;- Precio por TOMA para RADIADOR en MULTICAPA a razón de *** <b><span style='color: green'>100 €</span></b> ***.");
                                                writeln("<br /> &ensp;&ensp;&emsp;&emsp;- Certificado y memoria de la calefacción (RITE) *** <b><span style='color: green'>190 €</span></b> ***.");
                                                writeln("<br /> &ensp;&ensp;&emsp;&emsp;- Para calefacción por SUELO RADIANTE <b><a href='mailto:ngx60168@educastur.es' target='_blank' rel='noopener noreferrer'>pedir presupuesto PERSONALIZADO.</a></b>");
                                                writeln("<br /> ");
                                                writeln("<br /> &ensp;&ensp;&emsp;&emsp;&ensp;<b>Remate:</b> [ " +  b[6] + " ]");
                                                writeln("<br /> ");
                                                writeln("<br /> <b><span style='color: blue'> &ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&emsp;&emsp;Unidades: [ " + t14 + " ] * " + precio02 + " € = " + aunidadesra + " € </span></b>");
                                                writeln("<br /> ");
                                                writeln("<br /> &ensp;&ensp;&emsp;&emsp;- EL precio de la CALDERA dependera de la </b>marca, tipo de combustible y potencia</b> de la misma, <b><a href='mailto:ngx60168@educastur.es' target='_blank' rel='noopener noreferrer'>pedir presupuesto PERSONALIZADO.</a></b>");
                                                writeln("<br /> &ensp;&ensp;&emsp;&emsp;- El precio de la <b>conexión</b> de CALDERA mural es de *** <b><span style='color: green'>200 €</span></b> ***.");
                                                writeln("<br /> ");
                                                writeln("<br /> &ensp;&ensp;&emsp;&emsp;- EL precio de los RADIADORES dependera de la </b> marca, modelo,material de construcción y potencia</b>");
                                                writeln("<br /> &ensp;&ensp;&emsp;&emsp;&emsp; En radiadores de ALUMINIO el precio es por nº de elementos + los reglajes <b><span style='color: green'>(25 €)</span></b> + precio de montaje e instalación.");
                                                writeln("<br /> &ensp;&ensp;&emsp;&emsp;&emsp;  <b>Pedir presupuesto PERSONALIZADO.</b>");
                                                writeln("<br /> ");
                                                writeln("<br /> - Instalación <b><span style='color: purple'>GAS:</span></b> [ " +  b[7] + " ]");
                                                writeln("<br /> ");
                                                writeln("<br /> <b><span style='color: blue'> &ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&emsp;&emsp;IRI + Alta Instalación = " + ingas + " € </span></b>");
                                                writeln("<br /> ");
                                                writeln("<br /> &ensp;&ensp;&emsp;&emsp;- El IRI (Instalación Receptora Individual) + Alta de suministro es de *** <b><span style='color: green'>600 €</span></b> ***.");
                                                writeln("<br /> ");
                                                writeln("<br /> - Instalación <b><span style='color: purple'>EQUIPOS:</span></b> [ " +  b[8] + " ]");
                                                writeln("<br /> ");
                                                writeln("<br /> &ensp;&ensp;&emsp;&emsp;- Debido a la gran variedad de marcas, carasteristicas técnicas, modelos <b><a href='mailto:ngx60168@educastur.es' target='_blank' rel='noopener noreferrer'>pedir presupuesto PERSONALIZADO.</a></b>");
                                                writeln("<br /> ");
                                                writeln("<br /> - <b><span style='color: purple'>DESATASCOS:</span></b> [ " +  b[9] + " ]");
                                                writeln("<br /> ");
                                                writeln("<br /> <b><span style='color: blue'> &ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&emsp;&emsp;Unidades: [ " + t15 + " ] * " + precio03 + " € = " + aunidadesde + " € </span></b>");
                                                writeln("<br /> ");
                                                writeln("<br /> &ensp;&ensp;&emsp;&emsp;- Precio para el alquiler de un cuba es de *** <b><span style='color: green'>150 €</span></b> *** hora.");
                                                writeln("<br /> &ensp;&ensp;&emsp;&emsp;- Precio para un aparato sanitario *** <b><span style='color: green'>70 €</span></b> ***.");
                                                writeln("<br /> ");
                                                writeln("<br /> <b><span style='color: red'> &ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&emsp;&emsp;TOTAL = *** " + total + " € *** IVA no incluido.&ensp;&ensp;&emsp;&emsp; PRESUPUESTO APROXIMADO</span></b>");                                           
                                                writeln("<br /> ");
                                                writeln("<br /><br />&emsp;&emsp;&ensp;&ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&emsp;&emsp;&ensp;&ensp;<a style='text-decoration: underline orange;color: black; background-color: orange;border-radius: 10px 10px 10px 10px;' href='javascript:window.print()'>&ensp;Imprimir&ensp;</a>&ensp;&ensp;&ensp;<Form><Input style='color: black; background-color: turquoise;border-radius: 10px 10px 10px 10px;' type=button value=Cerrar onclick=window.close()></form>");
                                            

                                                close();
                                            }
                                            ventana.focus(); 
                                                              
                        }
}

	
                                                /* PLANTILLA SIMPLE */
                                                /*ventana = window.open("",'v2','left=720,top=150,width=450,height=730');  with (ventana.document) {
                                                open();
                                                writeln("<Html><Head></Head><Body bgcolor='#FFFFCC'>");
                                                writeln("<span style='color: #0000FF'>*** DATOS RECOGIDOS PARA EL PRESUPUESTO ***</span><br />");
                                                writeln("<br /> - Tipo de OBRA: [ " + b[0] + " ]");
                                                writeln("<br /> - Uso: [ " + b[1] + " ]");
                                                writeln("<br /> - Tipo de TRABAJO: [ " +  b[2] + " ]");
                                                writeln("<br /> ");
                                                writeln("<br /> - FONTANERIA"); 
                                                writeln("<br /> &ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&ensp;&ensp;Instalación: [ " +  b[3] + " ]");
                                                writeln("<br /> ");
                                                writeln("<br /> <b><span style='color: blue'> &ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&emsp;&emsp;Puntos agua: [ " + t11 + " ] * 120 € = " + apuntosag + " € </span></b>"); 
                                                writeln("<br /> ");
                                                writeln("<br /> &ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&ensp;&ensp;&emsp;Remate: [ " +  b[4] + " ]");
                                                writeln("<br /> ");
                                                writeln("<br /> <b><span style='color: blue'> &ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&emsp;&emsp;Unidades: [ " + t12 + " ] * " + precio01 + " € = " + aunidadesre + " € </span></b>");
                                                writeln("<br /> ");
                                                writeln("<br /> - CALEFACCION"); 
                                                writeln("<br /> &ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&ensp;&ensp;Instalación: [ " +  b[5] + " ]");
                                                writeln("<br /> ");
                                                writeln("<br /> <b><span style='color: blue'> &ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&emsp;&emsp;Radiadores: [ " + t13 + " ] * 100 € = " + aradiadores + " € </span></b>");
                                                writeln("<br /> ");
                                                writeln("<br /> <b><span style='color: blue'> &ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&emsp;&emsp;RITE: " + rite + " € </span></b>");
                                                writeln("<br /> ");
                                                writeln("<br /> &ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&ensp;&ensp;&emsp;Remate: [ " +  b[6] + " ]");
                                                writeln("<br /> ");
                                                writeln("<br /> <b><span style='color: blue'> &ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&emsp;&emsp;Unidades: [ " + t14 + " ] * " + precio02 + " € = " + aunidadesra + " € </span></b>");
                                                writeln("<br /> ");
                                                writeln("<br /> - Instalación GAS: [ " +  b[7] + " ]");
                                                writeln("<br /> ");
                                                writeln("<br /> <b><span style='color: blue'> &ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&emsp;&emsp;IRI + Alta Instalación = " + ingas + " € </span></b>");
                                                writeln("<br /> ");
                                                writeln("<br /> - Instalación EQUIPOS: [ " +  b[8] + " ]");
                                                writeln("<br /> ");
                                                writeln("<br /> - DESATASCOS: [ " +  b[9] + " ]");
                                                writeln("<br /> ");
                                                writeln("<br /> <b><span style='color: blue'> &ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&emsp;&emsp;Unidades: [ " + t15 + " ] * " + precio03 + " € = " + aunidadesde + " € </span></b>");
                                                writeln("<br /> ");
                                                writeln("<br /> <b><span style='color: red'> &ensp;&ensp;&emsp;&emsp;&ensp;&ensp;&emsp;&emsp;TOTAL = *** " + total + " € *** IVA no incluido.</b>");                                   
                                                writeln('<br /><br /><Form><Input style="color: black; background-color: turquoise;border-radius: 10px 10px 10px 10px;" type=button value=Cerrar onclick=window.close()></form>');

                                                close();
                                            }
                                            ventana.focus();*/