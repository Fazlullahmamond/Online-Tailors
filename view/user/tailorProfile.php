<?php  
    include("../../config/config.php");
    include("../../config/userAuth.php");
    $title = "Tailor Profile";
    $icon = 'account';
    include("header.php");


    $sql = "SELECT company_id FROM users WHERE id = ".dc($_SESSION['id']).";";
    if($result = mysqli_query($db, $sql)){
      $row = mysqli_fetch_assoc($result);
      $_SESSION['company_id'] = $row['company_id'];
    }
    $sql = "SELECT * FROM companies WHERE id = ".$row['company_id'].";";
    if($result = mysqli_query($db, $sql)){
      $row = mysqli_fetch_assoc($result);
    }
    $image = $row['logo'] == NULL ? "../../assets/img/icons/open.png" : "../../assets/img/tailor_img/".$row['logo'];
?>
<div class="row centerItem whiteBG wd-90">
        <div class="col-md-12">
            <?php if(isset($_GET['imgErr2'])){ echo '<div class="imgErr" style="display:block; margin: 5px 20px;">Image should not be more than 4mb</div>'; } ?>
            <?php if(isset($_GET['imgErr'])){ echo '<div class="imgErr" style="display:block; margin: 5px 20px;">Image not updated</div>'; } ?>
            <?php if(isset($_GET['fill'])){ echo '<div class="imgErr" style="display:block; margin: 5px 20px;">Please fill all info</div>'; } ?>
            <?php if(isset($_GET['districtErr'])){ echo '<div class="imgErr" style="display:block; margin: 5px 20px;">please select district name</div>'; } ?>
            <?php if(isset($_GET['name'])){ echo '<div class="imgErr" style="display:block; margin: 5px 20px;">type correct name</div>'; } ?>
            <?php if(isset($_GET['dateErr'])){ echo '<div class="imgErr" style="display:block; margin: 5px 20px;">please type correct date</div>'; } ?>
            <?php if(isset($_GET['addressErr'])){ echo '<div class="imgErr" style="display:block; margin: 5px 20px;">type correct address</div>'; } ?>
            <?php if(isset($_GET['profile_img2'])){ echo '<div class="success" style="display:block; margin: 5px 20px;">Profile picture uploaded!</div>'; } ?>
            <?php if(isset($_GET['success'])){ echo '<div class="success" style="display:block; margin: 5px 20px;">Information uploaded!</div>'; } ?>
            <?php if(isset($_GET['notSuccess'])){ echo '<div class="imgErr" style="display:block; margin: 5px 20px;">Information not uploaded!</div>'; } ?>
        </div>

        <div class="col-md-4 tailorPicture">
            <form action="change_tailor_img.php" method="POST" enctype="multipart/form-data">
                <span class="imageDiv col-md-4 col-sm-10 col-xs-10">
                    <img id='profile_img2' src="<?php echo $image; ?>" alt="Profile Picture">
                    <a id="changeLink2"><label class="pointer" for="imgUpload2">Change Picture</label></a>
                    <input id="imgUpload2" type="file" name="profile_picture" placeholder="Photo" capture hidden>
                    <button id='submiting2' class="btn btn-primary" style="display:none;" type="submit">Upload Image</button>
                </span>
            </form>
        </div>
        <div class="col-md-7 tailorInfo">
            <form action="change_tailor_info.php" method="POST">
                <!-- company Name -->
                <input type="text" class="form-control" id="tailorName" name="tailorName" placeholder="Tailor Name" value="<?php if($row['name'] != "NULL"){echo $row['name'];}else{echo '';} ?>">
                <div>
                    <select name="province" id="province" class="form-control">
                        <option value="" selected>Province</option>
                        <?php
                            $sql = "SELECT id, name FROM provinces";
                            $result = mysqli_query($db, $sql);
                            while($names = mysqli_fetch_assoc($result)){
                                echo '<option value="' . h($names['id']) . '">' . h($names['name']) . "</option>";
                            }
                        ?>
                    </select>

                    <select name="district" id="district" class="form-control">
                        <option value="District" selected>District</option>
                    </select>
                    <input type="text" class="form-control" id="tailorAddress" name="tailorAddress" placeholder="Exact Address" value="<?php if($row['address'] != "NULL"){echo $row['address'];}else{echo '';} ?>">
                    <label for="establish_date"><b>Establish Date: </b></label>
                    <input type="date" class="form-control" id="establish_date" name="establish_date" placeholder="Exact Address" value="<?php if($row['establish_date'] != "NULL"){echo $row['establish_date'];}else{echo '';} ?>">
                    <button class="btn btn-primary submitbtn" type="submit">Update Address</button>    
                </div>
            </form>
    </div>
</div>

</div>
<?php

    include("footer.php");

?>