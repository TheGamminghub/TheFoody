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
                    <a class="navbar-brand" href="#">Add Category</a>
                </div>
                <?php include("includes/nav.php") ?>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add Category</h4>
                            </div>
                            
                            <div class="content">
                            <?php

                                if (isset($_GET['delete'])) {
                                    $cat_del_id = $_GET['delete'];

                                    $query = "DELETE FROM category WHERE cat_id=$cat_del_id";

                                    $delete_cat = mysqli_query($con,$query);

                                }

                            ?>

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
                            
                                <form action="category_add.php" method="POST" >
                                    <div class="row">
                                    
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Add Category:</label>
                                                <input type="text" class="form-control border-input" name="cat_title" placeholder="Add Category"  >
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
                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Category</h4>
                                <p class="category">List of Category</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php                                
                                    $query = "SELECT *  FROM  category";
                                    $select_categories = mysqli_query($con,$query);

                                    while($row = mysqli_fetch_assoc($select_categories)) {
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                    
                                    
                                    ?>
                                    <tr>
                                    <td><?php echo $cat_id ?></td>
                                    <td><?php echo $cat_title ?></td>
                                        
                                        <?php  echo "<td><a href='category.php?delete=$cat_id'>Delete</a></td>";?>
                                    
                                    </tr>

                                     <?php } ?>

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
