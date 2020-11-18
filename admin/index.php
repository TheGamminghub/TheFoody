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
<?php 
        
        $sql = mysqli_query ($con,"SELECT * FROM items ");
        $products = mysqli_num_rows($sql);
        
        $sql = mysqli_query ($con,"SELECT * FROM users ");
        $user = mysqli_num_rows($sql);

        $sql = mysqli_query ($con,"SELECT * FROM users_items where order_status='Order Confirmed' ");
        $orders = mysqli_num_rows($sql);

        $sql = mysqli_query ($con,"SELECT * FROM users_items where order_status='Order Pending' ");
        $pending = mysqli_num_rows($sql);

        $sql = mysqli_query ($con,"SELECT * FROM users_items where order_status IN ('Order Pending','Order Confirmed') ");
        $total_order = mysqli_num_rows($sql);

        $sql = mysqli_query ($con,"SELECT * FROM reservation where status = 'Pending'");
        $res_pending = mysqli_num_rows($sql);

        $sql = mysqli_query ($con,"SELECT * FROM reservation where status = 'Confirmed'");
        $res_confirm = mysqli_num_rows($sql);
        
        $sql = mysqli_query ($con,"SELECT * FROM reservation where status IN ('Pending','Confirmed') ");
        $res_total = mysqli_num_rows($sql);
        
        
        ?>

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
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <?php include("includes/nav.php") ?>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-archive"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Products</p>
                                            <?php echo $products ; ?> 
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr/>
                                    <div class="stats">
                                    <a href="view_product.php">    <i class="ti-panel"></i> Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-info text-center">
                                            <i class="ti-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Users</p>
                                            <?php echo $user ; ?> 
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr/>
                                    <div class="stats">
                                    <a href="users.php">    <i class="ti-panel"></i> Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-shopping-cart"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Order Pending</p>
                                            <?php echo $pending ; ?> 
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr/>
                                    <div class="stats">
                                    <a href="orders.php">    <i class="ti-panel"></i> Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-shopping-cart-full"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Orders Confirmed</p>
                                            <?php echo $orders ; ?> 
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr/>
                                    <div class="stats">
                                    <a href="orders.php">    <i class="ti-panel"></i> Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-watch_later text-center">
                                            <i class="ti-shopping-cart-full"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Total Orders</p>
                                            <?php echo $total_order ; ?> 
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr/>
                                    <div class="stats">
                                        <i class="ti-panel"></i> Details
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-calendar"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Reservation Pending</p>
                                            <?php echo $res_pending ; ?> 
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr/>
                                    <div class="stats">
                                        <i class="ti-panel"></i> Details
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-calendar"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Reservation Confirmed</p>
                                            <?php echo $res_confirm ; ?> 
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr/>
                                    <div class="stats">
                                        <i class="ti-panel"></i> Details
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-watch text-center">
                                            <i class="ti-calendar"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Total Reservation</p>
                                            <?php echo $res_total ; ?> 
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr/>
                                    <div class="stats">
                                        <i class="ti-panel"></i> Details
                                    </div>
                                </div>
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
