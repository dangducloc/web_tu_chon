<?php
setcookie("user", "", time() - 3600, "/");
setcookie("login", false, time() - 3600, "/"); ?>
<script>
    setTimeout(function () {
        window.location.href = './login.php';
    }, 0);
</script>