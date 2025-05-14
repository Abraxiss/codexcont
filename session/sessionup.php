<?php
session_start(); // Sin @

if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
    $user_nombre = $_SESSION['user_nombre'];
    $user_codigo = $_SESSION['user_codigo'];
    $user_avatar = $_SESSION['user_avatar'];
} else {
    session_destroy();
    header("Location: ./index.php");
    exit();
}
?>
