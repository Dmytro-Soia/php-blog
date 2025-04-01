<?php

$target_dir = "./images/";
$newImageName = random_bytes(10);
$imageFileType = pathinfo(basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION);
$uploadOk = 1;
$target_file = $target_dir . bin2hex($newImageName) . "." . $imageFileType;

if ($_FILES["fileToUpload"]["tmp_name"] !== "") {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        array_push($errors, "File is not an image.");
        $uploadOk = 0;
    }
}

if ($_FILES["fileToUpload"]["size"] > 1048576) {
    array_push($errors, "Your file is too large.");
    $uploadOk = 0;
}

if (
    $imageFileType != "jpg" && $imageFileType != "png"
) {
    array_push($errors, "Only JPG and PNG files are allowed");
    $uploadOk = 0;
}

if ($uploadOk === 0) {
    array_push($errors, "Your file was not uploaded due");
} else {
    if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        array_push($errors, "There was an error uploading your file");
    }
}
