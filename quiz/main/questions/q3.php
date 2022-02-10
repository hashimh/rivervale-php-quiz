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
    if(empty($_POST['q3-answers'])) {
      $answerErr = "Please select a value";
    } else {
      // check if answer is correct or not
      if ($_POST['q3-answers'] == "b") {
        $answerErr = "Correct! Moving to the next question...";
        $_SESSION['score'] = $_SESSION['score'] + 1;
        header("Refresh:3; url=q4.php");

      } else {
        $answerErr = "Incorrect! The right answer was 'b'.";
        header("Refresh:3; url=q4.php");
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
    <h2>Question 3 of 5</h2>
      <p class="question">
      What does BMW stand for?
      </p>

      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="answer-form">
        <ul class="choices">
          <li>
            <input type="radio" name="q3-answers" id="q3-a" value="a" />
            <label for="q3-a">Bei Mercedes Weggeworfen</label>
          </li>

          <li>
            <input type="radio" name="q3-answers" id="q3-b" value="b" />
            <label for="q3-b">Bavarian Motor Works</label>
          </li>

          <li>
            <input type="radio" name="q3-answers" id="q3-c" value="c" />
            <label for="q3-c">Beautiful Mechanical Wonder</label>
          </li>

          <li>
            <input type="radio" name="q3-answers" id="q3-d" value="d" />
            <label for="q3-d">Bosnian Motor Works</label>
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

