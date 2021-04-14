<?php
    session_start();

    $recibe = $_POST['id'];
    $_SESSION['idLocalidad'] = $recibe;

?>