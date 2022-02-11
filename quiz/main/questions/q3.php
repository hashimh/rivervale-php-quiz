<!DOCTYPE html>

<head>
  <meta charset = UTF-8 />
  <title> Rivervale Task: Quiz Game</title>
  <link rel="stylesheet" type="text/css" href="../../style/style.css" />
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" />
</head>

<?php
session_start();

// Set variables
$answer = "";
$answerErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST['submit'])){
    // Check if an answer has been selected
    if(empty($_POST['q3-answers'])) {
      $answerErr = "Please select a value";
    } else {
      // Check if the answer is correct
      if ($_POST['q3-answers'] == "b") {
        $answerErr = "Correct! Moving to the next question...";
        // Increment score, and wait 3 seconds before moving to next question
        $_SESSION['score'] = $_SESSION['score'] + 1;
        header("Refresh:3; url=q4.php");

      } else {
        $answerErr = "Incorrect! The right answer was 'B'.";
        // Leave score alone, and wait 3 seconds before moving to next question
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
            <label for="q3-a">A: Bei Mercedes Weggeworfen</label>
          </li>

          <li>
            <input type="radio" name="q3-answers" id="q3-b" value="b" />
            <label for="q3-b">B: Bavarian Motor Works</label>
          </li>

          <li>
            <input type="radio" name="q3-answers" id="q3-c" value="c" />
            <label for="q3-c">C: Beautiful Mechanical Wonder</label>
          </li>

          <li>
            <input type="radio" name="q3-answers" id="q3-d" value="d" />
            <label for="q3-d">D: Bosnian Motor Works</label>
          </li>

        </ul>
        <input id="submit-answer" type="submit" value="Submit" name="submit" />
        <span class="error"><?php echo $answerErr;?></span>
      </form>

    </div>
  </main>

  <footer>
    <div class="container">
    </div>
  </footer>

