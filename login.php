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
</body>

<div class="container" style="margin-top: 100px !important;">
    <?php include("./user/login.php"); ?>
</div>

</html>