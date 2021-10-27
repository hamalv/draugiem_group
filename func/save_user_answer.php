<?php
include("../inc/class.php");

$uid = $_POST['unique_id'];
$name = $_POST['name'];
$topic_id = $_POST['topic_id'];
$question_id = $_POST['question_id'];
$answer_id = $_POST['answer_id'];

$correct_answer_return = $a->checkCorrectAnswer($answer_id);


if ($correct_answer_return){
  $correct_answer = $correct_answer_return[0];
} else {
  return false;
}

return $ua->recordAnswers($uid, $name, $topic_id, $question_id, $answer_id, $correct_answer);
