<?php require "includes/common.php"; 
session_start(); 
?>
<?php 

$email = mysqli_real_escape_string($con, $_POST['email']);

$password =MD5( mysqli_real_escape_string($con, $_POST['password']));
// $password = md5($password);

// Query checks if the email and password are present in the database.
$query = "SELECT id, email,user_role,name FROM users WHERE email='" . $email . "' AND password='" . $password . "'";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
$num = mysqli_num_rows($result);
// If the email and password are not present in the database, the mysqli_num_rows returns 0, it is assigned to $num.
if ($num == 1) {
  $row = mysqli_fetch_array($result);
  $_SESSION['email'] = $row['email'];
  $_SESSION['name'] = $row['name'];
  $_SESSION['user_id'] = $row['id'];
  $_SESSION['s_role'] = $row['user_role'];
  
    if ($_SESSION['s_role'] == 'admin') {
      header("Location: admin/index.php");
      exit;			
    }
    else if ($_SESSION['s_role'] == 'subscriber') {
      header('location: index.php');
      exit;			
    }
   
  }else {
 
  $_SESSION['Error'] = "Enter Correct Email & Password And try Again";
  header('location: login.php');
  exit();
}

?>
