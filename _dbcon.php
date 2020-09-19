<?php
    $servername = 'localhost';
    $username = 'root';
    $password = "";
    $database = "ragistration_with_images";

    $conn = mysqli_connect($servername,$username,$password,$database);
    if ($conn) {
        #echo 'successfully';
    }else{
        echo 'error';
    }
?>