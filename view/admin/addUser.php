<?php

use function PHPSTORM_META\elementType;

include("../../config/config.php");
include("../../config/auth.php");



    //check if form is submitted or not
    //if yes then convert all empty variables into NULL
    //then call a custom function addUser()
    //if variable is empty it will store NULL in database
    //if variable is not valid show a message in UI
    //and if phone number and role id is not defined show err
try{
    if(isset($_POST['phone_number'])){
        function redirectPage($error){
            redirect_to("new_user.php?$error=false&firstName=".u($_POST['firstName'])."&lastName=".u($_POST['lastName'])."&address=".u($_POST['email'])."&date=".u($_POST['dob'])."&gen=".u($_POST['gender'])."&phone_number=".u($_POST['phone_number'])."&roleID=".u($_POST['roles'])."&province=".u($_POST['province']));
        }

        $first_name = $_POST['firstName'] == null ? "NULL" : "'" . ucwords($_POST['firstName']) . "'";
        if (!checkName($_POST['firstName'])){
            redirectPage("first");
            exit;
        }

        $last_name = $_POST['lastName'] == null ? "NULL" : "'" . ucwords($_POST['lastName']) . "'";
        if (!checkName($_POST['lastName'])){
            redirectPage("last");
            exit;
        }

        $email = $_POST['email'] == null ? "NULL" : "'" . strtolower($_POST['email']) . "'";
        if ($_POST['email'] != null && !checkEmail($_POST['email'])){
            redirectPage("email");
            exit;
        }

        $dob = $_POST['dob'] == null ? "NULL" : "'" . $_POST['dob'] . "'";
        if ($dob != "NULL" && (checkDOB($dob))){
            redirectPage('dob');
            exit;
        }

        $gender = !isset($_POST['gender']) ? "NULL" : $_POST['gender'] ;
        if ($gender != "NULL" && ($gender != 1 && $gender != 0)){
            redirectPage('gender');
            exit;
        }


        $phone_number = $_POST['phone_number'] == null ? "NULL" : "'" . $_POST['phone_number'] . "'";
        if($phone_number[1]==0){
            $phone_number = "'". substr($_POST['phone_number'], 1) . "'";
        }
        if ($_POST['phone_number'] == null || !checkPhone($_POST['phone_number'])){
            redirectPage("phone");
            exit;
        }

        $role_id = $_POST['roles'] == null ? "NULL" : $_POST['roles'] ;
        if ($role_id == "NULL"){
            redirectPage("role");
            exit;
        }

        //check if number is exist or not
        if (getNumbers(strval($_POST['phone_number']))){
            redirectPage("num");
            exit;
        }

         //check if email is exist or not
        if (getEmails(strtolower($_POST['email']))){
            redirectPage("emailExist");
            exit;
        }


        $verified = !isset($_POST['verified']) ? "NULL" : $_POST['verified'];
        if ($verified != "NULL" && $verified != 1){
            redirect_to("new_user.php?verified=false");
            exit;
        }



        $password = "Tailor12345#";
        $password = hash('ripemd160', $password);
        $password = "'". $password ."'";
        $district_id = $_POST['district'] == null ? "NULL" : (int) $_POST['district'] ;


        
        $image = $_FILES['profile_picture']['name'] == null ? "NULL" : "'" . $_FILES['profile_picture']['name'] . "'";
        $comSql = "INSERT INTO companies(name) values('NULL')";
        if($role_id == 2){
            if(mysqli_query($db, $comSql)){
                $company_id = mysqli_insert_id($db);
            }else{
                redirect_to("new_user.php?something=heppened");
                exit;
            }
        }else{
            $company_id = "NULL";
        }
            if($image != "NULL"){
                if(($_FILES['profile_picture']['type'] == 'image/jpg' || $_FILES['profile_picture']['type'] == 'image/jpeg') && $_FILES['profile_picture']['size'] < '4000000'){
                    if($role_id == '1'){
                        $saveImg = 'admin_img';
                    } elseif($role_id == '2'){
                        $saveImg = 'user_img';
                    } elseif($role_id == '3'){
                        $saveImg = "customer_img";
                    }
                    if(uploadImg("../../assets/img/" . $saveImg . "/",$_FILES['profile_picture']['type'])){
                        if(addUser($first_name = $first_name, $last_name = $last_name, $email = $email, $password = $password, $dob = $dob, $gender = $gender, $image = $image, $phone_number = $phone_number, $verified = $verified, $role_id = $role_id, $company_id = $company_id, $district_id = $district_id)){
                            redirect_to("new_user.php?successfully=added");
                            exit;
                        }else{
                            redirect_to("new_user.php?something=heppened");
                            exit;
                            
                        }
                    } else {
                        redirect_to("new_user.php?imgErr=true");
                    }
                } else {
                    redirect_to("new_user.php?imgErr=true");
                }
            } else {
                if(addUser($first_name = $first_name, $last_name = $last_name, $email = $email, $password = $password, $dob = $dob, $gender = $gender, $image = $image, $phone_number = $phone_number, $verified = $verified, $role_id = $role_id, $company_id = $company_id, $district_id = $district_id)){
                    redirect_to("new_user.php?successfully=added");
                    exit;
                }else{
                    redirect_to("new_user.php?something=heppened");
                    exit;
                }
            }
        }
    
    
} catch(Exception $e) {
    redirect_to("new_user.php?something=happen");
}

?>