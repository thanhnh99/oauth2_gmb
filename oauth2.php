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
        if(isset($_SESSION["access_token"]))
        {
            $this->client->setAccessToken($_SESSION["access_token"]);
        }
    }

    public function oauth2()
    {
        if (! isset($_SESSION['code'])) {
            $auth_url = $this->client->createAuthUrl();
            header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
        } else {
            $this->client->authenticate($_SESSION['code']);
            $_SESSION["access_token"] = $this->client->getAccessToken();
            $_SESSION["refresh_token"] = $this->client->getRefreshToken();
            $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'];
            header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
        }
    }
}