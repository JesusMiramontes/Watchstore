<!-- Establece una conexión a la base de datos -->
<?php include("./scripts/connection_database.php"); ?>

<?php
global $connection;
global $error;
$ok = true;

if(isset($_POST['reset']))
{
    # Recupera la clave de activación del enlace.
    if(empty($_GET['key']))
    {
        $ok = false;
        $error .= "<div class='alert alert-danger center-xs alert-dismissable' style='max-width:50%; margin: auto;'>
                                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                    Algo salió mal. Copia y pega el enlace en la barra de navegación.
                                    </div>";
    }

    # Verifica que la contraseña no esté vacía.
    if(empty($_POST['password']))
    {
        $ok = false;
        $error .= "<div class='alert alert-danger center-xs alert-dismissable' style='max-width:50%; margin: auto;'>
                                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                    Revisa que ningún campo esté vacío.
                                    </div>";
    }

    if($ok)
    {
        # Recupera la clave de activación, y contraseña.
        $key = $_GET['key'];
        $password = $_POST['password'];

        # Filtra texto.
        $key = mysqli_real_escape_string($connection, $key);
        $password = mysqli_real_escape_string($connection, $password);

        # Encripta contraseña.
        $password = password_hash($password, PASSWORD_DEFAULT);
    }

    if($ok)
    {
        if($sql = mysqli_query($connection, "UPDATE users SET password = '{$password}' WHERE activation_key = '{$key}'"))
        {
            $error = "<div class='alert alert-success center-xs alert-dismissable' style='max-width:50%; margin: auto;'>
                                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                La contraseña ha sido cambiada.
                                </div>";
        }
        else
        {
            $error .= "<div class='alert alert-danger center-xs alert-dismissable' style='max-width:50%; margin: auto;'>
                                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                    Algo salió mal.
                                    </div>";
        }
    }

}
?>
