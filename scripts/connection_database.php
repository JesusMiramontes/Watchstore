<?php

# Si no existe, crea una sesión.
if(!isset($_SESSION)){
    session_start();
}

# Almacena la conexión abierta a la base de datos.
global $connection;


# Configuración para la conexion.
$host = "127.0.0.1";
$username = "root";
$password = "";
$database_name = "watchstore";

# Crea la conexion y se almacena en la variable global previamente definidgit
$connection = mysqli_connect($host, $username, $password, $database_name);
