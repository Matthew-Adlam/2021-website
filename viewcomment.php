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
    <div class = "background">
    <h1 class = "centerText"> View comments for this review here. </h1>
    <div class = "browse">
    <div class = "inputbox">
    <br>
    <br>
    <!-- selects the appropriate review that was clicked on -->
    <?php   
    $comment = $_GET['id'];
    $sql = "SELECT * FROM reviews WHERE reviewID = $comment";
    foreach ($con -> query ($sql) as $row) {
        ?>
        <br>
        <table>
        <!-- displays that review, same code as browse.php, except doesn't repeat -->
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
    <?php } ?>
    <br>
    </div>
    </div>
    </div>
    </table>
    <!-- displays comments for that particular review -->
    <h2 class = "centerText">Comments: </h2>
    <?php
        $sql2 = "SELECT * FROM comments WHERE id = $comment";
        foreach ($con -> query ($sql2) as $row) {
    ?>
      <div class = "reviewStyle">
      <div class = "individualReview">
      <p><b>Comment made by: </b> <?php echo $row['username'];?></p>
      <p><b>Comment:</b> <?php echo $row['comment'];?></p> 
      <p><b>Rating:</b> <?php echo $row['rating'];?>/10</p>
      </div>
    </div> 
    <?php } ?>
    <br>
    </div>
    </div>
    </div>
    <h2 class = "centerText"> <a href = "browse.php">Go back.</a></h2>
</body>
</html>