<!-- Establece una conexión a la base de datos -->
<?php include("./scripts/connection_database.php"); ?>

<!-- Incluye swiftmailer -->
<?php require_once './swiftmailer/vendor/autoload.php';?>

<?php
global $connection;
global $error;

# Inizializa variables.
$ok = true;
$error = "";

# Se ejecuta al precionar el bot´n.
if(isset($_POST['forgot']))
{
    # Recupera los datos ingresados.
    $email = $_POST['email'];

    # Revisa que el campo no esté vacío.
    if (empty($email)) {
        $ok = false;
        $error .= "<div class='alert alert-danger center-xs alert-dismissable' style='max-width:50%; margin: auto;'>
                                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                    Revisa que ningún campo esté vacío.
                                    </div>";
    }

    # Busca el correo ingresado en la base de datos.
    if ($ok)
    {
        # Filtra correo.
        $email = mysqli_real_escape_string($connection, $email);

        $query_sql = "SELECT * FROM users WHERE email = '{$email}'";
        $query = mysqli_query($connection, $query_sql);
        $user_row = mysqli_num_rows($query);

        if ($user_row <= 0){
            $error .= "<div class='alert alert-danger center-xs alert-dismissable' style='max-width:50%; margin: auto;'>
                                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                    <strong>Oh no!</strong> El correo ingresado no existe.
                                    </div>";
            $ok = false;
        }
    }

    # En caso de encontrar el correo, recupera los datos de la bd.
    if ($ok)
    {
        while ($row = mysqli_fetch_array($query))
        {
            $email = $row['email'];
            $username = $row['username'];
            $activation_key = $row['activation_key'];
        }
    }

    # Una vez recuperados los datos, se envía el correo.
    if ($ok)
    {
        # Mensaje que se envía
        $msg = "Recupera tu contraseña haciendo clic al siguiente enlace: <a href='localhost/clicker/reset.php?key=".$activation_key."'>http://localhost/clicker/reset.php?
                    key=".$activation_key."</a>";

        // Configuración mailer
        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
            ->setUsername('jesus.m.mailer@gmail.com')
            ->setPassword('!jmiramontes!')
        ;

        // Crea mailer usando transport
        $mailer = new Swift_Mailer($transport);

        // Mensaje a enviar
        $message = (new Swift_Message('Recuperar contraseña'))
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
                                Se ha enviado un enlace al correo ingresado.
                                </div>";
        }
    }

}
?>