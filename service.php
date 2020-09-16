<?php

class Oauth2Service
{
    public function getAccount($client)
    {
        //get token from database
        //if(token is expire) then get new access token by refresh token
        //else then call api
    }
    public function getLocation($client)
    {
        //check token
        //get data if token isn't expired
    }
    public function replyComment($client)
    {
        //check token
        //reply comment if token isn't expired
    }
}