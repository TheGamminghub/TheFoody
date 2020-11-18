<?php
require("includes/common.php");
if (!isset($_SESSION['email'])) {
  header('location: login.php');
}
  $user_id = $_SESSION['user_id'];
  // Getting the values from the signup page using $_POST[] and cleaning the data submitted by the user.
  $name = $_POST['name'];
  $name = mysqli_real_escape_string($con, $name);

  $email = $_POST['email'];
  $email = mysqli_real_escape_string($con, $email);

  $address = $_POST['address'];
  $address = mysqli_real_escape_string($con, $address);

  $state = $_POST['state'];
  $state = mysqli_real_escape_string($con, $state);

  $postal = $_POST['postal'];
  $postal = mysqli_real_escape_string($con, $postal);

  $phone = $_POST['phone'];
  $phone = (mysqli_real_escape_string($con, $phone));

  $name_on_card = $_POST['name_on_card'];
  $name_on_card = (mysqli_real_escape_string($con, $name_on_card));

  $item_id = $_POST['item'];
 
  $sql = "UPDATE users_items SET order_status ='Order Pending' WHERE user_id='" . $user_id . "' AND item_id = '" . $item_id . "' AND order_status='Added to cart'";
  mysqli_query($con, $sql);

  $query = "INSERT INTO payment ( user_id, payment_name, payment_email, payment_address, sate, postal, phone, name_on_card,date) VALUES ('" . $user_id . "','" . $name . "','" . $email . "','" . $address . "','" . $state . "','" . $postal . "','" . $phone . "','" . $name_on_card . "',now())";
  mysqli_query($con, $query) or die(mysqli_error($con));
  $user_id = mysqli_insert_id($con);
  
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
            <h1 class="mb-2 bread ">Payment </span></h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Payment Success <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
    <div class="container-fluid"  id="content">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h1 align="center" class="text text-success"><span class="oi oi-check"></span></ion-icon></h1>
                    <h3 align="center">Your order is Placed. Thank you for shopping with us.</h3><hr>
                    <p align="center">Click <a href="menu.php">here</a> to purchase any other item.</p>
                </div>
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