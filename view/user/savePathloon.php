<?php  
    include("../../config/config.php");
    include("../../config/userAuth.php");

    if(isset($_POST['phone_number'])){

        //get all input fields data
        $first_name = $_POST['firstName'] == null ? "" :  ucwords($_POST['firstName']) ;
        $last_name = $_POST['lastName'] == null ? "" :  ucwords($_POST['lastName']) ;
        $phone_number = $_POST['phone_number'] == null ? "" : $_POST['phone_number'] ;
        $qad = $_POST['qad'] == null ? "" : "'". $_POST['qad'] ."'" ;
        $kamar = $_POST['kamar'] == null ? "" :"'". $_POST['kamar'] ."'";
        $soorin = $_POST['soorin'] == null ? "" :"'". $_POST['soorin'] ."'";
        $pat = $_POST['pat'] == null ? "" :"'". $_POST['pat'] ."'";
        $qad_zano = $_POST['qad_zano'] == null ? "" :"'". $_POST['qad_zano'] ."'";
        $do_zano = $_POST['do_zano'] == null ? "" :"'". $_POST['do_zano'] ."'";
        $pacha = $_POST['pacha'] == null ? "" :"'". $_POST['pacha'] ."'";
        
        $amount = $_POST['amount'] == null ? "" : $_POST['amount'] ;
        $curDate = $_POST['curDate'];
        $dueDate = $_POST['dueDate'] == null ? "" : $_POST['dueDate'] ;
        $price = $_POST['price'] == null ? "" : $_POST['price'] ;
        $paid = $_POST['paid'] == null ? "" : $_POST['paid'] ;
        $verified = isset($_POST['verified']) ? $_POST['verified'] : "NULL";
        $five_dar = isset($_POST['five_dar']) ? $_POST['five_dar'] : "NULL";

        //redirect to addKurti page with all data in input fields
        function redirectPage($error){
            redirect_to("addPathloon.php?$error=false&firstName=".h(u($_POST['firstName']))."&lastName=".h(u($_POST['lastName']))."&phone_number=".h(u($_POST['phone_number']))."&qad=".h(u($_POST['qad']))."&kamar=".h(u($_POST['kamar']))."&soorin=".h(u($_POST['soorin']))."&pat=".h(u($_POST['pat']))."&qad_zano=".h(u($_POST['qad_zano']))."&do_zano=".h(u($_POST['do_zano']))."&pacha=".h(u($_POST['pacha']))."&amount=".h(u($_POST['amount']))."&dueDate=".h(u($_POST['dueDate']))."&price=".h(u($_POST['price']))."&paid=".h(u($_POST['paid']))."&verified=".h(u($_POST['verified']))."&five_dar=".h(u($_POST['five_dar']))  );
        }

        //validate firstName
        if (!checkName($first_name)){
            redirectPage("firstNameErr");
            exit;
        }elseif (!checkName($last_name)){
            redirectPage("lastNameErr");
            exit;
        }
        if($phone_number[0]==0){
            $phone_number = substr($phone_number, 1);
        }
        if ($_POST['phone_number'] == null || !checkPhone($phone_number)){
            redirectPage("phone_numberErr");
            exit;
        }elseif (!checkNumLet($_POST['qad'])){
            redirectPage("qadErr");
            exit;
        }elseif (!checkNumLet($_POST['kamar'])){
            redirectPage("kamarErr");
            exit;
        }elseif (!checkNumLet($_POST['soorin'])){
            redirectPage("soorinErr");
            exit;
        }elseif (!checkNumLet($_POST['pat'])){
            redirectPage("patErr");
            exit;
        }elseif (!checkNumLet($_POST['qad_zano'])){
            redirectPage("qad_zanoErr");
            exit;
        }elseif (!checkNumLet($_POST['do_zano'])){
            redirectPage("do_zanoErr");
            exit;
        }elseif (!checkNumLet($_POST['pacha'])){
            redirectPage("pachaErr");
            exit;
        }elseif (!checkNumLet($amount)){
            redirectPage("amountErr");
            exit;
        }elseif (!checkDOB($curDate)){
            redirectPage("curDateErr");
            exit;
        }elseif (!checkDOB($dueDate)){
            redirectPage("dueDateErr");
            exit;
        }elseif (!checkNumLet($price)){
            redirectPage("priceErr");
            exit;
        }elseif (!checkNumLet($paid)){
            redirectPage("paidErr");
            exit;
        }elseif ($verified != "NULL" && $verified != "1"){
            redirectPage("verifiedErr");
            exit;
        }elseif ($five_dar != "NULL" && $five_dar != "1"){
            redirectPage("five_darErr");
            exit;
        }else{

            //save into database
            $sql = "SELECT company_id FROM users WHERE id = ".dc($_SESSION['id']);
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result);
            $company_id = (int) $row['company_id'];
            $email = "'". $first_name.$phone_number."@khayat.com" ."'";
            $password = "Tailor12345#";
            $password = "'". hash('ripemd160', $password) ."'";
            $first_name = "'". $first_name . "'";
            $last_name = "'". $last_name ."'";
            //start transation here and insert data in all tables
            //example: into tables companies_customer, users(DONE), kurti and orders.
            try {
                
                if (getNumbers(strval($phone_number))){
                    //check if number is exist or not
                    redirectPage("phoneExsit"); //custom function
                    exit;
                }

                $db->begin_transaction();
                
                $query1 = "INSERT INTO users(first_name, last_name, email, password, phone_number,verified, role_id, company_id, state) ";
                $query1 .= "VALUES($first_name, $last_name, $email, $password, $phone_number, $verified, 3, $company_id, 1); ";
                if(!mysqli_query($db, $query1)){
                    $db->rollback();
                    redirectPage("failed"); //custom function
                    exit;
                }

                $customer_ID = mysqli_insert_id($db);
                
                $query2 = "INSERT INTO company_customers(company_id, customer_id) ";
                $query2 .= "VALUES($company_id, $customer_ID);";
                if(!mysqli_query($db, $query2)){
                    $db->rollback();
                    redirectPage("failed"); //custom function
                    exit;
                }

                $dueDate = "'". $dueDate ."'";
                $query3 = "INSERT INTO orders(customer_id, product_type, product_amount, due_date, price, paid) ";
                $query3 .= "VALUES($customer_ID, 'pathloon', $amount, $dueDate, $price, $paid)";
                if(!mysqli_query($db, $query3)){
                    $db->rollback();
                    redirectPage("failed"); //custom function
                    exit;
                }

                $query4 = "INSERT INTO pathloon(customer_id, qad, kamar, soorin, pat, qad_zano, do_zano, pacha, five_dar) ";
                $query4 .= "VALUES($customer_ID, $qad, $kamar, $soorin, $pat, $qad_zano, $do_zano, $pacha,  $five_dar);";
                if(!mysqli_query($db, $query4)){
                    $db->rollback();
                    redirectPage("failed"); //custom function
                    exit;
                }
                
                $db->commit();
                redirect_to("addPathloon.php?successfully=added"); //custom function
                
            } catch (Exception $e){
                $db->rollback();
                redirectPage("failed"); //custom function
            }
        }
        
    }
?>