<?php

    include("../../config/config.php");
    include("../../config/auth.php");

    if (isset($_POST['id']) && isset($_POST['name'])){
        $password = strval("Tailor12345#");
        $password = hash('ripemd160', $password);
        $password = "'". $password ."'";
        $ID = dc($_POST['id']);
        $firstName = dc($_POST['name']);
        $sql = "UPDATE users SET password = $password ";
        $sql .= "WHERE first_name = '".$firstName."' AND id = $ID ;";
        $result = mysqli_query($db, $sql);
        if($result){
            echo "<div class='success'>Password successfully changed!</div>";
        }else{
            echo "<div class='imgErr'>Password is not changed!</div>";
        }
    }else{
        echo "<div class='imgErr'>something went wrong please try again!</div>";
    }
db_disconnect();
?>