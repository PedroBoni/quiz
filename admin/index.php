<?php
if (!$_GET)
  header('Location: /quiz/admin/login/index.php');
?>

<?php
include '../db/db_connection.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <title>Dashboard</title>
</head>

<body>
  <div class="container">
    <div class="row d-flex justify-content-end p-4">
      <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#registerQuest"><i class="fas fa-plus-square"></i></button>
    </div>
    <div id="list">

      <?php
      $getAllQuestions = "
          select * from question;
        ";

      $response = mysqli_query($conn, $getAllQuestions);
      $rows = mysqli_fetch_all($response);

      foreach ($rows as $row) {
        echo "        
          <div class=\"card mb-2\">
            <div class=\"card-header d-flex justify-content-between \" id=\"headingOne\">
              <p class=\"mb-0 d-flex align-items-center\">$row[1]</p>
                <button class=\"btn d-flex align-items-center\" data-toggle=\"collapse\" data-target=\"#cd$row[0]\">
                  <i class=\"fas fa-sort-down\"></i>
                </button>              
            </div>

            <div id=\"cd$row[0]\" class=\"collapse\">
              <div class=\"card-body\">
                <p>Resposta correta: $row[2]</p>
                <p>Respostas incorretas: </p>
                ";
        $getAllIncorrectResponses = "
          select * from response_incorrect where id_question = $row[0];
        ";
        $response = mysqli_query($conn, $getAllIncorrectResponses);
        $rows = mysqli_fetch_all($response);
        foreach ($rows as $row)
          echo "<li>$row[1]</li>";
        echo "
          </div>
          </div>
          </div>";
      }
      ?>
    </div>
  </div>
  <div class="modal fade" id="registerQuest" tabindex="-1" role="dialog" aria-labelledby="registerQuestLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Registar nova pergunta</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="register_question.php">
          <div class="modal-body">
            <div class="form-group">
              <label for="questText">Pergunta:</label>
              <textarea type="text" class="form-control form-control-sm" name="questText" id="questText"></textarea>
            </div>
            <div class="form-group">
              <label for="responseCorrect">Resposta correta:</label>
              <input type="text" class="form-control form-control-sm" name="responseCorrect" id="responseCorrect">
            </div>
            <div class="form-group">
              <label for="responseIncorrect1">Resposta errada 1:</label>
              <input type="text" class="form-control form-control-sm" name="responseIncorrect1" id="responseIncorrect1">
            </div>
            <div class="form-group">
              <label for="responseIncorrect2">Resposta errada 2:</label>
              <input type="text" class="form-control form-control-sm" name="responseIncorrect2" id="responseIncorrect2">
            </div>
            <div class="form-group">
              <label for="responseIncorrect3">Resposta errada 3:</label>
              <input type="text" class="form-control form-control-sm" name="responseIncorrect3" id="responseIncorrect3">
            </div>
            <p>Tipo de apresentação:</p>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="presentation_type" id="radio" value="r" checked>
              <label class="form-check-label" for="radio">
                Radio
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="presentation_type" id="select" value="s">
              <label class="form-check-label" for="select">
                Select
              </label>
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://kit.fontawesome.com/3b9fb27255.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>