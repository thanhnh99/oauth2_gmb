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
    $oauth2_service = new Oauth2Service();
    var_dump($oauth2_service->getReAccessToken($oauth->client));
    echo "\n";
    var_dump($oauth2_service->getLongLivedAccessToken($oauth->client));
}
