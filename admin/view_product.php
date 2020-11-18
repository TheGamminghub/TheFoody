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
                    <a class="navbar-brand" href="#">View Product</a>
                </div>
                <?php include("includes/nav.php") ?>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">All Products</h4>
                                <p class="category">List of all stock</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Category</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 

                                    $query = "SELECT *  FROM  items";
                                    $select_posts = mysqli_query($con,$query);

                                    while($row = mysqli_fetch_assoc($select_posts)) {
                                        $id = $row['product_id'];
                                        $name = $row['product_name'];
                                        $price = $row['product_price'];
                                        $cat = $row['product_category'];
                                        $desc = $row['product_desc'];                                                                                                 
                                        $image = $row['image'];                                                                                                 
                                    ?>
                                    <tr>
                                    
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $name ?></td>
                                        <td><?php echo $price ?></td>
                                        <td><?php echo $desc ?></td>
                                        <td><?php echo $cat ?></td>
                                        <td><img src="images/<?php echo $image ?>" alt="" class="img-thumbnail"
                                                 style="width: 50px"></td>
                                        <td>
                                            <button class="btn btn-sm btn-info ti-pencil-alt" title="Edit"></button>
                                            <button class="btn btn-sm btn-danger ti-trash" title="Delete"></button>
                                            
                                        </td>
                                    </tr>
                                    <?php  }?>
                                    </tbody>
                                </table>

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



<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
</html>
