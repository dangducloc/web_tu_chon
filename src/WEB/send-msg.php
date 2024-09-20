<?php

include './func/conect.php';

$msg = $_POST["msg"];
$cookie = $_COOKIE["user"];
$json = json_decode(base64_decode($cookie), true);
$iduser = $json['id'];

$sql = "INSERT INTO `msg` (`id_user`, `msg`) VALUES (?,?);";

$stmt = $con->prepare($sql);
$stmt->bind_param("is", $iduser, $msg);

$success = $stmt->execute();

if ($success)
{ ?>
    <script>
        alert("msg sent successfully!!")
        setTimeout(function () {
            window.location.href = './control.php?file=index.php';
        }, 0);
    </script>

<?php } ?>