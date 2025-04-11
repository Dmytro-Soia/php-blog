<?php

require_once "functions/flashMessages.php";
if ($_FILES["fileToUpload"]["name"] !== "") {
    $target_dir = "./post-images/";
    $newImageName = random_bytes(10);
    $imageFileType = pathinfo(basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION);
    $uploadOk = 1;
    $target_file = $target_dir . bin2hex($newImageName) . "." . $imageFileType;
    $photo = bin2hex($newImageName) . "." . $imageFileType;

    if ($_FILES["fileToUpload"]["tmp_name"] !== "") {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            push_flash_message("File is not an image.");
            $uploadOk = 0;
        }
    }

    if ($_FILES["fileToUpload"]["size"] > 1048576) {
        push_flash_message("Your file is too large.");
        $uploadOk = 0;
    }

    if (
        $imageFileType != "jpg" && $imageFileType != "png"
    ) {
        push_flash_message("Only JPG and PNG files are allowed");
        $uploadOk = 0;
    }

    if ($uploadOk === 0) {
        push_flash_message("Your file was not uploaded because of an error");
    } else {
        if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            push_flash_message("There was an error uploading your file");
        }
    }
}
