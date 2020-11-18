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
                    <a class="navbar-brand" href="#">Reservation</a>
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
                                <h4 class="title">Reservation Detail</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                
                                <table class="table table-striped">
                                    <tbody>

                                    <?php
                                  
                                  if (isset($_POST['res_id'])) {
                                      
                                    $res_id =$_POST['res_id'];
                                                  
                                   
                                    $user_id = $_SESSION['user_id'];
                                    $query = "SELECT * from reservation where res_id = $res_id ";
                                    $select_users = mysqli_query($con,$query);
                                  
                                    while($row = mysqli_fetch_assoc($select_users)) {
                                        $id = $row['res_id'];
                                        $res_name = $row['res_name'];                                      
                                        $res_email = $row['res_email'];
                                        $res_phone = $row['res_phone'];
                                        $res_date = $row['date'];
                                        $res_time = $row['time'];
                                        $res_person = $row['person'];
                                        $res_status = $row['status'];                                 
                                        $res_bookedon = $row['bookedon'];                                 
                                    ?>
                                   
                                        <tr>
                                            <th>ID</th>                                                                                  
                                            <th>Booked On</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                            
                                            
                                        </tr>

                                        <tr>                                        
                                            <td><?php echo $id ?></td>                                                                                       
                                            <td><?php echo $res_bookedon ?></td>
                                            <?php 
                                            if($res_status =="Confirmed") {
                                              ?>                           
                                            <td><span class="label label-success"><?php echo $res_status ?></span></td>
                                            <?php }else{ ?> 
                                            <td><span class="label label-warning"><?php echo $res_status ?></span></td>
                                            <?php } ?>
                                            
                                            <td>
                                            <form method="POST" action="res_details_confirm.php">
                                        
                                            <input type="hidden" name="confirm_id" value="<?= $id ?>" />

                                            <button type="submit" class="btn btn-sm btn-success  ti-check" title="Confirm"  ></button>
                                            </form>
                                            <form method="POST" action="res_details_confirm.php">
                                        
                                            <input type="hidden" name="pending_id" value="<?= $id ?>" />

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
                                <h4 class="title">Booking Detail</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <tbody>
                        
                                        <tr>
                                            <td>ID</td>
                                            <td><?php echo $res_id ?></td> 
                                        </tr>
                                        <tr>
                                            <td>Booked For</td> 
                                            <td><?php echo $res_name ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td> 
                                            <td><?php echo $res_email ?></td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td> 
                                            <td><?php echo $res_phone ?></td>
                                        </tr>
                                        <tr>
                                            <td>Booked for Date</td>
                                            <td><?php echo $res_date ?></td> 
                                        </tr>
                                        <tr>
                                            <td>Booked For Time</td>
                                            <td><?php echo $res_time ?></td> 
                                        </tr>
                                        <tr>
                                            <td>No oF Person</td>
                                            <td><?php echo $res_person ?></td> 
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
