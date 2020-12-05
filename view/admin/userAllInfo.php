<?php  
    include("../../config/config.php");
    include("../../config/auth.php");
    $icon = "All Info";
    $fav = "home";
    include("header.php");
    $id = $_GET['id'];
    $sql = "SELECT first_name FROM users WHERE id = ".$id.";";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['first_name'];

    $sql = "SELECT * FROM users INNER JOIN companies ON users.company_id = companies.id WHERE users.id = '". $id . "' AND users.first_name = '". $name ."' AND users.role_id = 2;";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
?>
<div class="col-md-9">
  <!-- user profile Info -->
  <div class="row">
    <div class="col-md-5">
        <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php if($row['image'] != NULL){ echo "../../assets/img/user_img/".$row['image']; }else{echo "../../assets/img/icons/open.png"; } ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $row['first_name'].' '.$row['last_name'] ?></h3>

              <div class="text-center"><p class="text-muted"><li class="fa fa-phone">&nbsp;</li><?php echo '+93'.$row['phone_number'] ?></p></div>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Email: &nbsp;</b> <a class="pull-right">&nbsp; <?php if($row['email'] != NULL){echo $row['email'];}else{echo "Not Avaliable";} ?></a>
                </li>
                <li class="list-group-item">
                  <b>Date Of Birth: &nbsp;</b> <a class="pull-right">&nbsp; <?php if($row['dob'] != NULL){echo $row['dob'];}else{echo "Not Avaliable";} ?></a>
                </li>
                <li class="list-group-item">
                  <b>Gender: &nbsp;</b> <a class="pull-right">&nbsp; <?php if($row['gender'] != NULL){ if($row['gender'] == 1){echo "Male";}elseif($row['gender'] == 2){echo "Female";} }else{echo "Not Avaliable";} ?></a>
                </li>
                <li class="list-group-item">
                  <b>Verified: &nbsp;</b> <a class="pull-right">&nbsp; <?php if($row['verified'] != NULL){echo 'Yes';}else{echo "Not Verified";} ?></a>
                </li>
                <li class="list-group-item">
                  <b>Created at: &nbsp;</b> <a class="pull-right">&nbsp; <?php if($row['created_at'] != NULL){echo $row['created_at'];}else{echo "Not Avaliable";} ?></a>
                </li>
              </ul>
            </div>
        </div>
    </div>
    <!-- END -->

  <!-- Tailor profile Info -->
  <div class="col-md-7">
        <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php if($row['logo'] != NULL){ echo "../../assets/img/tailor_img/".$row['logo']; }else{echo "../../assets/img/icons/open.png"; } ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $row['name'];?></h3>

              <p class="text-muted text-center"><?php echo $row['address'] ?></p>

              <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                  <b>Establish Date: &nbsp;</b> <a class="pull-right">&nbsp; <?php if($row['establish_date'] != NULL){echo $row['establish_date'];}else{echo "Not Avaliable";} ?></a>
                </li>
                <li class="list-group-item">
                  <b>Created at: &nbsp;</b> <a class="pull-right">&nbsp; <?php if($row['created_at'] != NULL){echo $row['created_at'];}else{echo "Not Avaliable";} ?></a>
                </li>
              </ul>
            </div>
        </div>
    </div>
    <!-- END -->
    </div>
</div>

<?php  
    mysqli_free_result($result);
    include("footer.php");

?>