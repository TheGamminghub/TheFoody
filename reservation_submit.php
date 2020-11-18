<?php
require("includes/common.php");
if (!isset($_SESSION['email'])) {
  header('location: login.php');
}
  $user_id = $_SESSION['user_id'];
  // Getting the values from the signup page using $_POST[] and cleaning the data submitted by the user.
  $name = $_POST['res_name'];
  $name = mysqli_real_escape_string($con, $name);

  $email = $_POST['res_email'];
  $email = mysqli_real_escape_string($con, $email);

  $phone = $_POST['res_phone'];
  $phone = (mysqli_real_escape_string($con, $phone));

  $date = $_POST['date'];
  $date = mysqli_real_escape_string($con, $date);

  $time = $_POST['time'];
  $time = mysqli_real_escape_string($con, $time);

  $person = $_POST['person'];
  $person = mysqli_real_escape_string($con, $person);


  $query = "INSERT INTO reservation(user_id,res_name,res_email, res_phone, date, time, person,status,bookedon)VALUES('" . $user_id . "','" . $name . "','" . $email . "','" . $phone . "','" . $date . "','" . $time . "','" . $person . "','" . Pending . "',now())";
  mysqli_query($con, $query) or die(mysqli_error($con));
  $user_id = mysqli_insert_id($con);
  $_SESSION['Error'] ="Your Table Is Booked Wait For Conformation";
  header('location: reservation.php');
  exit();
    
