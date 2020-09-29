<?php
include './db/db_connection.php';

$email = $_POST['email'];
$getAllQuestions = "
    select * from question;
  ";
$response = mysqli_query($conn, $getAllQuestions);
$questions = mysqli_fetch_all($response);

$questionsCount = count($questions);
$totalHits = 0;

for ($i = 0; $i < $questionsCount; $i++) {
  $question = $questions[$i];
  $nameRes = "resQ$question[0]";
  if ($question[2] == $_POST["$nameRes"])
    $totalHits++;
}

$message = "
  <div style=\"padding: 5px 20px; font-family: sans-serif; border: 1px solid #ddd\">
    <h1 style=\"color: red;\" align=\"end\">Pontuação: $totalHits/$questionsCount</h1>";
for ($i = 0; $i < $questionsCount; $i++) {
  $question = $questions[$i];
  $nameRes = "resQ$question[0]";
  $res = $_POST["$nameRes"];
  $message .= "
    <div style=\"padding: 10px;\">
      <p style=\"font-weight: bold\">$question[1]</p>
      <li style=\"\">Resposta correta: $question[2]</li>
      <li style=\"\">Sua reposta: $res</li>
    </div>";
}
$message .= "</div>";

echo $message;
 // echo var_dump($questions);
