<?php
session_start();
require_once('fonction.php');

if (isset($_SESSION['LOGIN_USER']) OR isset($_SESSION['LOGIN_ADMIN'])){
    session_destroy();   
}

redirectToUrl('index.php');
?>