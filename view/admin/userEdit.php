<?php

    include("../../config/config.php");
    include("../../config/auth.php");

    if (isset($_POST['name']) && isset($_POST['value'])){
        $ID = $_POST['name'];
        $name = $_POST['value'];
        $sql = "SELECT * FROM users WHERE id = " . h(dc($ID)) . " AND first_name = '". h(dc($name)) ."';";
        $result = mysqli_query($db, $sql);
        if(!empty($result)){
            $row = mysqli_fetch_assoc($result);

                        $response = '<ul class="nav nav-pills">';
                            $response .= '<li class="tab1 nav-item"><a class="nav-link active" data-toggle="pill" data-target="#tab1">User Information</a></li>';
                            $response .= '<li class="tab2 nav-item"><a class="nav-link" data-toggle="pill" data-target="#tab2">Change Password</a></li>';
                            $response .= '<li class="tab3 nav-item"><a class="nav-link" href="userAllInfo.php?id='.h(dc($ID)).'&value='.h(dc($name)).'" >View More</a></li>';
                        $response .= '</ul>';

                    $response .= '<div id="tabs" class="tab-content">';
                        $response .= '<div id="tab1" class="tab-table tab-pane active">';
            //tab1 codes start here
                            $response .= '<div><form id="editTable">';
                                $response .= '<div id="infoDone" class="Done success" style="display:none;">Record successfully updated!</div>';
                                $response .= '<div id="infoNotDone" class="NotDone imgErr" style="display:none;">Record is not updated!</div>';
                                $response .= '<div id="emailExist" class="NotDone imgErr" style="display:none;">Email already exsit in database!</div>';
                                $response .= '<div id="phoneExist" class="NotDone imgErr" style="display:none;">Phone number already exsit in database!</div>';
                            
                                $response .= "<div class='row'><div class='col-md-6 editLabel' hidden> ID:</div><input name='id' class='col-md-5 editInput form-control' readonly value='".ec($row['id'])."' hidden></input></div>";
                                $response .= "<div class='row'><div class='col-md-6 editLabel'> First Name:</div><input name='firstName' class='col-md-5 editInput form-control' type='text' value='".$row['first_name']."' ></input></div>";
                                $response .= "<div class='row'><div class='col-md-6 editLabel'> Last Name:</div><input name='lastName' class='col-md-5 editInput form-control' type='text'  value='".$row['last_name']."' ></input></div>";
                                $response .= "<div class='row'><div class='col-md-6 editLabel'> Email Address:</div><input name='email' class='col-md-5 editInput form-control' type='email' value='".$row['email']."' ></input></div>";
                                $response .= "<div class='row'><div class='col-md-6 editLabel'> Phone Number:</div><input name='phone_number' class='col-md-5 editInput form-control' type='text' value='".$row['phone_number']."' ></input></div>";
                                $response .= '<div class="modalFooter">';
                                $response .= '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
                                $response .= '<button type="button" class="btn btn-primary" id="updateUser">Update</button>';
                                $response .= '</div>';
                            $response .= "</form></div>";
                            $response .= '</div>';  
            //tab1 codes ends here
            //tab2 codes start here
                            $response .= '<div id="tab2" class="tab-pane">';
                                $response .= '<div id="passDone" class="Done success" style="display:none;">Record successfully updated!</div>';
                                $response .= '<div id="passNotDone" class="NotDone imgErr" style="display:none;">Record is not updated!</div>';
                        
                                $response .= "<label class='BoxLabel fa fa-exclamation-circle'> The password will change to the default, you will no longer be able to use your current password. if you want to change the password click on the Change Password button.</label>";
                                $response .= '<div class="modalFooter">';
                                $response .= '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
                                $response .= '<button type="button" data-id="'.$_POST['name'].'" data-name="'.$_POST['value'].'" class="btn btn-primary" id="savePass">Change Password</button>';
                                $response .= '</div>';
                            $response .= '</div>';
            //tab2 codes end here
            //tab3 codes start here
                            $response .= '<div id="tab3" class="tab-pane">';

                            $response .= '</div>';
            //tab3 codes end here
            echo $response;
        }
    }
    else{
        echo '<div>404 Not found</div>';
    }
db_disconnect();
?>