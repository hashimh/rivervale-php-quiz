<!DOCTYPE html>

<head>
  <meta charset = UTF-8 />
  <title> Rivervale Task: Quiz Game</title>
  <link rel="stylesheet" type="text/css" href="../style/style.css" />
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" />
</head>

<?php
session_start();

// define vars and set to empty values
$nameErr = $emailErr = "";
$name = $email = "";
$score = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // validate the username and email
  if (empty($_POST["name"])) {
    $nameErr = "Please enter your name!";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    } else {
      // username checks out, now check email
      if (empty($_POST["email"])) {
        $emailErr = "Please enter your email!";
      } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
        } else {
          // everything checks out, save entries to session and redirect user to next page
          $_SESSION['name'] = $_POST['name'];
          $_SESSION['email'] = $_POST['email'];
          $_SESSION['score'] = $_POST['score'];
          header('Location: questions/q1.php');
          exit();
        }
      }
    }
  }


}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
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
      <h3>Test your vehicle knowledge! Please enter your name and email below.</h3>

      <div id="input-form">
        <form method="post" name="emailform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <div class="in">
          <input type="text" name="name" placeholder="Your Name..." class="user-entry" id="full-name">
          <span class="error"><?php echo $nameErr;?></span>
          </div>
          <div class="in">
          <input type="text" name="email" placeholder="Your Email..." class="user-entry">
          <span class="error"><?php echo $emailErr;?></span>
          </div>
          <input type="submit" value="Start Quiz!" id="start-button" name="submit-btn">
        </form>
        </div>

    </div>
  </main>

  <footer>
    <div class="container">
      Hashim Hussain
    </div>
  </footer>


</body>

