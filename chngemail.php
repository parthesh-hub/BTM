<?php
session_start();
include('config.php');


if(isset($_SESSION['userid'])){
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(!empty($_POST['emailcust'])){
            $mynewemail = $_POST['emailcust'];
            
            $currentuser = $_SESSION['userid'];
        
            $sql = "UPDATE customers SET Email='$mynewemail' WHERE Username = '$currentuser'";
            $result = mysqli_query($db,$sql);
            
            if($result){
                echo "Email Updated Successfully";
            }
            else{
                echo "Unable to update... Please try again!!";
            }
            
        }
        
    }
}

else{
    header('location:logout.php');
}

?>
