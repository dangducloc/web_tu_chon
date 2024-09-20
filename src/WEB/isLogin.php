<?php
if(!isset($_COOKIE['user'])||$_COOKIE['login']!=true){?>
    <script>
        setTimeout(function() {
            window.location.href = './login.php';
        }, 0);
    </script>
<?php }?>