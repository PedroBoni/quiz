<?php
function radioQuestion($questionText, $correctResponse, $incorrectResponses, $idQuestion)
{
  $responses = $incorrectResponses;
  array_push($responses, $correctResponse);
  for ($i = 0; $i < count($responses); $i++) {
    $switch = $responses[$i];
    $position = rand(0, 3);
    $responses[$i] = $responses[$position];
    $responses[$position] = $switch;
  }

  echo "
    <div class=\"question\">
      <div class=\"container d-flex h-100 align-items-center justify-content-center\">
        <div class=\"col-10 col-sm-8 col-sm-6 col-md-5 col-lg-5 col-xl-5 mx-auto\">
          <div class=\"form-group\">
            <p>$questionText</p>
  ";
  for ($i = 0; $i < count($responses); $i++) {
    echo "
      <div class=\"form-check\">
        <input class=\"form-check-input\" type=\"radio\" name=\"resQ$idQuestion\" id=\"$responses[$i]-$idQuestion\" value=\"$responses[$i]\">
        <label class=\"form-check-label\" for=\"$responses[$i]-$idQuestion\">
          $responses[$i];
        </label>
      </div>
    ";
  }
  echo "
          </div>
        </div>
      </div>
    </div>
  ";
}
function selectQuestion($questionText, $correctResponse, $incorrectResponses, $idQuestion)
{
  $responses = $incorrectResponses;
  array_push($responses, $correctResponse);
  for ($i = 0; $i < count($responses); $i++) {
    $switch = $responses[$i];
    $position = rand(0, 3);
    $responses[$i] = $responses[$position];
    $responses[$position] = $switch;
  }

  echo "
    <div class=\"question\">
      <div class=\"container d-flex h-100 align-items-center justify-content-center\">
        <div class=\"col-10 col-sm-8 col-sm-6 col-md-5 col-lg-5 col-xl-5 mx-auto\">
          <div class=\"form-group\">
            <p>$questionText</p>
            <div class=\"form-group\">
              <label for=\"selectQuestions-$idQuestion\">Resposta:</label>
              <select class=\"form-control\" id=\"selectQuestions-$idQuestion\" name=\"resQ$idQuestion\">;
              <option selected disabled>Escolha aqui</option>";

  for ($i = 0; $i < count($responses); $i++)
    echo "<option value=\"$responses[$i]\">$responses[$i]</option>";
  echo "
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
  ";
}
