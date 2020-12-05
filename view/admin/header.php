<?php

    //hightlight currect page by adding the currect class into it

    $url = $_SERVER['REQUEST_URI'];
    $edit = "";
    $news = "";
    $index = "";
    $profile = "";
    $new_user = "";
    if (strpos($url, "edit.php") != false || strpos($url, "userAllInfo.php") != false){
        $edit = "current";
    }
    elseif (strpos($url, "news.php") != false){
        $news = "current";
    }
    elseif (strpos($url, "index.php") != false){
        $index = "current";
    }
    elseif (strpos($url, "profile.php") != false){
        $profile = "current";
    }
    elseif (strpos($url, "new_user.php") != false){
        $new_user = "current";
    }
    else{
        $index = "current";
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $icon ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- styles -->
        <link href="../../assets/css/styles.css" rel="stylesheet">
        <link rel="stylesheet" href="../../assets/font-awesome/css/all.min.css">
        <link rel="stylesheet" href="../../assets/css/dataTable_css/datatables.css">
        <link href="../../assets/css/admin_css/edit.css" rel="stylesheet">
        <link rel="icon" href="../../assets/img/icons/<?php echo $fav ?>.png">
    </head>
    <body>
        <div  id="back" style="display:none;">
            <img  id="loader" src="../../assets/img/icons/loader.gif"> 
        </div> 
        <div class="header">
            <div class="container">
                <div class="row">
                <div class="col-md-9">
                    <!-- Logo -->
                    <div class="logo">
                        <h1><a href="index.php">Admin panel</a></h1>
                    </div>
                </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-lg-12">
                            <div class="input-group form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button">Search</button>
                                </span>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content">
            <div class="row">
                <div class="col-md-3">
                    <div class="sidebar content-box">
                        <ul class="nav"  style="display: block;">
                            <!-- Main menu -->
                            <li><a class="<?php echo $index ?>" href="index.php"><i class="fa fa-home"></i> Dashboard</a></li>
                            <li><a class="<?php echo $new_user ?>" href="new_user.php"><i class="fas fa-plus-circle"></i> Add User</a></li>
                            <li><a class="<?php echo $edit ?>" href="edit.php"><i class="fa fa-edit"></i> Edit</a></li>
                            <li><a class="<?php echo $news ?>" href="news.php"><i class="fa fa-globe"></i> News</a></li>
                            <li class="submenu">
                                <a class="<?php echo $profile ?>">
                                    <i class="fa fa-user"></i> Account
                                    <span class="caret pull-right"></span>
                                </a>
                                <!-- Sub menu -->
                                <ul>
                                    <li><a href="profile.php"><i  class="fa fa-edit"></i>&nbsp &nbsp Edit Profile</a></li>
                                    <li><a href="../../login.php?logout=success"><i class="fa fa-sign-out-alt"></i>&nbsp &nbsp Log Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>