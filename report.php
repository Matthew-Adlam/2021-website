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
    <div class = "background">
    <h1 class = "centerText"> Report an inappropriate or offensive review here. </h1>
    <div class = "mobile">
    <div class = "inputbox">
    <form method = "post" action="report.php">
    <label for = "reason">Reason: </label>
      <br>
    <span class="submit"></span><input type="text" name="reason" class="formStyle" required placeholder = "Reason">
    <br>
    <label for = "details">Details: </label>
      <br>
    <span class="submit"></span><input type="password" name="details" class="formStyle" required placeholder = "Details">
    <br>
    <br>
 <?php   
          session_start();
          /*|| isset ($_SESSION['review']) */
          if ($_SESSION['review'] == '') {
            header('Location:login.php');
          }
          $username =  $_SESSION['review'];
          if($_SERVER["REQUEST_METHOD"] =="POST") {
          $reason = htmlspecialchars(mysqli_real_escape_string($con,$_POST['reason']));
          $details = htmlspecialchars(mysqli_real_escape_string($con,$_POST['details']));

          $res = mysqli_query($con,"INSERT INTO `reviews`(username,reason,details) VALUES('$username','$reason', '$details')");
          echo "Thank you for submitting a report.";
          }
    ?>
    <br>
    <br>
    <input type ="submit" value="Submit" class="buttonPrimary">
    <input type = "reset" value= "Reset" class="buttonSecondary">
    <br>
    </form>
    </div>
    </div>
    </div>
</body>
</html>