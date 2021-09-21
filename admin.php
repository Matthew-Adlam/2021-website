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
    <div class = "browse">

    <h2> Welcome, admin! Monitor and delete reviews here. </h2>
    <form method = "post">
    <!-- if user isn't logged in as admin, redirect them to login.php -->
<?php
session_start();

if ($_SESSION['review'] !== 'admin') {
  header('Location: login.php');
} 
// select all reviews
$sql = "SELECT * FROM reviews ORDER BY bookName";

foreach ($con -> query ($sql) as $row) {
  ?>
  <br>
  <!-- display reviews one by one, with all of the details, echoing out the name, genre etc for each review selected by search  -->
<div class = "reviewStyle">
<div class = "individualReview">
<div class = "usernameStyle">
<p class="username"><b>Review made by: </b> <?php echo $row['username'];?></p>
</div>
<div class = "bookName">
<p class="questionText"><b>Book Name:</b> <?php echo $row['bookName'];?></p> 
</div>
<div class = "author">
<p class="questionText"><b>Author(s):</b> <?php echo $row['authors'];?></p> 
</div>
<div class = "genre">
<p class="questionText"><b>Genre: </b><?php echo $row['genre'];?></p> 
</div>
<div class = "rating">
<p class="questionText"><b>Comments:</b> <?php echo $row['comments'];?></p> 
</div>
<div class = "rating">
<p class="questionText"><b>Rating:</b> <?php echo $row['rating'];?> /10</p> 
</div>
<div class = "recommend">
<p class="questionText"><b>Do they recommend this book:</b> <?php echo $row['recommend'];?></p> 
</div>
</div>
  <!-- display buttons side by side, carrying ids for each review, to allow it to be used on other pages -->
  <div class = "biggerReportWrapper">
  <div class = "reportWrapper">
  <div class = "report">
  <button class = "reportButton" type = "submit" onclick = "document.getElementById('delete').value = '<?php echo $row['reviewID'];?>';">Delete</button>
  </div>
  </div>
      </div>
</div>
<?php } ?>
<!-- code to delete a review -->
<input type = "hidden" id = "delete" name = "deleter">
 <?php   
          // save as variables
          if($_SERVER["REQUEST_METHOD"] =="POST") {
          $deleter = htmlspecialchars(mysqli_real_escape_string($con,$_POST['deleter']));
          // post to database
          mysqli_query($con,"DELETE FROM `reviews` WHERE reviewID = '$deleter'");
          echo ("<script>alert('Are you sure you want to delete this review? Click the delete button again to confirm')</script>;");
          header("Location: admin.php");
          }
          
    ?>
    <br>
    </form>
    <a href = "logout.php">Log out of admin </a>
    </div>
</body>
</html>