<?php

include('db.php');

if (isset($_POST['guardar'])) {
  $Nombre = $_POST['nom'];
  $Apellido = $_POST['ape'];
  $Direccion = $_POST['dire'];
  $Telefono = $_POST['tel'];
  $CodigoPostal = $_POST['cp'];
  $Correo = $_POST['cor'];
  $Tarjeta = $_POST['tar'];
  $query = "INSERT INTO comprador(Nombre, Apellido, Direccion, Telefono, CodigoPostal, Correo, Tarjeta) VALUES ('$Nombre', '$Apellido', '$Direccion','$Telefono','$CodigoPostal','$Correo','$Tarjeta')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Guardado Correctamente';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>