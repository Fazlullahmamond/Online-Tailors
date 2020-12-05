<?php
    include ("config/config.php");
    require_once "lang/".$_SESSION['lang'].".php";




     //clear session and cookie if someone click on logout
    if(isset($_GET['logout'])){
        unset($_SESSION['id']);
        unset($_SESSION['role']);
        if(isset($_COOKIE['email'])){
            setcookie("role", '' , -3 , "/");
            setcookie("id", '' , -3 , "/");
            setcookie("email", '' , -3 , "/");
            $email = '';
        }
    }else{

         //check if cookie is set or not
    if (isset($_COOKIE['email'])){
        $_SESSION['id'] = $_COOKIE['id'];
        $_SESSION['role'] = dc($_COOKIE['role']);
        $email = dc($_COOKIE['email']);
        redirect_to("view/" . dc($_COOKIE['role']) . "/");
        exit;
    } else {
        $email = "";
    }


    }




   

    //if the login button is clicked check if email and password is valid
    //then check if email and password is in database and redirect to specific page
    //and store their info in session

    if( isset($_POST['submit']) ){
        $email =  strtolower($_POST['email']);
        if($_POST['email'][0] != 0){
            $number = "'". $_POST['email'] ."'";
        }else{
            $number = "'". substr($_POST['email'], 1) ."'";
        }

        $password =  $_POST['password'];

        $err = "";
        if (checkEmail($email) || checkPhone($email)){
            if (checkPassword($password)) {
                $password = hash('ripemd160', $password);
                $sql = "SELECT users.id, users.role_id,image, roles.role, state FROM users ";
                $sql.= "INNER JOIN roles ON users.role_id = roles.id ";
                $sql .= "WHERE password = '" . $password . "' "; 
                $sql .= "AND (email = '" . $email . "' ";
                $sql .= " OR phone_number = " . $number . "); ";
                $result = mysqli_query($db, $sql);
                $result = mysqli_fetch_assoc($result);
                if (empty($result)){
                    $err = "Incorrect email/phone or password";
                } else {
                    if($result['state'] == 1){
                        mysqli_free_result($result);

                        if($result['image'] != null){
                            setcookie("image", "assets/img/".$result['role']."_img/".$result['image'], time() + (86400 * 365), "/");
                            } else {
                                setcookie("image", '' , time() , "/");
                            }

                        if (isset($_POST['remember']) && $_POST['remember'] == 1 ){
                            setcookie("id", ec($result['id']), time() + (86400 * 365), "/");
                            setcookie("email", ec($email), time() + (86400 * 365), "/");
                            setcookie("role", ec($result['role']), time() + (86400 * 365), "/");
                        }


                        $_SESSION['id'] = ec($result['id']);
                        $_SESSION['role'] = $result['role'];
                        
                        redirect_to("view/" . $result['role'] . "/");
                        exit;
                    }elseif($result['state'] == 0){$err = "You are block from admin!";}
                }
            }else{$err = "Please type valide password";}
        }else {$err = "Please type valide email or phone";}
    }





    
    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $lang['log'] ?></title>

    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="assets/css/login_css/css.css">
    <link rel="icon" href="assets/img/icons/account.png">
</head>

<body <?php if ($_SESSION['lang'] != "en") {echo "dir='rtl'";} ?>>
    <div class="container">
        <dic class="card card-container">

            <img id="profile-img" class="profile-img-card" src="<?php if(isset($_COOKIE['image'])){ echo $_COOKIE['image'];}else{echo "assets/img/icons/open.png";} ?>" />
            <p id="profile-name" class="profile-name-card"></p>

            <form class="form-signin" method="POST" >
                
                <span id="reauth-email" class="reauth-email"></span>
                <?php 
                    if (isset($_GET['forgot'])){
                        echo  "<div class='err'>Please contact with admin!</div>";
                    }
                    if (!empty($err)){
                        echo  "<div class='err'>$err</div>";
                    }
                    elseif (isset($_GET['auth'])){
                        echo  "<div class='err'>Log In Please</div>";
                    } elseif (isset($_GET['logout'])){
                        echo  "<div class='success'>Successfuly Log out!</div>";
                    }
                ?>
                <input name="email" type="text" id="inputEmail" class="form-control" placeholder="<?php echo $lang['email'] ?>" required autofocus value="<?php if ( isset ( $email ) ) { echo $email; } ?>">
                <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>

                <label><input name="remember" type="checkbox" value="1">&nbsp;<?php echo $lang['remember'] ?></label>

                <button class="btn btn-lg btn-primary btn-block btn-signin" name="submit" type="submit"><?php echo $lang['login'] ?></button>
                <a href="index.php" class="back btn btn-primary">Back</a>
                
            </form><!-- /form -->
            <a href="?forgot" class="forgot-password">
                <?php echo $lang['forgot'] ?>
                </a>
                <?php include ("config/request.php"); ?>
        </div><!-- /card-container -->
            
    </div><!-- /container -->
</body>

<script src="assets/bootstrap/js/jquery-1.12.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/login_js/javascript.js"></script>
</html>
<?php 
    db_disconnect() 
?>