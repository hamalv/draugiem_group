<?php

class Answer{

  public $con;

  function __construct(Database $con){
    $this->con = $con;
  }

  public function getAnswers($question_id){
    $sql = "SELECT * FROM answers WHERE answers.question_id = $question_id";
    $result = $this->con->query($sql);
    if (!$result) {
      return "Zem si jautajuma nav atbilzu varianti";
    } else {
      $a = "";
      while($row = $result->fetch_assoc()){
        $a .= "<div class='col-md-6 col-sm-12 my-2 form-check answers'>
            <input class='form-check-input' value='" . $row['id'] . "' name='question-" . $question_id . "' type='radio'><label data-answer-id='" . $row['id'] . "'>" . $row['answer'] . "</label></div>";
      }
      return $a;
    }
  }

  public function checkCorrectAnswer($answer_id){
    $sql = "SELECT correct_answer FROM answers WHERE answers.id = $answer_id";
    $result = $this->con->query($sql);
    if(!$result){
      return false;
    }
    else{
      return $result->fetch_array();
    }
  }
}

$a = new Answer($con);
