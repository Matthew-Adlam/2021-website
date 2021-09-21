          <!-- connect to database-->
          <?php
require_once('includes/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- necessities -->
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
    <div class = "browse">
    <h1> Search for reviews made by our members! </h1>
    <h4> To make a review you must <a href = "signup.php">create an account.</a> </h4>
    <br>
    <!-- search bar -->
    <form method = "post" class = "searchBar">
          <input type = "text" name = "search" size = "100" placeholder = "Search..." class = "searchBarSearching">
          <button name = "submit" class = "buttonPrimary">Submit</button>
    </form>
    <table>
    <?php 
    // if user searches, select reviews based on search
            $issearching = false;
      if (isset($_POST['submit'])) {
        $search = $_POST['search'];
        $sql = "SELECT * FROM reviews WHERE bookName LIKE '%$search%' OR authors LIKE '%$search%' OR genre LIKE '%$search%' ORDER BY bookName";
        $issearching = true;
        if (mysqli_num_rows(mysqli_query($con,$sql)) == 0) {
          echo("<br>");
          echo("No reviews found matching your search query. Try searching with more general keywords.");
        }
      }
      // if user not searching, order all reviews randomly
      if ($issearching == false) {
      $sql = "SELECT * FROM reviews ORDER BY RAND()";
      }
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
  <a href = <?php echo  "report.php?id=".$row['reviewID'];?>><button class = "reportButton">Report</button></a>
  </div>
  <div class = "report">
  <a href = <?php echo  "viewcomment.php?id=".$row['reviewID'];?>><button class = "reportButton">View Comments</button></a>
  </div>
  <div class = "report">
  <a href = <?php echo  "comment.php?id=".$row['reviewID'];?>><button class = "reportButton">Add a comment</button></a>
  </div>
  </div>
      </div>
  </div>
<?php } ?>
</table>
</body>
</html>