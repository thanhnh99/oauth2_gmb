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
    $oauth2_service->getReAccessToken($oauth->client);
    $oauth2_service->getLongLivedAccessToken($oauth->client);
}
