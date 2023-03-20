<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro del Modulo</title>
<!-- Bootstrap CSS v5.0.2 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/estiloInicio.css">
</head>
<body class="fondo">
<!-- Titulo -->
<h1 class="text-center"><strong> Modifique el Modulo </strong></h1>

	<?php
//Se autoinicia una sesión
    session_start();
//conecta con la bases de datos
		require '../base_de_datos/sql_conection.php';
//Selecciona esos datos llamados 
		$id=$_GET["id"]; 
    $sql = "SELECT * FROM modulo where ID_Modulo = $id";
    $resultado = $mysqli->query($sql);
    $dato = mysqli_fetch_assoc($resultado);
	?>

  <!--Formulatio y Dirección donde se hace la modificación -->
    <form action="../base_de_datos/crud_Modulo.php?id=<?php echo $dato['ID_Modulo']?>" method="POST" >
    <input type="text" class="form-control" hidden name="action" id="action" value="update">
      <div class="container" style="background-color: #ffffff; padding: 25px">
      <div class="mb-3 row">
        <label for="Nombre_Modulo" class="col-sm-1-12 col-form-label"><strong> Nombre del Modulo </strong></label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="Nombre_Modulo" id="Nombre_Modulo" value="<?php echo $dato['Nombre_Modulo']?>">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="Descripcion" class="col-sm-1-12 col-form-label"><strong> Descripcion </strong></label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="Descripcion" id="Descripcion" value="<?php echo $dato['Descripcion']?>">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="Sistema" class="col-sm-1-12 col-form-label"><strong> Sistema </strong></label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="Sistema" id="Sistema" value="<?php echo $dato['Sistema']?>">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="Estado" class="col-sm-1-12 col-form-label"><strong> Estado </strong></label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="Estado" id="Estado" value="<?php echo $dato['Estado']?>">
        </div>
      </div>
      </div>

<!-- funcion y boton al guardar o cancelar -->
      <div class="m-3 row">
        <div class="text-center">
          <button name="actualizar" class="btn btn-success" role="button"><strong> Guardar </strong></button>
          
          <a name="" id="" class="btn btn-danger" href="../pantallas/datosProyecto.php" role="button"><strong> Cancelar </strong></a>
        </div>
      </div>
    </form>

<!-- Bootstrap JavaScript Libraries -->
<script src="../popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="../bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>