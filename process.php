<?php include 'db.php';?>
<?php include 'auth.php';?>

<?php
session_start();
echo $_SESSION["uname"];
if(isset($_POST['text']) && isset($_SESSION["uname"]) && isset($_SESSION["use"])){
$text =mysqli_real_escape_string($con,$_POST['text']);
$user =mysqli_real_escape_string($con,$_SESSION["uname"]);
$use =mysqli_real_escape_string($con,$_SESSION["use"]);

$query ="INSERT INTO messages(text,username,user) Values('$text','$use','$user')";

if(!mysqli_query($con,$query)){
  die(mysqli_error($con));
}else{
  header("Location:profile.php?success=Confession%20Added");
}
}else{
  header("Location : profile.php?error=Please%20Fill%20All%20Fields");
}

 ?>
