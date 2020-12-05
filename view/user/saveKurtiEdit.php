<?php  
    include("../../config/config.php");
    include("../../config/userAuth.php");

    if(isset($_POST['phone_number'])){
        //get all input fields data
        $first_name = $_POST['firstName'] == null ? "" :  ucwords($_POST['firstName']) ;
        $last_name = $_POST['lastName'] == null ? "" :  ucwords($_POST['lastName']) ;
        $phone_number = $_POST['phone_number'] == null ? "" : $_POST['phone_number'] ;
        $qad = $_POST['qad'] == null ? "" : "'". $_POST['qad'] ."'";
        $shana = $_POST['shana'] == null ? "" : "'". $_POST['shana'] ."'" ;
        $astin = $_POST['astin'] == null ? "" : "'". $_POST['astin'] ."'";
        $baghal = $_POST['baghal'] == null ? "" : "'". $_POST['baghal'] ."'" ;
        $kamar = $_POST['kamar'] == null ? "" : "'". $_POST['kamar'] ."'" ;
        $soorin = $_POST['soorin'] == null ? "" : "'". $_POST['soorin'] ."'" ;
        $tir_pesht = $_POST['tir_pesht'] == null ? "" : "'". $_POST['tir_pesht'] ."'" ;
        $balai_tana = $_POST['balai_tana'] == null ? "" :"'". $_POST['balai_tana']."'" ;
        $bazo = $_POST['bazo'] == null ? "" :"'". $_POST['bazo'] ."'";
        $moch = $_POST['moch'] == null ? "" :"'". $_POST['moch'] ."'";
        $tokma_dropdown = $_POST['tokma_dropdown'] == null ? "" : $_POST['tokma_dropdown'] ;
        $chak_dropdown = $_POST['chak_dropdown'] == null ? "" : $_POST['chak_dropdown'] ;
        $yakhan_dropdown = $_POST['yakhan_dropdown'] == null ? "" : $_POST['yakhan_dropdown'] ;
        $daman_dropdown = $_POST['daman_dropdown'] == null ? "" : $_POST['daman_dropdown'] ;
        $amount = $_POST['amount'] == null ? "" :  $_POST['amount'] ;
        $curDate = $_POST['curDate'];
        $dueDate = $_POST['dueDate'] == null ? "" : $_POST['dueDate'] ;
        $price = $_POST['price'] == null ? "" : $_POST['price'] ;
        $paid = $_POST['paid'] == null ? "" : $_POST['paid'] ;
        $verified = isset($_POST['verified']) ? $_POST['verified'] : "NULL";

        //redirect to EditKurti page with all data in input fields
        function redirectPage($error){
            redirect_to("editKurti.php?a=".$_POST['save']."&b=".$_POST['dbName']."&$error=false");
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
        }elseif ($verified != "NULL" && !checkNum($verified)){
            redirectPage("verifiedErr");
            exit;
        }else{

            //save into database
            $sql = "SELECT company_id FROM users WHERE id = ".dc($_SESSION['id']);
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result);
            $company_id = (int) $row['company_id'];
            $first_name = "'". $first_name . "'";
            $last_name = "'". $last_name ."'";
            //start transation here and insert data in all tables
            //example: into tables companies_customer(DONE), users(DONE), Kurti(DONE) and orders(DONE). 
            
            try {
                
                $sql = "SELECT COUNT(*) as c FROM users WHERE NOT id = ".$_POST['save']." AND phone_number = $phone_number ;";
                $result = mysqli_query($db, $sql);
                $row = mysqli_fetch_assoc($result);
                if( intval($row['c']) > 0){
                    redirectPage("phoneExsit"); //custom function
                    exit;
                }
                
                $db->begin_transaction();
                
                $query1 = "UPDATE users SET first_name = $first_name, last_name = $last_name, phone_number=$phone_number, verified=$verified, updated_at = CURRENT_TIMESTAMP WHERE id =".$_POST['save'].";";
                if(!mysqli_query($db, $query1)){
                    $db->rollback();
                    redirectPage("failed"); //custom function
                    exit;
                }
                
                $dueDate = "'". $dueDate ."'";
                $query3 = "INSERT INTO orders(customer_id, product_type, product_amount, due_date, price, paid) ";
                $query3 .= "VALUES('".$_POST['save']."', 'kurti', $amount, $dueDate, $price, $paid)";
                if(!mysqli_query($db, $query3)){
                    $db->rollback();
                    redirectPage("failed"); //custom function
                    exit;
                }
                
                if(!isset($_POST['noInfo'])){

                    $query4 = "UPDATE kurti SET qad=$qad, shana=$shana, astin=$astin,  baghal=$baghal, kamar=$kamar,  soorin=$soorin, ";
                    $query4 .= " tir_pesht=$tir_pesht, balai_tana=$balai_tana,  bazo=$bazo, moch=$moch, tokma_id=$tokma_dropdown, ";
                    $query4 .= " chak_id=$chak_dropdown, yakhan_id=$yakhan_dropdown, daman_id=$daman_dropdown, updated_at = CURRENT_TIMESTAMP ";
                    $query4 .= "WHERE customer_id =".$_POST['save'].";";
                    
                    if(!mysqli_query($db, $query4)){
                        $db->rollback();
                        redirectPage("failed"); //custom function
                        exit;
                    }
                    $db->commit();
                    redirect_to("editKurti.php?a=".$_POST['save']."&b=".$_POST['firstName']."&successfully=true"); //custom function
                    exit;
                }else{

                    $query4 = "INSERT INTO kurti(customer_id, qad, shana, astin,  baghal, kamar,  soorin, tir_pesht, balai_tana,  bazo, moch, tokma_id, chak_id, yakhan_id, daman_id) ";
                    $query4 .= "VALUES('".$_POST['save']."', $qad, $shana, $astin, $baghal, $kamar, $soorin, $tir_pesht, $balai_tana, $bazo, $moch, $tokma_dropdown, $chak_dropdown, $yakhan_dropdown, $daman_dropdown);";
                    if(!mysqli_query($db, $query4)){
                        $db->rollback();
                        redirectPage("failed"); //custom function
                        exit;
                    }
                    $db->commit();
                    redirect_to("editKurti.php?a=".$_POST['save']."&b=".$_POST['firstName']."&successfully=true"); //custom function //custom function
                    exit;
                }
                
            } catch (Exception $e){
                $db->rollback();
                redirectPage("failed"); //custom function
            }

        }
        
    }
?>