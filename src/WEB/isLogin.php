<?php
session_start();
if(!isset($_COOKIE['login'])||$_COOKIE['login']!=true){?>
    <script>
        setTimeout(function() {
            window.location.href = './login.php';
        }, 0);
    </script>
<?php }?>