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
      <a href="signup.php">Sign Up</a>
      <a href="login.php">Log In</a>
    </nav>

    <div class = "inputbox">
    <h1> Sign Up Here </h1>
    <form method = "post" action="signup.php">
    <span class="submit">Username:</span><input type="text" name="username" required>
    <span class="submit">Password:</span><input type="text" name="password" required>
    <span class="submit">Email:</span><input type="text" name="password">
              <!-- posts to database if information correct-->
<?php
    if($_SERVER["REQUEST_METHOD"] =="POST") {
        $username= $_POST["StudySubject"];
    try {
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sth  = $pdo->prepare("INSERT INTO StudyCount (StudySubject,StudyTime,) VALUES (:StudySubject,:StudyTime,)");
        $sth->bindValue(':StudySubject', $StudySubject, PDO::PARAM_STR);
        $count = $sth->execute();
        /* if everything correct, inform user operation successful*/
        if($count == 1) {
            echo "Record added to the database! Go to the link below to view your study log!";
        }
        $pdo = null;
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
}
    ?>
    <br>
    <input type ="submit" value="Submit">
    <br>
    </form>
    </div>
</body>
</html>