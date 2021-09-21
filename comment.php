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
    <!-- text align -->
    <div class = "background">
    <h1 class = "centerText"> Add a comment for this review here. </h1>
    <div class = "mobile">
    <div class = "inputbox">
      <!-- different input boxes -->
    <form method = "post">
    <span class="submit">Comments:</span>
    <br>
    <textarea name ="comment" rows="10" columns = "100" required class = "formStyle" ></textarea>
    <br>
    <label for = "rating">Rate this review /10, with 10 being the highest:  </label>
      <br>
    <span class="submit"></span><input type="number" name="rating" max = "10" min = "0"class="formStyle" required placeholder = "/10">
    <br>
    <br>
 <?php   
          // start session
          session_start();
          /*|| isset ($_SESSION['review']) */
          if ($_SESSION['review'] == '') {
            header('Location:login.php');
          }
          // get id from url and username from session
          $id = $_GET['id'];
          $username =  $_SESSION['review'];
          // save as variables
          if($_SERVER["REQUEST_METHOD"] =="POST") {
          $comment = htmlspecialchars(mysqli_real_escape_string($con,$_POST['comment']));
          $rating = htmlspecialchars(mysqli_real_escape_string($con,$_POST['rating']));
          // post to database
          mysqli_query($con,"INSERT INTO `comments` (id,username,comment,rating) VALUES('$id','$username','$comment', '$rating')");
          echo "Thank you for submitting a comment.";
          }
          
    ?>
    <br>
    <br>
    <!-- buttons -->
    <input type ="submit" value="Submit" class="buttonPrimary">
    <input type = "reset" value= "Reset" class="buttonSecondary">
    <br>
    </form>
    </div>
    </div>
    </div>
</body>
</html>