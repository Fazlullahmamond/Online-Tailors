<?php

    //user is not loged in redirect him to the login page
    
    if (!isset($_SESSION['id'])){
        header("location: ../../login.php?auth=fail");
    }elseif($_SESSION['role'] != 'user'){
        header("location: ../../login.php?auth=fail");
    }
?>