<?php

class User_answer{
  public $con;

  function __construct(Database $con)
  {
    $this->con = $con;
  }

  public function recordAnswers($uid, $name, $topic_id, $question_id, $answer_id, $correct_answer){
    $sql = "INSERT INTO user_answers VALUES(null, $uid, '$name', $topic_id, $question_id, $answer_id, $correct_answer)";
    $result = $this->con->query($sql);
    if (!$result) {
      return false;
    }
    else {
      return true;
    }
  }

  public function countCorrectAnswers($name, $topic_id){
    $sql = "SELECT count(correct_answer) FROM user_answers WHERE user_answers.name = '$name' AND user_answers.topic_id = $topic_id AND user_answers.correct_answer = 1";

    $result = $this->con->query($sql);
    if (!$result) {
      return false;
    } else {
      $result = $result->fetch_array();

      return $result[0];
    }
  }
}

$ua = new User_answer($con);
