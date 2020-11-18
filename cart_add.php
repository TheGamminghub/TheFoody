<?php
require 'includes/common.php';
if (!isset($_SESSION['email'])) {
    header('location: login.php');
}
    $item_id = $_POST['item'];
    $cost =  $_POST['cost'];
    $user_id = $_SESSION['user_id'];

    $sql = "SELECT * FROM users_items WHERE item_id = '$item_id'and order_status='Added to cart' ";
    $result = mysqli_query($con, $sql)or die($mysqli_error($con));
    $num = mysqli_num_rows($result);
  
    if ($num != 0) {
        $_SESSION['Error'] ="Item is Already in Cart";
        header('location: menu.php');
      exit();
      
    }
    else{
        $query = "INSERT INTO users_items(user_id, item_id,quantity,cost,order_status,order_on,order_time) VALUES('$user_id', '$item_id',1,'$cost', 'Added to cart',now(),curtime())";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $_SESSION['Error'] ="Item is Added To Cart";
        header('location: menu.php');
        exit();
        
    }
    
?>
