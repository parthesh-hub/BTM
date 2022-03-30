<?php


        $orgDate = $_SESSION['selected_date'];  
        $serdate = date("Y-m-d", strtotime($orgDate)); 
        $sertype= $_SESSION['service_type'];
        $newdate = $_SESSION['datenew'];
        

        $sqlnew = "INSERT INTO appointments(Cust_ID,Date,Type,Status,TotalDiscount,TotalCost)
        VALUES('$cust_id','$serdate','$sertype','Booked','$totaldiscount','$totalcost')";
        $res = mysqli_query($db, $sqlnew);
            
        
        $sqln1 = "SELECT * from appointments where Cust_ID='$cust_id' ORDER BY Appt_ID DESC LIMIT 1";
        $resn1 = mysqli_query($db, $sqln1);
        $apptid = mysqli_fetch_array($resn1, MYSQLI_ASSOC);
        $appt_id = $apptid['Appt_ID']; 
        $_SESSION['checkapptid'] = $appt_id;

        
        $c =0;
        for($i=0; $i<count($_SESSION['data']); $i++){

            $service_id = $_SESSION['data'][$i]['serviceid'];
            $timeslot = $_SESSION['data'][$i]['timeslot'];
            $servicefinalcost = $_SESSION['data'][$i]['servicefinalcost'];
            
            $employee_id =$_SESSION['data'][$i]['employee'];
            // $employee_id = 102;

            $in1 = "INSERT INTO rendered_services values('$appt_id','$service_id','$employee_id', 
            '$service_date','$service_type','$timeslot','$servicefinalcost','Pending')";
            $resfinal = mysqli_query($db, $in1);

            $_SESSION['check'][$c]['apptid'] = $appt_id;
            $_SESSION['check'][$c]['empid'] = $empid;
            $_SESSION['check'][$c]['serviceid']= $service_id;
            $_SESSION['check'][$c]['selected_date']= $service_date;
            $_SESSION['check'][$c]['service_type']= $service_type;
            $_SESSION['check'][$c]['timeslot']= $timeslot;
            $_SESSION['check'][$c]['servicefinalcost']= $servicefinalcost;

            unset($sqln2);
            unset($resn2);
            unset($_SESSION['data']);
            $c+=1;
        }


?>