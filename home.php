          <!-- connect to database-->
          <?php
require_once('includes/connect.php');
?>
<!-- necessities -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Review</title>
    <link rel="stylesheet" href="style.css" type="text/css" charset="utf-8">
    <link rel="icon" href="images/favicon.jpg">
</head>
<body>
    <header class = "header-text"> Book Review </header>
<!-- nav bar -->
    <nav>
      <a href="index.php">Home</a>
      <a href="browse.php">Browse Reviews</a>
      <a href="signup.php">Sign Up</a>
      <a href="login.php">Log In</a>
      <a href="home.php">User Home</a>
    </nav>
    <div class = "mobile">
    <?php 
  // if not logged in, redirect to login page
session_start();
/* || isset ($_SESSION['review'])*/
if ($_SESSION['review'] == '') {
  header('Location:login.php');
}
if ($_SESSION ['review'] == 'admin') {
  header('Location:admin.php');
}  
?>
<div class = "paddingLeft">
<!-- displays name -->
 <h1 class = "morePadding"> Welcome,<b> <?php echo htmlspecialchars($_SESSION['review']);  ?>! </b></h1>
 <h2  class = "morePadding"> What do you want to do today? </h2>
 <br>
 <br>
 <br>
</div>
 </div>
 <!-- links to review.php and logging out -->
 <div class = "homeimages">
 <a href = "review.php" >
 <img src = "images/book3.jpg" width = "400" height = "200" class = "reviewImage">
</img>
</a>
<a href = "logout.php" >
 <img src = "images/book4.jpg" width = "400" height = "200" class = "reviewImage2">
</img>
</a>
</div>
<h2 class = "toppadding"> Recommended books for you: </h2>

<?php
  $sql = "SELECT * FROM reviews WHERE recommend = 'Yes' AND rating >= 8 ORDER BY RAND() LIMIT 3 ";
  foreach ($con -> query ($sql) as $row) {
?>
<div class = "browse">
 <div class = "reviewStyle">
      <div class = "individualReview">
      <div class = "bookName">
      <p class="questionText"><b>Book Name:</b> <?php echo $row['bookName'];?></p> 
      </div>
      <div class = "author">
      <p class="questionText"><b>Author(s):</b> <?php echo $row['authors'];?></p> 
      </div>
      <div class = "genre">
      <p class="questionText"><b>Genre: </b><?php echo $row['genre'];?></p> 
      </div>
      </div>
      </div>
      </div>
    <?php } ?>
    <br>
    </div>
</div>
</body>
</html>