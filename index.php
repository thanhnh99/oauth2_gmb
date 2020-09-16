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
//    $oauth2Service->getAccount($oauth->client);
//    var_dump($oauth->client->getAccessToken());
    echo($oauth2Service->getReAccessToken($oauth->client));
    echo "\n";
    echo($oauth2Service->getLongLivedAccessToken($oauth->client));
}
