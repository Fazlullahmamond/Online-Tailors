<?php  
    include("../../config/config.php");
    include("../../config/auth.php");
    $icon = "Add User";
    $fav = "addProfile";
    include("header.php");

?>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="content-box-header">
                                        <div class="panel-title">Add Users</div>
                                    </div>
                                    <form id="addUser" action="addUser.php" method="POST" enctype="multipart/form-data">
                                        <div class="content-box-large box-with-header">
                                        <?php if(isset($_GET['something'])){echo "<div class='imgErr'>Something happened please try again!</div>";} ?>
                                        <?php if(isset($_GET['successfully'])){echo "<div class='success'>Record successfully added!</div>";} ?>
                                        <?php if(isset($_GET['imgErr'])){echo "<div class='imgErr'>image must be less than 4mb</div>";} ?>
                                            <div id="profile-container">
                                                <image id="profileImage" class="profile-img-card" src="../../assets/img/icons/addProfile.png" />
                                            </div>
                                            <input id="imageUpload" type="file" name="profile_picture" placeholder="Photo" capture hidden>
                                            <?php if(isset($_GET['first'])){echo "<span class='err'>Invalid first name</span>";} ?>
                                            <input name="firstName" type="text" class="form-control" placeholder="First Name" value="<?php if(isset($_GET['firstName'])){echo h($_GET['firstName']);}?>" autofocus required>
                                            <?php if(isset($_GET['last'])){echo "<span class='err'>Invalid last name</span>";} ?>
                                            <input name="lastName" type="text" class="form-control" placeholder="Last Name" value="<?php if(isset($_GET['lastName'])){echo h($_GET['lastName']);}?>" required>
                                            <?php if(isset($_GET['email'])){echo "<span class='err'>Invalid email address</span>";} ?>
                                            <?php if(isset($_GET['emailExist'])){echo "<span class='err'>email already exist in database!</span>";} ?>
                                            <input name="email" type="email" class="form-control" placeholder="Email Address" value="<?php if(isset($_GET['address'])){echo h($_GET['address']);}?>">

                                            <?php if(isset($_GET['dob'])){echo "<span class='err'>Invalid info</span>";} ?>
                                            <div class="input-group form">
                                                <input type="date" class="form-control" name="dob" value="<?php if(isset($_GET['date'])){echo h($_GET['date']);}?>">
                                                <button class="btn btn-default disabled dob" type="button">Date of birth</button>
                                            </div>  
                                            <?php if(isset($_GET['gender'])){echo "<span class='err'>Invalid info</span>";} ?>
                                            <label for="radio" class="block fonts">Gender :</label>
                                            <input class="radio mb-4" type="radio" value="1" name="gender" checked <?php if(isset($_GET['gen']) && $_GET['gen'] == 1 ){echo "checked";}?>> <span class="fonts">Male</span> <br>
                                            <input class="radio mb-4" type="radio" value="0" name="gender" <?php if(isset($_GET['gen']) && $_GET['gen'] == 0 ){echo "checked";}?>> <span class="fonts" aria-checked="true">Female</span> 

                                            <?php if(isset($_GET['num'])){echo "<span class='err'>Number already exist in database!</span>";} ?>
                                            <?php if(isset($_GET['phone'])){echo "<span class='err'>Please type valid phone number</span>";} ?>
                                            <div class="input-group form">
                                                <button class="btn btn-default disabled dob" type="button">+93</button>
                                                <input type="number" name="phone_number" class="form-control" placeholder="Phone Number" value="<?php if(isset($_GET['phone_number'])){echo h($_GET['phone_number']);}?>" required>
                                            </div>  

                                            <?php if(isset($_GET['role'])){echo "<span class='err'>Invalid Role</span>";} ?>
                                            <div class="input-group form">
                                                <button class="btn btn-default disabled dob" type="button">Role</button>
                                                <select class="form-control" aria-placeholder="Role type" name="roles" id="roles">
                                                    <option value="" >Select Role</option>


                                                <!-- select roles from database and show it -->
                                                    
                                                <?php 
                                                    $sql = "SELECT id, role FROM roles";
                                                    $result = mysqli_query($db, $sql);
                                                    while($names = mysqli_fetch_assoc($result)){
                                                        if($names['role'] == 'customer'){
                                                            continue;
                                                        }elseif(isset($_GET['roleID']) && $_GET['roleID']==$names['id'] ){
                                                            echo '<option value="'.$names['id'].'"selected>'.$names['role']."</option>";
                                                            continue;
                                                        }
                                                        echo '<option value="'.$names['id'].'">'.$names['role']."</option>";
                                                    }
                                                ?>


                                                </select>
                                            </div> 
                                                

                                            <?php if(isset($_GET['company'])){echo "<span class='err'>Admin is not releated to companies!</span>";} ?>
                                            <?php if(isset($_GET['customer'])){echo "<span class='err'>Customer must be in any company!</span>";} ?>
                                           
                                                
                                            
                                            
                                            <label class="address block">Address</label>
                                            <div class="add">

                                                <select name="province" id="province" class="form-control">
                                                    <option value="" selected>Province</option>
                                                    <?php showProvinces() ?>
                                                </select>



                                                <select name="district" id="district" class="form-control">
                                                </select>
                                                <?php if(isset($_GET['verified'])){echo "<span class='err'>Invalid info</span>";} ?>
                                                <input class="checkbox" id="checked" type="checkbox" name="verified" value="1" checked> <label class="fonts" for="checked">This is an official varified user.</label>

                                            </div>

                                            <button class="btn btn-primary submitbtn" type="submit">Add User</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php  

    include("footer.php");
    db_disconnect();
?>
