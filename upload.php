<?php
error_reporting(E_ERROR);
$secret_key = "asdaf214nk21n4kzxcnk52124nkn5kn2ln"; //Tokens go here
$sharexdir = "i/"; //File directory
$lengthofstring = 5; //Length of file name

if(isset($_POST['submit'])){
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf', 'gif', 'txt', 'rar', 'mp4', 'mp3', 'wav');

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 40000000){
                //$fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'i/'.$fileName;
                move_uploaded_file($fileTmpName, $fileDestination);
                header("Location: i/$fileName");
              
            } else {
                echo "Your file is too big! Maximum 40mb!";
            }
        } else {
            echo "There was an error uploading your file!";
        }
     } else  {
        echo "You can't upload files of this type!";
     
    }
}