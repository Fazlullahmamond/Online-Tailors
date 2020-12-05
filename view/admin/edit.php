<?php  

    include("../../config/config.php");
    include("../../config/auth.php");
    $icon = "Edit";
    $fav = "edit";
    include("header.php");
?>
                
                <div id="empModal" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit User</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">

                            </div>
                        </div>
                    </div>
                </div>
    <div class="table-responsive col-md-9">
						<table class="table dataTable table-hover">
							<thead class="thead">
								<tr>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Phone Number</th>
									<th>Role</th>
                                    <th>Email</th>
                                    <th>View Info</th>
									<th>E/D</th>
								</tr>
							</thead>

							<tbody>

                            <?php

                                $sql = "SELECT users.id, users.first_name, users.last_name, users.phone_number, roles.role, users.email, users.state FROM users INNER JOIN roles on users.role_id=roles.id WHERE NOT users.role_id  = 1  ORDER BY first_name, last_name ASC";
                                $result = mysqli_query($db, $sql);
                                $names = mysqli_fetch_assoc($result);
                                if(empty($names)){
                                    echo "<div class='imgErr'> No record found</div>";
                                }
                                while($names){
                                    $deleted = "<td><a data-id='" . ec($names['id']) . "' data-value='". ec($names['first_name']) ."' class='delete fa fa-toggle-on'</a></td>";
                                    if($names['state']==0){
                                        $deleted = "<td><a data-id='" . ec($names['id']) . "' data-value='". ec($names['first_name']) ."' class='download fa fa-toggle-off'></a></td>";
                                    }
                                    echo "<tr class='row100 body'>
                                    <td>" . $names['first_name'] . "</td>
                                    <td>" . $names['last_name'] . "</td>
                                    <td>" . $names['phone_number'] . "</td>
                                    <td>" . $names['role'] . "</td>
                                    <td>" . $names['email'] . "</td>
                                    <td><a data-id='" . ec($names['id']) . "' data-value=". ec($names['first_name']) ." class='edit' data-toggle='modal' data-target='#empModal'><span class='fa fa-eye'></span></a></td>
                                    $deleted
                                    </tr>";
                                    $names = mysqli_fetch_assoc($result);
                                }
    
                            ?>

                            </tbody>
						</table>
    </div>

<?php  

    include("footer.php");

?>
