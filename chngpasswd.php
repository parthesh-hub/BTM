<?php
session_start();
include('config.php');


if(isset($_SESSION['userid'])){
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(!empty($_POST['currpasscust']) && !empty($_POST['newpasscust']) && !empty($_POST['newapasscust'])){
            $mycurrpassword = $_POST['currpasscust'];
            $mynewpassword = $_POST['newpasscust'];
            $mynewapassword = $_POST['newapasscust'];
            $currentuser = $_SESSION['userid'];
        
            $findcurrentpassword = "SELECT * from customers where Username = '$currentuser'";
            $res = mysqli_query($db, $findcurrentpassword );
            $old = mysqli_fetch_array($res, MYSQLI_ASSOC);
            $oldpasswd = $old['Password'];
            
            if(password_verify($mycurrpassword, $oldpasswd)){
 
                $mynewpassword = password_hash($mynewpassword, PASSWORD_DEFAULT);  
                $sql = "UPDATE customers SET Password='$mynewpassword' WHERE Username = '$currentuser'";
                mysqli_query($db,$sql);
                echo "Password Updated Successfully";
        
            }
            else{
                echo "Incorrect current password";
            }
        
        }

        else if(!empty($_POST['currpassadmin']) && !empty($_POST['newpassadmin']) && !empty($_POST['newapassadmin'])){
            $mycurrpassword = $_POST['currpassadmin'];
            $mynewpassword = $_POST['newpassadmin'];
            $mynewapassword = $_POST['newapassadmin'];
            $currentuser = $_SESSION['userid'];
        
            $findcurrentpassword = "SELECT * from customers where Username = '$currentuser'";
            $res = mysqli_query($db, $findcurrentpassword );
            $old = mysqli_fetch_array($res, MYSQLI_ASSOC);
            $oldpasswd = $old['Password'];
        
            if(password_verify($mycurrpassword, $oldpasswd)){
                $mynewpassword = password_hash($mynewpassword, PASSWORD_DEFAULT); 
                $sql = "UPDATE customers SET Password='$mynewpassword' WHERE Username = '$currentuser'";
                mysqli_query($db,$sql);
                echo "Updated Successfully";
            }
            else{
                echo "Enter correct password";
            }
        
            
        }


        else if(!empty($_POST['currpassemp']) && !empty($_POST['newpassemp']) && !empty($_POST['newapassemp'])){
            $mycurrpassword =$_POST['currpassemp'];
            $mynewpassword = $_POST['newpassemp'];
            $mynewapassword = $_POST['newapassemp'];
            $currentuser = $_SESSION['userid'];
        
            $findcurrentpassword = "SELECT * from employees where Username = '$currentuser'";
            $res = mysqli_query($db, $findcurrentpassword );
            $old = mysqli_fetch_array($res, MYSQLI_ASSOC);
            $oldpasswd = $old['Password'];
        
            if(password_verify($mycurrpassword, $oldpasswd)){

                $mynewpassword = password_hash($mynewpassword, PASSWORD_DEFAULT); 
                $sql = "UPDATE employees SET Password='$mynewpassword' WHERE Username = '$currentuser'";
                mysqli_query($db,$sql);
                echo "Updated Successfully";
        
            }
            else{
                echo "Enter correct password";
            }
        
            
        }
        

    }

}

else{
    header('location:logout.php');
}

?>
