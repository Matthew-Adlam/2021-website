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
    <div class = "inputbox">
    <h1> Input a review here! </h1>
    <form method = "post" action="review.php">
    <span class="submit">Book Name:</span><input type="text" name="bookName" required>
    <br>
    <span class="submit">Author/Authors:</span><input type="author" name="authors" required>
    <br>
    <span class="submit">Rating out of 10:</span><input type="number" name = "rating" min = "1" max = "10" required>
    <br>
    <span class="submit">Comments:</span><input type="text" name ="comments" required>
    <br>
    <span class="submit">Would you recommend this book to other people?</span>       
    <br>
  <input type="radio" name = "recommend">
  <label for="male">Male</label><br>
  <input type="radio" name = "recommend">
  <label for="female">Female</label><br>
  <input type="radio" name = "recommend">
  <label for="other">Undecided</label>
 <?php   
  
    ?>
    <br>
    <input type ="submit" value="Submit">
    <input type = "reset" value= "Reset">
    <br>
    </form>
    </div>
</body>
</html>