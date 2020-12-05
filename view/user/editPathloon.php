<?php  
    include("../../config/config.php");
    include("../../config/userAuth.php");
    $title = "Edit Pathloon Info";
    $icon = 'edit';
    include("header.php");
    
    
    $id = $_GET['a'];
    $first_name = $_GET['b'];

    $sql = "SELECT company_id FROM users WHERE id = ".dc($_SESSION['id']);
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);

    $sql  = "SELECT * FROM users ";
    $sql .= "INNER JOIN pathloon on users.id = pathloon.customer_id ";
    $sql .= "INNER JOIN orders on users.id = orders.customer_id ";
    $sql .= "WHERE users.id=".$id." AND users.first_name='".$first_name."' AND users.role_id = 3;";
    $result = mysqli_query($db, $sql);
    $info = mysqli_fetch_assoc($result);
    if(empty($info)){
      $noInfo = "User has no information of Pathloon";
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
    <form class="form-horizontal" action="savePathloonEdit.php" method="POST">
      <?php if(isset($noInfo)){echo '<div class="form-group col-md-12 warning">User has no information of Pathloon</div>';} ?>
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
            <!-- pat -->
            <div class="form-group col-md-3">
                <label for="pat" class="control-label <?php if(isset($_GET['patErr'])){echo 'redColor';} ?>">Pat پت *</label>
                <input type="text" class="form-control" id="pat" name="pat" placeholder="Pat پت" value="<?php echo $info['pat'].'"'. $disable; ?> required>
            </div>
            <!-- qad_zano -->
            <div class="form-group col-md-3">
                <label for="qad_zano" class="control-label <?php if(isset($_GET['qad_zanoErr'])){echo 'redColor';} ?>">Qad Zano قد زانو *</label>
                <input type="text" class="form-control" id="qad_zano" name="qad_zano" placeholder="ْQad Zano قد زانو" value="<?php echo $info['qad_zano'].'"'. $disable; ?> required>
            </div>
            <!-- do_zano -->
            <div class="form-group col-md-3">
                <label for="do_zano" class="control-label <?php if(isset($_GET['do_zanoErr'])){echo 'redColor';} ?>">Do Zano دو زانو *</label>
                <input type="text" class="form-control" id="do_zano" name="do_zano" placeholder="Do Zano دو زانو" value="<?php echo $info['do_zano'].'"'. $disable; ?> required>
            </div>
            <!-- pacha -->
            <div class="form-group col-md-3">
                <label for="pacha" class="control-label <?php if(isset($_GET['pachaErr'])){echo 'redColor';} ?>">Pacha پاچه *</label>
                <input type="text" class="form-control" id="pacha" name="pacha" placeholder="Pacha پاچه" value="<?php echo $info['pacha'].'"'. $disable; ?> required>
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
                <input type="date" class="form-control" id="dueDate" name="dueDate" value="" <?php echo $disable; ?>  required>
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
            <!-- five_dar -->
            <div class="form-group col-md-1">
				<label class="control-label label <?php if(isset($_GET['five_darErr'])){echo 'redColor';} ?>" for="verified">Five Dar</label>
				<input class="checkbox" type="checkbox" id="five_dar" value="1"  name="five_dar" <?php if($info['five_dar'] == 1){ echo "checked"; } ?> <?php echo $disable; ?>>
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