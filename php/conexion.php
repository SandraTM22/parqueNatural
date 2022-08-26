<?php
// Conectar con el servidor

    $servidor='localhost';
    $usuario = 'root';
    $clave= '';
    $bd = 'parque_natural';
    $cn= mysqli_connect($servidor,$usuario,$clave,$bd);

    if(!$cn){
        echo "<script>console.log('No pudo conectarse al servidor');</script>";
        echo "<script>console.log('Número de error :".mysqli_connect_errno().");</script>";
        echo "<script>console.log('No pudo conectarse al servidor''Número de error :".mysqli_connect_error().");</script>";
    }else{
        echo "<script>console.log('Conexión satisfactoria');</script>";
        // Obtenemos informacion sobre el servidor
        echo "<script>console.log('informacion sobre el servidor".mysqli_GET_host_info($cn)."');</script>";
    } 
    

?>