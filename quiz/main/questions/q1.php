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
    if(empty($_POST['q1-answers'])) {
      $answerErr = "Please select a value";
    } else {
      // Check if the answer is correct
      if ($_POST['q1-answers'] == "a") {
        $answerErr = "Correct! Moving to the next question...";
        // Increment score, and wait 3 seconds before moving to next question
        $_SESSION['score'] = $_SESSION['score'] + 1;
        header("Refresh:3; url=q2.php");

      } else {
        $answerErr = "Incorrect! The right answer was 'A'.";
        // Leave score alone, and wait 3 seconds before moving to next question
        header("Refresh:3; url=q2.php");
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
      <h2>Question 1 of 5</h2>
      <p class="question">
        Which animal features in the logo for Lamborghini?
      </p>

      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="answer-form">
        <ul class="choices">
          <li>
            <input type="radio" name="q1-answers" id="q1-a" value="a" />
            <label for="q1-a">A: A Bull</label>
          </li>

          <li>
            <input type="radio" name="q1-answers" id="q1-b" value="b" />
            <label for="q1-b">B: A Horse</label>
          </li>

          <li>
            <input type="radio" name="q1-answers" id="q1-c" value="c" />
            <label for="q1-c">C: An Eagle</label>
          </li>

          <li>
            <input type="radio" name="q1-answers" id="q1-d" value="d" />
            <label for="q1-d">D: A Brahman</label>
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


</body>

