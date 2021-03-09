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
<?php 
session_start();
?>
 <h1 class = 'aligncenter'> Welcome,<b> <?php echo htmlspecialchars($_SESSION['review']);  ?> </b></h1>
<form action = "review.php">
 <input type = "submit" value = "Create a review!" >
 </form>
</body>
</html>