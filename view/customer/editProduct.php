<?php  

    include("../../config/config.php");
    include("../../config/customerAuth.php");
    $title = "Edit Product Info";
    $icon = "edit";
?>
<?php include("header.php"); ?>

    
<div class="container">
<div class="row">

<!-- clothes -->
<div class="col-md-6 products">
    <div class="single_image">
        <img src="../../assets/img/icons/cloths.jpg" alt="cloths">
        <div class="image_overlay">
            <a href="editClothe.php">Edit Clothes  <span class="fa fa-arrow-circle-right"></span></a>
            <h2>Clothes</h2>
            <h4>Edit your Clothes details</h4>
        </div>                        
    </div>
</div>

<!-- Kurti -->
<div class="col-md-6 products">
    <div class="single_image">
        <img src="../../assets/img/icons/kurti.jpg" alt="kurti">
        <div class="image_overlay">
            <a href="editKurti.php">Edit Kurti  <span class="fa fa-arrow-circle-right"></span></a>
            <h2>Kurti</h2>
            <h4>Edit your Kurti details</h4>
        </div>                        
    </div>
</div>

<!-- Waskat -->
<div class="col-md-6 products">
    <div class="single_image">
        <img src="../../assets/img/icons/waskat.jpg" alt="waskat">
        <div class="image_overlay">
            <a href="editWaskat.php">Edit Waskat  <span class="fa fa-arrow-circle-right"></span></a>
            <h2>Waskat</h2>
            <h4>Edit your Waskat details</h4>
        </div>                        
    </div>
</div>

<!-- Pathloon -->
<div class="col-md-6 products">
    <div class="single_image">
        <img src="../../assets/img/icons/pathloon.jpg" alt="pathloon">
        <div class="image_overlay">
            <a href="editPathloon.php">Edit Pathloon  <span class="fa fa-arrow-circle-right"></span></a>
            <h2>Pathloon</h2>
            <h4>Edit your Pathloon details</h4>
        </div>                        
    </div>
</div>
</div>

</div>

</div>
<?php
    include("footer.php"); 
?>