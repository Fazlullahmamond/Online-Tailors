<?php

    include("../../config/config.php");
    include("../../config/auth.php");

    $sql = "SELECT phone_number,image FROM users WHERE id = ". dc($_SESSION['id']);
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    $phone_number = $row['phone_number'];

    $image = $_FILES['profile_picture']['name'] == null ? "NULL" : "'" . $_FILES['profile_picture']['name'] . "'";
    if($image != "NULL"){
        if(($_FILES['profile_picture']['type'] == 'image/jpg' || $_FILES['profile_picture']['type'] == 'image/jpeg') && $_FILES['profile_picture']['size'] < '4000000'){
            $fileType = explode("image/", $_FILES['profile_picture']['type']);
            $image_name = $row['image'] == null ? time() . "." . $fileType[1] : $row['image'];
            $target_dir = "../../assets/img/admin_img/" . $image_name;
            if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_dir)) {
                $sql = "UPDATE users SET image = '". $image_name ."', updated_at = CURRENT_TIMESTAMP WHERE id = ". dc($_SESSION['id']).";";    
                if(mysqli_query($db, $sql)){
                    redirect_to("profile.php?profile_img=uploaded");
                    setcookie("image", $target_dir, time() + (86400 * 365), "/");
                }else{
                    redirect_to("profile.php?imgErr=true");
                }
            } else {
                redirect_to("profile.php?imgErr=true");
            }
        }else{
            redirect_to("profile.php?imgErr=true");
        }
    }



?>