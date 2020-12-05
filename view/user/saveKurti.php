<?php  
    include("../../config/config.php");
    include("../../config/userAuth.php");

    if(isset($_POST['phone_number'])){

        //get all input fields data
        $first_name = $_POST['firstName'] == null ? "" :  ucwords($_POST['firstName']) ;
        $last_name = $_POST['lastName'] == null ? "" :  ucwords($_POST['lastName']) ;
        $phone_number = $_POST['phone_number'] == null ? "" : $_POST['phone_number'] ;
        $qad = $_POST['qad'] == null ? "" : "'". $_POST['qad'] ."'" ;
        $shana = $_POST['shana'] == null ? "" :"'". $_POST['shana'] ."'";
        $astin = $_POST['astin'] == null ? "" :"'". $_POST['astin'] ."'";
        $baghal = $_POST['baghal'] == null ? "" :"'". $_POST['baghal'] ."'";
        $kamar = $_POST['kamar'] == null ? "" :"'". $_POST['kamar'] ."'";
        $soorin = $_POST['soorin'] == null ? "" :"'". $_POST['soorin'] ."'";
        $tir_pesht = $_POST['tir_pesht'] == null ? "" :"'". $_POST['tir_pesht'] ."'";
        $balai_tana = $_POST['balai_tana'] == null ? "" :"'". $_POST['balai_tana']."'" ;
        $bazo = $_POST['bazo'] == null ? "" :"'". $_POST['bazo'] ."'";
        $moch = $_POST['moch'] == null ? "" :"'". $_POST['moch'] ."'";
        $tokma_dropdown = $_POST['tokma_dropdown'] == null ? "" : $_POST['tokma_dropdown'] ;
        $chak_dropdown = $_POST['chak_dropdown'] == null ? "" : $_POST['chak_dropdown'] ;
        $yakhan_dropdown = $_POST['yakhan_dropdown'] == null ? "" : $_POST['yakhan_dropdown'] ;
        $daman_dropdown = $_POST['daman_dropdown'] == null ? "" : $_POST['daman_dropdown'] ;
        $amount = $_POST['amount'] == null ? "" : $_POST['amount'] ;
        $curDate = $_POST['curDate'];
        $dueDate = $_POST['dueDate'] == null ? "" : $_POST['dueDate'] ;
        $price = $_POST['price'] == null ? "" : $_POST['price'] ;
        $paid = $_POST['paid'] == null ? "" : $_POST['paid'] ;
        $verified = isset($_POST['verified']) ? $_POST['verified'] : "NULL";

        //redirect to addKurti page with all data in input fields
        function redirectPage($error){
            redirect_to("addKurti.php?$error=false&firstName=".h(u($_POST['firstName']))."&lastName=".h(u($_POST['lastName']))."&phone_number=".h(u($_POST['phone_number']))."&qad=".h(u($_POST['qad']))."&shana=".h(u($_POST['shana']))."&astin=".h(u($_POST['astin']))."&baghal=".h(u($_POST['baghal']))."&kamar=".h(u($_POST['kamar']))."&soorin=".h(u($_POST['soorin']))."&tir_pesht=".h(u($_POST['tir_pesht']))."&balai_tana=".h(u($_POST['balai_tana']))."&bazo=".h(u($_POST['bazo']))."&moch=".h(u($_POST['moch']))."&amount=".h(u($_POST['amount']))."&dueDate=".h(u($_POST['dueDate']))."&price=".h(u($_POST['price']))."&paid=".h(u($_POST['paid']))."&verified=".h(u($_POST['verified']))  );
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
        }elseif (!checkNumLet($_POST['shana'])){
            redirectPage("shanaErr");
            exit;
        }elseif (!checkNumLet($_POST['astin'])){
            redirectPage("astinErr");
            exit;
        }elseif (!checkNumLet($_POST['baghal'])){
            redirectPage("baghalErr");
            exit;
        }elseif (!checkNumLet($_POST['kamar'])){
            redirectPage("kamarErr");
            exit;
        }elseif (!checkNumLet($_POST['soorin'])){
            redirectPage("soorinErr");
            exit;
        }elseif (!checkNumLet($_POST['tir_pesht'])){
            redirectPage("tir_peshtErr");
            exit;
        }elseif (!checkNumLet($_POST['balai_tana'])){
            redirectPage("balai_tanaErr");
            exit;
        }elseif (!checkNumLet($_POST['bazo'])){
            redirectPage("bazoErr");
            exit;
        }elseif (!checkNumLet($_POST['moch'])){
            redirectPage("mochErr");
            exit;
        }elseif (!checkNum($tokma_dropdown)){
            redirectPage("tokma_dropdownErr");
            exit;
        }elseif (!checkNum($chak_dropdown)){
            redirectPage("chak_dropdownErr");
            exit;
        }elseif (!checkNum($yakhan_dropdown)){
            redirectPage("yakhan_dropdownErr");
            exit;
        }elseif (!checkNum($daman_dropdown)){
            redirectPage("daman_dropdownErr");
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
            //example: into tables companies_customer, users(DONE), kurti(DONE) and orders.
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
                $query3 .= "VALUES($customer_ID, 'kurti', $amount, $dueDate, $price, $paid)";
                if(!mysqli_query($db, $query3)){
                    $db->rollback();
                    redirectPage("failed"); //custom function
                    exit;
                }

                $query4 = "INSERT INTO kurti(customer_id, qad, shana, astin, baghal, kamar, soorin, tir_pesht, balai_tana, bazo,  moch, tokma_id, chak_id, yakhan_id, daman_id) ";
                $query4 .= "VALUES($customer_ID, $qad, $shana, $astin, $baghal, $kamar, $soorin, $tir_pesht, $balai_tana, $bazo, $moch, $tokma_dropdown, $chak_dropdown, $yakhan_dropdown, $daman_dropdown);";
                if(!mysqli_query($db, $query4)){
                    $db->rollback();
                    redirectPage("failed"); //custom function
                    exit;
                }
                
                $db->commit();
                redirect_to("addKurti.php?successfully=added"); //custom function
                
            } catch (Exception $e){
                $db->rollback();
                redirectPage("failed"); //custom function
            }
        }
        
    }
?>