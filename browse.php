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
  <div class = "usernameStyle">
  <p class="username"><b>Username:</b></p>
  <?php 
  echo $row['username'];
  ?>
  </div>
  <div class = "bookNameStyle">
  <p class="questionText"><b>Book Name:</b></p>
  <?php 
  echo $row['bookName'];
  ?>
  </div>
  <div class = "authorStyle">
  <p class="questionText"><b>Author/Authors:</b></p>
  <?php 
  echo $row['authors'];
  ?>
  </div>
  <div class = "genreStyle">
  <p class="questionText"><b>Genre:</b></p>
  <?php 
  echo $row['genre'];
  ?>
  </div>
  <div class = "ratingStyle">
  <p class="questionText"><b>Rating:</b></p>
  <?php 
  echo $row['rating'];
  ?>
  </div>
  <div class = "commentsStyle">
  <p class="questionText"><b>Comments:</b></p>
  <?php 
  echo $row['comments'];
  ?>
  </div>
  <div class = "recommendStyle">
  <p class="questionText"><b>Do they recommend this book?</b></p>
  <?php echo $row['recommend']; ?>
  </div>
  </div>
<?php } ?>
</table>
</body>
</html>