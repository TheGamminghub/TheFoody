<?php

require("includes/common.php");

  // Getting the values from the signup page using $_POST[] and cleaning the data submitted by the user.
  $name = $_POST['name'];
  $name = mysqli_real_escape_string($con, $name);

  $email = $_POST['email'];
  $email = mysqli_real_escape_string($con, $email);

  $password = $_POST['password'];
  $password = MD5(mysqli_real_escape_string($con, $password));
  // $password = md5($password);

  $cpassword = $_POST['cpassword'];
  $cpassword = MD5(mysqli_real_escape_string($con, $cpassword));

  $phone = $_POST['phone'];
  $phone = mysqli_real_escape_string($con, $phone);

  $city = $_POST['city'];
  $city = mysqli_real_escape_string($con, $city);

  $address = $_POST['address'];
  $address = mysqli_real_escape_string($con, $address);

  $regex_num = "/^[789][0-9]{9}$/";

  if ($_POST["password"] != $_POST["cpassword"]) {
    $_SESSION['Error'] = "Confirm Password Does'nt Match";
    header('location: register.php');
  exit();
 }
 else {
    
  $query = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($con, $query)or die($mysqli_error($con));
  $num = mysqli_num_rows($result);

  if ($num != 0) {
    $_SESSION['Error'] ="Email Already Exists";
    header('location: register.php');
    exit();
    
  } else if (!preg_match($regex_num, $phone)) {
    $_SESSION['Error'] ="Enter Correct Phone Number";
    header('location: register.php');
    exit();
  } else {
    $query = "INSERT INTO users(name,email, password, phone, city, address ,user_role,date)VALUES('" . $name . "','" . $email . "','" . $password . "','" . $phone . "','" . $city . "','" . $address . "','" . 'subscriber' . "',now())";
    $result=mysqli_query($con, $query) or die(mysqli_error($con));
    // $user_id = mysqli_insert_id($con);
    $query = "SELECT id, email,user_role,name FROM users WHERE email='" . $email . "'";
    $result = mysqli_query($con, $query)or die($mysqli_error($con));
    $num = mysqli_num_rows($result);
    // If the email and password are not present in the database, the mysqli_num_rows returns 0, it is assigned to $num.
    if ($num == 1) {
    $row = mysqli_fetch_array($result);
    $_SESSION['email'] = $row['email'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['s_role'] = $row['user_role'];
    
    
    
  }
 }

?>
