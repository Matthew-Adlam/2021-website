  
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

    <div class = "inputbox">
    <h1> Sign Up Here </h1>
    <form method = "post" action="signup.php">
    <span class="submit">Username:</span><input type="text" name="username" required>
    <span class="submit">Password:</span><input type="password" name="passwords" required>
 <?php   
        session_start();
        if($_SERVER["REQUEST_METHOD"] =="POST") {
        $username = htmlspecialchars(mysqli_real_escape_string($con,$_POST['username']));
        $passwords = htmlspecialchars(mysqli_real_escape_string($con,$_POST['passwords']));

        $result = mysqli_query($con,"SELECT * FROM userInfo WHERE username = '$username'");
        if (mysqli_num_rows($result) !== 0) {
            echo "Username already taken";
        }

        else {
            $hash = substr(password_hash($passwords, PASSWORD_DEFAULT),0, 60);
            /* if everything correct, inform user operation successful*/
            mysqli_query($con,"INSERT INTO `userInfo` VALUES('$username', '$hash')");
                echo "You have successfully signed up!";
            $_SESSION['review'] = $username;
            echo "<script> window.location.assign('review.php');</script>";
        }
    }
  
    ?>
    <br>
    <input type ="submit" value="Submit">
    <input type = "reset" value= "Reset">
    <br>
    </form>
    </div>
</body>
</html>