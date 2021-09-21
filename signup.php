  
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
    <div class = "inputbox">
    <h1> Sign Up Here! </h1>
    <!-- the form -->
    <form method = "post" action="signup.php">
    <label for = "username">Username: </label>
      <br>
    <span class="submit"></span><input type="text" name="username" class = "formStyle" required placeholder = "Username">
    <br>
    <label for = "passwords">Password: </label>
      <br>
    <span class="submit"></span><input type="password" name="passwords" class = "formStyle" required placeholder = "Password">
    <br>
    <label for = "confirmPassword">Confirm Password: </label>
    <br>
    <span class="submit"></span><input type="password" name="confirmPassword" class = "formStyle" required placeholder = "Confirm Password">
 <?php   
        //  starts session, posts the submitted info
        session_start();
        if($_SERVER["REQUEST_METHOD"] =="POST") {
        $username = htmlspecialchars(mysqli_real_escape_string($con,$_POST['username']));
        $passwords = htmlspecialchars(mysqli_real_escape_string($con,$_POST['passwords']));
        $confirm = htmlspecialchars(mysqli_real_escape_string($con,$_POST['confirmPassword']));
          // if password too weak, too short, username is taken or confirm password doesn't equal password, then return error
        $result = mysqli_query($con,"SELECT * FROM userInfo WHERE username = '$username'");
        $error = "";
        if( !preg_match("#[0-9]+#", $passwords) ) {
          $error = "Password must include at least one number!";
        }
        if( !preg_match("#[a-z]+#", $passwords) ) {
            $error = "Password must include at least one lowercase letter!";
        }
        if( !preg_match("#[A-Z]+#", $passwords) ) {
          $error = "Password must include at least one uppercase letter!";
        }
         if (strlen($passwords) < 8) {
        $error = "Password too short.";
        }
        if (mysqli_num_rows($result) !== 0) {
        echo "<br>";
        echo "<p class = 'echoText'>Username already taken!";
        }
        if ($passwords !== $confirm) {
          echo "<p class = 'echoText'>Passwords do not match";
        }
        if ($error) {
          echo "<br>";
          echo "<p class = 'echoText'>Password is too weak - $error";
          echo "<br>";
        }
        // hash password, input into database, redirect to home.php 
        else {
            $hash = substr(password_hash($passwords, PASSWORD_DEFAULT),0, 60);
            /* if everything correct, inform user operation successful*/
            mysqli_query($con,"INSERT INTO `userInfo` VALUES('$username', '$hash')");
            echo "<script> window.location.assign('home.php');</script>";
            echo "You have successfully signed up!";
            $_SESSION['review'] = $username;
        }
    }
  
    ?>
    <br>
    <br>
    <!-- submit and reset buttons -->
    <input type ="submit" value="Sign Up!" class = "buttonPrimary">
    <input type = "reset" value= "Reset" class = "buttonSecondary">
    <br>
    </form>
    </div>
    <p><b> Already have an account? <a href = "login.php">Log in here.</b></a></p>
    <p class = "alittleleft"><b> Your password must contain a number, an uppercase and lowercase letter, and must be at least 8 characters long.</b></p>
    </div>
</body>
</html>