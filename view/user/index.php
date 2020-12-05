<?php  
    include("../../config/config.php");
    include("../../config/userAuth.php");
    $title = "Home";
    $icon = 'home';
    include("header.php");
    $sql = "SELECT company_id FROM users WHERE id = ".dc($_SESSION['id']);
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    $company_id = $row['company_id'];

    $sql = "SELECT count(*) as total FROM users WHERE company_id = ".$company_id." AND role_id = 3;";
    $result = mysqli_query($db, $sql);
    $customers = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

    $sql = "SELECT orders.price, orders.product_amount, orders.created_at ";
    $sql .= " FROM users INNER JOIN orders on users.id = orders.customer_id ";
    $sql .= " WHERE users.company_id = ".$company_id." AND users.role_id = 3;";
    $result = mysqli_query($db, $sql);
    if($result){
        $daily_orders = 0;
        $daily_income = 0;
        $mothly_income = 0;
        foreach($result as $d){
            $reg_month = substr($d['created_at'], 0, 7);
            $cur_month = substr(date("Y-m-d"), 0, 7);
            if($reg_month == $cur_month){
                $mothly_income += $d['price'] * $d['product_amount'];
            }
            $reg_date = substr($d['created_at'], 0, 10);
            if( $reg_date == date("Y-m-d")){
                $daily_orders += $d['product_amount'];
                $daily_income += $d['price'] * $d['product_amount'];
            }
        }
    }
    mysqli_free_result($result);
?>



							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
								<div class="box box-block tile tile-2 bg-danger mb-2">
									<div class="t-icon right"><i class="ti-shopping-cart-full"></i></div>
									<div class="t-content">
										<h1 class="mb-1"><?php echo $daily_orders ?></h1>
										<h6 class="text-uppercase">Daily Orders</h6>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
								<div class="box box-block tile tile-2 bg-primary mb-2">
									<div class="t-icon right"><i class="ti-bar-chart"></i></div>
									<div class="t-content">
										<h1 class="mb-1">AFN <?php echo $daily_income ?></h1>
										<h6 class="text-uppercase">Daily Income</h6>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
								<div class="box box-block tile tile-2 bg-warning mb-2">
									<div class="t-icon right"><i class="ti-bar-chart"></i></div>
									<div class="t-content">
										<h1 class="mb-1">AFN <?php echo $mothly_income ?></h1>
										<h6 class="text-uppercase">Mothly Income</h6>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
								<div class="box box-block tile tile-2 bg-success mb-2">
									<div class="t-icon right"><i class="ti-receipt"></i></div>
									<div class="t-content">
										<h1 class="mb-1"><?php echo $customers['total'] ?></h1>
										<h6 class="text-uppercase">Total Customers</h6>
									</div>
								</div>
							</div>


                            

<div class="row whiteBG centerItem col-12">

<div class="col-md-5 centerItem"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
    <div class="form-group">
        <input type="date" class="form-control" id="daily_customers" value="<?php echo date('Y-m-d'); ?>">
    </div>
    <h5 class="mb-1">Daily customers</h5>
    <div id="lineParent">
        <canvas id="line" class="chart-container" width="717" height="458" style="display: block; width: 717px; height: 458px;"></canvas>
    </div>
</div>

<div class="col-md-5 centerItem"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
    <div class="form-group">
        <input type="date" class="form-control" id="monthly_customers" value="<?php echo date('Y-m-d'); ?>">
    </div>
    <h5 class="mb-1">Monthly customers</h5>
    <div id="barParent">
        <canvas id="bar" class="chart-container" width="718" height="459" style="display: block; width: 718px; height: 459px;"></canvas>
    </div>
</div>
</div>
    

<?php
    include("footer.php");
?>
<script src="../../assets/js/user_js/user_report_chart.js"></script>