<?php 

        //hightlight currect page by adding the currect class into it

        $url = $_SERVER['REQUEST_URI'];
        $editCustomer = "";
        $news = "";
        $index = "";
        $addCustomer = "";
        $Profile = "";
        $user = "";
        $tailor = "";
        if (strpos($url, "editCustomer.php") != false || strpos($url, "?a") != false || strpos($url, "&b.php") != false ){
            $editCustomer = "current";
        }
        elseif (strpos($url, "addCustomer.php") != false || strpos($url, "addClothes.php") != false || strpos($url, "addWaskat.php") != false || strpos($url, "addPathloon.php") != false || strpos($url, "addKurti.php") != false){
            $addCustomer = "current";
        }
        elseif (strpos($url, "news.php") != false){
            $news = "current";
        }
        elseif (strpos($url, "index.php") != false){
            $index = "current";
        }
        elseif (strpos($url, "userProfile.php") != false){
            $user = "current";
        }elseif (strpos($url, "tailorProfile.php") != false){
            $tailor = "current";
        }
        else{
            $index = "current";
        }

?>
<html>

    <head>
        <title><?php echo $title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../assets/bootstrap/css/themify-icons.css" rel="stylesheet">
        <!-- styles -->
        <link href="../../assets/css/styles.css" rel="stylesheet">
        <link rel="stylesheet" href="../../assets/font-awesome/css/all.min.css">
        <link rel="stylesheet" href="../../assets/css/dataTable_css/datatables.css">
        <link href="../../assets/css/user_css/edit.css" rel="stylesheet">
        <link rel="icon" href="../../assets/img/icons/<?php echo $icon ?>.png">
    </head>

    <body>
        <div  id="back" style="display:none;">
            <img  id="loader" src="../../assets/img/icons/loader.gif"> 
        </div> 
        <div class="container-fluid">
            <header class="main_menu home_menu">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.php"> <img src="../../assets/img/blog_img/logo.png" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse main-menu-item" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item <?php echo $index ?>">
                                <a class="nav-link" href="index.php"><span class="fa fa-home"></span><br>Dashboard</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link <?php echo $addCustomer ?>" href="addCustomer.php"><span class="fas fa-plus-circle"></span><br>Add Customer</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link <?php echo $editCustomer ?>" href="editCustomer.php"><span class="fa fa-edit"></span><br>Edit Customer</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link <?php echo $news ?>" href="news.php"><span class="fa fa-globe"></span><br>News</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link <?php echo $user ?>" href="userProfile.php"><span class="fa fa-edit"></span><br>User Profile</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link <?php echo $tailor ?>" href="tailorProfile.php"><span class="fa fa-edit"></span><br>Tailor Profile</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link login" href="../../login.php?logout=success"><span class="fa fa-sign-out-alt"></span><br>Sign Out</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    </div>
                </div>
            </div>
            </header>


            <div class="row">
