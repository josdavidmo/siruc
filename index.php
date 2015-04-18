<?php

// Incluimos el archivo de configuracion
include './config/conf.php';
// Cargamos la configuracion prestablecida
include './system/buffer/loadConfig.php';

session_start();
if (isset($_SESSION['user_id'])) {
    $db = PersistenceImpl::getInstance($implementor);
    if (isset($_REQUEST['mod'])) {
       $mod = $_REQUEST['mod'];
        if ($mod == "signout") {
            session_destroy();
            include 'system/html/docs/login.php';
        } else {
            include 'system/html/docs/dashboard.php';
        }
    }
} else if (isset($_POST['txt_pass']) && isset($_POST['txt_email'])) {
    $email = $_POST['txt_email'];
    $pass = $_POST['txt_pass'];
    $db = PersistenceImpl::getInstance($implementor);
    $daoUser = new CUserData($db);
    $check = $daoUser->checkUser($email, $pass);
    if ($check) {
        $_SESSION['user_id'] = $check;
        include 'system/html/docs/dashboard.php';
    } else {
        include 'system/html/docs/login.php';
    }
} else {
    include 'system/html/docs/login.php';
}



