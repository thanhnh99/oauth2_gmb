<?php
require_once __DIR__.'/vendor/autoload.php';
require './oauth2.php';
require './service.php';

session_start();
$oauth = new Oauth2GMB();
if(!isset($_SESSION["access_token"]))
{
    $oauth->oauth2();
}
else
{
    $oauth2Service = new Oauth2Service();
    $_SESSION["access_token"] = $oauth2Service->getReAccessToken($oauth->client);
    $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'];
    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}
