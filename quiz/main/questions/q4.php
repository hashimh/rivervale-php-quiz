<!DOCTYPE html>

<head>
  <meta charset = UTF-8 />
  <title> Rivervale Task: Quiz Game</title>
  <link rel="stylesheet" type="text/css" href="../../style/style.css" />
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" />
</head>

<?php
session_start();

$answer = "";
$answerErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST['submit'])){
    if(empty($_POST['q4-answers'])) {
      $answerErr = "Please select a value";
    } else {
      // check if answer is correct or not
      if ($_POST['q4-answers'] == "d") {
        $answerErr = "Correct! Moving to the next question...";
        $_SESSION['score'] = $_SESSION['score'] + 1;
        header("Refresh:3; url=q5.php");

      } else {
        $answerErr = "Incorrect! The right answer was 'd'.";
        header("Refresh:3; url=q5.php");
      }
    }
  }
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
    <h2>Question 4 of 5</h2>
      <p class="question">
      Which car was famously designed to compete with the Ford Mustang?
      </p>

      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="answer-form">
        <ul class="choices">
          <li>
            <input type="radio" name="q4-answers" id="q4-a" value="a" />
            <label for="q4-a">Chevrolet Corevette</label>
          </li>

          <li>
            <input type="radio" name="q4-answers" id="q4-b" value="b" />
            <label for="q4-b">Plymouth Road Runner</label>
          </li>

          <li>
            <input type="radio" name="q4-answers" id="q4-c" value="c" />
            <label for="q4-c">Pontiac GTO</label>
          </li>

          <li>
            <input type="radio" name="q4-answers" id="q4-d" value="d" />
            <label for="q4-d">Chevrolet Camaro</label>
          </li>

        </ul>
        <input id="submit-answer" type="submit" value="Submit" name="submit" />
        <span class="error"><?php echo $answerErr;?></span>
      </form>

    </div>
  </main>

  <footer>
    <div class="container">
      Hashim Hussain
    </div>
  </footer>