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
                    <a class="navbar-brand" href="#">Reservation</a>
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
                                <h4 class="title">Reservation</h4>
                                <p class="category">List of Reservation</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">                    
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Booked ON</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    // $user_id = $_SESSION['user_id'];
                                    $query = "SELECT res_id,res_name,res_email,res_phone,time,person,status,user_id,bookedon,reservation.date as res_date ,users.name as username FROM reservation JOIN users on users.id = reservation.user_id ";
                                    $select_users = mysqli_query($con,$query);
                                    
                                    while($row = mysqli_fetch_assoc($select_users)) {
                                        $res_id = $row['res_id'];
                                        $res_name = $row['username'];
                                        $res_email = $row['res_email'];
                                        $res_phone = $row['res_phone'];
                                        $res_date = $row['res_date'];
                                        $res_time = $row['time'];
                                        $res_person = $row['person'];
                                        $res_status = $row['status'];
                                        $res_bookedon = $row['bookedon'];
                                        
                                    ?>
                                    <tr>

                                        <td><?php echo $res_id ?></td> 
                                        <td><?php echo $res_name ?></td>
                                        <td><?php echo $res_email ?></td>
                                        <td><?php echo $res_phone ?></td> 
                                        <td><?php echo $res_bookedon ?></td> 

                                        <?php 
                                        if($res_status =="Confirmed") {
                                          ?>                           
                                        <td><span class="label label-success"><?php echo $res_status ?></span></td>
                                        <?php }else{ ?> 
                                        <td><span class="label label-warning"><?php echo $res_status ?></span></td>
                                        <?php } ?>
                                        <td>
                                        
                                        
                                        <form method="POST" action="res_details.php">
                                        
                                            <input type="hidden" name="res_id" value="<?= $row['res_id']; ?>" />

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
