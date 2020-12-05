<?php

    include("../../config/config.php");
    include("../../config/userAuth.php");

    $districts = isset($_POST['name']) ? $_POST['name'] : "None";
    if ($districts != "None"){
        $sql = "SELECT id, name FROM districts WHERE province_id = " . h(u($districts)) . ";";
        $result = mysqli_query($db, $sql);
        while($names = mysqli_fetch_assoc($result)){
            echo '<option value="'.h($names['id']).'">'.h($names['name'])."</option>";
        }
    }
    else{
        echo '<option value="none"> None </option>';
    }
db_disconnect();
?>