<?php  
    include("../../config/config.php");
    include("../../config/auth.php");
    $icon = "Dashboard";
    $fav = "home";
    include("header.php");
    $sql = "SELECT * FROM companies";
    $result = mysqli_query($db, $sql);
?>
<div class="col-md-9">
        <div class="row">
<?php foreach ($result as $row){ ?>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
								<div class="card p-3 mb-3">
									<img class="card-img-top img-fluid" src="../../assets/img/tailor_img/<?php if($row['logo'] !=null) { echo $row['logo']; }else{echo "tailor.jpg";} ?>" alt="Card image cap">
									<div class="card-block">
										<h4 class="card-title"><?php if($row['name'] != NULL) { echo $row['name']; }else{echo "Not Set!";} ?></h4>
                                        <p class="card-text"><i class="fas fa-street-view"> &nbsp;</i><?php if($row['address'] !=null) { echo $row['address']; }else{echo "Not Set!";} ?></p>
                                        <?php 
                                            $sql2 = "SELECT id FROM users where company_id = ".$row['id'].";";
                                            $result2 = mysqli_query($db, $sql2);
                                            $row2 = mysqli_fetch_assoc($result2);
                                            mysqli_free_result($result2);
                                        ?>
										<a href="userAllInfo.php?id=<?php echo $row2['id'] ?>" class="btn btn-primary">View Info</a>
									</div>
								</div>
							</div>
<?php 
$row = mysqli_fetch_assoc($result);
} ?>
</div>
</div>

<?php  
    mysqli_free_result($result);
    include("footer.php");

?>