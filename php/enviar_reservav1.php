<?php include 'conexion.php' ;
    // Comprobamos si hay algún error de conexión
    if(!$cn){
        echo "<script>console.log('No pudo conectarse al servidor');</script>";
        echo "<script>console.log('Número de error :".mysqli_connect_errno().");</script>";
        echo "<script>console.log('No pudo conectarse al servidor''Número de error :".mysqli_connect_error().");</script>";
    }else{
        echo "<script>console.log('Conexión satisfactoria');</script>";
        // Obtenemos informacion sobre el servidor
        echo "<script>console.log('informacion sobre el servidor".mysqli_GET_host_info($cn)."');</script>";
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
        <li><a href="../html/index.html">Inicio</a></li>
        <li><a href="../html/especies.html">Especies</a></li>
        <li class="activa"><a href="reservas.php">Reservas</a></li>
        <li ><a href="../html/galeria.html">Galería</a></li>
        <li><a href="php/filtro.php">Filtro</a></li>
    </ul>

    <div class="contenido">
    <div class="contenido_abajo">
        <?php            
        $error =false;              
        if(empty($_POST['nombre'])){
            echo "<p class=\"erroneo\">No has introducido tu nombre</p>";
            $error = true;                
        }else{
            $nombre = $_POST['nombre'];
        }
        if(empty($_POST['apellidos'])){
            echo "<p class=\"erroneo\">No has introducido tu apellidos</p>";
            $error = true;                
        }else{
            $apellidos = $_POST['apellidos'];
        }
        
        if(empty($_POST["telefono"])){
            echo '<p class="erroneo">No has introducido tu telefono</p>';
            $error = true;  
        }else{
            $telefono = $_POST['telefono'];
        }

        if(empty($_POST["email"])){
            echo '<p class="erroneo">No has introducido tu email</p>';
            $error = true;  
        }else{
            $email = $_POST['email'];
        }

        if(empty($_POST["fecha"])){
            echo '<p class="erroneo">No has introducido la fecha</p>';
            $error = true;   
        }else{
            $fecha = $_POST['fecha'];
        }

        if(empty($_POST['cantidad'])){
            echo '<p class="erroneo">No has introducido la cantidad de personas</p>';
            $error = true;  
        }else{
            $cantidad = $_POST['cantidad'];
        }

        if(empty($_POST['edad'])){
            echo '<p class="erroneo">No has introducido las edades</p>';
            $error = true;   
        }else{
            $edad = $_POST['edad'];
        }

    if($error==false){
        echo "<div><h2>Datos de tu reserva </h2>";
        echo "<h3>Informacion de la reserva</h3>";            
            $provincia = $_POST['provincia'];
            echo "<b>Provincia: </b>$provincia<br>";
            echo "<b>Nombre: </b>$nombre <br>";
            echo "<b>apellidos: </b>$apellidos <br>";
            echo "<b>telefono: </b>$telefono <br>";
            echo "<b>Email: </b>$email<br><br>";
            echo "<p><b>Día de la visita: </b>$fecha</p>";
            echo "<p><b>Personas del grupo: </b>$cantidad</p>";
            echo "<p><b>Con edades: </b>$edad</p>";
            $aula = $_POST['aula'];
            echo "<p><b>Aula educativa: </b>$aula</p>";
            if(!empty($_POST['comentario'])){
                $coment = $_POST['comentario'];
                echo "<p><b>Observaciones:  </b>$coment</p><br>";
            } else{
                $coment = '';
            }
                
        //INGRESAMOS LOS DATOS EN LA BD
        $sql1="INSERT INTO reservas VALUES ('','$nombre','$apellidos','$telefono','$email','$fecha','$cantidad','$edad','$aula','$provincia','$coment');";
        $rs= mysqli_query($cn,$sql1);
            if(!$rs){
                echo "<script>console.log('Error en la introducción de datos en la tabla')</script>";
            }else{
                echo "<script>console.log('Exito en la introducción de datos en la tabla')</script>";
                $codRes = mysqli_insert_id($cn);
                echo "<p class= \"correcto\">Tu reserva se ha enviado correctamente</p>";
                echo "<p class= \"correcto\">Tu código de reserva es: CR-".$codRes."</p>";
                echo "<p>Nos pondremos en contacto lo antes posible.Esperamos que disfrutes del parque.</p>";
                echo '<h3><a href="../index.html">Volver a Inicio</a></h3>';
            }
    }else{
        echo "<p>No se ha enviado la reserva por los errores que se detallan arriba.</p>";
        echo "<p>Por favor, vuelve a rellenar el formulario.</p>";
        echo '<a href="reservas.php">Volver al formulario</a>';
    }
    ?>
    <div class="autores">
        La imagen del título pertenece <a href="http://www.flickr.com/photos/amagill/2740376079/">AMagill</a> y se distribuye bajo licencia <a href="http://creativecommons.org/licenses/by/2.0/deed.es">CreativeCommons</a>.
    </div>
        <div class="red_abajo"><div></div>
    </div>

    <?php 
        }
        include 'close.php';
    ?>
</body>
</html>