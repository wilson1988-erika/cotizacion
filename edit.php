<?php
     include("db.php");

     if (isset($_GET['id'])) {
         $id = $_GET['id'];
         $query = " SELECT * FROM cotizacion WHERE id = $id ";
         $result = mysqli_query($conn, $query);
         if (mysqli_num_rows($result) == 1) {
             $row = mysqli_fetch_array($result);
             $nombres = $_POST['nombres'];
             $servicio = $row['servicio'];
             $descripcion = $row['descripcion'];
             $presupuesto = $row['presupuesto'];
             $telefono = $_POST['telefono'];
             $tiempo_estimado = $row['tiempo_estimado'];
             $fecha_de_cotizacion = $_POST['fecha_de_cotizacion'];
         } 
    }
    if (isset($_POST['actualizar'])){
        $id = $_GET['id'];
        $nombres = $_POST['nombres'];
        $servicio = $_POST['servicio'];
        $descripcion = $_POST['descripcion'];
        $presupuesto = $_POST['presupuesto'];
        $telefono = $_POST['telefono'];
        $tiempo_estimado = $_POST['tiempo_estimado'];
        $fecha_de_cotizacion = $_POST['fecha_de_cotizacion'];
    
        echo $nombres;
        echo $servicio;
        echo $descripcion;
        echo $presupuesto;
        echo $telefono;
        echo $tiempo_estimado;
        echo $fecha_de_cotizacion;
        echo $id;
        $query = "UPDATE cotizacion set nombres = '$nombres', servicio = '$servicio', descripcion = '$descripcion', presupuesto = '$presupuesto', telefono = '$telefono', tiempo_estimado = '$tiempo_estimado', fecha_de_cotizacion = '$fecha_de_cotizacion' WHERE id = $id";
        mysqli_query($conn, $query);

        $_SESSION['message'] = 'cotizacion actualizada satisfactoriamente';
        $_SESSION['message_type'] = 'info';
        
        header("location: index.php");
    }
?>

<?php include("includes/header.php") ?>

 <div class="container p-4">
       <div class="row">
           <div class="col-md-4 mx-auto">
               <div class="card card-body">
                   <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                   <div class="form-group">
                           <input type="text" name="nombres" value="<?php echo $nombres; ?>" 
                           class="form-control" placeholder="Actualizar Nombres">
                       </div>
                       <div class="form-group">
                           <input type="text" name="servicio" value="<?php echo $servicio; ?>" 
                           class="form-control" placeholder="Actualizar Servicio">
                       </div>
                       <div class="form-group">
                           <textarea name="descripcion" rows="2" class="form-control"
                            placeholder="Actualizar Descripcion"> <?php echo $descripcion;?></textarea>
                       </div>
                       <div class="form-group">
                           <textarea name="presupuesto" rows="2" class="form-control"
                            placeholder="Actualizar Presupuesto"> <?php echo $presupuesto;?></textarea>
                       </div>
                       <div class="form-group">
                           <textarea name="telefono" rows="2" class="form-control"
                            placeholder="Actualizar Telefono"> <?php echo $telefono;?></textarea>
                       </div>
                       <div class="form-group">
                           <textarea name="tiempo_estimado" rows="2" class="form-control"
                            placeholder="Actualizar Tiempo Estimado"> <?php echo $tiempo_estimado;?></textarea>
                       </div>
                        <button type="submit" class="btn btn-success" name="actualizar">Actualizar

                       </button>
                   </form>
               </div>
           </div>
       </div>

 </div>


<?php include("includes/footer.php") ?>