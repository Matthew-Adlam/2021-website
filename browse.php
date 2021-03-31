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
    <div class = "browse">
    <h1> Search for reviews made by our users! </h1>
    <h4> To make a review you must <a href = "signup.php">create an account.</a> </h4>
    <br>
    <form method = "post">
          <input type = "text" name = "search" size = "100" placeholder = "Search..." class = "searchBar">
          <button name = "submit">Submit</button>
    </form>
    <table>
    <?php 
            $issearching = false;
      if (isset($_POST['submit'])) {
        $search = $_POST['search'];
        $sql = "SELECT * FROM reviews WHERE bookName LIKE '%$search%' OR authors LIKE '%$search%' OR genre LIKE '%$search%'";
        $issearching = true;
      }
      if ($issearching == false) {
      $sql = "SELECT * FROM reviews";
      }
      foreach ($con -> query ($sql) as $row) {
    ?>
    <br>
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
  <div class = "report">
  <a href = "report.php"><button class = "reportButton">Report</button></a>
  </div>
  </div>
<?php } ?>
</table>
</body>
</html>