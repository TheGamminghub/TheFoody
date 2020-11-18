<?php
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
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                        <?php
                        if(isset($_GET["m"])){?>
                        <span class="alert alert-success"><?php echo $_GET['m']; }?></span>
                        
                        <?
                        }
                        ?>
                            <div class="header">
                                <h4 class="title">Orders</h4>
                                <p class="category">List of Orders</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">                    
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Item Name</th>
                                        <th>Email</th>
                                        <th>User Name</th>
                                        <th>Order ON</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    // $user_id = $_SESSION['user_id'];
                                    $query = "SELECT order_id,user_id,quantity,cost,order_status,order_on, users.name as username ,users.email as email ,users.phone as phone, items.product_name as product_name,items.image as image FROM users_items  JOIN users on users.id = users_items.user_id JOIN items on items.product_id =users_items.item_id WHERE order_status IN ('Order Pending','Order Confirmed') ORDER BY order_id ASC";
                                    $select_users = mysqli_query($con,$query);
                                    
                                    while($row = mysqli_fetch_assoc($select_users)) {
                                        $order_id = $row['order_id'];
                                        $username = $row['username'];
                                       
                                        
                                        $order_on = $row['order_on'];
                                        $product_name = $row['product_name'];
                                        $product_image = $row['image'];                                                                     
                                        $order_status = $row['order_status'];                                                                      
                                    ?>
                                    <tr>

                                        <td><?php echo $order_id ?></td> 
                                        <td><?php echo $product_name ?></td> 
                                        <td><img src="images/<?php echo $product_image ?>" alt="" class="img-thumbnail"
                                                 style="width: 5em"></td>
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
                                                                                
                                        <form method="POST" action="orders_details.php">
                                        
                                            <input type="hidden" name="res_id" value="<?= $row['order_id']; ?>" />

                                            <button type="submit" class="btn btn-sm btn-primary  ti-view-list-alt" title="Details"  ></button>
                                        </form>                                                                                                                                    
                                        </td>                                       
                                        
                                    </tr>
                                    <?php } ?>

                                    </tbody>
                                    </table>
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
