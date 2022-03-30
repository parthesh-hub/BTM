<?php
session_start();
include('config.php');
if(isset($_FILES['file']['name'])){

   /* Getting file name */
   $filename = $_FILES['file']['name'];

   /* Location */
   $location = "upload/".$filename;
   $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
   $imageFileType = strtolower($imageFileType);

   /* Valid extensions */
   $valid_extensions = array("jpg","jpeg","png");

   $response = 0;
   /* Check file extension */
   if(in_array(strtolower($imageFileType), $valid_extensions)) {
      /* Upload file */
      if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
         $response = $location;
      }
   }
   $username = $_SESSION['userid'];

   if(substr($username,0,3)=='EMP'){
      $sql = "UPDATE employees SET Profile_Picture = '$location' WHERE Username = '$username' ";
      $res = mysqli_query($db,$sql);
   }
   else{
      $sql = "UPDATE customers SET Profile_Picture = '$location' WHERE Username = '$username' ";
      $res = mysqli_query($db,$sql);
   }
   
   echo $response;
   exit;
}

echo 0;
