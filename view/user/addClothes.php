<?php  
    include("../../config/config.php");
    include("../../config/userAuth.php");
    $title = "Clothes Customer";
    $icon = 'addProfile';
    include("header.php");
?>
<div class="col-md-11 allInfo">
    <form class="form-horizontal" action="saveClothes.php" method="POST">
      <?php if(isset($_GET['successfully'])){echo '<div class="form-group col-md-12 success">Successfully added!</div>';} ?>
      <?php if(isset($_GET['failed'])){echo '<div class="form-group col-md-12 imgErr">Information not added!</div>';} ?>
      <?php if(isset($_GET['phoneExsit'])){echo '<div class="form-group col-md-12 imgErr">Phone number already exsits!</div>';} ?>
        <div class="row">
              <!-- First Name -->
              

              <div class="form-group col-md-3">
                <label for="firstName" class="control-label <?php if(isset($_GET['firstNameErr'])){echo 'redColor';} ?>">First Name *</label>
                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="<?php if(isset($_GET['firstName'])){echo h($_GET['firstName']);} ?>" required>
              </div>
            <!-- last Name -->
              <div class="form-group col-md-3">
                <label for="lastName" class="control-label <?php if(isset($_GET['lastNameErr'])){echo 'redColor';} ?>">Last Name *</label>
                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="last Name" value="<?php if(isset($_GET['lastName'])){echo h($_GET['lastName']);} ?>" required>
              </div>
              <!-- phone number -->
              <div class="form-group col-md-3">
                <label for="phone_number" class="control-label <?php if(isset($_GET['phone_numberErr'])){echo 'redColor';} ?>">Phone Number *</label>
                <input type="number" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number" value="<?php if(isset($_GET['phone_number'])){echo h($_GET['phone_number']);} ?>" required>
              </div>
            <!-- qad -->
              <div class="form-group col-md-3">
                <label for="qad" class="control-label <?php if(isset($_GET['qadErr'])){echo 'redColor';} ?>">Qad قد *</label>
                <input type="text" class="form-control" id="qad" name="qad" placeholder="Qad قد" value="<?php if(isset($_GET['qad'])){echo h($_GET['qad']);} ?>" required>
              </div>
            <!-- astin -->
            <div class="form-group col-md-3">
                <label for="astin" class="control-label <?php if(isset($_GET['astinErr'])){echo 'redColor';} ?>">Astin آستین *</label>
                <input type="text" class="form-control" id="astin" name="astin" placeholder="Astin آستین" value="<?php if(isset($_GET['astin'])){echo h($_GET['astin']);} ?>" required>
              </div>
            <!-- shana -->
            <div class="form-group col-md-3">
                <label for="shana" class="control-label <?php if(isset($_GET['shanaErr'])){echo 'redColor';} ?>">Shana شانه *</label>
                <input type="text" class="form-control" id="shana" name="shana" placeholder="Shana شانه" value="<?php if(isset($_GET['shana'])){echo h($_GET['shana']);} ?>" required>
              </div>
            <!-- yakhan -->
            <div class="form-group col-md-3">
                <label for="yakhan" class="control-label <?php if(isset($_GET['yakhanErr'])){echo 'redColor';} ?>">Yakhan یخن *</label>
                <input type="text" class="form-control" id="yakhan" name="yakhan" placeholder="Yakhan یخن" value="<?php if(isset($_GET['yakhan'])){echo h($_GET['yakhan']);} ?>" required>
              </div>
            <!-- baghal -->
            <div class="form-group col-md-3">
                <label for="baghal" class="control-label <?php if(isset($_GET['baghalErr'])){echo 'redColor';} ?>">Baghal بغل *</label>
                <input type="text" class="form-control" id="baghal" name="baghal" placeholder="Baghal بغل" value="<?php if(isset($_GET['baghal'])){echo h($_GET['baghal']);} ?>" required>
            </div>
            <!-- daman -->
            <div class="form-group col-md-3">
                <label for="daman" class="control-label <?php if(isset($_GET['damanErr'])){echo 'redColor';} ?>">Daman *</label>
                <input type="text" class="form-control" id="daman" name="daman" placeholder="Daman دامن" value="<?php if(isset($_GET['daman'])){echo h($_GET['daman']);} ?>" required>
            </div>
            <!-- tomban -->
            <div class="form-group col-md-3">
                <label for="tomban" class="control-label <?php if(isset($_GET['tombanErr'])){echo 'redColor';} ?>">Tomban تنبان *</label>
                <input type="text" class="form-control" id="tomban" name="tomban" placeholder="Tomban تنبان" value="<?php if(isset($_GET['tomban'])){echo h($_GET['tomban']);} ?>" required>
            </div>
            <!-- pacha -->
            <div class="form-group col-md-3">
                <label for="pacha" class="control-label <?php if(isset($_GET['pachaErr'])){echo 'redColor';} ?>">Pacha پاچه *</label>
                <input type="text" class="form-control" id="pacha" name="pacha" placeholder="Pacha پاچه" value="<?php if(isset($_GET['pacha'])){echo h($_GET['pacha']);} ?>" required>
            </div>
            <!-- pati -->
            <div class="form-group col-md-3">
                <label for="pati" class="control-label <?php if(isset($_GET['patiErr'])){echo 'redColor';} ?>">Pati پتی *</label>
                <input type="text" class="form-control" id="pati" name="pati" placeholder="Pati پتی" value="<?php if(isset($_GET['pati'])){echo h($_GET['pati']);} ?>" required>
            </div>
            <!-- kaf -->
            <div class="form-group col-md-3">
                <label for="kaf" class="control-label <?php if(isset($_GET['kafErr'])){echo 'redColor';} ?>">Kaf کف *</label>
                <input type="text" class="form-control" id="kaf" name="kaf" placeholder="Kaf کف" value="<?php if(isset($_GET['kaf'])){echo h($_GET['kaf']);} ?>" required>
            </div>
            <!-- qol -->
            <div class="form-group col-md-3">
                <label for="qol" class="control-label <?php if(isset($_GET['qolErr'])){echo 'redColor';} ?>">Qol قول *</label>
                <input type="text" class="form-control" id="qol" name="qol" placeholder="Qol قول" value="<?php if(isset($_GET['qol'])){echo h($_GET['qol']);} ?>" required>
            </div>
            <!-- bar tomban -->
            <div class="form-group col-md-3">
                <label for="bar_tomban" class="control-label <?php if(isset($_GET['bar_tombanErr'])){echo 'redColor';} ?>">Bar Tomban بر تمبان *</label>
                <input type="text" class="form-control" id="bar_tomban" name="bar_tomban" placeholder="Bar Tomban بر تمبان" value="<?php if(isset($_GET['bar_tomban'])){echo h($_GET['bar_tomban']);} ?>" required>
            </div>
            <!-- bar seena -->
            <div class="form-group col-md-3">
                <label for="bar_seena" class="control-label <?php if(isset($_GET['bar_seenaErr'])){echo 'redColor';} ?>">Bar Seena بر سینه *</label>
                <input type="text" class="form-control" id="bar_seena" name="bar_seena" placeholder="Bar Seena بر سینه" value="<?php if(isset($_GET['bar_seena'])){echo h($_GET['bar_seena']);} ?>" required>
            </div>
            <!-- bar kamar -->
            <div class="form-group col-md-3">
                <label for="bar_kamar" class="control-label <?php if(isset($_GET['bar_kamarErr'])){echo 'redColor';} ?>">Bar Kamar بر کمر *</label>
                <input type="text" class="form-control" id="bar_kamar" name="bar_kamar" placeholder="Bar Kamar بر کمر" value="<?php if(isset($_GET['bar_kamar'])){echo h($_GET['bar_kamar']);} ?>" required>
            </div>
            <!-- baghal jeb -->
            <div class="form-group col-md-3">
                <label for="baghal_jeb" class="control-label <?php if(isset($_GET['baghal_dropdownErr'])){echo 'redColor';} ?>">Baghal Jeb بغل جیب *</label>
                <select class="form-control" name="baghal_dropdown" id="baghal_jeb">
                  <?php  
                    $sql = "SELECT id,type FROM dropdown WHERE releted = 'lebas' AND name = 'baghal_jeb'";
                    $result = mysqli_query($db, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                      echo '<option value="'.$row['id'].'">'.$row['type']."</option>";
                    }
                  ?>
                </select>
            </div>
            <!-- astin dropdown -->
            <div class="form-group col-md-3">
                <label for="astin_dropdown" class="control-label <?php if(isset($_GET['astin_dropdownErr'])){echo 'redColor';} ?>">Astin آستین *</label>
                <select class="form-control" name="astin_dropdown" id="astin_dropdown">
                  <?php  
                    $sql = "SELECT id,type FROM dropdown WHERE releted = 'lebas' AND name = 'astin'";
                    $result = mysqli_query($db, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                      echo '<option value="'.$row['id'].'">'.$row['type']."</option>";
                    }
                  ?>
                </select>
            </div>
            <!-- yakhan dropdown -->
            <div class="form-group col-md-3">
                <label for="yakhan_dropdown" class="control-label <?php if(isset($_GET['yakhan_dropdownErr'])){echo 'redColor';} ?>">Yakhan یخن *</label>
                <select class="form-control" name="yakhan_dropdown" id="yakhan_dropdown">
                  <?php  
                    $sql = "SELECT id,type FROM dropdown WHERE releted = 'lebas' AND name = 'yakhan'";
                    $result = mysqli_query($db, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                      echo '<option value="'.$row['id'].'">'.$row['type']."</option>";
                    }
                  ?>
                </select>
            </div>
            <!-- daman dropdown -->
            <div class="form-group col-md-3">
                <label for="daman_dropdown" class="control-label <?php if(isset($_GET['daman_dropdownErr'])){echo 'redColor';} ?>">Daman دامن *</label>
                <select class="form-control" name="daman_dropdown" id="daman_dropdown">
                  <?php  
                    $sql = "SELECT id,type FROM dropdown WHERE releted = 'lebas' AND name = 'daman'";
                    $result = mysqli_query($db, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                      echo '<option value="'.$row['id'].'">'.$row['type']."</option>";
                    }
                  ?>
                </select>
            </div>
            <!-- amount -->
            <div class="form-group col-md-3">
                <label for="amount" class="control-label <?php if(isset($_GET['amountErr'])){echo 'redColor';} ?>">Amount تعداد جوره *</label>
                <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount تعداد" value="1" required>
            </div>
            <!-- curDate -->
            <div class="form-group col-md-3">
                <label for="curDate" class="control-label <?php if(isset($_GET['curDateErr'])){echo 'redColor';} ?>">Current Date تاریخ امروزی</label>
                <input type="date" class="form-control" id="curDate" name="curDate" value="<?php echo date('Y-m-d'); ?>" readonly>
            </div>
            <!-- due Date -->
            <div class="form-group col-md-3">
                <label for="dueDate" class="control-label <?php if(isset($_GET['dueDateErr'])){echo 'redColor';} ?>">Due Date تاریخ واپسی *</label>
                <input type="date" class="form-control" id="dueDate" name="dueDate" value="<?php if(isset($_GET['dueDate'])){echo h($_GET['dueDate']);} ?>" required>
            </div>
            <!-- price -->
            <div class="form-group col-md-3">
                <label for="price" class="control-label <?php if(isset($_GET['priceErr'])){echo 'redColor';} ?>">Price قیمت *</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Price قیمت" value="<?php if(isset($_GET['price'])){echo h($_GET['price']);} ?>" required>
            </div>
            <!-- paid -->
            <div class="form-group col-md-3">
                <label for="paid" class="control-label <?php if(isset($_GET['paidErr'])){echo 'redColor';} ?>">Paid رسید*</label>
                <input type="text" class="form-control" id="paid" placeholder="Paid رسید" name="paid" value="<?php if(isset($_GET['paid'])){echo h($_GET['paid']);} ?>" required>
            </div>
            <!-- jeb roy -->
            <div class="form-group col-md-1">
							<label class="control-label label  <?php if(isset($_GET['jeb_roy'])){echo 'redColor';} ?>" for="jeb_roy">جيب روي</label>
							<input class="checkbox" type="checkbox" id="jeb_roy" value="1" name="jeb_roy" <?php if(isset($_GET['jeb_roy'])){ echo "checked"; } ?>>
            </div>
            <!-- jeb tomban -->
            <div class="form-group col-md-1">
							<label class="control-label label <?php if(isset($_GET['jeb_tomban'])){echo 'redColor';} ?>" for="jeb_tomban">جيب تمبان</label>
							<input class="checkbox" type="checkbox" id="jeb_tomban" value="1" name="jeb_tomban" <?php if(isset($_GET['jeb_tomban'])){ echo "checked"; } ?>>
            </div>
            <!-- double salai -->
            <div class="form-group col-md-1">
							<label class="control-label label <?php if(isset($_GET['double_salai'])){echo 'redColor';} ?>" for="double_salai">دبل سلایی</label>
							<input class="checkbox" type="checkbox" id="double_salai" value="1" name="double_salai" <?php if(isset($_GET['double_salai'])){ echo "checked"; } ?>>
            </div>
            <!-- tomban pathlooni -->
            <div class="form-group col-md-1">
							<label class="control-label label <?php if(isset($_GET['paidErr'])){echo 'redColor';} ?>" for="ُtomban_pathlooni">تمبان پتلونی</label>
							<input class="checkbox" type="checkbox" id="tomban_pathlooni" value="1"  name="tomban_pathlooni" <?php if(isset($_GET['tomban_pathlooni'])){ echo "checked"; } ?>>
            </div>
            <!-- verified -->
            <div class="form-group col-md-1">
							<label class="control-label label <?php if(isset($_GET['verifiedErr'])){echo 'redColor';} ?>" for="verified">Verified</label>
							<input class="checkbox" type="checkbox" id="verified" value="1"  name="verified" <?php if(isset($_GET['verified']) && $_GET['verified'] == 1){ echo "checked"; } ?>>
            </div>
            <!-- back -->
            <div class="form-group col-md-6">
                <a href="addCustomer.php" class="btn btn-dark" id="goBack" name="back">Back برګشت</a>
            </div>
            <!-- save -->
            <div class="form-group col-md-6">
                <button class="btn btn-primary" id="save" type="submit" name="save">Save ذخیره</button>
            </div>



        </div>
    </form>
</div>
<?php

    include("footer.php");

?>