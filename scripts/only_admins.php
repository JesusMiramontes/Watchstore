<?php
SESSION_START();
if($_SESSION['is_admin'] != '1')
    header("Location: /watchstore/");
?>