<?php

/**
 *
 */
class Summary{

  public $con;

  function __construct(Database $con){
    $this->con = $con;
  }

  public function recordSummary($name, $topic_id, $correct_answers){
    $sql = "INSERT INTO summary VALUES (null, '$name', $topic_id, $correct_answers)";
    $result = $this->con->query($sql);
    if (!$result) {
      return false;
    }
    else {
      return $this->con->con->insert_id;
    }
  }

  public function updateSummary($id, $correct_answers){
    $sql = "UPDATE summary SET summary.correct_answers = $correct_answers WHERE summary.id = $id";
    $result = $this->con->query($sql);
    if (!$result) {
      return false;
    }
    else {
      return true;
    }

  }
}

$s = new Summary($con);
