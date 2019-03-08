<?php include 'db.php';?>
<?php
if(isset($_POST['name']) && isset($_POST['username']) && isset($_POST['pass'])){
$name =mysqli_real_escape_string($con,$_POST['name']);
$user =mysqli_real_escape_string($con,$_POST['username']);
$pass =mysqli_real_escape_string($con,$_POST['pass']);

$query ="INSERT INTO auth(name,username,password) Values('$name','$user','$pass')";

if(!mysqli_query($con,$query)){
  die(mysqli_error($con));
}else{
  header("Location:login.php?success=SignUp%20Success%20Now%20Go%20to%20website.");
}
}else{
  header("Location : signup.php?error=Please%20Fill%20All%20Fields");
}
?>
