<?php 
include("../../config/config.php");
include("../../config/auth.php");



$errors = array();
// $name = "'".$_POST['firstName']."'";
if (!checkName($_POST['firstName'])){
    $errors['firstName'] = "Invalid first name!";
}
if (!checkName($_POST['lastName'])){
    $errors['lastName'] = "Invalid last name!";
}
if ($_POST['email'] != null && !checkEmail($_POST['email'])){
    $errors['email'] = "Invalid email!";
}

if (!isset($_POST['phone_number']) || $_POST['phone_number'] == null || !checkPhone($_POST['phone_number'])){
    $errors['phone_number'] = "Invalid phone number!";
}



if(!empty($errors)){
    header('Content-type: application/json');
    echo json_encode($errors);
    exit;
}else{
    $ID = $_POST['id'] == null ? "NULL" : dc($_POST['id']);
    $first_name = $_POST['firstName'] == null ? "NULL" : "'" . ucwords($_POST['firstName']) . "'";

    $last_name = $_POST['lastName'] == null ? "NULL" : "'" . ucwords($_POST['lastName']) . "'";

    $email = $_POST['email'] == null ? "NULL" : "'" . strtolower($_POST['email']) . "'";

    $phone_number = $_POST['phone_number'] == null ? "NULL" : "'" . $_POST['phone_number'] . "'";
    if($phone_number[1]==0){
        $phone_number = "'". substr($_POST['phone_number'], 1) ."'";
    }

    $sql = "SELECT COUNT(*) as c FROM users WHERE NOT id = ".$ID." AND phone_number = $phone_number ;";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    if( intval($row['c']) > 0){
        echo 'phoneExist';
        exit;
    }
    else{
        $sql = "SELECT COUNT(*) as c FROM users WHERE NOT id = ".$ID." AND email = $email ;";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
        if( intval($row['c']) > 0){
            echo 'emailExist';
            exit;
        }
        else{
            $sql = "UPDATE users SET first_name = $first_name, last_name = $last_name, email = $email, phone_number = $phone_number, updated_at = CURRENT_TIMESTAMP ";
            $sql .= "WHERE id = $ID";
            if(mysqli_query($db, $sql)){
                echo "Done";
                exit;
            }else{
                echo "NotDone";
                exit;
            }
        }
    }
}
?>