<?php  

    include("../../config/config.php");
    include("../../config/customerAuth.php");
    $title = "Edit Clothe Info";
    $icon = "edit";
?>
<?php 
    include("header.php"); 
    $id = dc($_SESSION['id']);

    $sql  = "SELECT * FROM users ";
    $sql .= "INNER JOIN lebas on users.id = lebas.customer_id ";
    $sql .= "INNER JOIN orders on users.id = orders.customer_id ";
    $sql .= "WHERE users.id=".$id.";";
    $result = mysqli_query($db, $sql);
    $info = mysqli_fetch_assoc($result);
    if(empty($info)){
      $noInfo = "You has no information about Clothe";
    }

    $sql  = "SELECT first_name, last_name, phone_number FROM users ";
    $sql .= "WHERE users.id=".$id.";";
    $result = mysqli_query($db, $sql);
    $userInfo = mysqli_fetch_assoc($result);
?>

<div class="col-md-12 mt-5">
    <form class="form-horizontal" action="saveClothesEdit.php" method="POST">
      <?php if(isset($noInfo)){echo '<div class="form-group col-md-12 warning">User has no information of Clothes</div>';} ?>
      <?php if(isset($_GET['successfully'])){echo '<div class="form-group col-md-12 success">Successfully updated!</div>';} ?>
      <?php if(isset($_GET['failed'])){echo '<div class="form-group col-md-12 imgErr">Information not added!</div>';} ?>
      <?php if(isset($_GET['phoneExsit'])){echo '<div class="form-group col-md-12 imgErr">Phone number already exsits!</div>';} ?>
        <div class="row">


              <!-- First Name -->
              <div class="form-group col-md-6">
                <label for="firstName" class="control-label <?php if(isset($_GET['firstNameErr'])){echo 'redColor';} ?>">First Name *</label>
                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="<?php echo $userInfo['first_name']?> " required>
              </div>
            <!-- last Name -->
              <div class="form-group col-md-6">
                <label for="lastName" class="control-label <?php if(isset($_GET['lastNameErr'])){echo 'redColor';} ?>">Last Name *</label>
                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="last Name" value="<?php echo $userInfo['last_name']?> " required>
              </div>
              <!-- phone number -->
              <div class="form-group col-md-3">
                <label for="phone_number" class="control-label <?php if(isset($_GET['phone_numberErr'])){echo 'redColor';} ?>">Phone Number *</label>
                <input type="number" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number" value="<?php echo $userInfo['phone_number'] ?> " required>
              </div>
            <!-- qad -->
              <div class="form-group col-md-3">
                <label for="qad" class="control-label <?php if(isset($_GET['qadErr'])){echo 'redColor';} ?>">Qad قد *</label>
                <input type="text" class="form-control" id="qad" name="qad" placeholder="Qad قد" value="<?php echo $info['qad']?> " required>
              </div>
            <!-- astin -->
            <div class="form-group col-md-3">
                <label for="astin" class="control-label <?php if(isset($_GET['astinErr'])){echo 'redColor';} ?>">Astin آستین *</label>
                <input type="text" class="form-control" id="astin" name="astin" placeholder="Astin آستین" value="<?php echo $info['astin']?> " required>
              </div>
            <!-- shana -->
            <div class="form-group col-md-3">
                <label for="shana" class="control-label <?php if(isset($_GET['shanaErr'])){echo 'redColor';} ?>">Shana شانه *</label>
                <input type="text" class="form-control" id="shana" name="shana" placeholder="Shana شانه" value="<?php echo $info['shana'] ?> " required>
              </div>
            <!-- yakhan -->
            <div class="form-group col-md-3">
                <label for="yakhan" class="control-label <?php if(isset($_GET['yakhanErr'])){echo 'redColor';} ?>">Yakhan یخن *</label>
                <input type="text" class="form-control" id="yakhan" name="yakhan" placeholder="Yakhan یخن" value="<?php echo $info['yakhan']?> " required>
              </div>
            <!-- baghal -->
            <div class="form-group col-md-3">
                <label for="baghal" class="control-label <?php if(isset($_GET['baghalErr'])){echo 'redColor';} ?>">Baghal بغل *</label>
                <input type="text" class="form-control" id="baghal" name="baghal" placeholder="Baghal بغل" value="<?php echo $info['baghal']?> " required>
            </div>
            <!-- daman -->
            <div class="form-group col-md-3">
                <label for="daman" class="control-label <?php if(isset($_GET['damanErr'])){echo 'redColor';} ?>">Daman *</label>
                <input type="text" class="form-control" id="daman" name="daman" placeholder="Daman دامن" value="<?php echo $info['daman']?> " required>
            </div>
            <!-- tomban -->
            <div class="form-group col-md-3">
                <label for="tomban" class="control-label <?php if(isset($_GET['tombanErr'])){echo 'redColor';} ?>">Tomban تنبان *</label>
                <input type="text" class="form-control" id="tomban" name="tomban" placeholder="Tomban تنبان" value="<?php echo $info['tomban'] ?> " required>
            </div>
            <!-- pacha -->
            <div class="form-group col-md-3">
                <label for="pacha" class="control-label <?php if(isset($_GET['pachaErr'])){echo 'redColor';} ?>">Pacha پاچه *</label>
                <input type="text" class="form-control" id="pacha" name="pacha" placeholder="Pacha پاچه" value="<?php echo $info['pacha']?>  " required>
            </div>
            <!-- pati -->
            <div class="form-group col-md-3">
                <label for="pati" class="control-label <?php if(isset($_GET['patiErr'])){echo 'redColor';} ?>">Pati پتی *</label>
                <input type="text" class="form-control" id="pati" name="pati" placeholder="Pati پتی" value="<?php echo $info['pati']?>  " required>
            </div>
            <!-- kaf -->
            <div class="form-group col-md-3">
                <label for="kaf" class="control-label <?php if(isset($_GET['kafErr'])){echo 'redColor';} ?>">Kaf کف *</label>
                <input type="text" class="form-control" id="kaf" name="kaf" placeholder="Kaf کف" value="<?php echo $info['kaf']?> " required>
            </div>
            <!-- qol -->
            <div class="form-group col-md-3">
                <label for="qol" class="control-label <?php if(isset($_GET['qolErr'])){echo 'redColor';} ?>">Qol قول *</label>
                <input type="text" class="form-control" id="qol" name="qol" placeholder="Qol قول" value="<?php echo $info['qol']?> " required>
            </div>
            <!-- bar tomban -->
            <div class="form-group col-md-3">
                <label for="bar_tomban" class="control-label <?php if(isset($_GET['bar_tombanErr'])){echo 'redColor';} ?>">Bar Tomban بر تمبان *</label>
                <input type="text" class="form-control" id="bar_tomban" name="bar_tomban" placeholder="Bar Tomban بر تمبان" value="<?php echo $info['bar_tomban']?> " required>
            </div>
            <!-- bar seena -->
            <div class="form-group col-md-3">
                <label for="bar_seena" class="control-label <?php if(isset($_GET['bar_seenaErr'])){echo 'redColor';} ?>">Bar Seena بر سینه *</label>
                <input type="text" class="form-control" id="bar_seena" name="bar_seena" placeholder="Bar Seena بر سینه" value="<?php echo $info['bar_seena']?> " required>
            </div>
            <!-- bar kamar -->
            <div class="form-group col-md-3">
                <label for="bar_kamar" class="control-label <?php if(isset($_GET['bar_kamarErr'])){echo 'redColor';} ?>">Bar Kamar بر کمر *</label>
                <input type="text" class="form-control" id="bar_kamar" name="bar_kamar" placeholder="Bar Kamar بر کمر" value="<?php echo $info['bar_kamar']?> " required>
            </div>
            <!-- baghal jeb -->
            <div class="form-group col-md-3">
                <label for="baghal_jeb" class="control-label <?php if(isset($_GET['baghal_dropdownErr'])){echo 'redColor';} ?>">Baghal Jeb بغل جیب *</label>
                <select class="form-control" name="baghal_dropdown" id="baghal_jeb" >
                  <?php  
                    $sql = "SELECT id,type FROM dropdown WHERE releted = 'lebas' AND name = 'baghal_jeb'";
                    $result = mysqli_query($db, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                      if($row['id'] == $info['baghal_jeb_id']){
                        echo '<option value="'.$row['id'].'" selected>'.$row['type']."</option>";
                      }else{
                        echo '<option value="'.$row['id'].'">'.$row['type']."</option>";
                      }
                    }
                  ?>
                </select>
            </div>
            <!-- astin dropdown -->
            <div class="form-group col-md-3">
                <label for="astin_dropdown" class="control-label <?php if(isset($_GET['astin_dropdownErr'])){echo 'redColor';} ?>">Astin آستین *</label>
                <select class="form-control" name="astin_dropdown" id="astin_dropdown" >
                  <?php  
                    $sql = "SELECT id,type FROM dropdown WHERE releted = 'lebas' AND name = 'astin'";
                    $result = mysqli_query($db, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                      if($row['id'] == $info['astin_id']){
                        echo '<option value="'.$row['id'].'" selected>'.$row['type']."</option>";
                      }else{
                      echo '<option value="'.$row['id'].'">'.$row['type']."</option>";
                      }
                    }
                  ?>
                </select>
            </div>
            <!-- jeb roy -->
            <div class="form-group col-md-1">
							<label class="control-label label  <?php if(isset($_GET['jeb_roy'])){echo 'redColor';} ?>" for="jeb_roy">جيب روي</label>
							<input class="checkbox" type="checkbox" id="jeb_roy" value="1" name="jeb_roy" <?php if($info['jeb_roy'] == 1){ echo "checked"; } ?> >
            </div>
            <!-- jeb tomban -->
            <div class="form-group col-md-1">
							<label class="control-label label <?php if(isset($_GET['jeb_tomban'])){echo 'redColor';} ?>" for="jeb_tomban">جيب تمبان</label>
							<input class="checkbox" type="checkbox" id="jeb_tomban" value="1" name="jeb_tomban" <?php if($info['jeb_tomban'] == 1){ echo "checked"; } ?> >
            </div>
            <!-- double salai -->
            <div class="form-group col-md-1">
							<label class="control-label label <?php if(isset($_GET['double_salai'])){echo 'redColor';} ?>" for="double_salai">دبل سلایی</label>
							<input class="checkbox" type="checkbox" id="double_salai" value="1" name="double_salai" <?php if($info['double_salai'] == 1){ echo "checked"; } ?> >
            </div>
            <!-- tomban pathlooni -->
            <div class="form-group col-md-1">
							<label class="control-label label <?php if(isset($_GET['paidErr'])){echo 'redColor';} ?>" for="ُtomban_pathlooni">تمبان پتلونی</label>
							<input class="checkbox" type="checkbox" id="tomban_pathlooni" value="1"  name="tomban_pathlooni" <?php if($info['tomban_pathlooni'] == 1){ echo "checked"; } ?> >
            </div>
            <!-- back -->
            <div class="form-group col-md-6">
                <a href="editCustomer.php" class="btn btn-dark" id="goBack" name="back">Back برګشت</a>
            </div>
            <!-- save -->
            <div class="form-group col-md-6">
                <button class="btn btn-primary" id="save" type="submit" name="save" value="<?php echo $_GET['a'] ?>">Save ذخیره</button>
            </div>



        </div>
    </form>
</div>


<?php
    include("footer.php"); 
?>