<?php
ob_start();
require("includes/common.php");
if (!isset($_SESSION['email'])) {
  header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include('includes/header.php') ?>
    <script src="https://js.stripe.com/v3/"></script>
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
            <h1 class="mb-2 bread ">Test <span class="oi oi-cart"></span></h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Test <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
    
    <div class="container">

              <h2 class="mt-5"><span class="oi oi-credit-card"></span> Checkout</h2>
              <hr>
                  <div class="row"> 
                  <div class="col-md-5">    
              <h4>Your Order</h4>
                        <?php
                        $sum = 0;
                        $user_id = $_SESSION['user_id'];
                        $query = "SELECT items.product_id, items.product_name AS Name, items.product_desc AS Description ,image,order_id,quantity,cost FROM users_items JOIN items ON users_items.item_id = items.product_id WHERE users_items.user_id='$user_id' and order_status='Added to cart'";
                        $result = mysqli_query($con, $query)or die($mysqli_error($con));
                        if (mysqli_num_rows($result) >= 1) {
                            ?>
                
                <table class="table your-order-table">
                    <tr>
                        <th>Image</th>
                        <th>Details</th>
                        <th>Qty</th>
                    </tr>
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
                        <td><img src="admin/images/<?php echo $image ?>" alt="" style="width: 4em"></td>
                        <td>
                            <strong><?php echo $row["Name"] ?></strong><br>
                            <?php echo $desc ?> <br> 
                            <a href="#">Rs. <?php echo $row["cost"]; ?></a>
                        </td>
                        <td>
                            <span class="badge badge-light"><?php echo $qty ?></span>
                        </td>
                    </tr>
                    <?php
                            }
                        ?>  
                </table>

                <hr>
                <table class="table your-order-table table-bordered">
                    <tr>
                        <th colspan="2" >Price Details</th>
                    </tr>
                    <tr>
                        <td>Subtotal</td>
                        <td>Rs.<?php echo $sum ?></td>
                    </tr>
                    <tr>
                        <td>Tax</td>
                        <td>Rs. 0</td>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <th>Rs. <?php echo $sum ?></th>
                    </tr>
                    
                </table>
                
                         <?php
              } else {
                       
                header('location: cart.php');
                exit();
                }
            ?>          
              </div>
            <div class="col-md-7">  
             <h4>Billing Details</h4>

               <form action="payment.php" method="POST">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-5">
                      <label for="city">City</label>
                      <input type="text" class="form-control" id="city" name="city" placeholder="City" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="State">State</label>
                        <input type="text" class="form-control" id="state" name="state" placeholder="State" required>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="postal">Postal</label>
                      <input type="text" class="form-control" id="postal" name="postal" pattern="[0-9]+" maxlength="6" placeholder="Postal" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" pattern="[0-9]+" maxlength="10" placeholder="Phone" required>
                  </div>
                  
                  <hr>
                  <h5><span class="oi oi-credit-card"></span> Payment Details</h5>

                  <div class="form-group">
                    <label for="name_card">Name on card</label>
                    <input type="text" class="form-control" id="name_on_card" name="name_on_card" placeholder="Name on card" required>
                  </div>

                  <div class="form-group">
                  <label for="card">Credit or debit card</label>
                  
                  
                  <div id="card-element" required>
                     <!-- A Stripe Element will be inserted here.  -->
                  </div>
                  <!-- Used to display form errors. -->
                  <div id="card-errors" role="alert"></div> 
              </div> 
                  <div class="form-group">
                  <input type="hidden" name="item" value="<?=$id?>"/>
                  <button type="submit" value ="submit" class="btn btn-outline-info col-md-12">Complete Order</button>
                  </div>
                
                </form>
               
            </div>

            
              
            </div>
          </div>
         
    <!-- Footer -->
    <?php include("includes/footer.php") ?>

     <!-- footer end --> 
    <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
  
  <?php include("includes/script.php") ?>
  <script>
        // Create a Stripe client.
        var stripe = Stripe('pk_test_4paokl8kcBC4qZqwl6yYFty3');

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {
            style: style,
            hidePostalCode: true
        });

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            var options = {
                name: document.getElementById("name_on_card").value,
                address_line_1: document.getElementById("address").value,
                address_city: document.getElementById("city").value,
                address_state: document.getElementById("state").value,
                address_zip: document.getElementById("postal").value
            };

            stripe.createToken(card, options).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });

        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }
    </script>
    </body>
  </html>
