<?php  

    include("../../config/config.php");
    include("../../config/customerAuth.php");
    $title = "Welcome";
    $icon = "home";
?>
<?php include("header.php"); ?>

<div class="container">
    <div class="row mt-5">
        <div class="col-12">
        <?php

            $today = date("Y-m-d");
            $sql = "SELECT due_date, product_type, created_at FROM orders WHERE customer_id = ".dc($_SESSION['id'])." AND due_date >= $today;";
            $result = mysqli_query($db, $sql);
            if($result){
                $row = mysqli_fetch_assoc($result);
                if($row != null){
                    echo "<div id='example-caption-2'>25% work has been done!</div></div>";
                    echo '<div class="col-12"><progress class="progress" value="25" max="100" aria-describedby="example-caption-2"></progress></div><div class="product">';
                    echo '<image id="product_img" src="../../assets/img/icons/'; echo $row['product_type'].'.jpg"';               
                }else{
                    echo "<div class='container no_order'><div class='row'> <div class='col-12'> No order has been done! </div></div></div>";
                }
            }else{
                echo "<div class='container no_order'><div class='row'> <div class='col-12'> No order has been done! </div></div></div>";
            }

        ?>



        </div>
    </div>
</div>

<?php
    include("footer.php"); 
?>