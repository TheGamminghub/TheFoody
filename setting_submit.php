<?php
ob_start();
session_start();
require("includes/common.php");

if (!isset($_SESSION['email'])) {
    header('location: index.php');
}

$old_pass = $_POST['old_password'];
$old_pass = mysqli_real_escape_string($con, $old_pass);
$old_pass = MD5($old_pass);

$new_pass = $_POST['new_password'];
$new_pass = mysqli_real_escape_string($con, $new_pass);
$new_pass = MD5($new_pass);

$rep_pass = $_POST['repnew_password'];
$rep_pass = mysqli_real_escape_string($con, $rep_pass);
$rep_pass = MD5($rep_pass);

$query = "SELECT email, password FROM users WHERE email ='" . $_SESSION['email'] . "'";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
$row = mysqli_fetch_array($result);

$orig_pass = $row['password'];

//check old password and password taken from db
if ($new_pass != $rep_pass) {
    $_SESSION['Error'] = "Confirmed Password not Match";
    header('location: setting.php');
    exit();

} else {
    if ($old_pass == $orig_pass) {
        $query = "UPDATE  users SET password = '" . $new_pass . "' WHERE email = '" . $_SESSION['email'] . "'";
        mysqli_query($con, $query) or die($mysqli_error($con));
        $_SESSION['Error1'] = "Password Updated Successfully";
        header('location: setting.php');
        exit();     
    } else
        $_SESSION['Error'] = "Entered Old Password Correctly";
        header('location: setting.php');
        exit();

}
?>
