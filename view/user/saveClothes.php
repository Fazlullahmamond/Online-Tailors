<?php  
    include("../../config/config.php");
    include("../../config/userAuth.php");

    if(isset($_POST['phone_number'])){

        //get all input fields data
        $first_name = $_POST['firstName'] == null ? "" :  ucwords($_POST['firstName']) ;
        $last_name = $_POST['lastName'] == null ? "" :  ucwords($_POST['lastName']) ;
        $phone_number = $_POST['phone_number'] == null ? "" : $_POST['phone_number'] ;
        $qad = $_POST['qad'] == null ? "" : "'". $_POST['qad'] ."'";
        $astin = $_POST['astin'] == null ? "" : "'". $_POST['astin'] ."'";
        $shana = $_POST['shana'] == null ? "" : "'". $_POST['shana'] ."'" ;
        $yakhan = $_POST['yakhan'] == null ? "" : "'". $_POST['yakhan'] ."'" ;
        $baghal = $_POST['baghal'] == null ? "" : "'". $_POST['baghal'] ."'" ;
        $daman = $_POST['daman'] == null ? "" : "'". $_POST['daman'] ."'" ;
        $tomban = $_POST['tomban'] == null ? "" : "'". $_POST['tomban'] ."'" ;
        $pacha = $_POST['pacha'] == null ? "" :"'". $_POST['pacha']."'" ;
        $pati = $_POST['pati'] == null ? "" :"'". $_POST['pati'] ."'";
        $kaf = $_POST['kaf'] == null ? "" :"'". $_POST['kaf'] ."'";
        $qol = $_POST['qol'] == null ? "" :"'". $_POST['qol'] ."'" ;
        $bar_tomban = $_POST['bar_tomban'] == null ? "" :"'". $_POST['bar_tomban'] ."'";
        $bar_seena = $_POST['bar_seena'] == null ? "" : "'". $_POST['bar_seena'] ."'";
        $bar_kamar = $_POST['bar_kamar'] == null ? "" :"'". $_POST['bar_kamar']."'" ;
        $baghal_dropdown = $_POST['baghal_dropdown'] == null ? "" : $_POST['baghal_dropdown'] ;
        $astin_dropdown = $_POST['astin_dropdown'] == null ? "" : $_POST['astin_dropdown'] ;
        $yakhan_dropdown = $_POST['yakhan_dropdown'] == null ? "" : $_POST['yakhan_dropdown'] ;
        $daman_dropdown = $_POST['daman_dropdown'] == null ? "" : $_POST['daman_dropdown'] ;
        $amount = $_POST['amount'] == null ? "" :  $_POST['amount'] ;
        $curDate = $_POST['curDate'];
        $dueDate = $_POST['dueDate'] == null ? "" : $_POST['dueDate'] ;
        $price = $_POST['price'] == null ? "" : $_POST['price'] ;
        $paid = $_POST['paid'] == null ? "" : $_POST['paid'] ;
        $jeb_roy = isset($_POST['jeb_roy']) ? $_POST['jeb_roy'] : "NULL";
        $jeb_tomban = isset($_POST['jeb_tomban']) ? $_POST['jeb_tomban'] : "NULL";
        $double_salai = isset($_POST['double_salai']) ? $_POST['double_salai'] : "NULL";
        $tomban_pathlooni = isset($_POST['tomban_pathlooni']) ? $_POST['tomban_pathlooni'] : "NULL";
        $verified = isset($_POST['verified']) ? $_POST['verified'] : "NULL";

        //redirect to addClothes page with all data in input fields
        function redirectPage($error){
            redirect_to("addClothes.php?$error=false&firstName=".h(u($_POST['firstName']))."&lastName=".h(u($_POST['lastName']))."&phone_number=".h(u($_POST['phone_number']))."&qad=".h(u($_POST['qad']))."&astin=".h(u($_POST['astin']))."&shana=".h(u($_POST['shana']))."&yakhan=".h(u($_POST['yakhan']))."&baghal=".h(u($_POST['baghal']))."&daman=".h(u($_POST['daman']))."&tomban=".h(u($_POST['tomban']))."&pacha=".h(u($_POST['pacha']))."&pati=".h(u($_POST['pati']))."&kaf=".h(u($_POST['kaf']))."&qol=".h(u($_POST['qol']))."&bar_tomban=".h(u($_POST['bar_tomban']))."&bar_seena=".h(u($_POST['bar_seena']))."&bar_kamar=".h(u($_POST['bar_kamar']))."&amount=".h(u($_POST['amount']))."&dueDate=".h(u($_POST['dueDate']))."&price=".h(u($_POST['price']))."&paid=".h(u($_POST['paid']))  );
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
        }elseif (!checkNumLet($_POST['astin'])){
            redirectPage("astinErr");
            exit;
        }elseif (!checkNumLet($_POST['shana'])){
            redirectPage("shanaErr");
            exit;
        }elseif (!checkNumLet($_POST['yakhan'])){
            redirectPage("yakhanErr");
            exit;
        }elseif (!checkNumLet($_POST['baghal'])){
            redirectPage("baghalErr");
            exit;
        }elseif (!checkNumLet($_POST['daman'])){
            redirectPage("damanErr");
            exit;
        }elseif (!checkNumLet($_POST['tomban'])){
            redirectPage("tombanErr");
            exit;
        }elseif (!checkNumLet($_POST['pacha'])){
            redirectPage("pachaErr");
            exit;
        }elseif (!checkNumLet($_POST['pati'])){
            redirectPage("patiErr");
            exit;
        }elseif (!checkNumLet($_POST['kaf'])){
            redirectPage("kafErr");
            exit;
        }elseif (!checkNumLet($_POST['qol'])){
            redirectPage("qolErr");
            exit;
        }elseif (!checkNumLet($_POST['bar_tomban'])){
            redirectPage("bar_tombanErr");
            exit;
        }elseif (!checkNumLet($_POST['bar_seena'])){
            redirectPage("bar_seenaErr");
            exit;
        }elseif (!checkNumLet($_POST['bar_kamar'])){
            redirectPage("bar_kamarErr");
            exit;
        }elseif (!checkNum($baghal_dropdown)){
            redirectPage("baghal_dropdownErr");
            exit;
        }elseif (!checkNum($astin_dropdown)){
            redirectPage("astin_dropdownErr");
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
        }elseif ($jeb_roy != "NULL" && !checkNum($jeb_roy)){
            redirectPage("jeb_roy");
            exit;
        }elseif ($jeb_tomban != "NULL" && !checkNum($jeb_tomban)){
            redirectPage("jeb_tomban");
            exit;
        }elseif ($double_salai != "NULL" && !checkNum($double_salai)){
            redirectPage("double_salai");
            exit;
        }elseif ($tomban_pathlooni != "NULL" && !checkNum($tomban_pathlooni)){
            redirectPage("tomban_pathlooni");
            exit;
        }elseif ($verified != "NULL" && !checkNum($verified)){
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
            //example: into tables companies_customer(DONE), users(DONE), lebas and orders(DONE). 
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
                $query3 .= "VALUES($customer_ID, 'clothe', $amount, $dueDate, $price, $paid)";
                if(!mysqli_query($db, $query3)){
                    $db->rollback();
                    redirectPage("failed"); //custom function
                    exit;
                }

                $query4 = "INSERT INTO lebas(customer_id, qad, astin, shana, yakhan, baghal, daman, tomban, pacha,  jeb_roy, jeb_tomban, double_salai, tomban_pathlooni, pati, kaf, qol, bar_tomban, bar_seena, bar_kamar, baghal_jeb_id, astin_id, yakhan_id, daman_id) ";
                $query4 .= "VALUES($customer_ID, $qad, $astin, $shana, $yakhan, $baghal, $daman, $tomban, $pacha, $jeb_roy, $jeb_tomban, $double_salai, $tomban_pathlooni, $pati, $kaf, $qol, $bar_tomban, $bar_seena, $bar_kamar, $baghal_dropdown, $astin_dropdown, $yakhan_dropdown, $daman_dropdown);";
                if(!mysqli_query($db, $query4)){
                    $db->rollback();
                    redirectPage("failed"); //custom function
                    exit;
                }
                
                $db->commit();
                redirect_to("addClothes.php?successfully=added"); //custom function
                
            } catch (Exception $e){
                $db->rollback();
                redirectPage("failed"); //custom function
            }

        }
        
    }
?>