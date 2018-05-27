<!-- Establece una conexión a la base de datos -->
<?php

include("scripts/connection_database.php");


$sql = "SELECT idproducts, nombre, descripcion, img, stock, precio FROM products;";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "id: " . $row["idproducts"]. " - Name: " . $row["nombre"]. " - Desctipcion: " . $row["descripcion"]. " - img: " . $row["img"] . " - stock: " . $row["stock"] . "<br>";
}
} else {
echo "0 results";
}

?>

<div class="col-lg-4 col-md-6 mb-4" style="margin-top: 200px">
    <div class="card h-100">
        <a href="#"><img class="card-img-top" src="./media/images/ressence/1.png" alt=""></a>
        <div class="card-body">
            <h4 class="card-title">
                <a href="item_1.php">Item One</a>
            </h4>
            <h5 style="color: black !important;">$24.99</h5>
            <p class="card-text" style="color: black !important;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
        </div>
        <div class="card-footer">
            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
        </div>
    </div>
</div>


<div class="col-lg-4 col-md-6 mb-4" style="margin-top: 200px">
    <div class="card h-100">
        <a href="#"><img class="card-img-top" src="./media/images/ressence/2.png" alt=""></a>
        <div class="card-body">
            <h4 class="card-title">
                <a href="#">Item Two</a>
            </h4>
            <h5 style="color: black !important;">$34.99</h5>
            <p class="card-text" style="color: black !important;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
        </div>
        <div class="card-footer">
            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
        </div>
    </div>
</div>
<div class="col-lg-4 col-md-6 mb-4" style="margin-top: 200px">
    <div class="card h-100">
        <a href="#"><img class="card-img-top" src="./media/images/ressence/3.png" alt=""></a>
        <div class="card-body">
            <h4 class="card-title">
                <a href="#">Item Two</a>
            </h4>
            <h5 style="color: black !important;">$44.99</h5>
            <p class="card-text" style="color: black !important;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
        </div>
        <div class="card-footer">
            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
        </div>
    </div>
</div>
<div class="col-lg-4 col-md-6 mb-4" style="margin-top: 200px">
    <div class="card h-100">
        <a href="#"><img class="card-img-top" src="./media/images/ressence/4.png" alt=""></a>
        <div class="card-body">
            <h4 class="card-title">
                <a href="#">Item Two</a>
            </h4>
            <h5 style="color: black !important;">$54.99</h5>
            <p class="card-text" style="color: black !important;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
        </div>
        <div class="card-footer">
            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
        </div>
    </div>
</div>
