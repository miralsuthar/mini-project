<?php

$mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $caption = $_POST['caption'];

    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];    
    $folder = "image/".$filename;

    $mysqli->query("INSERT INTO data (name, location, image) VALUES('$name', '$caption', '$filename')") or 
            die($mysqli->error);    

    if (move_uploaded_file($tempname, $folder))  {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }
}