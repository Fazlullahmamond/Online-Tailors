<?php  
    include("../../config/config.php");
    include("../../config/userAuth.php");
    $title = "Add Customer";
    $icon = 'addProfile';
    include("header.php");
?>

<div class="col-md-12">

    <div class="row">

        <!-- clothes -->
        <div class="col-md-6 products">
            <div class="single_image">
                <img src="../../assets/img/icons/cloths.jpg" alt="cloths">
                <div class="image_overlay">
                    <a href="addClothes.php">Clothes Customer  <span class="fa fa-arrow-circle-right"></span></a>
                    <h2>Clothes</h2>
                    <h4>Add clothes info of a customer</h4>
                </div>                        
            </div>
        </div>

        <!-- Kurti -->
        <div class="col-md-6 products">
            <div class="single_image">
                <img src="../../assets/img/icons/kurti.jpg" alt="kurti">
                <div class="image_overlay">
                    <a href="addKurti.php">Kurti Customer  <span class="fa fa-arrow-circle-right"></span></a>
                    <h2>Kurti</h2>
                    <h4>Add kurti info of a customer</h4>
                </div>                        
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Waskat -->
        <div class="col-md-6 products">
            <div class="single_image">
                <img src="../../assets/img/icons/waskat.jpg" alt="waskat">
                <div class="image_overlay">
                    <a href="addWaskat.php">Waskat Customer  <span class="fa fa-arrow-circle-right"></span></a>
                    <h2>Waskat</h2>
                    <h4>Add waskat info of a customer</h4>
                </div>                        
            </div>
        </div>

        <!-- Pathloon -->
        <div class="col-md-6 products">
            <div class="single_image">
                <img src="../../assets/img/icons/pathloon.jpg" alt="pathloon">
                <div class="image_overlay">
                    <a href="addPathloon.php">Pathloon Customer  <span class="fa fa-arrow-circle-right"></span></a>
                    <h2>Pathloon</h2>
                    <h4>Add pathloon info of a customer</h4>
                </div>                        
            </div>
        </div>
    </div>

</div>
<?php

    include("footer.php");

?>