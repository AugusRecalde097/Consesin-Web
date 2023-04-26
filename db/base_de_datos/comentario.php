<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Comentarios</title>
  <link rel="stylesheet" href="../bootstrap.min.css">
  <link rel="stylesheet" href="../assets/estiloInicio.css">
</head>

<body class="fondo">
  <!-- botón con la función de regresar a la pantalla de inicio -->
  <a name="" id="" class="btn btn-dark m-3 rounded-circle" href="../index.php" role="button"><strong> 🡸 </strong></a>
  <!-- centra todo el contenido -->
  <div class="container" style="background-color: #ffffff; padding: 10px">
    <?php
    //Se autoinicia una sesión
    session_start();
    // conexion a la base de datos
    require("../base_de_datos/sql_conection.php");
    //Llama a las funciones del modulo Funciones
    include "../utils/funciones.php";
    //Seleciona los datos de Comentario
    $sql = 'SELECT * FROM comentario';
    $result = $mysqli->query($sql) or die($mysqli->error);
    $usuario = $_SESSION['nombredelusuario']; //Se obtiene el nombre del usuario
    ?>

    <div class="container" style="background-color: #ffffff; padding: 10px">
      <div class="alert alert-light">
        <h2><strong> Comentarios </strong></h2>
      </div>
      <!-- La apariencia que tendrá el formulario -->
      <div class="col-md-6 pane">
        <!-- <Formulatio y Dirección donde se hace el registro -->
        <form id="form_comentarios" class="row g-3 needs-validation" action="" method="POST">
          <input type="text" class="form-control" hidden name="action" id="action" value="insert">
          <div class="mb-3 row">
            <label for="validationCustomUsername" class="col-sm-1-12 col-form-label"><strong>Nombre del Usuaio</strong></label>
            <div class="input-group has-validation col-sm-11">
              <span class="input-group-text" id="inputGroupPrepend">@</span>
              <!-- Input del ususario  -->
              <input type="text" class="form-control" value="<?php echo $usuario ?>" name="Nombre_Bloqueado" id="Nombre_Bloqueado" aria-describedby="inputGroupPrepend" disabled>
              <input type="text" class="form-control" value="<?php echo $usuario ?>" name="Nombre_Usuario" id="Nombre_Usuario" aria-describedby="inputGroupPrepend" hidden>
              <div class="invalid-feedback">
                Complete este campo.
              </div>
            </div>
            <div class="mb-3 row">
              <label for="validationCustom02" class="col-sm-1-12 col-form-label"><strong> Comentario </strong></label>
              <div class="col-sm-11">
                <input type="text" class="form-control" name="Comentario" id="input_comentario" id="validationCustom02" placeholder="Ingrese un comentario" required>
                <div class="invalid-feedback">
                  Complete este campo.
                </div>
              </div>
            </div>
            <div class="m-3 row">
              <div class="text-center">
                <a name="" id="" class="btn btn-primary m-3" href="../pantallas/datos_comentario.php" role="button"><strong> Ver Comentarios 🗃 </strong></a>
                <button class="btn btn-success" role="button" type="submit"><strong> Fijar Comentario 📤 </strong></button>
              </div>
            </div>
        </form>
      </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="../jquery-3.5.1.js"></script>
    <script src="../bootstrap.min.js"></script>
    <script src="../assets/script.js"></script>
    <script>

      // Selector de elementos con Jquery
      $('#input_comentario').on('keyup', function() {
        // Toma el valor del input del compentario
        let valor_input = $(this).val().trim();

        // Cuenta la cantidad de caracteres del input
        if (valor_input.length > 0) {
          // Si el input tiene algún valor, se activa el botón
          $('#form_comentarios').attr('action', '../base_de_datos/agregarComentario.php');
        } else {
          // Si el input no tiene valor, se desactiva el botón
          $('#form_comentarios').attr('action', '#');
          // Se muestra un mensaje de error
          $('#form_comentarios').addClass('was-validated');

          setInterval(function() {
            $('#form_comentarios').removeClass('was-validated');
          }, 3000);
        }


      });
    </script>
  </div>
</body>

</html>