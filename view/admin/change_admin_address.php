<?php

    include("../../config/config.php");
    include("../../config/auth.php");
    
    if(isset($_POST['province']) && isset($_POST['district'])){
        $sql = "UPDATE users SET district_id = ". $_POST['district'] ." WHERE id = ". dc($_SESSION['id']) .";";
        if(mysqli_query($db, $sql)){
            redirect_to("profile.php?addressDone=true");
        }else{
            redirect_to("profile.php?addressErr=true");
        }
    }else{
        redirect_to("profile.php?addressErr=true");
    }


db_disconnect();
?>