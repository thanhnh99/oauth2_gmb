<?php
session_start();
if(isset($_GET["code"]))
{
    $_SESSION["code"] = $_GET["code"];
    $redirect_uri = 'http://' . $_SERVER['HTTP_HOST']. "/authenticate.php";
    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
    $_SESSION["error"] = null;
}
else
{
    $_SESSION["error"] = "Don't have permission";
    $redirect_uri = 'http://' . $_SERVER['HTTP_HOST']. "/authenticate.php";
    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}