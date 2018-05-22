<?php include("./scripts/create.php"); ?>

<div class="container">
    <div class="row" style="text-align: center">
        <h3>crud</h3>
    </div>

    <!-- Muestra los mensajes de error o éxito al usuario. -->
    <?php echo $error; ?>

    <div class="row">
        <form action="" method="post"  class="form-horizontal signup" style="max-width: 500px">
            <div class="row form-group input_group">
                <label for="" class="col-sm-2 ">Nombre:</label>
                <div class="col-sm-10">
                    <input type="text" name="nombre" id="nombre" class="form-control">
                </div>
            </div>

            <div class="row form-group input_group">
                <label for="" class="col-sm-2">Descripcion:</label>
                <div class="col-sm-10">
                    <input type="text" name="descripcion" id="descripcion" class="form-control">
                </div>
            </div>

            <div class="row form-group input_group">
                <label for="" class="col-sm-2">Precio:</label>
                <div class="col-sm-10">
                    <input type="text" name="precio" id="precio" class="form-control">
                </div>
            </div>

            <div class="row form-group input_group">
                <label for="" class="col-sm-2">Stock:</label>
                <div class="col-sm-10">
                    <input type="text" name="stock" id="stock" class="form-control">
                </div>
            </div>

            <div class="row form-group input_group">
                <label for="" class="col-sm-2">image:</label>
                <div class="col-sm-10">
                    <input type="text" name="image" id="image" class="form-control">
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