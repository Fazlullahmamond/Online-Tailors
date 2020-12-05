<?php

    //customer is not loged in redirect him to the login page
    
    if (!isset($_SESSION['id'])){
        header("location: ../../login.php?auth=fail");
    }elseif($_SESSION['role'] != 'customer'){
        header("location: ../../login.php?auth=fail");
    }
?>