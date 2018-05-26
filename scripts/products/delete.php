<?php
global $connection, $error;

if (!empty($_GET['idproducts'])){
    $idproducts = $_GET['idproducts'];
} else{
    $idproducts = "";
}

if($idproducts != ''){
    $sql = mysqli_query($connection, "DELETE FROM products WHERE idproducts = '$idproducts'");
}