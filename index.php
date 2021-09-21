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
    <!-- text on the page -->
    <div class = "mobile">
    <div class = "alittleleft">
      <h1> Welcome to Book Review!</h1>
      <h1> Here you can read, write and comment on book reviews. </h1>
      <br>
      <h2> To get started, get <a href = "signup.php">  an account here.</a></h2>
      </div>
    </div>
</body>
</html>