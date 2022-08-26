<?php include 'conexion.php'; 
    
    if((!empty($_POST['md_nombre'])) || (!empty($_POST['md_apellidos']))){
        $nombre = $_POST['md_nombre'];
        $apellidos = $_post['md_apellidos'];
        $cons = "SELECT * FROM reservas where nombre = $nombre AND apellidos = $apellidos";
    }else{
        $nombre = null;
        $apellidos = null;
    }
    
    if(!empty($_POST['md_telefono'])){
        $telefono = $_POST['md_telefono'];
        $cons = "SELECT * FROM reservas where telefono = $telefono";
    }else{
        $telefono = null;
    }
    
    if(!empty($_POST['md_fecha'])){
        $fecha = $_POST['md_fecha'];
        $cons = "SELECT * FROM reservas where fecha = $fecha";
    }else{
        $fecha = null;
    }
    if(!empty($_POST['md_provincia'])){
        $provincia = $_POST['md_provincia'];
        $cons = "SELECT * FROM reservas where provincia = '$provincia'";
    }else{
        $provincia = null;
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de contacto</title>
    <link href="../css/estilo.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../css/tablaFiltro.css?v=<?php echo time(); ?>">
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
            <li><a href="../galeria.html">Galería</a></li>
            <li class="activa"><a href="filtro.php">Filtro</a></li>
        </ul>

        <div class="contenido">
            <div class="contenido_abajo">
            
            <table class="tabla_filtro">
                <thead>
                    <tr>
                        <th>Nº reserva</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Fecha</th>
                        <th>Nº personas</th>
                        <th>Edad del grupo</th>
                        <th>Aula</th>
                        <th>Provincia</th>
                        <th>Comentario</th>                        
                    </tr>
                </thead>
                <tbody>
                    <?php                 
                        $cons1=mysqli_query($cn,$cons);
                         //Comprobamos si hay registros para mostrar o no la tabla
                        $num_registros = mysqli_num_rows($cons1);
                        if($num_registros<=0){
                        echo "No hay registros que mostrar";
                        }else{
                             //mostramos los registros
                        while($registro=mysqli_fetch_assoc($cons1)){
                    ?>
                    <tr>
                        <td><?php echo $registro['numRes'] ?></td>
                        <td><?php echo $registro['nombre'] ?></td>
                        <td><?php echo $registro['apellidos'] ?></td>
                        <td><?php echo $registro['telefono'] ?></td>
                        <td><?php echo $registro['email'] ?></td>
                        <td><?php echo $registro['fecha'] ?></td>
                        <td><?php echo $registro['n_personas'] ?></td>
                        <td><?php echo $registro['edad'] ?></td>
                        <td><?php echo $registro['aula'] ?></td>
                        <td><?php echo $registro['provincia'] ?></td>
                        <td><?php echo $registro['comentario'] ?></td>
                    </tr>
                    <?php
                    }
                }
                    mysqli_free_result($cons1);
                    ?>
                </tbody>
            </table>
                
            </div>
        </div>
        
        <div class="autores">
        La imagen del t&iacute;tulo pertenece <a href="http://www.flickr.com/photos/amagill/2740376079/">AMagill</a> y se distribuye bajo licencia <a href="http://creativecommons.org/licenses/by/2.0/deed.es">CreativeCommons</a>.
        </div>
        <?php include 'close.php'?>
    </body>
</html>