<?php
//conexion con el modulo conexion
    require("../base_de_datos/sql_conection.php");
//Se autoinicia una sesión
    session_start();
//print_r($_POST);
    $rol = $_POST['ID_Rol'];
    $usuario = (isset($_POST["Nombre_Usuario"])) ? $_POST["Nombre_Usuario"] : '';
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Celular = $_POST['Celular'];
    $Correo = $_POST['Correo'];
    $Fecha_Nac = $_POST['Fecha_Nac'];
    $Contrasena = password_hash($_POST['Contrasena'], PASSWORD_BCRYPT);

// Inserta datos 
    $insertar = "INSERT INTO registro_usuario (ID_Rol, Nombre_Usuario, Nombre, Apellido, Celular, Correo, Fecha_Nac, Contrasena) VALUES ( '$rol', '$usuario', '$Nombre', '$Apellido', '$Celular', '$Correo', '$Fecha_Nac', '$Contrasena')";

// verificar que el correo no se repita 
    $verificar_correo = mysqli_query($mysqli, "SELECT * FROM registro_usuario WHERE Correo='$Correo' ");

    if (mysqli_num_rows($verificar_correo) > 0){
        echo '
            <script>
                alert ("Este Correo Electronico ya está registrado. Ingrese otro");
                window.location = "../pantallas/registro_usuario.php";
            </script>
        ';
        exit();
    }

//  verificar que el usuario no se repita 
    $verificar_usuario = mysqli_query($mysqli, "SELECT * FROM registro_usuario WHERE Nombre_Usuario='$usuario' ");

    if (mysqli_num_rows($verificar_usuario) > 0){
        echo '
            <script>
                alert ("Este Usuario ya existe. Ingrese otro");
                window.location = "../pantallas/registro_usuario.php";
            </script>
        ';
        exit();
    }

// Se agregan los datos 
    $ejecutar = $mysqli->query($insertar);

//Si ingresan correctamente el usuario ejecuta bien
    if ($ejecutar) {
        echo '
        <script>
            alert ("Usuario almacenado exitosamente");
            window.location = "../pantallas/iniciar_sesion.php";
        </script>
        ';
//Si no se ejecuta bien sale un alerta y no inicia 
    }else {
        echo '
        <script>
            alert ("Intentalo de nuevo, usuario no almacenado");
            window.location = "../pantallas/registro_usuario.php";
        </script>
        ';
    }
//Cerrar una conexión de MySQL
    mysqli_close($mysqli)

?>
