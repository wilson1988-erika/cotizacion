<?php include("db.php") ?>
<?php include("includes/header.php") ?>

<div class="container p-4">

  <div class="row">
    <div class="col-md-4">

      <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
          <?= $_SESSION['message'] ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

      <?php session_unset();
      } ?>

      <h2>Cotizacion para desarrollo de pagina web</h2>

      <div class="card card-body">
        <form action="save_task.php" method="POST">
          <div class="form-group">
            <input type="text" name="nombres" class="form-control" placeholder="Nombres"  required >
          </div>
          <div class="form-group">
            <input type="text" name="servicio" class="form-control" placeholder="Que tipo de web quiere cotizar" required>
          </div>
          <div class="form-group">
            <textarea name="descripcion" rows="2" class="form-control" placeholder="Descripcion de la web" required></textarea>
          </div>
          <div class="form-group">
            <textarea name="presupuesto" rows="2" class="form-control" placeholder="Danos tu presupuesto" required></textarea>
          </div>
          <div class="form-group">
            <textarea name="telefono" rows="2" class="form-control" placeholder=" Telefono" required></textarea>
          </div>
      </div>
      <div class="form-group">
        <textarea name="tiempo_estimado" rows="2" class="form-control" placeholder="Tiempo Estimado" required></textarea>
      </div>
      <input type="submit" class="btn btn-success btn-block" name="guardar_cotizacion" value="Guardar Cotizacion">
      </form>
    </div>
  </div>
  <div class="col-md-8">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Nombres</th>
          <th>Servicio</th>
          <th>Descripcion</th>
          <th>Presupuesto</th>
          <th>Telefono</th>
          <th>Tiempo Estimado</th>
          <th>Fecha de Cotizacion</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = "SELECT * FROM cotizacion";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($result)) { ?>
          <tr>
            <td><?php echo $row['nombres'] ?></td>
            <td><?php echo $row['servicio'] ?></td>
            <td><?php echo $row['descripcion'] ?></td>
            <td><?php echo $row['presupuesto'] ?></td>
            <td><?php echo $row['telefono'] ?></td>
            <td><?php echo $row['tiempo_estimado'] ?></td>
            <td><?php echo $row['fecha_de_cotizacion'] ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">
                <i class="fas fa-pencil-alt"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
                <i class="fas fa-trash-alt"></i>
              </a>
            </td>

          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
</div>

<?php include("includes/footer.php") ?>