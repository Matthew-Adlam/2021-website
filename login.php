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
    <div class = "inputbox">
    <h1> Login here! </h1>
    <form method = "post" action="login.php">
      <label for = "username">Username: </label>
      <br>
    <span class="submit"></span><input type="text" name="username" class="formStyle" required placeholder = "Username">
    <br>
    <label for = "passwords">Password: </label>
      <br>
    <span class="submit"></span><input type="password" name="passwords" class="formStyle" required placeholder = "Password">
    <br>
    <?php 
    session_start();
     if($_SERVER["REQUEST_METHOD"] =="POST") {
      $username = htmlspecialchars(mysqli_real_escape_string($con,$_POST['username']));
      $passwords = htmlspecialchars(mysqli_real_escape_string($con,$_POST['passwords']));

      $result = mysqli_query($con,"SELECT * FROM userInfo WHERE username = '$username'");
      if (mysqli_num_rows($result) == 1) {
        while($row = mysqli_fetch_array($result)) {
          $dbusername  = htmlspecialchars($row['username']);
          $hash  = htmlspecialchars($row['passwords']);
        }
        
        if (password_verify($passwords,substr($hash, 0, 60))) {
          echo "Welcome Back!";
          $_SESSION['review'] = $dbusername;
          echo "<script> window.location.assign('home.php');</script>";
        }
        else {
          echo "<p class = 'echoText'>Incorrect username or password</p>";
        }
      }
      else {
        echo "<p class = 'echoText'>Incorrect username or password</p>";
      }
    }
    ?>
    <br>
    <input type ="submit" value="Log In!" class = "buttonPrimary">
    <input type = "reset" value= "Reset" class = "buttonSecondary">
    </form>
    </div>
    <p><b> Don't have an account? <a href = "signup.php">Get one now.</b></a></p>
    </br>
    <p><b>You must be signed in to create a review,vote or report a review.</b></p>
    </div>
</body>
</html>