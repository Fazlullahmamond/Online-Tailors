<?php  
    include("../../config/config.php");
    include("../../config/userAuth.php");

    if(isset($_POST['date'])){
        
        $sql = "SELECT company_id FROM users WHERE id = ".dc($_SESSION['id']);
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
        $company_id = $row['company_id'];

        $sql = "SELECT orders.product_type, orders.product_amount, orders.due_date FROM users INNER JOIN orders ON users.id = orders.customer_id WHERE users.company_id = ".$company_id.";";
        $result = mysqli_query($db, $sql);
        if($result){
            $row = array();
            foreach($result as $d){
                $reg_date = substr($d['due_date'], 0, 7);
                $cur_date = substr($_POST['date'], 0, 7);
                if($reg_date == $cur_date){
                    $row[] = $d;
                }
            }
            header('Content-type: application/json');
            print_r(json_encode($row));
            exit;
        }else{
            echo 'noInfo';
        }

    }else{
        echo 'noInfo';
    }
?>