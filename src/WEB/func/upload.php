<?php
$target_dir = "../images/";
$original_filename = basename($_FILES["file"]["name"]);
$target_file = $target_dir . $original_filename;
$uploadOk = 1;
$message = "";
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is an actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if ($check !== false) {
        $message = "File is an image - " . $check["mime"] . ".";
    } else {
        $message = "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists and generate a new unique filename
if (file_exists($target_file)) {
    $file_name = pathinfo($original_filename, PATHINFO_FILENAME);
    $new_filename = $file_name . '_' . time() . '.' . $imageFileType;
    $target_file = $target_dir . $new_filename;
    $message = "File already existed, so the file was saved as $new_filename.";
}

// Check file size
if ($_FILES["file"]["size"] > 500000) {
    $message = "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if (!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
    $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $message = $message ?: "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        $message = "The file " . htmlspecialchars(basename($target_file)) . " has been uploaded.";
    } else {
        $message = "Sorry, there was an error uploading your file.";
    }
}

// Display the message and redirect after 5 seconds
echo "<p>$message</p>";
echo "<script>
        setTimeout(function() {
            window.location.href = '/control.php?file=uploadimg.php';
        }, 1500);
      </script>";
