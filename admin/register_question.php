<?php
include '../db/db_connection.php';

if ($_POST) {
  $ds_question = $_POST['questText'];
  $responseCorrect = $_POST['responseCorrect'];
  $responseIncorrect1 = $_POST['responseIncorrect1'];
  $responseIncorrect2 = $_POST['responseIncorrect2'];
  $responseIncorrect3 = $_POST['responseIncorrect3'];
  $presentationType = $_POST['presentation_type'];

  $insertQuestion = "
      insert into question set
      ds_question = '$ds_question',
      response_correct = '$responseCorrect',
      presentation_type = '$presentationType';
    ";

  mysqli_query($conn, $insertQuestion);

  $res = mysqli_query($conn, "select last_insert_id();");
  $row = mysqli_fetch_assoc($res);
  $cd_question =  $row['last_insert_id()'];
  $insertResponseIncorrect = "
      insert into response_incorrect
      (ds_response_incorrect, id_question) values
      ('$responseIncorrect1', '$cd_question'),
      ('$responseIncorrect2', '$cd_question'),
      ('$responseIncorrect3', '$cd_question');    
    ";

  mysqli_query($conn, $insertResponseIncorrect);
  mysqli_close($conn);

  header('Location: /quiz/admin/index.php?a');
}
