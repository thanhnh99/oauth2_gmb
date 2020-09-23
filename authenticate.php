<?php
require_once __DIR__.'/vendor/autoload.php';
require './oauth2.php';
require './service.php';
session_start();
$oauth = new Oauth2GMB();
$oauth->authenticate();