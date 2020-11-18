<?php
ob_start();
require("includes/common.php");
if (!isset($_SESSION['email'])) {
  header('location: login.php');
}
$user_id = $_SESSION['user_id'];

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
		          	<span class="subheading">Your Order </span>
		            <h2 class="mb-4">Orders Status</h2>
		          </div>
	            
	                <div class="row">
				  	        <div class="col-md-12">
                      <div class="content">
                          <div class="container-fluid">
                              <div class="row">

                                  <div class="col-md-12">
                                      <div class="card">
                                      
                                      <?php 
                                      $query = "SELECT order_id,user_id,quantity,cost,order_status,order_on, users.name as username ,users.email as email ,users.phone as phone, items.product_name as product_name,items.image as image FROM users_items JOIN users on users.id = users_items.user_id JOIN items on items.product_id =users_items.item_id WHERE users.id ='$user_id' AND order_status IN ('Order Pending','Order Confirmed') ";
                                      $select_users = mysqli_query($con,$query);
                                      if (mysqli_num_rows($select_users) >= 1) {
                                          ?>       
                                          <div class="content table-responsive table-full-width">
                                              <table class="table table-striped">                    
                                                  <thead>
                                                  <tr>
                                                      <th>ID</th>
                                                      <th>Item Name</th>
                                                      <th>Item Image</th>                                       
                                                      <th>Order ON</th>
                                                      <th>Status</th>
                                                      <th>Details</th>
                                                  </tr>
                                                  </thead>
                                                  <tbody>
                                                  <?php
                                                  // $user_id = $_SESSION['user_id'];


                                                  while($row = mysqli_fetch_assoc($select_users)) {
                                                      $order_id = $row['order_id'];                                                                               
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

                                                      <td><?php echo $order_on ?></td>                                        
                                                      <?php 
                                                      if($order_status =="Order Confirmed") {
                                                        ?>                           
                                                      <td><span class="badge badge-success"><?php echo $order_status ?></span></td>
                                                      <?php }else{ ?> 
                                                      <td><span class="badge badge-warning"><?php echo $order_status ?></span></td>
                                                      <?php } ?>
                                                      <td>

                                                      <form method="POST" action="orders_details.php">
                                                      
                                                          <input type="hidden" name="res_id" value="<?= $row['order_id']; ?>" />
                                                      
                                                          <button type="submit" class="btn btn-primary  " title="Details"  >Order Details</button>
                                                      </form>                                                                                                                                    
                                                      </td>                                       
                                                      
                                                  </tr>
                                                  <?php } ?>
                                                      
                                                  </tbody>
                                                  </table>
                                              </table>
                                                      
                                          </div>
                                          <?php
                                          }else {
                                               echo "<center><h2>No Orders Found!</h2></center>";
                                           }?>                      
                                      </div>
                                  </div>
                                  
                              </div>
                          </div>
                    </div>        

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