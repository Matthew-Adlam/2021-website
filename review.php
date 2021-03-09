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
    <h1> Input a review here! </h1>
    <form method = "post" action="review.php">
    <span class="submit">Book Name:</span><input type="text" name="bookName" required>
    <br>
    <span class="submit">Author/Authors:</span><input type="text" name="authors" required>
    <br>
    <span class="submit">Genre:</span><input type="text" name="genre" required>
    <br>
    <span class="submit">Rating out of 10:</span><input type="number" name = "rating" min = "1" max = "10" required>
    <br>
    <span class="submit">Comments:</span>
    <br>
    <textarea name ="comments" rows="10" columns = "100" required></textarea>
    <br>
    <span class="submit">Would you recommend this book to other people?</span>       
    <br>
  <input type="radio" name = "recommend" value="Yes" id = "Yes">
  <label for="Yes">Yes</label><br>
  <input type="radio" name = "recommend" value="No" id = "No">
  <label for="No">No</label><br>
  <input type="radio" name = "recommend" value="undecided" id = "undecided">
  <label for="other">Undecided</label>
  <br>
 <?php   
          session_start();
          $_SESSION = ['username'];
          if($_SERVER["REQUEST_METHOD"] =="POST") {
          $bookName = htmlspecialchars(mysqli_real_escape_string($con,$_POST['bookName']));
          $authors = htmlspecialchars(mysqli_real_escape_string($con,$_POST['authors']));
          $genre = htmlspecialchars(mysqli_real_escape_string($con,$_POST['genre']));
          $rating = htmlspecialchars(mysqli_real_escape_string($con,$_POST['rating']));
          $comments = htmlspecialchars(mysqli_real_escape_string($con,$_POST['comments']));
          $recommend = htmlspecialchars(mysqli_real_escape_string($con,$_POST['recommend']));

          $res = mysqli_query($con,"INSERT INTO `reviews`(username,bookName,authors,genre,rating,comments,recommend) VALUES('$username','$bookName', '$authors', '$genre', '$rating', '$comments', '$recommend')");
          print_r([$res, mysqli_error($con)]);
          echo "Review added!";
          }
    ?>
    <br>
    <input type ="submit" value="Submit" class="submitButton">
    <input type = "reset" value= "Reset" class="resetButton">
    <br>
    </form>
    </div>
    <br>
    <h3> Leaving this page will log you out for security purposes. </h3>
</body>
</html>