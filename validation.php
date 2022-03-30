<?php
   include("config.php");
   session_start();


	if($_SERVER["REQUEST_METHOD"] == "POST") {
        

        if(!empty($_POST['regular_login'])){
            
            $userid = mysqli_real_escape_string($db,$_POST['username1']);
            $password = mysqli_real_escape_string($db,$_POST['pass1']);
            $sqllogin = "Select * from customers where Username='$userid' and Cust_Type='Regular'";
            $result = mysqli_query($db, $sqllogin);
            $row = mysqli_fetch_array($result);
            if (mysqli_num_rows($result)==1){
                
                if(password_verify($password, $row["Password"])){
                    $_SESSION['userid'] = $userid;
                    if(isset($_SESSION['userid'])){
                            header("location: apt.php");
                        
                    }
                    else{
                        $_SESSION['errmsg'] = "Error.. Please try again!!";
                        header("location: login.php");
                    }
                }
                else{
                    $_SESSION['errmsg'] = 'Invalid Password';
                    header("location: login.php");
                }              
            }
            else{
                $_SESSION['errmsg'] = ' Invalid credentials';
                header("location: login.php");

            }
        }

        else if(!empty($_POST['prime_login'])){

            $userid = mysqli_real_escape_string($db,$_POST['username']);
            $password = mysqli_real_escape_string($db,$_POST['pass']);

            if(substr($userid, 0, 3) == "EMP"){
                $sqllogin = "Select * from employees where Username='$userid'";
                $result = mysqli_query($db, $sqllogin);
                $row = mysqli_fetch_array($result);
                if(!empty($row['Username'])){
                if (mysqli_num_rows($result)==1){ 
                
                    if(password_verify($password, $row["Password"])){
                        $_SESSION['userid'] = $userid;
                        
                        if(isset($_SESSION['userid'])){
                            header("location: emp.php");
                        }
                        else{
                            $_SESSION['errmsg'] = "Error.. Please try again!!";
                            header("location: login.php");
                        }
                    }
                    else{
                        $_SESSION['errmsg'] = 'Invalid Password ';
                        header("location: login.php");
                    }
                } }
                else{
                    
                    $_SESSION['errmsg'] = ' Invalid credentials';
                    header("location: login.php");
                } 

            }

            else{

                $sqllogin = "Select * from customers where Username='$userid' and Cust_Type='Prime'";
                $result = mysqli_query($db, $sqllogin);
                $row = mysqli_fetch_array($result);
                if (mysqli_num_rows($result)==1){
                    
                    if(password_verify($password, $row["Password"])){
                        $_SESSION['userid'] = $userid;
                        if(isset($_SESSION['userid'])){
                            if($userid=='ADMIN'){
                                header("location: admin.php");
                            }
                            else{
                                header("location: apt.php");
                            }
                        }
                        else{
                            $_SESSION['errmsg'] = "Error.. Please try again!!";
                            header("location: login.php");
                        }
                    }
                    else{
                        $_SESSION['errmsg'] = 'Invalid Password';
                        header("location: login.php");
                    }
                    
                }
                else{

                    $_SESSION['errmsg'] = ' Invalid credentials';
                    header("location: login.php");
                }
            }
            
        }

        
 	}

?>

