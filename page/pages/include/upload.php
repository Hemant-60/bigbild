<?php
session_start();
include'../conn.php';
    if(isset($_POST['submit'])){
        $file = $_FILES['file'];

        $fileName=$_FILES['file']['name'];
        $fileTmpName=$_FILES['file']['tmp_name'];
        $fileSize=$_FILES['file']['size'];
        $fileError=$_FILES['file']['error'];
        $fileType=$_FILES['file']['type'];
        $fileExt=explode('.',$fileName);

        $fileActualExt=strtolower(end($fileExt));
        $allowed=array('jpg','jpeg','png','pdf','gif','bmp');
        if(in_array($fileActualExt,$allowed)){
            if($fileError==0){
                if($fileSize<5000000){
                    $fileNameNew=uniqid('',true).".".$fileActualExt;
                    $fileDestination='../user_profile/'.$fileNameNew;
                    $userId=$_SESSION['id'];
                    $query="UPDATE `user_additional_info` SET `picture`='$fileNameNew' WHERE user_id='$userId'";
                    $execQuery=mysqli_query($conn,$query);
                    if($execQuery) {
                      move_uploaded_file($fileTmpName,$fileDestination);
                      header("Location:../profile.php?uploadsuccess");
                    }else header("Location:../profile.php?uploadfailure");
                }else{
                    echo"file size exceeded";
                    header("Location:../profile.php?uploadfailure");
                }
            }else{
                echo"There was an error uploading your file";
                header("Location:../profile.php?uploadfailure");
                //print_r($file);
            }
        }else{
            echo"You cannot upload files of this type";
            header("Location:../profile.php?uploadfailure");
        }
    }
?>
