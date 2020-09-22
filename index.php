<?php
session_start()
?>
<div>
    <button>
        <a href="http://localhost:8080/process.php">
            Oauth2
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

<div>
    <button>
        Refresh Token
    </button>
</div>

<lable>Access Token:
    {{$_SESSION['access_token']}}
</lable>