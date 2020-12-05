<?php  
    include("../../config/config.php");
    include("../../config/userAuth.php");
    $title = "User Profile";
    $icon = 'account';
    include("header.php");

    $sql = "SELECT * FROM users WHERE id = ". dc($_SESSION['id']) .";";
    if($result = mysqli_query($db, $sql)){
      $row = mysqli_fetch_assoc($result);
    }
    $gender = $row['gender'] == 1 ? "Male" : "Female";
    $image = $row['image'] == NULL ? "../../assets/img/icons/open.png" : "../../assets/img/user_img/".$row['image'];
    $role = $row['role_id'] == 1 ? "Administrator" : "User";
    $sql1 = "SELECT districts.name as district, districts.lat as lat, districts.lon as lon, provinces.name as province FROM districts INNER JOIN provinces on districts.province_id = provinces.id WHERE districts.id = ". $row['district_id'] .";";
    if($result1 = mysqli_query($db, $sql1)){  
      $row1 = mysqli_fetch_assoc($result1);
    }
    $active = '';
    $active2 = '';
    $active3 = '';
    $firstActive = 'active';
    if(isset($_GET['fill']) || isset($_GET['valid']) || isset($_GET['updated']) || isset($_GET['notUp']) || isset($_GET['emailE']) || isset($_GET['phoneE'])){
      $active = 'active';
      $firstActive = '';
      $active2 = '';
      $active3 = '';
    }
    if(isset($_GET['password']) || isset($_GET['changed']) || isset($_GET['notChanged'])){
      $active2 = 'active';
      $firstActive = '';
      $active = '';
      $active3 = '';

    }
    if(isset($_GET['addressErr']) || isset($_GET['addressDone'])){
      $active3 = 'active';
      $active2 = '';
      $firstActive = '';
      $active = '';
    }
?>



    <div class="col-md-12 whiteBG centerItem">
        <ul class="nav nav-pills">
            <li class="tab1 nav-item col-md-3"><a class="nav-link <?php echo $firstActive ?>" data-toggle="pill" data-target="#tab1">Change Picture</a></li>
            <li class="tab2 nav-item col-md-3"><a class="nav-link <?php echo $active ?>" data-toggle="pill" data-target="#tab2">Personal Information</a></li>
            <li class="tab3 nav-item col-md-3"><a class="nav-link <?php echo $active2 ?>" data-toggle="pill" data-target="#tab3">Change Password</a></li>
            <li class="tab4 nav-item col-md-3"><a class="nav-link <?php echo $active3 ?>" data-toggle="pill" data-target="#tab4">Change Address</a></li>
        </ul>

    <div id="tabs" class="tab-content">
      <div id="tab1" class="tab-pane <?php echo $firstActive ?>">
        <?php if(isset($_GET['imgErr'])){ echo '<div class="imgErr" style="display:block; margin: 5px 20px;">Image should not be more than 4mb</div>'; } ?>
        <?php if(isset($_GET['profile_img'])){ echo '<div class="success" style="display:block; margin: 5px 20px;">Profile picture uploaded!</div>'; } ?>
        <div class="row">
          <form action="change_user_img.php" method="POST" enctype="multipart/form-data">
            <span class="imageDiv col-md-3 col-sm-11 col-xs-11">
              <img id='profile_img' src="<?php echo $image; ?>" alt="Profile Picture">
              <a id="changeLink"><label class="pointer" for="imgUpload">Change Picture</label></a>
              <input id="imgUpload" type="file" name="profile_picture" placeholder="Photo" capture hidden>
              <button id='submiting' class="btn btn-primary" style="display:none;" type="submit">Upload Image</button>
            </span>
          </form>
          <span class="infoDiv col-md-5 col-sm-6 col-xs-11">
            <li class="admin_info"><?php echo "First Name:   " ?> <?php if(isset($row['first_name'])){ echo $row['first_name']."<br>"; }else{ echo "Undifined"."<br>";} ?></li>
            <li class="admin_info"><?php echo "Last Name:   "?> <?php if(isset($row['last_name'])){ echo $row['last_name']."<br>"; }else{ echo "Undifined"."<br>";} ?></li>
            <li class="admin_info"><?php echo "Email Address:   "?> <?php if(isset($row['email'])){ echo $row['email']."<br>"; }else{ echo "Undifined"."<br>";} ?></li>
            <li class="admin_info"><?php echo "Date Of Birth:   "?> <?php if(isset($row['dob'])){ echo $row['dob']."<br>"; }else{ echo "Undifined"."<br>";} ?></li>
            <li class="admin_info"><?php echo "Phone Number:   "?> <?php if(isset($row['phone_number'])){ echo "+93".$row['phone_number']."<br>"; }else{ echo "Undifined"."<br>";}?></li>
            <li class="admin_info"><?php echo "Province:   "?> <?php if(isset($row1['province'])){ echo $row1['province']."<br>"; }else{ echo "Undifined"."<br>";}?></li>
            <li class="admin_info"><?php echo "District:   "?> <?php if(isset($row1['district'])){ echo $row1['district']."<br>"; }else{ echo "Undifined"."<br>";}?></li>
            <li class="admin_info"><?php echo "Gender:   "?> <?php if(isset($gender)){ echo $gender."<br>"; }else{ echo "Undifined"."<br>";}?></li>
            <li class="admin_info"><?php echo "Role:   "?> <?php if(isset($role)){ echo $role."<br>"; }else{ echo "Undifined"."<br>";}?></li>
            <li class="admin_info"><?php echo "Created Date:   "?> <?php if(isset($row['created_at'])){ echo $row['created_at']."<br>"; }else{ echo "Undifined"."<br>";}?></li>
            <li class="admin_info"><?php echo "Last Update Date:   "?> <?php if(isset($row['updated_at'])){ echo $row['updated_at']."<br>"; }else{ echo "Undifined"."<br>";}?></li>

          </span>
          <div data-lat='<?php echo $row1['lat']; ?>' data-lon='<?php echo $row1['lon']; ?>' class="Geo col-md-3 col-sm-5 col-xs-11">
            
          </div>
          </div>
      </div>
        <div id="tab2" class="tab-pane <?php echo $active; ?>">
          <div>
          <?php if(isset($_GET['fill'])){ echo '<div class="imgErr" style="display:block; margin: 5px 20px;">Please fill the required fieled</div>'; } ?>
          <?php if(isset($_GET['valid'])){ echo '<div class="imgErr" style="display:block; margin: 5px 20px;">Please type valid information</div>'; } ?>
          <?php if(isset($_GET['emailE'])){ echo '<div class="imgErr" style="display:block; margin: 5px 20px;">Email already exist in database</div>'; } ?>
          <?php if(isset($_GET['phoneE'])){ echo '<div class="imgErr" style="display:block; margin: 5px 20px;">Phone number already exist in database</div>'; } ?>
          <?php if(isset($_GET['updated'])){ echo '<div class="success" style="display:block; margin: 5px 20px;">Record successfully updated</div>'; } ?>
          <?php if(isset($_GET['notUp'])){ echo '<div class="imgErr" style="display:block; margin: 5px 20px;">Record is not updated</div>'; } ?>
            <form class="form-horizontal" action="change_user_info.php" method="POST">
              <!-- First Name -->
              <div class="form-group">
                <label for="firstName" class="col-sm-2 control-label">First Name *</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="<?php echo $row['first_name']; ?>">
                </div>
              </div>
                <!-- Last Name -->
                  <div class="form-group">
                    <label for="lastName" class="col-sm-2 control-label">Last Name *</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" value="<?php echo $row['last_name']; ?>">
                    </div>
                  </div>
                <!-- Email -->
                  <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-12">
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $row['email']; ?>">
                    </div>
                  </div>
                <!-- Phone Number -->
                  <div class="form-group">
                    <label for="phone_number" class="col-sm-2 control-label">Phone Nummber *</label>

                    <div class="col-sm-12">
                      <input type="number" class="form-control" name="phone_number" id="phone_number" placeholder="Phone Number" value="<?php echo $row['phone_number']; ?>">
                    </div>
                  </div>
                <!-- DOB -->
                  <div class="form-group">
                    <label for="dob" class="col-sm-2 control-label">Date Of Birth</label>

                    <div class="col-sm-12">
                      <input type="Date" class="form-control" name="dob" id="dob" value="<?php echo $row['dob']; ?>">
                    </div>
                  </div>

                <!-- Gender -->
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Gender *</label>

                    <div class="col-sm-12">
                      <input type="radio" class="gender" name="gender" value="Male" <?php if($gender == 'Male'){echo 'checked';} ?>><b> Male</b> &nbsp;
                      <input type="radio" class="gender" name="gender" value="Femle" <?php if($gender == 'Female'){echo 'checked';} ?>><b> Female</b>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-12">
                      <button type="submit" class="btn btn-primary submitbtn">Update</button>
                    </div>
                  </div>
                </form>
                </div>
            </div>
            
            <div id="tab3" class="tab-pane <?php echo $active2 ?>">
                <div>
                <?php if(isset($_GET['changed'])){ echo '<div class="success" style="display:block; margin: 5px 20px;">Password successfuly changed!</div>'; } ?>
                <?php if(isset($_GET['notChanged'])){ echo '<div class="imgErr" style="display:block; margin: 5px 20px;">can not change password at the moment!</div>'; } ?>
                <?php if(isset($_GET['password'])){ echo '<div class="imgErr" style="display:block; margin: 5px 20px;">Please type password correctly!</div>'; } ?>
                    <form class="form-horizontal" action="change_user_password.php" method="POST">
                    <!-- current pass -->
                  <div class="form-group">
                    <label for="currentPassword" class="col-sm-2 control-label">Current Password</label>

                    <div class="col-sm-12">
                      <input type="password" name="curPass" class="form-control" id="currentPassword" placeholder="Current Password">
                    </div>
                  </div>
                <!-- password 1 -->
                  <div class="form-group">
                    <label for="password1" class="col-sm-2 control-label">New Password</label>

                    <div class="col-sm-12">
                      <input type="password" name="password1" class="form-control" id="password1" placeholder="New Password">
                    </div>
                  </div>
                <!-- password 2 -->
                  <div class="form-group">
                    <label for="password2" class="col-sm-2 control-label">re-type Password</label>

                    <div class="col-sm-12">
                      <input type="password" name="password2" class="form-control" id="password2" placeholder="re-type Password">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-12">
                      <button type="submit" class="btn btn-primary submitbtn">Change Password</button>
                    </div>
                  </div>
                </form>
                </div>
            </div>

                    <div id="tab4" class="tab-pane <?php echo $active3; ?>">
                    <?php if(isset($_GET['addressErr'])){ echo '<div class="imgErr" style="display:block; margin: 5px 20px;">Address is not updated!</div>'; } ?>
                    <?php if(isset($_GET['addressDone'])){ echo '<div class="success" style="display:block; margin: 5px 20px;">Address successfully updated!</div>'; } ?>
                        <div style="padding: 0px 20px;">
                          <form action="change_user_address.php" method="POST">
                                    <select name="province" id="province" class="form-control">
                                        <option value="" selected>Province</option>
                                        <?php showProvinces() ?>
                                    </select>



                                    <select name="district" id="district" class="form-control">
                                    </select>

                                    <button class="btn btn-primary submitbtn" type="submit">Update Address</button>    
                          </form>
                      </div>
                    </div>
                    <div id="tab5" class="tab-pane">
                    </div>
            
            

            </div>
        </div>
    </div>



<?php  

    include("footer.php");

?>








<?php

    include("footer.php");

?>