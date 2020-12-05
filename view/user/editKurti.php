<?php  
    include("../../config/config.php");
    include("../../config/userAuth.php");
    $title = "Edit Kurti Info";
    $icon = 'edit';
    include("header.php");

    
    $id = $_GET['a'];
    $first_name = $_GET['b'];

    $sql = "SELECT company_id FROM users WHERE id = ".dc($_SESSION['id']);
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);

    $sql  = "SELECT * FROM users ";
    $sql .= "INNER JOIN kurti on users.id = kurti.customer_id ";
    $sql .= "INNER JOIN orders on users.id = orders.customer_id ";
    $sql .= "WHERE users.id=".$id." AND users.first_name='".$first_name."' AND users.role_id = 3;";
    $result = mysqli_query($db, $sql);
    $info = mysqli_fetch_assoc($result);
    if(empty($info)){
      $noInfo = "User has no information of Kurti";
    }

    $disable = 'disabled';
    $sql = "SELECT id  FROM company_customers WHERE company_id = ".$row['company_id']." AND customer_id=".$id.";";
    $result = mysqli_query($db, $sql);
    $check = mysqli_fetch_assoc($result);
    if(!empty($check)){
      $disable = '';
    }

    $sql  = "SELECT first_name, last_name, phone_number FROM users ";
    $sql .= "WHERE users.id=".$id." AND users.first_name='".$first_name."' AND users.role_id = 3;";
    $result = mysqli_query($db, $sql);
    $userInfo = mysqli_fetch_assoc($result);
?>

<div class="col-md-11 allInfo">
    <form class="form-horizontal" action="saveKurtiEdit.php" method="POST">
      <?php if(isset($noInfo)){echo '<div class="form-group col-md-12 warning">User has no information of Kurti</div>';} ?>
      <?php if(isset($_GET['successfully'])){echo '<div class="form-group col-md-12 success">Successfully added!</div>';} ?>
      <?php if(isset($_GET['failed'])){echo '<div class="form-group col-md-12 imgErr">Information not added!</div>';} ?>
      <?php if(isset($_GET['phoneExsit'])){echo '<div class="form-group col-md-12 imgErr">Phone number already exsits!</div>';} ?>
        <div class="row">

          <input type="text" name='dbName' value="<?php echo $_GET['b'] ?>" style="display: none;">
          <?php if(isset($noInfo)){
            echo '<input type="text" name="noInfo" value="noInfo" style="display: none;">';
          } ?>
              <!-- First Name -->
              <div class="form-group col-md-3">
                <label for="firstName" class="control-label <?php if(isset($_GET['firstNameErr'])){echo 'redColor';} ?>">First Name *</label>
                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="<?php echo $userInfo['first_name'].'"'. $disable; ?> required>
              </div>
            <!-- last Name -->
              <div class="form-group col-md-3">
                <label for="lastName" class="control-label <?php if(isset($_GET['lastNameErr'])){echo 'redColor';} ?>">Last Name *</label>
                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="last Name" value="<?php echo $userInfo['last_name'].'"'. $disable; ?> required>
              </div>
              <!-- phone number -->
              <div class="form-group col-md-3">
                <label for="phone_number" class="control-label <?php if(isset($_GET['phone_numberErr'])){echo 'redColor';} ?>">Phone Number *</label>
                <input type="number" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number" value="<?php echo $userInfo['phone_number'].'"'. $disable; ?> required>
              </div>
            <!-- qad -->
              <div class="form-group col-md-3">
                <label for="qad" class="control-label <?php if(isset($_GET['qadErr'])){echo 'redColor';} ?>">Qad قد *</label>
                <input type="text" class="form-control" id="qad" name="qad" placeholder="Qad قد" value="<?php echo $info['qad'].'"'. $disable; ?> required>
              </div>
            <!-- shana -->
            <div class="form-group col-md-3">
                <label for="shana" class="control-label <?php if(isset($_GET['shanaErr'])){echo 'redColor';} ?>">Shana شانه *</label>
                <input type="text" class="form-control" id="shana" name="shana" placeholder="Shana شانه" value="<?php echo $info['shana'].'"'. $disable; ?> required>
              </div>
            <!-- astin -->
            <div class="form-group col-md-3">
                <label for="astin" class="control-label <?php if(isset($_GET['astinErr'])){echo 'redColor';} ?>">Astin آستین *</label>
                <input type="text" class="form-control" id="astin" name="astin" placeholder="Astin آستین" value="<?php echo $info['astin'].'"'. $disable; ?> required>
              </div>
            <!-- baghal -->
            <div class="form-group col-md-3">
                <label for="baghal" class="control-label <?php if(isset($_GET['baghalErr'])){echo 'redColor';} ?>">Baghal بغل *</label>
                <input type="text" class="form-control" id="baghal" name="baghal" placeholder="Baghal بغل" value="<?php echo $info['baghal'].'"'. $disable; ?> required>
            </div>
            <!-- kamar -->
            <div class="form-group col-md-3">
                <label for="kamar" class="control-label <?php if(isset($_GET['kamarErr'])){echo 'redColor';} ?>">Kamar ګمر *</label>
                <input type="text" class="form-control" id="kamar" name="kamar" placeholder="Kamar ګمر" value="<?php echo $info['kamar'].'"'. $disable; ?> required>
            </div>
            <!-- soorin -->
            <div class="form-group col-md-3">
                <label for="soorin" class="control-label <?php if(isset($_GET['soorinErr'])){echo 'redColor';} ?>">Soorin سورین *</label>
                <input type="text" class="form-control" id="soorin" name="soorin" placeholder="Soorin سورین" value="<?php echo $info['soorin'].'"'. $disable; ?> required>
            </div>
            <!-- tir_pesht -->
            <div class="form-group col-md-3">
                <label for="tir_pesht" class="control-label <?php if(isset($_GET['tir_peshtErr'])){echo 'redColor';} ?>">Tir Pesht تیر پشت *</label>
                <input type="text" class="form-control" id="tir_pesht" name="tir_pesht" placeholder="Tir Pesht تیر پشت" value="<?php echo $info['tir_pesht'].'"'. $disable; ?> required>
            </div>
            <!-- balai_tana -->
            <div class="form-group col-md-3">
                <label for="balai_tana" class="control-label <?php if(isset($_GET['balai_tanaErr'])){echo 'redColor';} ?>">Balai Tana بالای تنه *</label>
                <input type="text" class="form-control" id="balai_tana" name="balai_tana" placeholder="Balai Tana بالای تنه" value="<?php echo $info['balai_tana'].'"'. $disable; ?> required>
            </div>
            <!-- bazo -->
            <div class="form-group col-md-3">
                <label for="bazo" class="control-label <?php if(isset($_GET['bazoErr'])){echo 'redColor';} ?>">Bazo بازو *</label>
                <input type="text" class="form-control" id="bazo" name="bazo" placeholder="Bazo بازو" value="<?php echo $info['bazo'].'"'. $disable; ?> required>
            </div>
            <!-- moch -->
            <div class="form-group col-md-3">
                <label for="moch" class="control-label <?php if(isset($_GET['qolErr'])){echo 'redColor';} ?>">Moch مچ *</label>
                <input type="text" class="form-control" id="moch" name="moch" placeholder="Moch مچ" value="<?php echo $info['moch'].'"'. $disable; ?> required>
            </div>
            <!-- tokma dropdown-->
            <div class="form-group col-md-3">
                <label for="tokma_dropdown" class="control-label <?php if(isset($_GET['tokma_dropdownErr'])){echo 'redColor';} ?>">Tokma دکمه *</label>
                <select class="form-control" name="tokma_dropdown" id="tokma_dropdown" <?php echo $disable; ?>>
                  <?php  
                    $sql = "SELECT id,type FROM dropdown WHERE releted = 'kurti' AND name = 'tokma'";
                    $result = mysqli_query($db, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                      if($row['id'] == $info['tokma_id']){
                        echo '<option value="'.$row['id'].'" selected>'.$row['type']."</option>";
                      }else{
                        echo '<option value="'.$row['id'].'">'.$row['type']."</option>";
                      }
                    }
                  ?>
                </select>
            </div>
            <!-- chak dropdown -->
            <div class="form-group col-md-3">
                <label for="chak_dropdown" class="control-label <?php if(isset($_GET['chak_dropdownErr'])){echo 'redColor';} ?>">Chak چاک *</label>
                <select class="form-control" name="chak_dropdown" id="chak_dropdown" <?php echo $disable; ?>>
                  <?php  
                    $sql = "SELECT id,type FROM dropdown WHERE releted = 'kurti' AND name = 'chak'";
                    $result = mysqli_query($db, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                      if($row['id'] == $info['chak_id']){
                        echo '<option value="'.$row['id'].'" selected>'.$row['type']."</option>";
                      }else{
                        echo '<option value="'.$row['id'].'">'.$row['type']."</option>";
                      }
                    }
                  ?>
                </select>
            </div>
            <!-- yakhan dropdown -->
            <div class="form-group col-md-3">
                <label for="yakhan_dropdown" class="control-label <?php if(isset($_GET['yakhan_dropdownErr'])){echo 'redColor';} ?>">Yakhan یخن *</label>
                <select class="form-control" name="yakhan_dropdown" id="yakhan_dropdown" <?php echo $disable; ?>>
                  <?php  
                    $sql = "SELECT id,type FROM dropdown WHERE releted = 'kurti' AND name = 'yakhan'";
                    $result = mysqli_query($db, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                      if($row['id'] == $info['yakhan_id']){
                        echo '<option value="'.$row['id'].'" selected>'.$row['type']."</option>";
                      }else{
                        echo '<option value="'.$row['id'].'">'.$row['type']."</option>";
                      }
                    }
                  ?>
                </select>
            </div>
            <!-- daman dropdown -->
            <div class="form-group col-md-3">
                <label for="daman_dropdown" class="control-label <?php if(isset($_GET['daman_dropdownErr'])){echo 'redColor';} ?>">Daman دامن *</label>
                <select class="form-control" name="daman_dropdown" id="daman_dropdown" <?php echo $disable; ?>>
                  <?php  
                    $sql = "SELECT id,type FROM dropdown WHERE releted = 'kurti' AND name = 'daman'";
                    $result = mysqli_query($db, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                      if($row['id'] == $info['daman_id']){
                        echo '<option value="'.$row['id'].'" selected>'.$row['type']."</option>";
                      }else{
                        echo '<option value="'.$row['id'].'">'.$row['type']."</option>";
                      }
                    }
                  ?>
                </select>
            </div>
            <!-- amount -->
            <div class="form-group col-md-3">
                <label for="amount" class="control-label <?php if(isset($_GET['amountErr'])){echo 'redColor';} ?>">Amount تعداد جوره *</label>
                <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount تعداد" value="1" <?php echo $disable; ?>  required>
            </div>
            <!-- curDate -->
            <div class="form-group col-md-3">
                <label for="curDate" class="control-label <?php if(isset($_GET['curDateErr'])){echo 'redColor';} ?>">Current Date تاریخ امروزی</label>
                <input type="date" class="form-control" id="curDate" name="curDate" value="<?php echo date('Y-m-d'); ?>" readonly>
            </div>
            <!-- due Date -->
            <div class="form-group col-md-3">
                <label for="dueDate" class="control-label <?php if(isset($_GET['dueDateErr'])){echo 'redColor';} ?>">Due Date تاریخ واپسی *</label>
                <input type="date" class="form-control" id="dueDate" name="dueDate" value="" <?php echo $disable; ?> required>
            </div>
            <!-- price -->
            <div class="form-group col-md-3">
                <label for="price" class="control-label <?php if(isset($_GET['priceErr'])){echo 'redColor';} ?>">Price قیمت *</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Price قیمت" value="" <?php echo $disable; ?> required>
            </div>
            <!-- paid -->
            <div class="form-group col-md-3">
                <label for="paid" class="control-label <?php if(isset($_GET['paidErr'])){echo 'redColor';} ?>">Paid رسید*</label>
                <input type="text" class="form-control" id="paid" placeholder="Paid رسید" name="paid" value="" <?php echo $disable; ?> required>
            </div>
            <!-- verified -->
            <div class="form-group col-md-1">
							<label class="control-label label <?php if(isset($_GET['verifiedErr'])){echo 'redColor';} ?>" for="verified">Verified</label>
							<input class="checkbox" type="checkbox" id="verified" value="1"  name="verified" <?php if($info['verified'] == 1){ echo "checked"; } ?> <?php echo $disable; ?>>
            </div>
            <!-- back -->
            <div class="form-group col-md-6">
                <a href="editCustomer.php" class="btn btn-dark" id="goBack" name="back">Back برګشت</a>
            </div>
            <!-- save -->
            <div class="form-group col-md-6">
                <button class="btn btn-primary" id="save" type="submit" name="save" value="<?php echo $_GET['a'] ?>"<?php echo $disable; ?>>Save ذخیره</button>
            </div>



        </div>
    </form>
</div>

<?php

    include("footer.php");

?>