<?php

    include("../../config/config.php");
    include("../../config/auth.php");

    $firstName = "'". ucwords($_POST['firstName']) . "'" ?? "NULL";
    $lastName = "'". ucwords($_POST['lastName']) . "'" ?? "NULL";
    $email = "'". strtolower($_POST['email']) . "'" ?? "NULL";
    $phone_number = "'". $_POST['phone_number'] ."'" ?? "NULL";
    $dob = empty($_POST['dob']) ? "NULL" : "'".$_POST['dob']."'";
    $gender = $_POST['gender'] == "Male" ? 1 : 0;


    if($firstName == "NULL" || $lastName == "NULL" || $phone_number == "NULL"){
        redirect_to("profile.php?fill=false");
    }

    if(!checkName($_POST['firstName']) || !checkName($_POST['lastName'])){
        redirect_to("profile.php?valid=false");
    }


    if($_POST['phone_number'][0]==0){
        $phone_number = "'". substr($_POST['phone_number'], 1) ."'";
    }

    if(!checkPhone($_POST['phone_number']) || !checkEmail($_POST['email'])){
        redirect_to("profile.php?valid=false");
    }
    if($email != "NULL"){
        $sql = "SELECT COUNT(*) as c FROM users WHERE NOT id = ".dc($_SESSION['id'])." AND email = $email;";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
        if( intval($row['c']) > 0){
            redirect_to("profile.php?emailE=false");
            exit;
        }
    }   
    $sql = "SELECT COUNT(*) as c FROM users WHERE NOT id = ".dc($_SESSION['id'])." AND phone_number = $phone_number ;";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    if( intval($row['c']) > 0){
        redirect_to("profile.php?phoneE=false");
        exit;
    }


    if($dob != "NULL"){
        if(!checkDOB($_POST['dob'])){
            redirect_to("profile.php?valid=false");
        }
    }


    $sql = "UPDATE users SET first_name = $firstName, last_name = $lastName, email = $email, phone_number = $phone_number, dob = $dob, gender = $gender, updated_at = CURRENT_TIMESTAMP ";
    $sql .= "WHERE id = ".dc($_SESSION['id']);
    if(mysqli_query($db, $sql)){
        redirect_to("profile.php?updated=true");
        exit;
    }else{
        redirect_to("profile.php?notUp=true");
        exit;
    }

    db_disconnect();
?>