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
        Access Token:
        <?php
        echo var_dump($_SESSION['access_token'])
        ?>
    </div>
</lable>