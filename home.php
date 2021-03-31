          <!-- connect to database-->
          <?php
require_once('includes/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Review</title>
    <link rel="stylesheet" href="style.css" type="text/css" charset="utf-8">
</head>
<body>
    <header class = "header-text"> Book Review </header>

    <nav>
      <a href="index.php">Home</a>
      <a href="browse.php">Browse Reviews</a>
      <a href="signup.php">Sign Up</a>
      <a href="login.php">Log In</a>
      <a href="home.php">Home</a>
    </nav>
    <div class = "mobile">
<?php 
session_start();
/* || isset ($_SESSION['review'])*/
if ($_SESSION['review'] == '') {
  header('Location:login.php');
}
?>
<div class = "paddingLeft">
 <h1 class = "morePadding"> Welcome,<b> <?php echo htmlspecialchars($_SESSION['review']);  ?>! </b></h1>
 <h2  class = "morePadding"> What do you want to do today? </h2>
 <br>
 </div>
 <div class = "centerbutton">
 <form action = "review.php">
<input type = "submit" value = "Create a review!" class = "homeButton"> 
</form>
</div>
</body>
</html>