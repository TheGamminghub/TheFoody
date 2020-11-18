<div class="py-1 bg-black top">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+ 1235 2355 98</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">thefoody@example.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right justify-content-end">
						    <p class="mb-0 register-link"><span>Open hours:</span> <span>Monday - Sunday</span> <span>8:00AM - 9:00PM</span></p>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">TheFoody</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
		  <?php  if (isset($_SESSION['name'])) {       ?>
	        <ul class="navbar-nav ml-auto">
				<!-- <li class="nav-item active"><a href="test.php" class="nav-link">Welcome <?php// echo ucfirst($_SESSION['name']);?> <span class="oi oi-person"></span></a></li> -->

				<li class="nav-item active dropdown">
        		<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Welcome <?php echo ucfirst($_SESSION['name']);?> <span class="oi oi-person"></span></a>
        			<div class="dropdown-menu">
        			    <a href="profile.php" class="dropdown-item">Profile <span class="oi oi-person"></span></a>
        			    <a href="orders.php" class="dropdown-item">Orders <span class="oi oi-clipboard"></span></a>	
        			    <a href="table_reservation.php" class="dropdown-item">Table Reservation <span class="oi oi-calendar"></span></a>	
        			    <a href="setting.php"class="dropdown-item">Change Password <span class="oi oi-cog"></span></a>
        			</div>
    			</li>

	        	<li class="nav-item active"><a href="index.php" class="nav-link">Home <span class="oi oi-home"></span></a></li>
	        	<li class="nav-item"><a href="about.php" class="nav-link">About <span class="oi oi-info"></span></a></li>
	        	<li class="nav-item"><a href="menu.php" class="nav-link">Menu <span class="oi oi-menu"></span></a></li>
				<li class="nav-item"><a href="cart.php" class="nav-link">Cart <span class="oi oi-cart"></span></a></li>
	        	<li class="nav-item"><a href="logout.php" class="nav-link">Logout <span class="oi oi-account-logout"></span></a></li>	          	
	          	<li class="nav-item cta"><a href="reservation.php" class="nav-link">Book a table</a></li>
	        </ul>
			</div>
			
			<?php 
  		        } else 
                  {  ?>  
				<ul class="navbar-nav ml-auto">
				<li class="nav-item active"><a href="index.php" class="nav-link">Home <span class="oi oi-home"></span></a></li>
	        	<li class="nav-item"><a href="about.php" class="nav-link">About <span class="oi oi-info"></span></a></li>
	        	<li class="nav-item"><a href="menu.php" class="nav-link">Menu <span class="oi oi-menu"></span></a></li>
				
	        	<li class="nav-item"><a href="login.php" class="nav-link">Login <span class="oi oi-account-login"></span></a></li>
	        	<li class="nav-item"><a href="register.php" class="nav-link">Sign Up <span class="oi oi-person"></span></a></li>

			<?php                     
   		        }
   		        ?>
	      </div>
	    </div>
	  </nav>