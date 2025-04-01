<?php
$errors = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $target_dir = "./images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

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
        array_push($errors, "Sorry, your file is too large.");
        $uploadOk = 0;
    }

    if (
        $imageFileType != "jpg" && $imageFileType != "png"
    ) {
        array_push($errors, "Sorry, only JPG and PNG files are allowed.");
        $uploadOk = 0;
    }

    if ($uploadOk === 0) {
        array_push($errors,"Sorry, your file was not uploaded.");
    } else {
        if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            array_push($errors, "Sorry, there was an error uploading your file.");
        }
    }
}
