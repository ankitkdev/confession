<?php
include 'db.php';
include 'auth.php'
?>
<?php
session_start();
$query ='SELECT * FROM messages ORDER BY create_date DESC';
$messages =mysqli_query($con,$query);
if(isset($_GET['action']) ){
  if($_GET['action'] == 'lo'){
    session_destroy();
  }
}
if(isset($_GET['action']) && isset($_GET['id'])){
  if($_GET['action'] == 'delete'){
    $id = $_GET['id'];

    $query = "DELETE FROM messages WHERE id = $id";

    if(!mysqli_query($con, $query)){
      die(mysqli_error($con));
    } else {
      header("Location: profile.php?success=Message%20Removed");
    }

  }
}

if(isset($_GET['success'])){
  $success = $_GET['success'];
}
?>
<!Doctype html>
<html>
<head>
  <title>Confession Box</title>
  <link rel="stylesheet" href="css/pi.css">
</head>
<body oncopy="return false" oncut="return false" onpaste="return false">
  <center>
    <div class="navbar">
      <a href="profile.php" id="demo"></a>
      <a class="si" id="demo1" href="login.php?action=lo">(Log Out)</a>
      <a class="arm" id="demo2">HEY &nbsp<?php echo $_SESSION['uname']; ?></a>

    </div>
  </center>
  <div class="container">
    <header>
      <?php if(isset($success)):?>
        <div class="alert"><?php echo $success; ?></div>
      <?php endif;?>
    </header><br>
    <div class="main">
      <form method="post" action="process.php">
        <textarea rows="15" cols="45" name="text" oncopy="return false" onpaste="return false" placeholder="Type your Confession No-One Can See your Identity" required></textarea><br><br>
        <button class="bu"><span>CONFESSED</span></button>
      </form>
    </div>
    <div class="aside">
        <?php while($row = mysqli_fetch_assoc($messages)) : ?>
          <div class="article-card-container">
            <div class="article-card">
              <div class="author">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php if($_SESSION['use']==$row['username']):?><a class="cr" href="profile.php?action=delete&id=<?php echo $row['id'];?>">X</a><?php endif; ?>
                <div class="user-avatar">
                  <div class="user-name">
                    <?php echo $row['user'];?>
                  </div>
                  <div class="written-date"><?php echo $row['create_date'];?></div>
                </div>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <div class="content-image">
                  <img  src="http://lorempixel.com/400/200"/>
                </div>
                <div class="content-text">
                  <?php echo $row['text']; ?>
                </div>
                <div class="article-footer">
                  <div class="views part">
                    <ion-icon name="eye"></ion-icon>
                    <span class="count-text">150</span>
                  </div>
                  <div class="likes part">
                    <ion-icon name="heart-empty"></ion-icon>
                    <span class="count-text">
                      124
                    </span>
                  </div>
                  <div class="comments part">
                    <ion-icon name="share"></ion-icon></ion-icon>
                    <span class="count-text">245</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <?php endwhile; ?>
      </ul>
    </div>
  <script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>
  <script>
  var i = 0;
  var txt = 'Confession Box';
  var speed = 300;
  window.onload = function(){

    if (i < txt.length) {
      document.getElementById("demo").innerHTML += txt.charAt(i);
      i++;
      setTimeout(window.onload,speed);
    }
  }
</script>
</body>
</html>
</!Doctype>
