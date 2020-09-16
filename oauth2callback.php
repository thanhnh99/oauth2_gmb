<?php
session_start();
if(isset($_GET["code"]))
{
    $_SESSION["code"] = $_GET["code"];
    $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'];
    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}