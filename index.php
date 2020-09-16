<?php
require_once __DIR__.'/vendor/autoload.php';
require './oauth2.php';
require './service.php';

session_start();
$oauth = new Oauth2GMB();
if(!isset($_GET["access_token"]))
{
    $oauth->oauth2();
}
else
{
    $oauth2Service = new Oauth2Service();
    $oauth2Service->getAccount($oauth->client);

}
