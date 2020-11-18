
<?php

require("../includes/common.php");

$cat_title = mysqli_real_escape_string($con, $_POST['cat_title']);

    if($cat_title=="" || empty($cat_title)) {
        
        $_SESSION['Error'] = "This Field Must Not be Empty";
        header('location: category.php');
        exit();
    }
    else{
        $query = "INSERT INTO category(cat_title) VALUE ('$cat_title')";
        $create_category = mysqli_query($con,$query);
        $_SESSION['Error1'] = "Category Added Successfully";
            header('location: category.php');
            exit();
        if(!$create_category) {
            die("Query Failed");
        }
    }
    

?>