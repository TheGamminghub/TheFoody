<?php
ob_start();
require("../includes/common.php");
?>

<!doctype html>
<html lang="en">
<head>
    <?php include("includes/header.php") ?>
</head>
<body>

<div class="wrapper">
<?php include("includes/sidebar.php") ?>
    

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Orders</a>
                </div>
                <?php include("includes/nav.php") ?>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
            <?php
                if(isset($_GET["m"])){
                    echo $_GET['m'];
                  }
                  ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Orders Detail</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                
                                <table class="table table-striped">
                                    <tbody>

                                    <?php
                                  
                                  if (isset($_POST['res_id'])) {
                                      
                                    $res_id =$_POST['res_id'];
                                                  
                                   
                                    $user_id = $_SESSION['user_id'];
                                    $query = "SELECT order_id,user_id,quantity,cost,order_status,order_on,order_time,quantity, users.name as username ,users.email as email ,users.phone as phone, items.product_id as product_id, items.product_name as product_name,items.image as image FROM users_items  JOIN users on users.id = users_items.user_id JOIN items on items.product_id =users_items.item_id WHERE users_items.order_id ='$res_id'";
                                    $select_order = mysqli_query($con,$query);
                                  
                                    while($row = mysqli_fetch_assoc($select_order)) {
                                        $order_id = $row['order_id'];
                                        $username = $row['username'];
                                        $email = $row['email'];
                                        $phone = $row['phone'];
                                        $order_on = $row['order_on'];
                                        $order_time = $row['order_time'];
                                        $quantity = $row['quantity'];
                                        $cost = $row['cost'];
                                        
                                        $product_name = $row['product_name'];
                                        $product_image = $row['image'];          
                                        $order_status = $row['order_status'];  
                                        $product_id = $row['product_id'];                            
                                    ?>
                                   
                                        <tr>
                                            <th>ID</th>       
                                            <th>Item Name</th>                                                                           
                                            <th>User Name</th>                                                                           
                                            <th>Order On</th>
                                            <th>Status</th>                                           
                                            <th>Actions</th>                                                                                        
                                        </tr>

                                        <tr>                                        
                                            <td><?php echo $order_id ?></td>                                                                                       
                                            <td><?php echo $product_name ?></td>                                                                                       
                                            <td><?php echo $username ?></td>                                                                                       
                                            <td><?php echo $order_on ?></td>
                                            <?php 
                                            if($order_status =="Order Confirmed") {
                                              ?>                           
                                            <td><span class="label label-success"><?php echo $order_status ?></span></td>
                                            <?php }else{ ?> 
                                            <td><span class="label label-warning"><?php echo $order_status ?></span></td>
                                            <?php } ?>
                                            
                                            <td>
                                            <form method="POST" action="res_details_confirm.php">
                                        
                                            <input type="hidden" name="order_confirm" value="<?= $order_id ?>" />

                                            <button type="submit" class="btn btn-sm btn-success  ti-check" title="Confirm"  ></button>
                                            </form>
                                            <form method="POST" action="res_details_confirm.php">
                                        
                                            <input type="hidden" name="order_pending" value="<?= $order_id ?>" />

                                            <button type="submit" class="btn btn-sm btn-danger  ti-close" title="Pending"  ></button>
                                            </form>
                                            <!-- <?php// echo "<td><a href='res_details.php?pending=$id'>Order Confirm</a></td>"; ?>
                                            <?php //echo "<td><a href='res_details.php?confirm=$id'>Order Pending</a></td>"; ?> -->
                                                
                                                
                                            </td>
                                        </tr>
                                    
                                       
                                    </tbody>

                                </table>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                        <div class="header">
                                <h4 class="title">Orders Detail</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <tbody>
                        
                                        <tr>
                                            <td>Order ID</td>
                                            <td><?php echo $order_id ?></td> 
                                        </tr>
                                       
                                        <tr>
                                            <td>Order By</td> 
                                            <td><?php echo $username ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td> 
                                            <td><?php echo $email ?></td>
                                        </tr>
                                        <tr>
                                            <td>Phone </td> 
                                            <td><?php echo $phone ?></td>
                                        </tr>
                                        <tr>
                                            <td>Order Date</td>
                                            <td><?php echo $order_on ?></td> 
                                        </tr>
                                        <tr>
                                            <td>Order Time</td>
                                            <td><?php echo $order_time ?></td> 
                                        </tr>
                                       
                                       
                                    </tbody>
                                </table>    
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                        <div class="header">
                                <h4 class="title">Items Detail</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <tbody>
                        
                                        <tr>
                                            <td>Item ID</td>
                                            <td><?php echo $product_id ?></td> 
                                        </tr>
                                        <tr>
                                            <td>Item Name</td> 
                                            <td><?php echo $product_name ?></td>
                                        </tr>
                                        <tr>
                                            <td>Item Image</td> 
                                            <td><img src="images/<?php echo $product_image ?>" alt="" class="img-thumbnail"
                                                 style="width: 5em"></td>
                                        </tr>
                                        <tr>
                                            <td>Quantity</td> 
                                            <td><?php echo $quantity ?></td>
                                        </tr>
                                        <tr>
                                            <td>Price </td>
                                            <td>Rs. <?php echo $cost ?></td> 
                                        </tr>
                                        
                                       
                                        <?php }} ?>
                                    </tbody>
                                </table>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>      
        <?php include("includes/footer.php") ?>
</div>
</div>
</body>
<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
</html>
