<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("./header.php"); 
    include("scripts/connection_database.php");?>
    
</head>

<body class="bg-light" id="page-top">
<!-- Navigation -->
<?php include("nav.php")?>

<?php include("./banners/1.php")?>




<!-- Intro Header -->
<header class="masthead" style="margin-top: 45%; background: white">
        <div class="intro-body">
            <div class="container">
                <div class="row">



                    <?php
                     $iduser = $_SESSION['id'];

                    $sql = "SELECT idproducts, nombre, descripcion, img, stock, precio FROM products WHERE idproducts = (SELECT idproducts FROM cart WHERE iduser = '$iduser');";
                    $result = $connection->query($sql);

                    if($result->num_rows > 0)
                    {
                        while($row = $result->fetch_assoc())
                        {
                            echo "<div class=\"col-lg-4 col-md-6 mb-4\" style=\"margin-top: 200px\">";
                            echo "<div class=\"card h-100\">";
                            echo "<a href=\"#\"><img class=\"card-img-top\" src=\"{$row['img']}\" alt=\"\"></a>";
                            echo "<div class=\"card-body\">";
                            echo "<h4 class=\"card-title\">";
                            echo "<a href=\"\">{$row['nombre']}</a>";
                            echo "</h4>";
                            echo "<h5 style=\"color: black !important;\">$ {$row['precio']}</h5>";
                            echo "<p class=\"card-text\" style=\"color: black !important;\">{$row['descripcion']}</p>";
                            echo "</div>";
                            echo "<div class=\"card-footer\">";
                            echo "<small class=\"text-muted\">&#9733; &#9733; &#9733; &#9733; &#9734;</small>";
                            echo "</br><a href=\"http://localhost/watchstore/update.php?idproducts={$row['idproducts']}&nombre={$row['nombre']}&descripcion={$row['descripcion']}&image={$row['img']}&precio={$row['precio']}&stock={$row['stock']}\">Actualizar informacion</a>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </header>


<br>
<br>

<?include("footer.php")?>
</body>

</html>