<?php  
    include("../../config/config.php");
    include("../../config/userAuth.php");
    $title = "Kurti Customer";
    $icon = 'addProfile';
    include("header.php");
?>
<div class="col-md-11 allInfo">
    <form class="form-horizontal" action="saveKurti.php" method="POST">
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
            <!-- shana -->
            <div class="form-group col-md-3">
                <label for="shana" class="control-label <?php if(isset($_GET['shanaErr'])){echo 'redColor';} ?>">Shana شانه *</label>
                <input type="text" class="form-control" id="shana" name="shana" placeholder="Shana شانه" value="<?php if(isset($_GET['shana'])){echo h($_GET['shana']);} ?>" required>
              </div>
            <!-- astin -->
            <div class="form-group col-md-3">
                <label for="astin" class="control-label <?php if(isset($_GET['astinErr'])){echo 'redColor';} ?>">Astin آستین *</label>
                <input type="text" class="form-control" id="astin" name="astin" placeholder="Astin آستین" value="<?php if(isset($_GET['astin'])){echo h($_GET['astin']);} ?>" required>
              </div>
            <!-- baghal -->
            <div class="form-group col-md-3">
                <label for="baghal" class="control-label <?php if(isset($_GET['baghalErr'])){echo 'redColor';} ?>">Baghal بغل *</label>
                <input type="text" class="form-control" id="baghal" name="baghal" placeholder="Baghal بغل" value="<?php if(isset($_GET['baghal'])){echo h($_GET['baghal']);} ?>" required>
            </div>
            <!-- kamar -->
            <div class="form-group col-md-3">
                <label for="kamar" class="control-label <?php if(isset($_GET['kamarErr'])){echo 'redColor';} ?>">Kamar ګمر *</label>
                <input type="text" class="form-control" id="kamar" name="kamar" placeholder="Kamar ګمر" value="<?php if(isset($_GET['kamar'])){echo h($_GET['kamar']);} ?>" required>
            </div>
            <!-- soorin -->
            <div class="form-group col-md-3">
                <label for="soorin" class="control-label <?php if(isset($_GET['soorinErr'])){echo 'redColor';} ?>">Soorin سورین *</label>
                <input type="text" class="form-control" id="soorin" name="soorin" placeholder="Soorin سورین" value="<?php if(isset($_GET['soorin'])){echo h($_GET['soorin']);} ?>" required>
            </div>
            <!-- tir_pesht -->
            <div class="form-group col-md-3">
                <label for="tir_pesht" class="control-label <?php if(isset($_GET['tir_peshtErr'])){echo 'redColor';} ?>">Tir Pesht تیر پشت *</label>
                <input type="text" class="form-control" id="tir_pesht" name="tir_pesht" placeholder="Tir Pesht تیر پشت" value="<?php if(isset($_GET['tir_pesht'])){echo h($_GET['tir_pesht']);} ?>" required>
            </div>
            <!-- balai_tana -->
            <div class="form-group col-md-3">
                <label for="balai_tana" class="control-label <?php if(isset($_GET['balai_tanaErr'])){echo 'redColor';} ?>">Balai Tana بالای تنه *</label>
                <input type="text" class="form-control" id="balai_tana" name="balai_tana" placeholder="Balai Tana بالای تنه" value="<?php if(isset($_GET['balai_tana'])){echo h($_GET['balai_tana']);} ?>" required>
            </div>
            <!-- bazo -->
            <div class="form-group col-md-3">
                <label for="bazo" class="control-label <?php if(isset($_GET['bazoErr'])){echo 'redColor';} ?>">Bazo بازو *</label>
                <input type="text" class="form-control" id="bazo" name="bazo" placeholder="Bazo بازو" value="<?php if(isset($_GET['bazo'])){echo h($_GET['bazo']);} ?>" required>
            </div>
            <!-- moch -->
            <div class="form-group col-md-3">
                <label for="moch" class="control-label <?php if(isset($_GET['qolErr'])){echo 'redColor';} ?>">Moch مچ *</label>
                <input type="text" class="form-control" id="moch" name="moch" placeholder="Moch مچ" value="<?php if(isset($_GET['moch'])){echo h($_GET['moch']);} ?>" required>
            </div>
            <!-- tokma dropdown-->
            <div class="form-group col-md-3">
                <label for="tokma_dropdown" class="control-label <?php if(isset($_GET['tokma_dropdownErr'])){echo 'redColor';} ?>">Tokma دکمه *</label>
                <select class="form-control" name="tokma_dropdown" id="tokma_dropdown">
                  <?php  
                    $sql = "SELECT id,type FROM dropdown WHERE releted = 'kurti' AND name = 'tokma'";
                    $result = mysqli_query($db, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                      echo '<option value="'.$row['id'].'">'.$row['type']."</option>";
                    }
                  ?>
                </select>
            </div>
            <!-- chak dropdown -->
            <div class="form-group col-md-3">
                <label for="chak_dropdown" class="control-label <?php if(isset($_GET['chak_dropdownErr'])){echo 'redColor';} ?>">Chak چاک *</label>
                <select class="form-control" name="chak_dropdown" id="chak_dropdown">
                  <?php  
                    $sql = "SELECT id,type FROM dropdown WHERE releted = 'kurti' AND name = 'chak'";
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
                    $sql = "SELECT id,type FROM dropdown WHERE releted = 'kurti' AND name = 'yakhan'";
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
                    $sql = "SELECT id,type FROM dropdown WHERE releted = 'kurti' AND name = 'daman'";
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
            <!-- verified -->
            <div class="form-group col-md-1">
							<label class="control-label label <?php if(isset($_GET['verifiedErr'])){echo 'redColor';} ?>" for="verified">Verified</label>
							<input class="checkbox" type="checkbox" id="verified" value="1"  name="verified" <?php if(isset($_GET['verified']) && $_GET['verified'] == 1){ echo 'checked'; } ?>>
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