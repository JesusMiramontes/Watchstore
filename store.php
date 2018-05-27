<html>
    <head>
        <?php include("./header.php"); ?>
    </head>
    <body class="bg-light" id="page-top">

    <!-- Navigation -->
    <?php include("nav.php")?>

    <!-- Video -->
    <div class="container" >
        <div class="row">
            <video autoplay class="" id="home-video" preload="auto" style="position: absolute; top: 55% !important; left: 50% !important; transform: translateX(-50%) translateY(-50%); width: 2164.36px; height: 868px;">
                <source src="./media/videos/tonda-calendar-annual.mp4" type="video/mp4">
            </video>
        </div>
    </div>


    <header class="masthead" style="margin-top: 45%; background: white">
        <div class="intro-body">
            <div class="container">
                <div class="row">



                    <?php
                    include("scripts/connection_database.php");


                    $sql = "SELECT idproducts, nombre, descripcion, img, stock, precio FROM products;";
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
                            echo "<h5 style=\"color: black !important;\">${$row['precio']}</h5>";
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

    <!-- Footer -->
    <?php include("footer.php")?>

    </body>
</html>