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
    <link rel="icon" href="images/favicon.jpg">
</head>
<body>
    <header class = "header-text"> Book Review </header>

    <nav>
      <a href="index.php">Home</a>
      <a href="browse.php">Browse Reviews</a>
      <a href="signup.php">Sign Up</a>
      <a href="login.php">Log In</a>
      <a href="home.php">User Home</a>
    </nav>
    <div class = "mobile">
    <div class = "inputbox">
    <h1> Input a review here! </h1>
    <form method = "post" action="review.php">
    <label for = "bookName">Book Name: </label>
      <br>
    <span class="submit"></span><input type="text" name="bookName" class="formStyle" required placeholder = "Book Name">
    <br>
    <label for = "passwords">Author(s): </label>
      <br>
    <span class="submit"></span><input type="text" name="authors" class="formStyle" required placeholder = "Author(s)">
    <br>
    <label for = "username">Genre: </label>
      <br>
    <span class="submit"></span><input type="text" name="genre" class="formStyle" required placeholder = "Genre">
    <br>
    <label for = "passwords">Rating /10, with 10 being the highest: </label>
      <br>
    <span class="submit"></span><input type="number" name="rating" max = "10" min = "0"class="formStyle" required placeholder = "/10">
    <br>
    <span class="submit">Review the book:</span>
    <br>
    <textarea name ="comments" rows="10" columns = "300" required placeholder  = "What did you think of the book?" class = "formStyle" ></textarea>
    <br>
    <span class="submit">Would you recommend this book to other people?</span>       
    <br>
  <input type="radio" class = "radio" name = "recommend" value="Yes" id = "Yes" required>
  <span class = "checkmark">
  <label for="Yes">Yes</label><br>
  <input type="radio" class = "radio" name = "recommend" value="No" id = "No">
  <span class = "checkmark">
  <label for="No">No</label><br>
  <input type="radio" class = "radio" name = "recommend" value="Undecided" id = "Undecided">
  <span class = "checkmark">
  <label for="Undecided">Undecided</label>
  <br>
 <?php   
          session_start();
          /*|| isset ($_SESSION['review']) */
          if ($_SESSION['review'] == '') {
            header('Location:login.php');
          }
          $username =  $_SESSION['review'];
          if($_SERVER["REQUEST_METHOD"] =="POST") {
          $bookName = htmlspecialchars(mysqli_real_escape_string($con,$_POST['bookName']));
          $authors = htmlspecialchars(mysqli_real_escape_string($con,$_POST['authors']));
          $genre = htmlspecialchars(mysqli_real_escape_string($con,$_POST['genre']));
          $rating = htmlspecialchars(mysqli_real_escape_string($con,$_POST['rating']));
          $comments = htmlspecialchars(mysqli_real_escape_string($con,$_POST['comments']));
          $recommend = htmlspecialchars(mysqli_real_escape_string($con,$_POST['recommend']));

          $res = mysqli_query($con,"INSERT INTO `reviews`(username,bookName,authors,genre,rating,comments,recommend) VALUES('$username','$bookName', '$authors', '$genre', '$rating', '$comments', '$recommend')");
          echo "<br>";
          echo "Review added!";
          echo "<br>";
        }
    ?>
    <br>
    <input type ="submit" value="Submit" class="buttonPrimary">
    <input type = "reset" value= "Reset" class="buttonSecondary">
    <br>
    </form>
    <br>
    <br>
    <a href = "home.php"><h2>Back</h2></a>
    <a href = "logout.php"><h2>Log Out</h2></a>
    </div>
    </div>
    <br>
</body>
</html>