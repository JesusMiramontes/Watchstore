<!-- Establece una conexión a la base de datos -->
<?php include("./scripts/connection_database.php"); ?>

<?php

# Almacena conexión a base de datos.
global $connection;

# Almacena los mensajes que se muestran al usuario.
global $error;
global $ok;

# Inizializa variables
$ok = true;
$error = "";

if(isset($_POST['login'])){

    # Recupera los datos incresados en los campos.
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)){
        # Muestra un mensaje de error.
        $error = "<div class='alert alert-danger center-xs alert-dismissable' style='max-width:50%; margin: auto;'>
                                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                    Revisa que ningún campo esté vacío.
                                    </div>";
        $ok = false;
    }

    # Si no hay datos vacios, filtra los campos.
    if ($ok)
    {
        # Filtra valores ingresados.

        $password = mysqli_real_escape_string($connection, $password);

        if(!$email = filter_var($email, FILTER_SANITIZE_EMAIL)){
            $error .= "<div class='alert alert-danger center-xs alert-dismissable' style='max-width:50%; margin: auto;'>
                                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                    El correo no tiene un formato válido.
                                    </div>";
            $ok = false;
        }

    }

    # Si pasó todas las validaciones, busca en la base de datos
    if($ok)
    {
        # Busca el correo ingresado en la base de datos.
        $sql_query = "SELECT * FROM users WHERE email = '{$email}'";

        # Verifica que la consulta se haya ejecutado correctamente.
        if (!$query = mysqli_query($connection, $sql_query)) {
            $ok = false;
        }

        # Revisa que exista el correo.
        if (mysqli_num_rows($query) <= 0) {
            $error .= "<div class='alert alert-danger center-xs alert-dismissable' style='max-width:50%; margin: auto;'>
                                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                    <strong>Oh no!</strong> El correo ingresado no existe.
                                    </div>";
            $ok = false;
        } else {
            while($row = mysqli_fetch_array($query)){
                $id = $row['id'];
                $username = $row['username'];
                $hashed_password = $row['password'];
                $is_active = $row['is_active'];
            }
        }

        # Si se encontró un usuario con el correo, verifica la contaseña
        if ($ok)
        {
            if(password_verify($password, $hashed_password)) {
                if ($is_active == '1')
                {
                    header("Location: ./user/home.php");
                    $_SESSION['id'] = $id;
                    $_SESSION['email'] = $email;
                    $_SESSION['username'] = $username;
                }
                else
                {
                    $error = "<div class='alert alert-danger center-xs alert-dismissable' style='max-width:50%; margin: auto; text-align: center;'>
                                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                    La cuenta no ha sido verificada.
                                    </div>";
                }
            } else {
                $error = "<div class='alert alert-danger center-xs alert-dismissable' style='max-width:50%; margin: auto;'>
                                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                    <strong>Oh no!</strong> La contaseña no coincide.
                                    </div>";
            }
        }
    }

}