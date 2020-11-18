<?php
require("includes/common.php");
if (!isset($_SESSION['email'])) {
    header('location: login.php');
}
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
            <h1 class="mb-2 bread">Book a Table</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Reservation <i class="ion-ios-arrow-forward"></i></span></p>
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
		          	<span class="subheading">Book a table</span>
		            <h2 class="mb-4">Make Reservation</h2>
		          </div>
	            <form action="reservation_submit.php" method="POST">
	              <div class="row">
				  	<div class="col-md-12">
						<div class="form-group">
						<?php 
                  		if( isset($_SESSION['Error1']) )
                  		  {
                  		?>
		
                  		  <span class="alert alert-danger alert-dismissible fade show " role="alert">
                  		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  		    <span aria-hidden="true">&times;</span>
                  		  </button>
                  		  <?php
                  		    echo $_SESSION['Error1'];
                  		    unset($_SESSION['Error1']);
                  		  ?>
                  		  </span>
                  		  <?php }
                  		  ?>
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
						</div>					  
					</div>
	                <div class="col-md-6">
	                  <div class="form-group">
	                    <label for="">Name</label>
	                    <input type="text" class="form-control" name="res_name" placeholder="Your Name" required>
	                  </div>
	                </div>
	                <div class="col-md-6">
	                  <div class="form-group">
	                    <label for="">Email</label>
	                    <input type="email" class="form-control" name="res_email" placeholder="Your Email" required>
	                  </div>
	                </div>
	                <div class="col-md-6">
	                  <div class="form-group">
	                    <label for="">Phone</label>
	                    <input type="text" class="form-control" name="res_phone" placeholder="Phone" pattern="[0-9]+"  maxlength="10" required>
	                  </div>
	                </div>
	                <div class="col-md-6">
	                  <div class="form-group">
	                    <label for="">Date</label>
	                    <input type="date" class="form-control" name="date"  placeholder="Date" required>
	                  </div>
	                </div>
	                <div class="col-md-6">
	                  <div class="form-group">
	                    <label for="">Time</label>
	                    <input type="time" class="form-control" name="time" min="09:00" max="18:00" placeholder="Time" required>
	                  </div>
	                </div>
	                <div class="col-md-6">
	                  <div class="form-group">
	                    <label for="">Person</label>
	                    <div class="select-wrap one-third">
	                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	                      <select name="person" id="" class="form-control" required>
	                        <option >Person</option>
	                        <option value="1">1</option>
	                        <option value="2">2</option>
	                        <option value="3">3</option>
	                        <option value="4+">4+</option>
	                      </select>
	                    </div>
	                  </div>
	                </div>
	                <div class="col-md-12 mt-3">
	                  <div class="form-group">
	                    <input type="submit" value="Make a Reservation" class="btn btn-primary py-3 px-5">
	                  </div>
	                </div>
	              </div>
	            </form>
	          </div>
            </div>
                <div class="col-md-6 d-flex align-items-stretch pb-5 pb-md-0 ftco-section ftco-wrap-about">
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