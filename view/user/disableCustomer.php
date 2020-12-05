<?php
    include("../../config/config.php");
    include("../../config/userAuth.php");

    if (isset($_POST['id']) && isset($_POST['firstName'])){
        $sql = 'UPDATE users set state = 0 WHERE id = '. dc($_POST['id']) .' AND first_name = "'. dc($_POST['firstName']) .'"';
        $result = mysqli_query($db, $sql);
        if($result){
            echo true;
        }else{
            echo false;
        }
    }
    else{
        echo false;
    }
db_disconnect();
?>