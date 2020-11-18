<?php
require("../includes/common.php");
?>
<!doctype html>
<html lang="en">
<head>
    <?php include("includes/header.php") ?>
</head>
<body>

<div class="wrapper">
<?php include("includes/sidebar.php") ?>
    

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Add Product</a>
                </div>
                <?php include("includes/nav.php") ?>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10 col-md-10">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add Product</h4>
                            </div>
                            <div class="content">
                            <?php 
                              if( isset($_SESSION['Error']) )
                                {
                              ?>
                                <span class="alert alert-danger" role="alert">
                                <?php
                                  echo $_SESSION['Error'];
                                  unset($_SESSION['Error']);
                                ?>
                                </span>
                                <?php }
                                ?>
                                <?php 
                              if( isset($_SESSION['Error1']) )
                                {
                              ?>
                                <span class="alert alert-success" role="alert">
                                <?php
                                  echo $_SESSION['Error1'];
                                  unset($_SESSION['Error1']);
                                ?>
                                </span>
                                <?php }
                                ?>
                            
                                <form action="addproduct.php" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Item Name:</label>
                                                <input type="text" class="form-control border-input" name="product_name" placeholder="Enter Item Name" >
                                            </div>

                                            <div class="form-group">
                                                <label>Item Price:</label>
                                                <input type="text" class="form-control border-input" name="product_price" placeholder="Enter Price in Rs" >
                                            </div> 
                                            <div class="form-group">
                                                <label>Item Description :</label>
                                                <textarea name="product_desc" id="" cols="30" rows="4" class="form-control border-input" placeholder="Item Description"></textarea>
                                            </div> 

                                            <div class="form-group">
                                            <label for="category">Select Category:</label>
                                            <select class="form-control border-input" name="product_category" id="category" >
                                            <?php 

                                                $query = "SELECT * FROM category";
                                                $select_category = mysqli_query($con,$query);

                                                if (!$select_category) {
                                                    die("Query Failed" . mysqli_error($con));
                                                }

                                                while ($row = mysqli_fetch_assoc($select_category)) {
                                                    $cat_id = $row['cat_id'];
                                                    $cat_title = $row['cat_title'];
                                                
                                                    echo "<option value='$cat_title'>$cat_title</option>";
                                                }

                                                ?>
                                            </select>
                                            </div>
                                            <div class="form-group">
                    	                    	<label for="image">Item Image</label>
                    	                    	<input type="file" class="form-control border-input" name="image" id="file" onchange="readURL(this);">
                                                <img id="image" img width="100"/>
                    	                    </div>
                                            
                                        </div>

                                    </div>
                                    <div class="">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Add Product</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php include("includes/footer.php") ?>

</div>
</div>

</body>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>


<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
</html>
