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
                    <a class="navbar-brand" href="#">Users</a>
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
                                <h4 class="title">Users</h4>
                                <p class="category">List of all registered users</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Role</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 

                                    $query = "SELECT *  FROM  users where user_role='subscriber' ";
                                    $select_users = mysqli_query($con,$query);

                                    while($row = mysqli_fetch_assoc($select_users)) {
                                        $user_id = $row['id'];
                                        $user_name = $row['name'];
                                        $user_email = $row['email'];
                                        $user_phoneno = $row['phone'];
                                        $user_address = $row['address'];
                                        $user_role = $row['user_role'];
                                    
                                    ?>
                                    <tr>

                                        <td><?php echo $user_id ?></td> 
                                        <td><?php echo $user_name ?></td>
                                        <td><?php echo $user_email ?></td>
                                        <td><?php echo $user_phoneno ?></td>
                                        <td><?php echo $user_address ?></td>
                                        <td><?php echo $user_role ?></td>
                                        
                                        <td>
                                            <button class="btn btn-sm btn-success ti-close" title="Block User"></button>

                                            <button class="btn btn-sm btn-primary ti-view-list-alt"
                                                    title="Details"></button>
                                        </td>
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
