<?php
session_start();


echo $_SESSION['userid']."<br>" ;
echo $_SESSION['newphone']."<br>";


?>

<div id="switchtoprimemodal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> Switch To Prime </h4>
            </div>
            <div class="modal-body">
                <!-- Form -->
                <form method='post' action=''  enctype="multipart/form-data">
                    <label>Username</label>
                    <input type='text' name='s2pusername' id='s2pusername'
                        class='form-control' placeholder="Enter the Username"><br>
                    <label>Password</label>
                    <input type='password' name='s2ppasswd' id='s2ppasswd'
                        class='form-control' placeholder="Enter the Password"><br>
                    <label>Address</label>
                    <input type='text' name='s2paddress' id='s2paddress'
                        class='form-control' placeholder="Enter the Address"><br>
                    <label>Aadhar Card</label>
                    <input type='text' name='s2paadhar' id='s2paadhar'
                        class='form-control' placeholder="Enter the Aadhar Number"><br>
                    <label>Pincode: &nbsp;  </label>
                    <select name="s2ppincode" id="s2ppincode">
                      <option value="initial" selected='' disabled=''>Pincode</option>
                      <option value="410102">410102</option>
                      <option value="410103">410103</option>
                      <option value="410104">410104</option>
                    </select> <br><br>
                    <input type='submit' name='switchtoprime' class='btn btn-info' value='Confirm' id='switchtoprime'><br>
                </form>
                <div class='switchprime'>
                    <h3 class='switchprimemsg' style="color:red"> </h3>
                </div>

            </div>

        </div>

    </div>
</div>
