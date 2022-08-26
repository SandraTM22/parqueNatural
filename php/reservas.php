<?php include 'conexion.php';
$cons= 'SELECT * FROM provinciasand';
$cons1= mysqli_query($cn,$cons);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de contacto</title>
    <link href="../css/estilo.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    
</head>
    <body>
        <div class="red_arriba">
            <div></div>
        </div>
            
        <h1>Parque Natural <span>Sierra Bicuerca</span></h1>
            
        <ul id="menu">
            <li><a href="../index.html">Inicio</a></li>
            <li><a href="../especies.html">Especies</a></li>
            <li class="activa"><a href="php/reservas.php">Reservas</a></li>
            <li ><a href="../galeria.html">Galería</a></li>
            <li><a href="filtro.php">Filtro</a></li>
        </ul>

        <div class="contenido">
        <div class="contenido_abajo">
        <h2>Reservas</h2>
        <p>El acceso al parque es libre y gratuiro,diempre que se respeten las normas de conducta y preservación del entorno.</p>
        <p>No obstante,también disponemos de servicios adicionales, como visita guiada o aula educativa para niños.</p>
        
        <div>
            <h3>Horarios y reservas</h3>
            <table class="reservas">
                <thead>
                    <tr>
                        <th colspan="5">Visitas con guía:</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td class="titulo" colspan="2">Temporada de Verano</td>
                        <td class="titulo" colspan="2">Temporada de Invierno</td>
                    </tr>
                    <tr>
                        <td class="titulo" rowspan="2">Horarios</td>
                        <td rowspan="2" colspan="2">10:00 - 13:00 <br> 16:00 - 19:00</td>
                        <td rowspan="2" colspan="2">11:00 - 14:00</td>
                    </tr>
                    <tr>
                        <!-- Esta fila esta "vacía" porque ya estan las celdas creadas -->
                    </tr>
                    <tr>
                        <td class="titulo" rowspan="2">Tarifas:</td>
                        <td>Individual:</td>
                        <td>Grupos:</td>
                        <td>Individual:</td>
                        <td>Grupos:</td>
                    </tr>
                    <tr>
                        <td>5€ persona</td>
                        <td>3€ persona</td>
                        <td>4€ persona</td>
                        <td>2€ persona</td>
                    </tr>
                </tbody>
            </table>
            <table class="reservas">
                <thead>
                    <tr>
                        <th colspan="5">Aula educativa(sólo grupos):</th>
                    </tr>                    
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td class="titulo" colspan="2">Temporada de Verano</td>
                        <td class="titulo" colspan="2">Temporada de Invierno</td>
                    </tr>
                    <tr>
                        <td class="titulo" rowspan="2">Horarios</td>
                        <td rowspan="2" colspan="2">9:00 - 10:00 <br> 15:00 - 16:00</td>
                        <td rowspan="2" colspan="2">10:00 - 11:00</td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td class="titulo">Tarifas:</td>
                        <td colspan="2">25€</td>
                        <td colspan="2">25€</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <h3>Contacto</h3>
            <p>Si estás pensando visitar el parque con un grupo, por favor, rellena este formulario:</p>
            <form action="enviar_reservav1.php" method="post">
                <div>                    
                    <label for="nombre">Nombre:</label>
                    <input class="text" type="text"  name="nombre" size="25"><br><br>

                    <label for="apellidos">Apellidos: </label>
                    <input class="text" type="text" name="apellidos" size="25"><br><br>

                    <label for="telfono">Teléfono: </label>
                    <input class="text" type="text" name="telefono" size="25"><br><br>

                    <label for="email">Email:</label>
                    <input class="text" type="email"  name="email" size="25"><br><br>

                    <label for="fecha">Fecha de la visita</label>
                    <input class="text" type="date" name="fecha"><br><br>

                    <label for="cantidad">Número de personas</label>
                    <input class="text" type="number" name="cantidad"><br><br>

                    <label for="edad">Edad del grupo:</label><br>
                    <input type="radio" name="edad"  value="De 5-8 años" >De 5 a 8<br>
                    <input type="radio" name="edad"  value="De 9-14 años" >De 9 a 14<br>
                    <input type="radio" name="edad"  value="De 15-18 años" >De 15 a 18<br>
                    <input type="radio" name="edad"  value="Adultos" checked>Adultos<br><br>

                    <input name="aula" type="checkbox" value="no" hidden checked>
                    <input name="aula" type="checkbox" value="si">Deseamos asistir al aula educativa (sólo niños)<br><br>
                    <label for="provincia">Seleccione provincia:</label>
                        <select name="provincia" >
                            <option value="" disabled selected>Andalucía</option>
                            <?php 
                            while($registros =mysqli_fetch_assoc($cons1)){
                                echo "<option value=".$registros['nombre'].">".$registros['nombre']."</option>";
                            }
                            ?>

                        </select><br>
                    <p>Observaciones:</p>
                    <textarea name="comentario" cols="45" rows="8"></textarea><br>

                    <br><input type="submit" class="boton">

                </div>
            </form>  
            <br><br>   
        </div>
        <div class="autores">
        La imagen del t&iacute;tulo pertenece <a href="http://www.flickr.com/photos/amagill/2740376079/">AMagill</a> y se distribuye bajo licencia <a href="http://creativecommons.org/licenses/by/2.0/deed.es">CreativeCommons</a>.
        </div>
        <div class="red_abajo"><div></div>
        </div>
        
        <script>

            function validar(){
                var valor = document.filtrar.opc.value;
                switch (valor) {
                    case 'ciudad':
                        document.getElementById('sel_most').removeAttribute("disabled");
                        document.getElementById('id_nombre').setAttribute("disabled",true);
                        document.getElementById('id_apellidos').setAttribute("disabled",true);
                        document.getElementById('id_fecha').setAttribute("disabled",true);
                        document.getElementById('id_telefono').setAttribute("disabled",true)
                        break;
                    case 'noyap':
                        document.getElementById('sel_most').setAttribute("disabled",true);
                        document.getElementById('id_nombre').removeAttribute("disabled");
                        document.getElementById('id_apellidos').removeAttribute("disabled");
                        document.getElementById('id_fecha').setAttribute("disabled",true);
                        document.getElementById('id_telefono').setAttribute("disabled",true)
                        break;
                    case 'fecha':
                        document.getElementById('sel_most').setAttribute("disabled",true);
                        document.getElementById('id_nombre').setAttribute("disabled",true);
                        document.getElementById('id_apellidos').setAttribute("disabled",true);
                        document.getElementById('id_fecha').removeAttribute("disabled");
                        document.getElementById('id_telefono').setAttribute("disabled",true)
                        break;
                    case 'md_telefono':
                        document.getElementById('sel_most').setAttribute("disabled",true);
                        document.getElementById('id_nombre').setAttribute("disabled",true);
                        document.getElementById('id_apellidos').setAttribute("disabled",true);
                        document.getElementById('id_fecha').setAttribute("disabled",true);
                        document.getElementById('id_telefono').removeAttribute("disabled")
                        break;
                
                    default:
                        break;
                }
                document.getElementById('btn_filtrar').removeAttribute("disabled");
            }            
        </script>
        
        <?php include 'close.php'?>
    </body>
</html>