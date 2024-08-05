<?php
$target_dir = "../images/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.<br>";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["file"]["size"] > 500000) {
    echo "Sorry, your file is too large.<br>";
    $uploadOk = 0;
}
$arr=["php","php1","php2","php3","php4","php5","php6","php7","php8","phtml"];

// Allow certain file formats
$a = 0;
foreach($arr as $ele){
    if($imageFileType == $ele){
        $a = 1;
    }
    break;
}
if ($a == 1) {
    echo "Not Allow Upload Shell";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.<br>";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        header("../uploading.php?img = ".basename($_FILES["file"]["name"]));
    } else {
        echo "Sorry, there was an error uploading your file.<br>";
    }
}
 