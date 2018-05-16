<!-- Establece una conexión a la base de datos -->
<?php include("./scripts/connection_database.php"); ?>

<!-- Incluye swiftmailer -->
<?php require_once './swiftmailer/vendor/autoload.php';?>

<?php

# PRODECIMIENTO AL RECIBIR LOS DATOS DEL FORMULARIO.
# 1. Revisar que ningún campo se encuentre vacío.
#

# Almacena los mensajes que se mostrarán al usuario.
global $error;

# Inicializa los campos
$username = $email = $password = $error = "";

# Si algun paso sale mal, esté se hará falso.
$ok = true;

# Revisa que no sea nulo
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    # Revisa que ninguno de los campos esté vacío.
    if (empty($username) || empty($email) || empty($password)) {
        # Muestra un mensaje de error. --->  NOTA: Modificar más adelante. Evitar redundancias. <---
        $error = "<div class='alert alert-danger center-xs alert-dismissable' style='max-width:50%; margin: auto;'>
                                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                    Revisa que ningún campo esté vacío.
                                    </div>";
        $ok = false;

        # En caso de que no haya campos vacíos. Verifica formato cadenas.
    } else {
        $username = mysqli_real_escape_string($connection, $username);
        $email = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);

        # Encriptar contraseña.
        $password = password_hash($password, PASSWORD_DEFAULT);
    }

    if ($ok) {
        # Revisa que el correo tenga un formato válido.
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $ok = false;
            $error .= "<div class='alert alert-danger center-xs alert-dismissable' style='max-width:50%; margin: auto;'>
                                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                    El correo no tiene un formato válido.
                                    </div>";
        }
    }

    if ($ok) {
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
    }

    # Si pasó todas las validaciones, inserta en la base de datos.
    if ($ok) {
        # Crea una clave de activación aleatoria.
        $activation_key = md5(rand() . time());

        # Inserta los datos a la base de datos.
        $sql = "INSERT INTO users(username, email, password, activation_key, is_active, date_time)
                          VALUES ('{$username}', '{$email}', '{$password}', '{$activation_key}', '0', now())";

        # En caso de que no se haya completato correctamente el registro, muestra mensaje de error.
        if (!$query = mysqli_query($connection, $sql)) {
            $ok = false;
            die("QUERY FAILED " . mysqli_error($connection));
        }
    }

    # Si logró crearse el usuario, enviar activación al correo
    if ($ok)
    {

        # Mensaje que se envía
        $msg = "Activa tu cuenta haciendo clic al siguiente enlace: <a href='localhost/clicker/user/user_activation.php?key=".$activation_key."'>http://localhost/clicker/user/user_activation.php?
                    key=".$activation_key."</a>";

        // Configuración mailer
        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
            ->setUsername('jesus.m.mailer@gmail.com')
            ->setPassword('!jmiramontes!')
        ;

        // Crea mailer usando transport
        $mailer = new Swift_Mailer($transport);

        // Mensaje a enviar
        $message = (new Swift_Message('Activa tu cuenta'))
            ->setFrom(['jesus.m.mailer@gmail.com' => 'Jesus M.'])
            ->setTo([$email => $username])
            ->setBody($msg, 'text/html')
        ;

        // Envía el mensaje
        if(!$result = $mailer->send($message)){

            # Error al enviar correo
            $error = "<div class='alert alert-danger center-xs alert-dismissable' style='max-width:50%; margin: auto;'>
                                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                No ha sido envado el correo correctamente. Verifique los datos.
                                </div>";

        }else{

            # Logró enviarse el correo.
            $error = "<div class='alert alert-success center-xs alert-dismissable' style='max-width:50%; margin: auto;'>
                                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                Activa tu cuenta desde el correo ingresado.
                                </div>";
        }

    }
}
?>
