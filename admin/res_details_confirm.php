<?php 
require("../includes/common.php");
if(isset($_POST['confirm_id'])){
    $confirm_id =$_POST['confirm_id'];
    $sql = "UPDATE reservation SET status = 'Confirmed' WHERE res_id = '$confirm_id'";
    $confirm_status = mysqli_query($con,$sql);
        if(!$confirm_status) {
            die("Query Failed" . mysqli_error($confirm_status));
        }
        else{
            
            $m = "Table Status is Confirmed";

        header('Location: reservation.php?m='.$m);
        exit();
        }
}
if(isset($_POST['pending_id'])){
    $pending_id =$_POST['pending_id'];
    $query = "UPDATE reservation SET status = 'Pending' WHERE res_id = '$pending_id'";
    $pending_status = mysqli_query($con,$query);
        if(!$pending_status) {
            die("Query Failed" . mysqli_error($pending_status));
        }
        else{
            $m1 = "Table Status Changed to is Pending";

        header('Location: reservation.php?m='.$m1);
            exit();
            }
    }

    if(isset($_POST['order_confirm'])){
        $confirm_id =$_POST['order_confirm'];
        $sql = "UPDATE users_items SET order_status = 'Order Confirmed' WHERE order_id = '$confirm_id'";
        $confirm_status = mysqli_query($con,$sql);
            if(!$confirm_status) {
                die("Query Failed" . mysqli_error($confirm_status));
            }
            else{
                
                $m = "Order is Confirmed";
    
            header('Location: orders.php?m='.$m);
            exit();
            }
    }
    if(isset($_POST['order_pending'])){
        $pending_id =$_POST['order_pending'];
        $query = "UPDATE users_items SET order_status = 'Order Pending' WHERE order_id = '$pending_id'";
        $pending_status = mysqli_query($con,$query);
            if(!$pending_status) {
                die("Query Failed" . mysqli_error($pending_status));
            }
            else{
                $m1 = "Order Status Changed to is Pending";
    
            header('Location: orders.php?m='.$m1);
                exit();
                }
        }
    
    
  
 ?>
