<?php  
    include("../../config/config.php");
    include("../../config/userAuth.php");

    if(isset($_POST['date'])){
        $sql = "SELECT company_id FROM users WHERE id = ".dc($_SESSION['id']);
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
        $company_id = $row['company_id'];
        
        $sql = "SELECT users.first_name, orders.product_type, orders.product_amount,orders.id, orders.created_at ";
        $sql .= " FROM users INNER JOIN orders on users.id = orders.customer_id ";
        $sql .= " WHERE users.company_id = ".$company_id." AND users.role_id = 3;";
        $result = mysqli_query($db, $sql);
        if($result){
            $row = array();
            foreach($result as $d){
                $reg_date = $d['created_at'];
                $sub_date = substr($reg_date, 0, 10);
                if( $sub_date == $_POST['date']){
                    $row[] = $d;
                }
            }
            header('Content-type: application/json');
            print_r(json_encode($row));
            exit;
        }else{
            echo 'not exist';
        }

    }else{
        echo 'not exist';
    }
?>