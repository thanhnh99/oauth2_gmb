<?php
class  Oauth2GMB
{
    public $client;
    //
    public function __construct()
    {
        $this->client = new Google_Client();
        $this->client->setAccessType ("offline");
        $this->client->setApprovalPrompt ("force");
        $this->client->setAuthConfig('./code_secret_client.json');
        $this->client->addScope("https://www.googleapis.com/auth/business.manage");
    }

    public function oauth2()
    {
        if (! isset($_SESSION['code'])) {
            $auth_url = $this->client->createAuthUrl();
            header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
        } else {
            $this->client->authenticate($_SESSION['code']);
            $_SESSION["access_token"] = $this->getAccessToken();
            $_SESSION["refresh_token"] = $this->getRefreshToken();
        }
    }

    public function getAccessToken()
    {
        $access_token = $this->client->getAccessToken();

        if($this->client->isAccessTokenExpired())
        {
            $refresh_token = $this->client->getRefreshToken();
            $access_token = $this->client->refreshToken($refresh_token);
        }
        return $access_token;
    }

    public function getRefreshToken()
    {
        return $this->client->getRefreshToken();
    }


    public function getLongLivedAccessToken()
    {
        $refresh_token = $this->client->getRefreshToken();
        if($refresh_token)
        {
            $access_token = $this->client->fetchAccessTokenWithRefreshToken($refresh_token);
            $_SESSION["access_token"] = $access_token;
            return $access_token;
        }
        return null;
    }
}