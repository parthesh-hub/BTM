<?php
   include("config.php");
   session_start();


	if($_SERVER["REQUEST_METHOD"] == "POST") {
        

        if(!empty($_POST['aptnextbtn'])){

            
            if($_SESSION['user_type']=='prime'){
                $selected_date = mysqli_real_escape_string($db,$_POST['first']);
                $service_type = mysqli_real_escape_string($db,$_POST['second']);
            }
            else{
                $selected_date = mysqli_real_escape_string($db,$_POST['first']);
                $service_type = 'shop';
            }

            $username = $_SESSION['userid'];
            $sql1 = "SELECT Cust_ID from customers where Username='$username'";
            $res1= mysqli_query($db, $sql1);
            $res1 = mysqli_fetch_array($res1, MYSQLI_ASSOC);
            $custid = $res1['Cust_ID'];

            $orgDate = $selected_date;  
            $servicedate = date("Y-m-d", strtotime($orgDate)); 
            $sql2 = "SELECT * from appointments where Cust_ID='$custid' and Date='$servicedate' and Status='Booked'";
            $res2 = mysqli_query($db,$sql2);
            
            if(mysqli_num_rows($res2)>0){
                $_SESSION['bmsg']="You already have an appointment on $selected_date.";
                header("location: apt.php");
            }
            else{
            $_SESSION['selected_date']= $selected_date;
            $_SESSION['datenew'] = date("Y-m-d", strtotime($selected_date));
            $_SESSION['testdate']=0;
            // header("location: test.php");
            $_SESSION['service_type']= $service_type;
             header("location: newapt2.php");
            }            
        }
            
        
 	}

?>

