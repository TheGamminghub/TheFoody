<?php
require("includes/common.php");
if (!isset($_SESSION['email'])) {
  header('location: login.php');
}
$user_id = $_SESSION['user_id'];
$sql = "SELECT id,name,email,phone,address,city,date FROM users WHERE id = '" . $_SESSION['user_id'] . "'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);

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
            <h1 class="mb-2 bread">User Profile</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>User Profile <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		
    <section class="ftco-section ftco-no-pt ftco-no-pb">
			<div class="container-fluid px-0">
				<div class="row d-flex no-gutters">
          <div class="col-md-6 order-md-last ftco-animate makereservation p-4 p-md-5 pt-5">
          	<div class="py-md-5">
	          	<div class="heading-section ftco-animate mb-5">
		          	<span class="subheading">Users Profile </span>
		            <h2 class="mb-4"> Your Profile</h2>
		          </div>
	            
	              <div class="row">
				  	<div class="col-md-12">
                      
                      <div class="jumbotron">
                        <h2>User Details</h2>
                        <table class="table table-bordered">
                            <tr>
                                <th>User ID</th>
                                <td><?php echo $row['id']; ?></td>

                            </tr>
                            <tr>
                                <th>User Name</th>
                                <td><?php echo $row['name']; ?></td>

                            </tr> 
                             
                            <tr>
                                <th>Email</th>
                                <td><?php echo $row['email']; ?></td>

                            </tr>
                            <tr>
                                <th>phone</th>
                                <td><?php echo $row['phone']; ?></td>

                            </tr>
                            <tr>
                                <th>City</th>
                                <td><?php echo $row['city']; ?></td>

                            </tr>
                            <tr>
                                <th>Address</th>
                                <td><?php echo $row['address']; ?></td>
                            </tr>
                            <tr>
                                <th>Join On</th>
                                <td><?php echo $row['date']; ?></td>
                            </tr>
                        </table>
	                    
	                  </div>
	                </div>
	                </div> 
	             
	          
	          </div>
            </div>
                <div class="col-md-6 d-flex align-items-stretch pb-5 pb-md-0 ftco-section ftco-wrap-about">
                    <div class="col-md-12 d-flex">
					    <div class="img img-1 mr-md-2" style="background-image: url(images/image_4.jpg);"></div>
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