<?php
session_start();
include('config.php');



    
if($_SERVER["REQUEST_METHOD"] == "POST"){


    if(!empty($_POST['type']) && !empty($_POST['name'])){

        unset($_SESSION['searchcusttype']);
        unset($_SESSION['adminviewsearchcust']);

        $custname = $_POST['name'];
        $custtype = $_POST['type'];

        $_SESSION['searchcusttype'] = $custtype;

        if($custtype=='Prime'){
            $sql = "SELECT * from customers inner join prime on customers.Cust_ID = prime.Cust_ID where (customers.Cust_Type='$custtype') and (customers.FirstName LIKE '%$custname%' or customers.LastName LIKE '%$custname%') ORDER BY customers.Cust_ID  ";
        }
        elseif($custtype=='Regular'){
            $sql = "SELECT * from customers where Cust_Type='$custtype' AND (FirstName LIKE '%$custname%' or LastName LIKE '%$custname%') ORDER BY Cust_ID ";
        }

        $prj= mysqli_query($db, $sql);
        $res = array();
        while($row = mysqli_fetch_assoc($prj)){
            $res[] = $row;
        } ?>

        
        <thead class="thead-dark">
            <tr>
                <th style="position: sticky; top: 0;" scope="col">Sr. No.</th>
                <th style="position: sticky; top: 0;" scope="col">CustID</th>
                <th style="position: sticky; top: 0;" scope="col">First Name</th>
                <th style="position: sticky; top: 0;" scope="col">Last Name</th>
                <th style="position: sticky; top: 0;" scope="col">Type</th>
                <th style="position: sticky; top: 0;" scope="col">Phone</th>
                <?php if($_SESSION['searchcusttype']=='Prime'){?>
                <th style="position: sticky; top: 0;" scope="col">AadharCard</th>
                <th style="position: sticky; top: 0;" scope="col">Address</th>
                <?php }?>
            </tr>
        </thead>
        <tbody class='searchcustresult'><?php 
            for($i=0; $i<count($res); $i++){?>
                <tr>
                    <th scope="row"><?php echo $i+1 ?></th>
                    <td><?php echo $res[$i]['Cust_ID'] ?></td>
                    <td><?php echo $res[$i]['FirstName'] ?></td>
                    <td><?php echo $res[$i]['LastName'] ?></td>
                    <td><?php echo $res[$i]['Cust_Type'] ?></td>
                    <td><?php echo $res[$i]['Phone'] ?></td>                            
                    <?php if($_SESSION['searchcusttype']=='Prime'){?>
                    <td><?php echo $res[$i]['AadharCard'] ?></td>
                    <td><?php echo $res[$i]['Address'] ?></td>
                    <?php
                    }?>
                </tr><?php } ?>
            
        </tbody> <?php
        
    }

    
}


?>



