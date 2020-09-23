<?php
session_start()
?>
<div>
    <button>
        <a href="http://localhost:8080/process.php">
            Oauth2
        </a>
    </button>
    <button>
        <a href="http://localhost:8080/refresh_token.php">
            Refresh Token
        </a>
    </button>
</div>
<lable>
    <div>
        <?php
        if(!isset($_SESSION['access_token']))
        {
            echo "None access_token";
            if(isset($_SESSION["error"]))
            {
                echo $_SESSION["error"];
            }
        }
        else
        {
            echo "Access Token: ";
            echo var_dump($_SESSION['access_token']);
        }
        ?>
    </div>
</lable>