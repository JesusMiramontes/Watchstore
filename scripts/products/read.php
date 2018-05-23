<!-- Establece una conexión a la base de datos -->
<?php include("../connection_database.php"); ?>

<!-- Incluye swiftmailer -->
<?php require_once '../../swiftmailer/vendor/autoload.php';?>

<?php

# Almacena los mensajes que se mostrarán al usuario.
global $error;

# Inicializa las variables
$nombre = $descripcion = $image = "";
$precio = $stock = 0;

# Si algun paso sale mal, esté se hará falso.
$ok = true;

# Revisa que no sea nulo
if ($ok) {
    # Busca en la base de datos registros con ese correo.
    $sql_query = mysqli_query($connection, "SELECT * FROM products");

    # Revisa que no exista el correo.
    foreach ($sql_query as $item){
        echo "<p>$item[0]";
    }
}