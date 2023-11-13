<?php
include("db.php");
$title = '';
$description= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM comprador WHERE id_comprador=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $Nombre = $row['Nombre'];
    $Apellido = $row['Apellido'];
    $Direccion = $row['Direccion'];
    $Telefono = $row['Telefono'];
    $CodigoPostal = $row['CodigoPostal'];
    $Correo = $row['Correo'];
    $Tarjeta = $row['Tarjeta'];

  }

}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $Nombre= $_POST['nom'];
  $Apellido = $_POST['ape'];
  $Direccion = $_POST['dire'];
  $Telefono = $_POST['tel'];
  $CodigoPostal = $_POST['cp'];
  $Correo = $_POST['cor'];
  $Tarjeta = $_POST['tar'];

  $query = "UPDATE comprador set Nombre = '$Nombre', Apellido = '$Apellido', Direccion = '$Direccion', Telefono = '$Telefono', CodigoPostal = '$CodigoPostal', Correo = '$Correo', Tarjeta = '$Tarjeta'  WHERE id_comprador=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Actualizado con Exito';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="nom" type="text" class="form-control" value="<?php echo $Nombre; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="ape" type="text" class="form-control" value="<?php echo $Apellido; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="dire" type="text" class="form-control" value="<?php echo $Direccion; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="tel" type="number" class="form-control" value="<?php echo $Telefono; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="cp" type="number" class="form-control" value="<?php echo $CodigoPostal; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="cor" type="text" class="form-control" value="<?php echo $Correo; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="tar" type="number" class="form-control" value="<?php echo $Tarjeta; ?>" placeholder="Update Title">
        </div>

        <button class="btn-success" name="update">
          Editar
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>