<!doctype html>
<html lang="es">
<head>
    <title>Iniciar sesión</title>
    <?php include("./header.php"); ?>
    <script>
        function validateInput()
        {
            var fieldValue= document.getElementById("email").value;

            // taken from this SO post: http://stackoverflow.com/questions/7126345/regular-expression-to-require-10-digits-without-considering-spaces
            var mailValidation= /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

            if (fieldValue.match(mailValidation)) {
                // correct phone structure
                return true;
            } else {
                // incorrect structure
                return false;
            }
        }
    </script>
</head>

<body>
<?php include("./nav.php"); ?>
<style>
.mySlides {display:none;}
</style>
<body>
<div  class="container" style="margin-top: 100px !important;">
<div class="w3-content w3-section" style="max-width:500px">
  <img class="mySlides" src="./media/images/1.jpg" style="width:100%">
  <img class="mySlides" src="./media/images/3.jpg" style="width:100%">
  <img class="mySlides" src="./media/images/watchset.jpg" style="width:100%">
</div>
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>



</body>

<div class="container" style="margin-top: 100px !important;">
    <?php include("./user/login.php"); ?>
</div>

</html>