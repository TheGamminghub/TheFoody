<?php 
require("../includes/common.php");
	
    $name = mysqli_real_escape_string($con, $_POST['product_name']);
    $price = mysqli_real_escape_string($con, $_POST['product_price']);
    $product_category =mysqli_real_escape_string($con, $_POST['product_category']);
    $product_desc =mysqli_real_escape_string($con, $_POST['product_desc']);
    
    $image = $_FILES['image']['name'];
    
    $tmp_image = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp_image, "images/$image");
    
    if ($name=="" || $price=="" ||  $product_category=="" || $product_desc=="" ) {
        $_SESSION['Error'] = "All Fields are Required";
        header('location: add_product.php');
        exit();
        
    }
    else{

        $query = "SELECT * FROM items WHERE product_name='$name'";
        $result = mysqli_query($con, $query)or die($mysqli_error($con));
        $num = mysqli_num_rows($result);
    
        if ($num != 0) {
            $_SESSION['Error'] ="Product Already Present";
            header('location: add_product.php');
            exit();
        }
        else{
        $query = "INSERT INTO items(product_name,product_price,product_category,product_desc,image)VALUES('" . $name . "','" . $price . "','" . $product_category . "','" . $product_desc ."','" . $image . "')";
        mysqli_query($con, $query) or die(mysqli_error($con));
        $_SESSION['Error1'] = "Product Added Successfully";
        header('location: add_product.php');
        exit();
        }
    }

?>





