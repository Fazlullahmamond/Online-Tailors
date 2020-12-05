<?php

    include("../../config/config.php");
    include("../../config/userAuth.php");

    $tailorName = "'". ucwords($_POST['tailorName']) . "'" ?? "NULL";
    $districtID = $_POST['district'] ?? "NULL";
    $address = "'". ucwords($_POST['tailorAddress']) . "'" ?? "NULL";
    $establish_date = "'". $_POST['establish_date']. "'" ?? "NULL";


    if($tailorName == "NULL" || $districtID == "NULL" || $address == "NULL"){
        redirect_to("tailorProfile.php?fill=false");
    }

    if(!checkName($_POST['tailorName'])){
        redirect_to("tailorProfile.php?name=false");
        exit;
    }elseif (!checkNum($_POST['district'])){
        redirect_to("tailorProfile.php?districtErr=true");
        exit;
    }elseif (!checkNumLet($_POST['tailorAddress'])){
        redirect_to("tailorProfile.php?addressErr=true");
        exit;
    }elseif ($establish_date != "NULL" && (!checkDOB($_POST['establish_date']))){
        redirect_to("tailorProfile.php?dateErr=true");
        exit;
    }else{
        $sql = "UPDATE companies SET name = $tailorName, district_id = $districtID, address = $address, establish_date = $establish_date, updated_at = CURRENT_TIMESTAMP ";
        $sql .= "WHERE id = ".$_SESSION['company_id'];
        if(mysqli_query($db, $sql)){
            redirect_to("tailorProfile.php?success=true");
            exit;
        }else{
            redirect_to("tailorProfile.php?notSuccess=true");
            exit;
        }
}
    db_disconnect();
?>