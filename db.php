 <?php

//Connect to MySQl

$con =mysqli_connect('localhost','root','','messageapp');

//test Connection

if(mysqli_connect_errno()){
  echo "DB Connection Error: ".mysqli_connect_error();
}

?>
