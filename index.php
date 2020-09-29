<?php
include './db/db_connection.php';
include './components/question/question_type.php'
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Quiz</title>
</head>

<body>
  <form action="quiz_result.php" method="post">
    <div class="question">
      <div class="container d-flex h-100 align-items-center justify-content-center">
        <div class="col-10 col-sm-8 col-sm-6 col-md-5 col-lg-5 col-xl-5 mx-auto">
          <div class="form-group">
            <label for="email">Seu e-mail*</label>
            <input type="email" name="email" id="email" class="form-control form-control-sm" placeholder="seunome@dominio.com" aria-describedby="helpId">
            <small id="helpId" class="text-muted">As respostas serão enviadas no seu email</small>
          </div>
        </div>
      </div>
    </div>
    <?php
    $getAllQuestions = "
          select * from question;
        ";
    $response = mysqli_query($conn, $getAllQuestions);
    $questions = mysqli_fetch_all($response);

    foreach ($questions as $question) {
      $getAllIncorrectResponses = "
        select * from response_incorrect where id_question = $question[0];
      ";
      $response2 = mysqli_query($conn, $getAllIncorrectResponses);
      $incorrectResponses = mysqli_fetch_all($response2);

      $arr = array();
      for ($i = 0; $i < count($incorrectResponses); $i++) {
        $incorrectResponse = $incorrectResponses[$i];
        $arr[$i] =  $incorrectResponse[1];
      }
      if ($question[3] == 'r')
        radioQuestion($question[1], $question[2], $arr, $question[0]);
      else if ($question[3] == 's')
        selectQuestion($question[1], $question[2], $arr, $question[0]);
    }

    mysqli_close($conn);

    ?>
    <div class="question">
      <div class="container d-flex h-100 align-items-center justify-content-center">
        <div class="col-10 col-sm-8 col-sm-6 col-md-5 col-lg-5 col-xl-5 mx-auto">
          <div class="form-group">
            <button type="submit" class="btn btn-dark btn-xl w-100">Receber resultado por email</button>
          </div>
        </div>
      </div>
    </div>
  </form>

</body>

</html>