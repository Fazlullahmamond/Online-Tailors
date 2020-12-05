<?php



    //start session
    session_start();

    //create session for using multiple language

    if (!isset($_SESSION['lang']) ){
        $_SESSION['lang'] = "en";
    }
    else if (isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang']) ){
        if ($_GET['lang'] == "en"){
            $_SESSION['lang'] = "en";
        }
        elseif ($_GET['lang'] == "ps"){
            $_SESSION['lang'] = "ps";
        }
        elseif ($_GET['lang'] == "pr"){
            $_SESSION['lang'] = "pr";
        }

    }
    


    //create database connection

    define("DB_SERVER", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_NAME", "tailor");

    function db_connect() {
        $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        confirm_db_connect();
        return $connection;
    }

    //confirm database connection

    function confirm_db_connect() {
        if(mysqli_connect_errno()) {
            $msg = "Database connection failed: ";
            $msg .= mysqli_connect_error();
            $msg .= " (" . mysqli_connect_errno() . ")";
            exit($msg);
        }
    }
    
    $db = db_connect();



    //string to encrypt
    function ec($strings){
        return openssl_encrypt($strings, "AES-128-ECB", "AB**12##");
    }


    //ENCRYPT string to decrypt
    function dc($strings){
        return openssl_decrypt($strings, "AES-128-ECB", "AB**12##");
    }

    //while inserting data into database escape special characters

    function escape($string) {
        global $db;
        return mysqli_real_escape_string($db, $string);
    }


    //while displaying dynamic data escape special characters

    function h($string="") {
        return htmlspecialchars($string);
    }



    //while sending data in url parameter encode special characters

    function u($string="") {
        return urlencode($string);
    }



    //redirect to another page

    function redirect_to($location) {
        header("Location: " . $location);
        exit;
    }



    
    //disconnect database connection

    function db_disconnect() {
        global $db;
        if(isset($db)) {
          mysqli_close($db);
        }
    }





    //check if firstName or lastName is valid
    
    function checkName($name){
        if (!preg_match("/^([A-Za-z ]){3,100}+$/",$name)) {
            return false;
        } else {
            return true;
        }
    }

    //checking the number  or letters validation
    
    function checkNumLet($name){
        if (!preg_match("/^([0-9A-Za-z., ]){1,100}+$/",$name)) {
            return false;
        } else {
            return true;
        }
    }

    //checking the number validation
    
    function checkNum($name){
        if (!preg_match("/^([0-9 ]){1,100}+$/",$name)) {
            return false;
        } else {
            return true;
        }
    }

    


    //check phone number if valid return true
    function checkPhone($number){
        if($number[0]==0){
            $number = substr($number, 1);
        }
        if (!preg_match("/^7[0-9]{8}$/",$number)) {
            return false;
        } else {
            return true;
        }
    }





    //check if email address is valid

    function checkEmail($email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        } else {
            return true;
        }
    }


    //check if email is exist in database
    function getEmails($email){
        global $db;
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($db, $sql);
        if (mysqli_fetch_assoc($result)){
            return true;
        } else {
            return false;
        }
    }




    //check if password is valid

    function checkPassword($password){
        if(!preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$.%* ]{6,18}$/", $password)) {
            return false ;
        } else {
            return true ;
        }
    }




    //check if date is valid
    function checkDOB($dob){
        if(!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $dob)) {
            return false ;
        } else {
            return true ;
        }
    }






    //show provinces from database
    function showProvinces(){
        global $db;
        $sql = "SELECT id, name FROM provinces";
        $result = mysqli_query($db, $sql);
        while($names = mysqli_fetch_assoc($result)){
            if(isset($_GET['province']) && $_GET['province'] == $names['id']){
                echo '<option value="' . h($names['id']) . '" selected>' . h($names['name']) . "</option>";
                continue;
            }
            echo '<option value="' . h($names['id']) . '">' . h($names['name']) . "</option>";
        }
    }






    //password generator
    function passGenerator($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstu#*@vwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }





    //check if phone number is exist in database
    function getNumbers($phone_number){
        global $db;
        if($phone_number[1]==0){
            $phone_number = substr($phone_number, 2);
        }
        $sql = "SELECT * FROM users WHERE phone_number = $phone_number";
        $result = mysqli_query($db, $sql);
        if (mysqli_fetch_assoc($result)){
            return true;
        } else {
            return false;
        }
    }







    //add user into database in users table
    function addUser($first_name = NULL , $last_name = NULL , $email = NULL , $password = NULL , $dob = NULL , $gender = NULL , $image = NULL , $phone_number , $verified = NULL , $role_id, $company_id = NULL , $district_id = NULL ){
        global $db;
        $sql = "INSERT INTO users( first_name, last_name, email, password, dob, gender, image, phone_number, verified, role_id, company_id, district_id, state) ";
        $sql .= "VALUES ($first_name, $last_name, $email, $password, $dob, $gender, $image, $phone_number, $verified, $role_id, $company_id, $district_id , 1);";

        $result = mysqli_query($db, $sql);

        return $result;
    }








    //save images into specific directory 
    function uploadImg($target_dir, $fileType){
        global $image;
        $img_name = time();
        $fileType = explode("image/", $fileType);
        $target_dir .= $img_name . "." . $fileType[1];
        $image = "'". $img_name . "." . $fileType[1]. "'";
        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_dir)) {
            return true;
        } else {
            return false;
        }
    }

?>