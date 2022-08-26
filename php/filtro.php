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
            <li><a href="reservas.php">Reservas</a></li>
            <li ><a href="../galeria.html">Galería</a></li>
            <li  class="activa"><a href="filtro.php">Filtro</a></li>
        </ul>

        <div class="contenido">
        <div class="contenido_abajo">
        <div>
           <h3>Consultar reservas</h3>  
            <form name="filtrar" action="filtrar.php" method = "post">               
                <div>
                    <fieldset>
                        <legend>Filtrar:</legend>
                        <input type="radio" name="opc" value="ciudad"onclick="validar()" >Ciudad<br>
                        <input type="radio" name="opc" value="noyap" onclick="validar()">Nombre y apellidos<br>
                        <input type="radio" name="opc" value="fecha" onclick="validar()">Fecha<br>
                        <input type="radio" name="opc" value="md_telefono" onclick="validar()" >Teléfono<br>
                    </fieldset>
                    <hr><br>
                    <label for="md_provincia">Seleccione provincia:</label>
                        <select disabled id="sel_most" name="md_provincia" >
                            <option value="" disabled selected>Andalucía</option>
                            <?php 
                            $cons2= 'SELECT * FROM provinciasand';
                            $cons3= mysqli_query($cn,$cons2);
                            while($registros1 =mysqli_fetch_assoc($cons3)){
                                echo "<option value=".$registros1['nombre'].">".$registros1['nombre']."</option>";
                            }
                            ?>
                        </select><br><br>
                    
                    <label for="md_nombre">Nombre:</label>
                    <input disabled id="id_nombre" name="md_nombre" class="text" type="text" size="25"><br><br>

                    <label for="md_apellidos">Apellidos:</label>
                    <input disabled  id="id_apellidos" name="md_apellidos" class="text" type="text" size="25"><br><br>                     
                    
                    <label for="md_telefono">Teléfono: </label>
                    <input disabled id="id_telefono" name="md_telefono" class="text" type="text" size="25"><br><br>                   

                    <label for="md_fecha">Fecha de la visita</label>
                    <input disabled id="id_fecha" name="md_fecha"  class="text" type="date"><br><br>
                    <br>
                    <input disabled id="btn_filtrar" type="submit" name="filtrar" value="Filtrar">
                </div>
            </form>
        </div>
        <div class="autores">
        La imagen del t&iacute;tulo pertenece <a href="http://www.flickr.com/photos/amagill/2740376079/">AMagill</a> y se distribuye bajo licencia <a href="http://creativecommons.org/licenses/by/2.0/deed.es">CreativeCommons</a>.
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