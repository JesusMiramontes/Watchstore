<?php include("./scripts/verify_user.php"); ?>

<div class="container">
    <div class="row" style="text-align: center">
        <h3>Sign Up</h3>
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

            <div class="row form-group input_group">
                <label for="" class="col-sm-2">Username:</label>
                <div class="col-sm-10">
                    <input type="text" name="username" id="username" class="form-control">
                </div>
            </div>

            <div class="row form-group input_group">
                <label for="" class="col-sm-2">Password:</label>
                <div class="col-sm-10">
                    <input type="password" name="password" id="password" class="form-control">
                </div>
            </div>

            <div class="row form-group" style="margin: 0 10px 20px 10px" >
                <div class="col-xs-12">
                    <input type="submit" name="submit" id="submit" class="form-control">
                </div>
            </div>
        </form>
    </div>
</div>