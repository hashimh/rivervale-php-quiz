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
    if(empty($_POST['q5-answers'])) {
      $answerErr = "Please select a value";
    } else {
      // check if answer is correct or not
      if ($_POST['q5-answers'] == "b") {
        $answerErr = "Correct! You have completed the quiz...";
        $_SESSION['score'] = $_SESSION['score'] + 1;
        header("Refresh:5; url=../end.php");

      } else {
        $answerErr = "Incorrect! The right answer was 'b'.";
        header("Refresh:5; url=../end.php");
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
    <h2>Question 5 of 5</h2>
      <p class="question">
      How many rings are in the Audi logo?
      </p>

      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="answer-form">
        <ul class="choices">
          <li>
            <input type="radio" name="q5-answers" id="q5-a" value="a" />
            <label for="q5-a">Three</label>
          </li>

          <li>
            <input type="radio" name="q5-answers" id="q5-b" value="b" />
            <label for="q5-b">Four</label>
          </li>

          <li>
            <input type="radio" name="q5-answers" id="q5-c" value="c" />
            <label for="q5-c">Five</label>
          </li>

          <li>
            <input type="radio" name="q5-answers" id="q5-d" value="d" />
            <label for="q5-d">Six</label>
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


</body>