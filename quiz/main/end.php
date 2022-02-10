<!DOCTYPE html>

<head>
  <meta charset = UTF-8 />
  <title> Rivervale Task: Quiz Game</title>
  <link rel="stylesheet" type="text/css" href="../style/style.css" />
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" />
</head>

<?php
session_start();

// Initialise connection to the database
// PLEASE SUPPLY YOUR SQL DATABASE USER AND PASSWORD IF THEY DIFFER TO THE VALUES BELOW

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';

// Create mysqli object and pass through credentials
$mysqli = new mysqli($db_host, $db_user, $db_pass, "");
// Handle any potential errors, log them and exit function
if ($mysqli->connect_error) {
  printf("Connection failed: %s\n", $mysqli->connect_error);
  exit();
}

// Try to connect to 'quiz' database - if unsuccesful, then create 'quiz' db
if (!$mysqli->select_db('quiz')) {
  echo "Could not connect to database: " . $con->error;
  if (!$mysqli->query("CREATE DATABASE IF NOT EXISTS quiz")) {
    echo "Could not create database: " . $mysqli->error;
  }
  $mysqli->select_db('quiz');
}



// Create a variable for the date
$date = date('Y-m-d');

// Assign variables from the session
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$score = $_SESSION['score'];

// Insert the users data, score and the date into the database
$sql = "INSERT INTO quiz (name, email, score, date)
VALUES ('$name', '$email', '$score', '$date')";

if ($mysqli->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $mysqli->error;
}
?>


<body>
  <header>
    <div class="container">
      <h1>Rivervale Task: PHP Quiz Game</h1>
    </div>
  </header>

  <main>
    <div class="container">
      <h2>The quiz has finished!</h2>
      <p>Congratulations <?php echo $name ?>, the you have completed the quiz! See your score below, and optionally retake the quiz. Your information and score have been saved in the database.</p>
      <p id="end-score">Your final score is: <?php echo $score ?> out of 5!</p>
      <a href="questions/q1.php" class="start">Retake</a>
    </div>
  </main>

  <footer>
    <div class="container">
      Hashim Hussain
    </div>
  </footer>


</body>

