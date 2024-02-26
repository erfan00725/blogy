<?php

function uploadImage(){

$target_dir = "../uploads/";
$target_file = $target_dir . "format_" . dechex(time()). "_" .basename($_FILES["image"]["name"]);
$uploadOk = 1;



// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["image"]["tmp_name"]);
  if($check !== false) {
    // echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

$maxSize = 1024 * 1024 * 5;

// Check file size
if ($_FILES["image"]["size"] > $maxSize) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

$clientMimeType = $_FILES["image"]['type'];
$allowedMimeTypes = ['image/jpeg', 'image/png', 'image/jpg'];

// Allow certain file formats
if(!in_array($clientMimeType, $allowedMimeTypes)) {
  echo "Sorry, only JPG, JPEG & PNG files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    // echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
    return $target_file;
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
}