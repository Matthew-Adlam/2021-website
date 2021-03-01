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
      <a href="signup.php">Sign Up</a>
      <a href="login.php">Log In</a>
    </nav>
    <h1> Search for reviews made by our users! </h1>
    <h4> To make a review you must create an account. </h4>
    <br>
    
    <?php 
      foreach ($con -> query ("SELECT bookName,authors,genre,rating,comments,recommend FROM reviews") as $row) {

      }
    ?>
</body>
</html>