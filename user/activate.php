<?php
global $connection, $error;

if (!empty($_GET['key'])){
    $key = $_GET['key'];
} else{
    $key = "";
}

if($key != ''){
    $sql = mysqli_query($connection, "SELECT * FROM users WHERE activation_key = '$key'");
    $count = mysqli_num_rows($sql);

    if($count == 1){
        while($row = mysqli_fetch_array($sql)){
            $is_active = $row['is_active'];
        }

        if ($is_active == 0){
            $update_sql = "UPDATE users SET is_active = '1' WHERE activation_key = '$key'";
            $update_query = mysqli_query($connection, $update_sql);

            if($update_query){
                $error = "<div class='alert alert-success center-xs alert-dismissable' style='max-width:50%; margin: auto;'>
                                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                Se ha completado el registro.
                                </div>";
            }
        } else{
            $error = "<div class='alert alert-info center-xs alert-dismissable' style='max-width:50%; margin: auto;'>
                                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                Tu cuenta ya había sido verificada.
                                </div>";
        }
    }else{
        $error = "<div class='alert alert-danger center-xs alert-dismissable' style='max-width:50%; margin: auto;'>
                                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                Algo salió mal.
                                </div>";
    }
}