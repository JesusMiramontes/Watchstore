<?php include("./scripts/forgot.php"); ?>

<div class="container">
    <div class="row" style="text-align: center">
        <h3>Recuperar contraseña</h3>
    </div>

    <!-- Muestra los mensajes de error o éxito al usuario. -->
    <?php echo $error; ?>

    <div class="row">
        <form action="" method="post"  class="form-horizontal signup" style="max-width: 500px">
            <div class="row form-group input_group">
                <label for="" class="col-sm-2 ">Email:</label>
                <div class="col-sm-10">
                    <input type="text" name="email" id="email" class="form-control">
                </div>
            </div>

            <div class="row form-group" style="margin: 0 10px 20px 10px" >
                <div class="col-xs-12">
                    <input type="submit" name="forgot" id="forgot" class="form-control">
                </div>
            </div>
        </form>

        <div class="row">
            <div class="col-sm-12 text-center">
                <a href="#">Iniciar sesión.</a>
            </div>
        </div>

    </div>
</div>