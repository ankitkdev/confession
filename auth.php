<?php include 'db.php';?>
<?php
if(isset($_POST['username']) && isset($_POST['pass'])){
  $name =mysqli_real_escape_string($con,$_POST['username']);
  $pass =mysqli_real_escape_string($con,$_POST['pass']);

  $query ="SELECT * FROM auth WHERE username='$name'";
  $auth =mysqli_query($con,$query);


  if(!$query) {
    die("Query Failed: ". mysql_error());
  } else {
    $row=mysqli_fetch_assoc($auth);
    $m=$row['name'];
    $q =$row['username'];
    if ($name==$q) {
    if($name==$q && $pass==$row['password']) {
        header("Location: profile.php?id=$m");
        session_start();
        $_SESSION['uname']=$m;
        $_SESSION['use']=$q;
      }else {
            header("Location:login.php?id=Username or Password is incorrect");
        }
    } else {
        header("Location:login.php?id=username already taken or your password is incorrect. Please try again");
}
}
}
      ?>
