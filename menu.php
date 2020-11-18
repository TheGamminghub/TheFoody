<?php

require("includes/common.php");
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
            <h1 class="mb-2 bread">Specialties</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Menu <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>


		<section class="ftco-section">
    	<div class="container">
		<div class="col-md-12">
						<div class="form-group">
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
        <div class="ftco-search">
					<div class="row">
            <div class="col-md-12 nav-link-wrap">
	            <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
	              <a class="nav-link ftco-animate active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Breakfast</a>

	              <a class="nav-link ftco-animate" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Lunch</a>

	              <a class="nav-link ftco-animate" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Dinner</a>

	              <a class="nav-link ftco-animate" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" role="tab" aria-controls="v-pills-4" aria-selected="false">Drinks</a>

	              <a class="nav-link ftco-animate" id="v-pills-5-tab" data-toggle="pill" href="#v-pills-5" role="tab" aria-controls="v-pills-5" aria-selected="false">Desserts</a>

	              <a class="nav-link ftco-animate" id="v-pills-6-tab" data-toggle="pill" href="#v-pills-6" role="tab" aria-controls="v-pills-6" aria-selected="false">Wine</a>

	            </div>
	          </div>
	          <div class="col-md-12 tab-wrap">
			  
	            <div class="tab-content" id="v-pills-tabContent">
                
	              <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="day-1-tab">
                    
	              	    <div class="row no-gutters d-flex align-items-stretch">
                          <?php
                            $query = "SELECT *  FROM  items WHERE product_category ='Breakfast' ";
                            $select_Breakfast = mysqli_query($con,$query);
                            while($row = mysqli_fetch_assoc($select_Breakfast)) {
                                $id = $row['product_id'];
                                $name = $row['product_name'];
                                $price = $row['product_price'];
                                $desc = $row['product_desc'];
                                $image = $row['image'];
                                ?>
					        <div class="col-md-12 col-lg-6 d-flex align-self-stretch">
					        	<div class="menus d-sm-flex ftco-animate align-items-stretch">					
									<input type="image" src="admin/images/<?php echo $image; ?>" class="menu-img img " alt="">
                                    <!-- <div class="menu-img img order-md-last " style="background-image: url(admin/images/<?php //echo $image; ?>);"></div> -->
					                <div class="text d-flex align-items-center">
												<div>
						          	    <div class="d-flex">
							                <div class="one-half">
							                  <h3><?php echo $name; ?></h3>
							                </div>
							                <div class="one-forth">
							                  <span class="price">Rs. <?php echo $price; ?></span>
							                </div>
							              </div>
							              <p><span><?php echo $desc; ?></span></p>
							              <?php 
                            				 if (!isset($_SESSION['email'])) { 
                            				?> 
							              <p><a href="login.php" class="btn btn-primary">Add to Cart</a></p>
							              <?php                            
                              				} 
                              				else {                                 
                                                                   
                                			?> 
										   <!-- <p><a href= 'cart_add.php?id=<?//=$id;?>' name="add" value="add" class="btn btn-primary">Add to Cart</a></p> -->
										   <p><form method="POST" action="cart_add.php">
                                        
                                            <input type="hidden" name="item" value="<?=$id?>" />
                                            <input type="hidden" name="cost" value="<?=$price?>" />
                                            <input type="hidden" name="image" value="<?=$image?>" />
                                            <input type="hidden" name="desc" value="<?=$desc?>" />
                                            <input type="hidden" name="name" value="<?=$name?>" />

                                            <button type="submit" value ="submit" class="btn btn-primary" title="Add to Cart">Add to Cart</button>
                                        	</form></p>
										  <?php                                 
                            				}                          
                             				?> 
						                </div>
					                </div>
					            </div>
					        </div>
                            <?php
                        }
                        ?> 
                        </div>
                        
	                </div>
                             

                 
	              <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-day-2-tab">
				  <div class="row no-gutters d-flex align-items-stretch">
                          <?php
                            $query = "SELECT *  FROM  items WHERE product_category ='Lunch' ";
                            $select_Breakfast = mysqli_query($con,$query);
                            while($row = mysqli_fetch_assoc($select_Breakfast)) {
                                $id = $row['product_id'];
                                $name = $row['product_name'];
                                $price = $row['product_price'];
                                $desc = $row['product_desc'];
                                $image = $row['image'];
                                ?>
					        <div class="col-md-12 col-lg-6 d-flex align-self-stretch">
					        	<div class="menus d-sm-flex ftco-animate align-items-stretch">					
									<input type="image" src="admin/images/<?php echo $image; ?>" class="menu-img img " alt="">
                                    <!-- <div class="menu-img img order-md-last " style="background-image: url(admin/images/<?php //echo $image; ?>);"></div> -->
					                <div class="text d-flex align-items-center">
												<div>
						          	    <div class="d-flex">
							                <div class="one-half">
							                  <h3><?php echo $name; ?></h3>
							                </div>
							                <div class="one-forth">
							                  <span class="price">Rs. <?php echo $price; ?></span>
							                </div>
							              </div>
							              <p><span><?php echo $desc; ?></span></p>
							              <?php 
                            				 if (!isset($_SESSION['email'])) { 
                            				?> 
							              <p><a href="login.php" class="btn btn-primary">Add to Cart</a></p>
							              <?php                            
                              				} 
                              				else {                                 
                                                                   
                                			?> 
										  <p><form method="POST" action="cart_add.php">
                                        
                                            <input type="hidden" name="item" value="<?=$id?>" />
                                            <input type="hidden" name="cost" value="<?=$price?>" />

                                            <button type="submit" value ="submit" class="btn btn-primary" title="Add to Cart">Add to Cart</button>
                                        	</form></p>
										  <?php                                 
                            				}                          
                             				?> 
						                </div>
					                </div>
					            </div>
					        </div>
                            <?php
                        }
                        ?> 
                        </div>
	              </div>

	              <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-day-3-tab">
				  <div class="row no-gutters d-flex align-items-stretch">
                          <?php
                            $query = "SELECT *  FROM  items WHERE product_category ='Dinner' ";
                            $select_Breakfast = mysqli_query($con,$query);
                            while($row = mysqli_fetch_assoc($select_Breakfast)) {
                                $id = $row['product_id'];
                                $name = $row['product_name'];
                                $price = $row['product_price'];
                                $desc = $row['product_desc'];
                                $image = $row['image'];
                                ?>
					        <div class="col-md-12 col-lg-6 d-flex align-self-stretch">
					        	<div class="menus d-sm-flex ftco-animate align-items-stretch">					
									<input type="image" src="admin/images/<?php echo $image; ?>" class="menu-img img " alt="">
                                    <!-- <div class="menu-img img order-md-last " style="background-image: url(admin/images/<?php //echo $image; ?>);"></div> -->
					                <div class="text d-flex align-items-center">
												<div>
						          	    <div class="d-flex">
							                <div class="one-half">
							                  <h3><?php echo $name; ?></h3>
							                </div>
							                <div class="one-forth">
							                  <span class="price">Rs. <?php echo $price; ?></span>
							                </div>
							              </div>
							              <p><span><?php echo $desc; ?></span></p>
							              <?php 
                            				 if (!isset($_SESSION['email'])) { 
                            				?> 
							              <p><a href="login.php" class="btn btn-primary">Add to Cart</a></p>
							              <?php                            
                              				} 
                              				else {                                 
                                                                   
                                			?> 
										  <p><form method="POST" action="cart_add.php">
                                        
                                            <input type="hidden" name="item" value="<?=$id?>" />
                                            <input type="hidden" name="cost" value="<?=$price?>" />

                                            <button type="submit" value ="submit" class="btn btn-primary" title="Add to Cart">Add to Cart</button>
                                        	</form></p>
										  <?php                                 
                            				}                          
                             				?> 
						                </div>
					                </div>
					            </div>
					        </div>
                            <?php
                        }
                        ?> 
                        </div>
	              </div>

	              <div class="tab-pane fade" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-day-4-tab">
				  <div class="row no-gutters d-flex align-items-stretch">
                          <?php
                            $query = "SELECT *  FROM  items WHERE product_category ='Drinks' ";
                            $select_Breakfast = mysqli_query($con,$query);
                            while($row = mysqli_fetch_assoc($select_Breakfast)) {
                                $id = $row['product_id'];
                                $name = $row['product_name'];
                                $price = $row['product_price'];
                                $desc = $row['product_desc'];
                                $image = $row['image'];
                                ?>
					        <div class="col-md-12 col-lg-6 d-flex align-self-stretch">
					        	<div class="menus d-sm-flex ftco-animate align-items-stretch">					
									<input type="image" src="admin/images/<?php echo $image; ?>" class="menu-img img " alt="">
                                    <!-- <div class="menu-img img order-md-last " style="background-image: url(admin/images/<?php //echo $image; ?>);"></div> -->
					                <div class="text d-flex align-items-center">
												<div>
						          	    <div class="d-flex">
							                <div class="one-half">
							                  <h3><?php echo $name; ?></h3>
							                </div>
							                <div class="one-forth">
							                  <span class="price">Rs. <?php echo $price; ?></span>
							                </div>
							              </div>
							              <p><span><?php echo $desc; ?></span></p>
										  <?php 
                            				 if (!isset($_SESSION['email'])) { 
                            				?> 
							              <p><a href="login.php" class="btn btn-primary">Add to Cart</a></p>
							              <?php                            
                              				} 
                              				else {                                 
                                                                   
                                			?> 
										  <p><form method="POST" action="cart_add.php">
                                        
                                            <input type="hidden" name="item" value="<?=$id?>" />
                                            <input type="hidden" name="cost" value="<?=$price?>" />

                                            <button type="submit" value ="submit" class="btn btn-primary" title="Add to Cart">Add to Cart</button>
                                        	</form></p>
										  <?php                                 
                            				}                          
                             				?> 
						                </div>
					                </div>
					            </div>
					        </div>
                            <?php
                        }
                        ?> 
                        </div>
	              </div>

	              <div class="tab-pane fade" id="v-pills-5" role="tabpanel" aria-labelledby="v-pills-day-5-tab">
				  <div class="row no-gutters d-flex align-items-stretch">
                          <?php
                            $query = "SELECT *  FROM  items WHERE product_category ='Deserts' ";
                            $select_Breakfast = mysqli_query($con,$query);
                            while($row = mysqli_fetch_assoc($select_Breakfast)) {
                                $id = $row['product_id'];
                                $name = $row['product_name'];
                                $price = $row['product_price'];
                                $desc = $row['product_desc'];
                                $image = $row['image'];
                                ?>
					        <div class="col-md-12 col-lg-6 d-flex align-self-stretch">
					        	<div class="menus d-sm-flex ftco-animate align-items-stretch">					
									<input type="image" src="admin/images/<?php echo $image; ?>" class="menu-img img " alt="">
                                    <!-- <div class="menu-img img order-md-last " style="background-image: url(admin/images/<?php// echo $image; ?>);"></div> -->
					                <div class="text d-flex align-items-center">
												<div>
						          	    <div class="d-flex">
							                <div class="one-half">
							                  <h3><?php echo $name; ?></h3>
							                </div>
							                <div class="one-forth">
							                  <span class="price">Rs. <?php echo $price; ?></span>
							                </div>
							              </div>
							              <p><span><?php echo $desc; ?></span></p>
							              <?php 
                            				 if (!isset($_SESSION['email'])) { 
                            				?> 
							              <p><a href="login.php" class="btn btn-primary">Add to Cart</a></p>
							              <?php                            
                              				} 
                              				else {                                 
                                                                   
                                			?> 
										  <p><form method="POST" action="cart_add.php">
                                        
                                            <input type="hidden" name="item" value="<?=$id?>" />
                                            <input type="hidden" name="cost" value="<?=$price?>" />

                                            <button type="submit" value ="submit" class="btn btn-primary" title="Add to Cart">Add to Cart</button>
                                        	</form></p>
										  <?php                                 
                            				}                          
                             				?> 
						                </div>
					                </div>
					            </div>
					        </div>
                            <?php
                        	}
                        	?> 
                        </div>
	              </div>

	              <div class="tab-pane fade" id="v-pills-6" role="tabpanel" aria-labelledby="v-pills-day-6-tab">
				  <div class="row no-gutters d-flex align-items-stretch">
                          <?php
                            $query = "SELECT *  FROM  items WHERE product_category ='Wine' ";
                            $select_Breakfast = mysqli_query($con,$query);
                            while($row = mysqli_fetch_assoc($select_Breakfast)) {
                                $id = $row['product_id'];
                                $name = $row['product_name'];
                                $price = $row['product_price'];
                                $desc = $row['product_desc'];
                                $image = $row['image'];
                                ?>
					        <div class="col-md-12 col-lg-6 d-flex align-self-stretch">
					        	<div class="menus d-sm-flex ftco-animate align-items-stretch">					
									<input type="image" src="admin/images/<?php echo $image; ?>" class="menu-img img " alt="">
                                    <!-- <div class="menu-img img order-md-last " style="background-image: url(admin/images/<?php //echo $image; ?>);"></div> -->
					                <div class="text d-flex align-items-center">
												<div>
						          	    <div class="d-flex">
							                <div class="one-half">
							                  <h3><?php echo $name; ?></h3>
							                </div>
							                <div class="one-forth">
							                  <span class="price">Rs. <?php echo $price; ?></span>
							                </div>
							              </div>
							              <p><span><?php echo $desc; ?></span></p>
										  <?php 
                            				 if (!isset($_SESSION['email'])) { 
                            				?> 
							              <p><a href="login.php" class="btn btn-primary">Add to Cart</a></p>
							              <?php                            
                              				} 
                              				else {                                 
                                                                   
											?> 
											
										  <p><form method="POST" action="cart_add.php">
                                        
                                            <input type="hidden" name="item" value="<?=$id?>" />
                                            <input type="hidden" name="cost" value="<?=$price?>" />

                                            <button type="submit" value ="submit" class="btn btn-primary" title="Add to Cart">Add to Cart</button>
                                        	</form></p>
										  <?php                                 
                            				}                          
											 ?> 
											 
                        
						                </div>
					                </div>
					            </div>
					        </div>
                            <?php
                        }
                        ?> 
                        </div>
	              </div>
	            </div>
	          </div>
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