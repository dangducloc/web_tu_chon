<?php
session_start();
$flag = false;
if(!isset($_SESSION['login'])){?>
    <script>
        setTimeout(function() {
            window.location.href = './login.php';
        }, 0);
    </script>
<?php }?>