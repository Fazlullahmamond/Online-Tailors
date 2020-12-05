<?php

    include("../../config/config.php");
    include("../../config/auth.php");

    if (($_POST['password1']) && isset($_POST['password2']) && isset($_POST['curPass'])){
        if($_POST['password1'] == $_POST['password2']){
            $sql = "SELECT password FROM users WHERE id =". dc($_SESSION['id']) .";";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result);
            $password = hash('ripemd160', $_POST['curPass']);
            $password1 = hash('ripemd160', $_POST['password1']);
            if( $password == $row['password']){
                if(checkPassword($_POST['password1'])){
                    $sql = "UPDATE users SET password = '". $password1 ."' WHERE id = ".dc($_SESSION['id']).";";
                    if(mysqli_query($db, $sql)){
                        redirect_to("profile.php?changed=true");
                    }else{
                        redirect_to("profile.php?notChanged=true");
                    }
                }else{
                    redirect_to("profile.php?password=false");
                }
            }else{
                redirect_to("profile.php?password=false");
            }
        }else{
            redirect_to("profile.php?password=false");
        }
    }
    else{
        redirect_to("profile.php?password=false");
    }
db_disconnect();
?>