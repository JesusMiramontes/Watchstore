<!-- Establece una conexión a la base de datos -->
<?php include("connection_database.php"); ?>

<?php

# Almacena los mensajes que se mostrarán al usuario.
global $error;

# Inicializa los campos
# INCLUIR AQUÍ LOS CAMPOS A MANEJAR EN LA BASE DE DATOS
# UNA VEZ INCLUIDOS O MODIFICADOS LO CAMPOS SIGUIENTES, REMPLAZAR TODO

$iduser = $_GET['iduser'];
$idproduct = $_GET['idproduct'];

# Si algun paso sale mal, esté se hará falso.
$ok = true;

    # Revisa que ninguno de los campos esté vacío.
    if (empty($iduser) || empty($idproduct)) {
        # Muestra un mensaje de error. --->  NOTA: Modificar más adelante. Evitar redundancias. <---
        $error = "<div class='alert alert-danger center-xs alert-dismissable' style='max-width:50%; margin: auto;'>
                                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                    Revisa que ningún campo esté vacío.
                                    </div>";
        $ok = false;

        # En caso de que no haya campos vacíos. Verifica formato cadenas.
    } else {
        $iduser = mysqli_real_escape_string($connection, $iduser);
        $idproduct = mysqli_real_escape_string($connection, $idproduct);
    }

    /*if ($ok) {
        # Busca en la base de datos registros con ese correo.
        $sql_query = mysqli_query($connection, "SELECT * FROM users WHERE email = '{$email}'");

        # Revisa que no exista el correo.
        if (mysqli_num_rows($sql_query) > 0) {
            $error .= "<div class='alert alert-danger center-xs alert-dismissable' style='max-width:50%; margin: auto;'>
                                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                    <strong>Oh no!</strong> El correo ingresado ya existe.
                                    </div>";
            $ok = false;
        }
    }*/

    # Si pasó todas las validaciones, inserta en la base de datos.
    if ($ok) {

        # Inserta los datos a la base de datos.
        /*$sql = "INSERT INTO users(username, email, password, activation_key, is_active, date_time)
                          VALUES ('{$username}', '{$email}', '{$password}', '{$activation_key}', '0', now())";*/

        $sql = "INSERT INTO cart (iduser, idproducts) VALUES ('{$iduser}', '{$idproduct}')";

        # En caso de que no se haya completato correctamente el registro, muestra mensaje de error.
        if (!$query = mysqli_query($connection, $sql)) {
            $ok = false;
            die("QUERY FAILED " . mysqli_error($connection));
        } else {
            header("Location: ../cart.php");
        }
    }

    # Si logró crearse el usuario, enviar activación al correo
    if ($ok)
    {

        # Mensaje que se envía
        $msg = "Activa tu cuenta haciendo clic ";


    }
?>
