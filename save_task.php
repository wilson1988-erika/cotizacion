<?php

include("db.php");

if(isset($_POST['guardar_cotizacion'])){
    $nombres = $_POST['nombres'];
    $servicio = $_POST['servicio'];
    $descripcion = $_POST['descripcion'];
    $presupuesto = $_POST['presupuesto'];
    $telefono = $_POST['telefono'];
    $tiempo_estimado = $_POST['tiempo_estimado'];
    $fecha_de_cotizacion = $_POST['fecha_de_cotizacion'];

    $query = "INSERT INTO cotizacion (nombres, servicio, descripcion, presupuesto, telefono, tiempo_estimado, fecha_de_cotizacion) 
                    VALUES ('$nombres', '$servicio', '$descripcion', '$presupuesto','$telefono', '$tiempo_estimado', '$fecha_de_cotizacion')";
    $result = mysqli_query($conn, $query);
    if (!$result){
        die ('fallo');
    }
    
    $_SESSION['message'] = 'Cotizacion guardada satisfactoriamente';
    $_SESSION['message_type'] = 'success';
    
    header("location:index.php");

}
?>