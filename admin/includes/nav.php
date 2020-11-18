<div class="collapse navbar-collapse">
             <ul class="nav navbar-nav navbar-right">
                 <li class="dropdown">
                 <?php  if (isset($_SESSION['name'])) {       ?>
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                         <i class="ti-settings"></i>
                         <p><?php echo ucfirst($_SESSION['name']);?></p>
                         <b class="caret"></b>
                     </a>
                     <ul class="dropdown-menu">
                         <li><a href="#">Profile</a></li>
                         <li><a href="../logout.php">Logout</a></li>
                     </ul>
                 </li>
                 <?php 
  		        } else 
                  {  
                    header('location: ../login.php');
                    exit();
                              
   		        }
   		        ?>
            </ul>
         </div>