<!DOCTYPE html>
<html>
<?php session_start() ?>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <div class="main">

        <h3>Enter your login credentials</h3>
        <form action="" method="post">
            <label for="first">
                Username:
            </label>
            <input type="text" id="name" name="name" placeholder="Enter your Username" required>

            <label for="password">
                Password:
            </label>
            <input type="password" id="passwd" name="passwd" placeholder="Enter your Password" required>

            <div class="wrap">
                <button type="submit">
                    Submit
                </button>
            </div>
        </form>
    </div>
</body>

</html>
<?php
if (!isset($_POST['name']) && !isset($_POST['passwd'])) {
    $_POST['name'] = "";
    $_POST['passwd'] = "";
} else {
    $name = $_POST['name'];
    $pass = $_POST['passwd'];

    include "./func/conect.php";
    $sql = "SELECT * FROM users WHERE name = '$name' AND pass = '$pass'";
    $rs = $con->query($sql);
    if ($rs->num_rows >= 1) {
        setcookie("login", true, time() + (86400 * 30), "/");
        $arr = [];
        while ($row = $rs->fetch_assoc()) {
            $arr[] = $row;
        }
        if ($arr[0]) {
            $data = base64_encode(json_encode($arr[0]));
            setcookie("user", $data, time() + (86400 * 30), "/");
            if ($arr[0]['role'] == "Member") { ?>
                <script>
                    setTimeout(function () {
                        window.location.href = './control.php?file=index.php';
                    }, 0);
                </script>
            <?php } else if ($arr[0]['role'] == "Admin") { ?>
                <script>
                    setTimeout(function () {
                        window.location.href = './admin.php';
                    }, 0);
                </script>
            <?php }
        }
    } else { ?>
        <script>
            alert('Login failed! Please check your username and password.');
        </script>
    <?php }
}
?>