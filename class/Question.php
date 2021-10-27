<?php

class Question
{
  public $con, $a;

  function __construct(Database $con, Answer $a)
  {
    $this->con = $con;
    $this->a = $a;
  }

  public function getAllQuestions($topic_id){
    $sql = "SELECT * FROM questions WHERE questions.topic_id = $topic_id";
    $result = $this->con->query($sql);
    if (!$result) {
      return "Datubaze nav jautajumu zem sis temas";
    } else {
      $questions = "";
      $counter = 1;
      while($row = $result->fetch_assoc()){
        $questions .= "<div class='my-5 questions question-" . $counter . "' data-question-id='" . $row['id'] . "'><h6>" . $row['question'] . "</h6>" . $this->a->getAnswers($row['id']) . "</div>";
        $counter++;
      }
      return $questions;
    }
  }

  public function countQuestions($topic_id){
    $sql = "SELECT count(id) FROM questions WHERE questions.topic_id = $topic_id";
    $result = $this->con->query($sql);
    if (!$result) {
      return 0;
    }
    else {
      $tq = $result->fetch_array();
      return $tq[0];
    }
  }
}

$q = new Question($con, $a);
