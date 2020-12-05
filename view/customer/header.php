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
        <link href="../../assets/css/customer_css/edit.css" rel="stylesheet">
        <link rel="icon" href="../../assets/img/icons/<?php echo $icon?>.png">
    </head>

    <body>
        
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
                        <li class="nav-item">
                           <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="editProduct.php">Edit Products</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="editInfo.php">Edit Info</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link login" href="../../login.php?logout=success">Sign Out &nbsp;<i class="fa fa-sign-out-alt"></i></a>
                        </li>
                     </ul>
                  </div>
               </nav>
            </div>
         </div>
      </div>
    </header>
