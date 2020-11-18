<?php
ob_start();
require("includes/common.php");
if (!isset($_SESSION['email'])) {
  header('location: login.php');
}
$user_id = $_SESSION['user_id'];
$sql = "SELECT  res_id,res_name,res_email,res_phone,date,time,person,status FROM reservation WHERE user_id = '" . $_SESSION['user_id'] . "'";
$select_users = mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include('includes/header.php') ?>
  </head>
  <body>
    <!-- nav bar -->
    <?php include('includes/nav.php') ?>

    <!-- END nav -->
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center mb-4">
            <h1 class="mb-2 bread">Your Reservation</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Reservation <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		
    <section class="ftco-section ftco-no-pt ftco-no-pb">
			<div class="container-fluid px-0">
				<div class="row d-flex no-gutters">
          <div class="col-md-10 order-md-last ftco-animate makereservation p-4 p-md-5 pt-5">
          	<div class="py-md-5">
	          	<div class="heading-section ftco-animate mb-5">
		          	<span class="subheading">Your Booking </span>
		            <h2 class="mb-4">Reservation Status</h2>
		          </div>
	            
	              <div class="row">
				  	<div class="col-md-12">
            <?php if (mysqli_num_rows($select_users) >= 1) {
                            ?>       
                        <h2>Booking Details</h2>
                        <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                        <thead class="form-group">
                            <tr>
                                <th>Booking ID</th>
                                <th>Booker Name </th>
                                <th>Email</th>
                                <th>phone</th>
                                <th>Booked For</th>
                                <th>Reserved Time</th>
                                <th>No Of Person</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>  
                        <tbody>
                        <?php
                        while($row = mysqli_fetch_assoc($select_users)) {
                            $res_id = $row['res_id'];
                            $res_name = $row['res_name'];
                            $res_email = $row['res_email'];
                            $res_phone = $row['res_phone'];
                            $res_date = $row['date'];
                            $res_time = $row['time'];
                            $res_person = $row['person'];
                            $res_status = $row['status'];                        
                        ?>
                            <tr>
                                <td><?php echo $row['res_id']; ?></td>
                                <td><?php echo $row['res_name']; ?></td>
                                <td><?php echo $row['res_email']; ?></td>
                                <td><?php echo $row['res_phone']; ?></td>
                                <td><?php echo $row['date']; ?></td>
                                <td><?php echo $row['time']; ?></td>
                                <td><?php echo $row['person']; ?></td>
                                <?php 
                                    if($res_status == "Confirmed") {
                                      ?>                           
                                    <td><span class="badge badge-success"><?php echo $res_status ?></span></td>
                                    <?php }else{ ?> 
                                    <td><span class="badge badge-warning"><?php echo $res_status ?></span></td>
                                    <?php } ?>
                                <td>
                                <?php if($res_status == "Pending") {?>
                                <form method="GET" action="table_reservation.php">                                       
                                  <input type="hidden" name="delete_id" value="<?= $res_id ?>" />
                                  <button type="submit" class="btn btn-primary  " title="Delete"  ><span class="oi oi-trash"></span></button>
                                </form>
                                <?php }else {?>
                                  <button class="btn btn-primary  " title="Cannot Cancel Confirm Booking"  ><span class="oi oi-ban"></span></button>
                                <?php }?>
                                </td>
                            </tr>
                            <?php } ?>

                        </tbody>
                                                     
                        </table>
                        </div>
                        <?php
                       }else {
                            echo "<center><h2>No Booking Found!</h2></center>";
                        }?>  


                        <?php 
                        if( isset($_SESSION['Error']) )
                          {
                        ?>

                          <span class="alert alert-success alert-dismissible fade show " role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <?php
                            echo $_SESSION['Error'];
                            unset($_SESSION['Error']);
                          ?>
                          </span>
                          <?php }
                          ?> 
                        <?php 

                        if (isset($_GET['delete_id'])) {                            
                            $delete_id = $_GET['delete_id'];
                            // echo "$delete_id";
                            $query = "DELETE FROM reservation WHERE res_id = {$delete_id} ";

                            $delete_bus = mysqli_query($con,$query);
                            if(!$delete_bus) {
                                die("Query Failed" . mysqli_error($delete_bus));
                            }  
                                                                          
                            $_SESSION['Error'] = "Reservation Cancelled successfully"; 
                            header('location: table_reservation.php');  
                            exit();
                                           
                        }

                        ?>
	                  </div>
	                </div>	          
	          </div>
            </div>
                <div class="col-md-2 d-flex align-items-stretch pb-5 pb-md-0 ftco-section ftco-wrap-about">
                    <div class="col-md-12 d-flex">
					    <div class="img img-1 mr-md-2" style="background-image: url(images/image_6.jpg);"></div>
					</div>
			    </div>
           </div>
		</div>
    </section>
    
    <section class="ftco-section bg-light">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-2">
                    <div class="col-md-12 text-center heading-section ftco-animate">
          	            <span class="subheading">Timing</span>
                        <h2 class="mb-4">Booking Services</h2>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
						<pc class="time">
							<span>Mon - Fri <strong>8 AM - 11 PM</strong></span>
							<span><a href="#">+ 1-978-123-4567</a></span>
						</p>
                    </div>
                </div>
            </div>
    </section>        
    


    <!-- Footer -->
    <?php include("includes/footer.php") ?>

    <!-- footer end -->
    <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
  
  <?php include("includes/script.php") ?>
    
    </body>
  </html>