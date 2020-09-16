<?php

class Oauth2Service
{
    public function getAccount($client)
    {
        echo "nguyen huu thanh";
//        get token from database
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
    public function getReAccessToken($client)
    {
        $access_token = $client->getAccessToken();
        if($client->isAccessTokenExpired())
        {
            $refresh_token = $_SESSION["refresh_token"];
            $access_token = $client->refreshToken($refresh_token);
        }
        return $access_token;
    }

    public function getRefreshToken($client)
    {
        return $client->getRefreshToken();
    }


    public function getLongLivedAccessToken($client)
    {

    }
}