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
    </nav>
    <h1> Search for reviews made by our users! </h1>
    <h4> To make a review you must create an account. </h4>
    <br>
    <table>
    <?php 
      foreach ($con -> query ("SELECT * FROM reviews") as $row) {
    ?>
  <div class = "reviewStyle">
  <div class = "bookNameStyle">
  <?php 
  echo $row['bookName'];
  ?>
  </div>
  <div class = "authorStyle">
  <?php 
  echo $row['authors'];
  ?>
  </div>
  <div class = "genreStyle">
  <?php 
  echo $row['genre'];
  ?>
  </div>
  <div class = "ratingStyle">
  <?php 
  echo $row['rating'];
  ?>
  </div>
  <div class = "commentsStyle">
  <?php 
  echo $row['comments'];
  ?>
  </div>
  <div class = "recommendStyle">
  <?php 
  echo $row['recommend'];
  ?>
  </div>
  </div>
<?php } ?>
</table>
</body>
</html>