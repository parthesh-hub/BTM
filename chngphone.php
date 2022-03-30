<?php
session_start();
include('config.php');


if(isset($_SESSION['userid'])){
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(!empty($_POST['phonecust'])){
            $mynewphone = $_POST['phonecust'];
            $currentuser = $_SESSION['userid'];
            $sql1 = "UPDATE customers SET Phone = '$mynewphone'  WHERE Username = '$currentuser' ";
            // $sql = "UPDATE customers SET Phone = '$mynewphone'  WHERE Username = '$currentuser' ";
            $result = mysqli_query($db,$sql1);
            
            if($result){
                echo "Phone Number Updated Successfully";
            }
            else{
                echo "Unable to update... Please try again!!";
            }
            
        }

        else if(!empty($_POST['phoneemp'])){

            $mynewphone = $_POST['phoneemp'];            
            $currentuser = $_SESSION['userid'];
            
        
            $sql = "UPDATE employees SET Phone='$mynewphone' WHERE Username = '$currentuser'";
            $result = mysqli_query($db,$sql);
            
            if($result){
                echo "Updated Successfully";
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
