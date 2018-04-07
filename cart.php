<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("./header.php"); ?>
</head>

<body class="bg-light" id="page-top">
<!-- Navigation -->
<?php include("nav.php")?>

<?php include("./banners/1.php")?>


<!-- Intro Header -->
<header class="masthead" style="margin-top: 0%; ">
    <div class="intro-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h1 class="brand-heading">Before time</h1>
                    <div style="font-size: 6em"><i class="fas fa-shopping-cart"></i></div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Intro Header -->
    <div class="intro-body">
        <div class="container">
            <div class="row">
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

                <div class="col-lg-4 col-md-6 mb-4" >
                    <div class="card">
                        <h1 class="total">Total: $5500 USD</h1>
                        <form class="proceed-to-checkout"><button class="btn proceed-to-checkout" type="submit" formaction="/action_page2.php">Proceder al pago</button></form>
                    </div>
                </div>

            </div>

        </div>
    </div>


<br>
<br>

<?include("footer.php")?>
</body>

</html>