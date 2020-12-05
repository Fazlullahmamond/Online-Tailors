<?php

    include("../../config/config.php");
    include("../../config/auth.php");

    if (isset($_POST['id']) && isset($_POST['firstName'])){
        $sql = 'UPDATE users set state = 1 WHERE id = '. dc($_POST['id']) .' AND first_name = "'. dc($_POST['firstName']) .'"';
        $result = mysqli_query($db, $sql);
        if($result){
            echo 'done';
        }else{
            echo 'err';
        }
    }
    else{
        echo 'err';
    }
db_disconnect();
?>