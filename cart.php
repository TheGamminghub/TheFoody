<?php
require("includes/common.php");
if (!isset($_SESSION['email'])) {
    header('location: login.php');
}
$user_id = $_SESSION['user_id'];
$sql = mysqli_query ($con,"SELECT * FROM users_items WHERE user_id = '$user_id'AND order_status='Added to cart' ");
$items_in_cart = mysqli_num_rows($sql);
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
            <h1 class="mb-2 bread ">Cart <span class="oi oi-cart"></span></h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Cart <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
    
    <div class="container">
        <h2 class="mt-5"><span class="oi oi-cart"></span> Shooping Cart</h2>
        <hr>
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
        <h4 class="mt-5"><?php echo $items_in_cart ; ?> items(s) in Shopping Cart</h4>

    <div class="cart-items">
    <?php
                        $sum = 0;
                        $user_id = $_SESSION['user_id'];
                        $query = "SELECT items.product_id, items.product_name AS Name, items.product_desc AS Description ,image,order_id,quantity,cost FROM users_items JOIN items ON users_items.item_id = items.product_id WHERE users_items.user_id='$user_id' and order_status='Added to cart'";
                        $result = mysqli_query($con, $query)or die(mysqli_error($con));
                        if (mysqli_num_rows($result) >= 1) {
                            ?>
        <div class="row">          
            <div class="col-md-12">                
                <table class="table">                    
                    <tbody>
                    <?php
                            
                                while ($row = mysqli_fetch_array($result)) {
                                    $image = $row['image'];
                                    $qty = $row['quantity'];
                                    $order_id= $row["order_id"];
                                    $desc=$row['Description'];
                                    $sum+= $row["cost"];
                                    $id="";
                                    $id .= $row["product_id"] . ",";                                                                   
                            ?>               
                        <tr>
                            <td><img src="admin/images/<?php echo $image ?>" style="width: 5em"></td>
                            <td>
                                <strong><?php echo $row["Name"] ?></strong><br> <?php echo $desc?>
                            </td>
                            
                            <td>
                                <a href="cart_remove.php?id=<?=$row["product_id"];?>">Remove</a>
                                
                            </td>
                            
                            <td>                                                      
                                <select name="" id=""  class="form-control" style="width: 4.7em">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </td>
                            <td> Quantity <?php echo $qty ?>       </td>
                            
                            <td>Rs. <?php echo $row["cost"]; ?></td>
                        </tr>

                        <?php
                            }
                        ?>                        
                    </tbody>
                </table>                
            </div>   
            <!-- Price Details -->
                <div class="col-md-6">
                        <div class="sub-total">
                             <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th colspan="2">Price Details</th>
                                    </tr>
                                </thead>
                                <?php
                                $id = rtrim($id, ",");
                                ?>
                                    <tr>
                                        <td>Subtotal </td>
                                        <td>Rs. <?php  echo $sum  ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <td>RS. 0.00</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <th>Rs. <?php  echo $sum  ?>.00</th>
                                    </tr>
                               
                             </table> 
                               
                        </div>
                </div>
                <!-- Save for later  -->
                    <div class="col-md-12">
                        <a href="menu.php"><button class="btn btn-outline-dark">Continue Shopping</button></a> 
                        <?php if (mysqli_num_rows($result) >= 1) {
                            ?>
                        <a href="checkout.php"><button class="btn btn-outline-info">Proceed to checkout</button></a>
                        <?php }else{
                                header('location: menu.php');
                                exit();
                            }   
                            ?>
                    </div>
                <hr>    
                             
            </div>        
        </div>
    </div> <br>
    <?php
            } else {
                       
                echo "<center><h1>Cart is Empty!</h1></center>"; 
                echo "<center><h2>Add items to the cart first!</h2></center>";
                ?>
               
                 <div class="col-md-12">
                 <a href="menu.php"><button class="btn btn-outline-dark">Continue Shopping</button></a> 
                 </div><br>
                 <?php
                }
            ?>  
</div>
</div>


		
<!-- Footer -->
<?php include("includes/footer.php") ?>

<!-- footer end -->
<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<?php include("includes/script.php") ?>

</body>
</html>