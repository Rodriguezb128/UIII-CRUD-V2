<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MENSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="registro.php" method="POST">
          <div class="form-group">
          <input type="text" name="nom" class="form-control" placeholder="Nombre" autofocus>
          </div>
          <div class="form-group">
          <input type="text" name="ape" class="form-control" placeholder="Apellido" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="dire" class="form-control" placeholder="Direccion"></input>
          </div>
          <div class="form-group">
          <input type="number" name="tel" class="form-control" placeholder="Telefono" autofocus>
          </div>
          <div class="form-group">
          <input type="number" name="cp" class="form-control" placeholder="Codigo postal" autofocus>
          </div>
          <div class="form-group">
          <input type="text" name="cor" class="form-control" placeholder="Correo" autofocus>
          </div>
          <div class="form-group">
          <input type="number" name="tar" class="form-control" placeholder="Tarjeta" autofocus>
          </div>
          <input type="submit" name="guardar" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Codigo postal</th>
            <th>Correo</th>
            <th>Tarjeta</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM comprador";
          $result_comprador = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_comprador)) { ?>
          <tr>
            <td><?php echo $row['Nombre']; ?></td>
            <td><?php echo $row['Apellido']; ?></td>
            <td><?php echo $row['Direccion']; ?></td>
            <td><?php echo $row['Telefono']; ?></td>
            <td><?php echo $row['CodigoPostal']; ?></td>
            <td><?php echo $row['Correo']; ?></td>
            <td><?php echo $row['Tarjeta']; ?></td>
            <td>
              <a href="editar.php?id=<?php echo $row['id_comprador']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="borrar.php?id=<?php echo $row['id_comprador']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>