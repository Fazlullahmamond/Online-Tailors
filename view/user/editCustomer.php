<?php  
    include("../../config/config.php");
    include("../../config/userAuth.php");
    $title = "Edit Customer";
    $icon = 'edit';
    include("header.php");
?>
<div class="col-md-12">
    <div id="empModal" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Csutomer Info</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                
                                <div class="row">

                                <!-- clothes -->
                                <div class="col-md-6 products">
                                    <div class="single_image">
                                        <img src="../../assets/img/icons/cloths.jpg" alt="cloths">
                                        <div class="image_overlay">
                                            <a id="editClothes">Edit Clothes info <span class="fa fa-arrow-circle-right"></span></a>
                                            <h2>Clothes</h2>
                                            <h4>Edit clothes info of a customer</h4>
                                        </div>                        
                                    </div>
                                </div>

                                <!-- Kurti -->
                                <div class="col-md-6 products">
                                    <div class="single_image">
                                        <img src="../../assets/img/icons/kurti.jpg" alt="kurti">
                                        <div class="image_overlay">
                                            <a id="editKurti">Edit Kurti info <span class="fa fa-arrow-circle-right"></span></a>
                                            <h2>Kurti</h2>
                                            <h4>Edit kurti info of a customer</h4>
                                        </div>                        
                                    </div>
                                </div>
                                </div>

                                <div class="row">
                                <!-- Waskat -->
                                <div class="col-md-6 products">
                                    <div class="single_image">
                                        <img src="../../assets/img/icons/waskat.jpg" alt="waskat">
                                        <div class="image_overlay">
                                            <a id="editWaskat">Edit Waskat info <span class="fa fa-arrow-circle-right"></span></a>
                                            <h2>Waskat</h2>
                                            <h4>edit waskat info of a customer</h4>
                                        </div>                        
                                    </div>
                                </div>

                                <!-- Pathloon -->
                                <div class="col-md-6 products">
                                    <div class="single_image">
                                        <img src="../../assets/img/icons/pathloon.jpg" alt="pathloon">
                                        <div class="image_overlay">
                                            <a id="editPathloon">Edit Pathloon info <span class="fa fa-arrow-circle-right"></span></a>
                                            <h2>Pathloon</h2>
                                            <h4>edit pathloon info of a customer</h4>
                                        </div>                        
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    <div class="table-responsive col-md-12">
						<table class="table dataTable table-hover">
							<thead class="thead">
								<tr>
									<th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email Address</th>
									<th>Phone Number</th>
                                    <th>View Info</th>
									<th>E/D</th>
								</tr>
							</thead>

							<tbody>

                            <?php
                                $sql1 = "SELECT company_id FROM users WHERE id = ". dc($_SESSION['id']).";";
                                $result1 = mysqli_query($db, $sql1);
                                $result1 = mysqli_fetch_assoc($result1);
                                $company_id = $result1['company_id'];
                                $sql = "SELECT users.id, users.first_name, users.last_name, users.phone_number, users.email, users.state, users.company_id FROM users INNER JOIN roles on users.role_id=roles.id WHERE users.role_id NOT IN (1,2) ORDER BY first_name, last_name ASC";
                                $result = mysqli_query($db, $sql);
                                $names = mysqli_fetch_assoc($result);
                                if(empty($names)){
                                    echo "<div class='imgErr'> No record found</div>";
                                }
                                while($names){
                                    $deleted = "<td><a data-id='" . ec($names['id']) . "' data-value='". ec($names['first_name']) ."' class='delete fa fa-toggle-on'</a></td>";
                                    if($names['company_id'] != $company_id){
                                        $deleted = "<td><a class='fa fa-ban'></a></td>";
                                    }elseif($names['state']==0){
                                        $deleted = "<td><a data-id='" . ec($names['id']) . "' data-value='". ec($names['first_name']) ."' class='download fa fa-toggle-off'></a></td>";
                                    }
                                    echo "<tr class='row100 body'>
                                    <td>" . $names['first_name'] . "</td>
                                    <td>" . $names['last_name'] . "</td>
                                    <td>" . $names['email'] . "</td>
                                    <td>" . $names['phone_number'] . "</td>
                                    <td><a data-id='" . $names['id'] . "' data-value=". $names['first_name'] ." class='edit' data-toggle='modal' data-target='#empModal'><span class='fa fa-edit'></span></a></td>
                                    $deleted
                                    </tr>";
                                    $names = mysqli_fetch_assoc($result);
                                }
    
                            ?>

                            </tbody>
						</table>
    </div>


</div>


<?php

    include("footer.php");

?>