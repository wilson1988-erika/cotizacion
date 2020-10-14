<?php

include("db.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM cotizacion WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("no dio");
    }
    $_SESSION['message'] = 'Cotizacion borrada satisfactoriamente';
    $_SESSION['message_type'] = 'danger';


    header("location:index.php");
} 


?>