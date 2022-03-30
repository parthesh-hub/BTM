<?php 

session_start();
include('config.php');

if(!isset($_SESSION['userid'])){
    echo 'You are not logged in as Regular User';
}

else{
    
    if($_POST['s2p']){

        $username = $_POST['uname'];
        $password= $_POST['passwd'];
        $address = $_POST['address'];
        $aadhar = $_POST['aadhar'];
        $pincode = $_POST['pincode'];

        if($username==$_SESSION['userid']){

            $sql1 = "SELECT * from customers where Username='$username'";
            $res1 = mysqli_query($db, $sql1);
            $res1 = mysqli_fetch_array($res1, MYSQLI_ASSOC);
            $custid = $res1['Cust_ID'];
            $custtype = $res1['Cust_Type'];

            if($custtype=='Regular'){
                if(password_verify($password, $res1["Password"])){
                    $sql2 = "UPDATE customers set Cust_Type='Prime' where Username='$username'";
                    $res2 = mysqli_query($db, $sql2);
                    
        
                    if($res2){
                        $sql3 = "INSERT INTO PRIME values('$custid', '$aadhar', '$address', '$pincode')";
                        $res3 = mysqli_query($db, $sql3);
        
                        if($res3){
                            session_destroy();
                            echo "Congratulations!! You are now a Prime Member. 
                                Please go to login page";
                        }
                        else{
                            echo "Error.. Please Try Again!!";
                        }
                    }
                    else{
                        echo "Error.. Please Try Again!!";
                    }
                }
                else{
                    echo "Enter Correct Password";
                }
            }
            else{
                echo "You are already a Prime member";
            }

        }
        else{
            echo "Enter Correct Username";
        }

    }

}


?>